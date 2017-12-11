<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Company;
use App\Models\Exam;
use App\Models\Service;
use App\Models\Services_has_Exams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::paginate(8);
        $data = $this->getData('all');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }


    public function create()
    {
        $menu = 'service';
        return view('service.create', compact('menu'));
    }


    public function store(ServiceRequest $request)
    {

        if(!empty($request->service_id)){
            $service = Service::find($request->service_id);
            $service->employee_id = $request->employee_id;
            $service->company_id = $request->company_id;
            $service->doctor_id = $request->doctor_id;
            $service->exam_date = $request->exam_date;
            $service->start_time= $request->start_time;
            $service->price =
            $service->save();
        } else {
          $service = Service::create($request->all());
        }

        if(!empty($request->exam_id)){
            $exam = Exam::find($request->exam_id);
            $services_has_exams = new Services_has_Exams();
            $services_has_exams->service_id = $service->id;
            $services_has_exams->exam_id = $request->exam_id;
            $services_has_exams->price = $exam->price;
            $service->start_time= $request->start_time;
            $services_has_exams->save();
            $exams = 'active';
            $menu = 'service';
            return view('service.create', compact(['service', 'exams','menu']));
        }

        return redirect()->action('ServiceController@index');
    }

    public function show($id)
    {
        $service = Service::find($id);
        $data = $this->getData();
        $menu = 'service';
        return view('service.details', compact(['service','menu','data']));
    }

    public function seach(Request $request)
    {
        if (!empty($request->start_date)&& !empty($request->stop_date) && !empty($request->company) && !empty($request->employee)){
            $companies = DB::table('companies')->select('id')->where('name','like','%'.$request->company.'%');
            $employees = DB::table('employees')->select('id')->where('name','like','%'.$request->employee.'%');

            $services = Service::where('exam_date','>=',$request->start_date)
                ->where('exam_date','<=',$request->stop_date)
                ->whereIn('company_id',$companies)
                ->whereIn('employee_id',$employees)
                ->paginate(115);
        } elseif (!empty($request->start_date)&& !empty($request->stop_date) && !empty($request->company)){
            $companies = DB::table('companies')->select('id')->where('name','like','%'.$request->company.'%');

            $services = Service::where('exam_date','>=',$request->start_date)
                ->where('exam_date','<=',$request->stop_date)
                ->whereIn('company_id',$companies)
                ->paginate(115);
        } elseif (!empty($request->start_date)&& !empty($request->stop_date)&& !empty($request->employee)){

            $employees = DB::table('employees')->select('id')->where('name','like','%'.$request->employee.'%');

            $services = Service::where('exam_date','>=',$request->start_date)
                ->where('exam_date','<=',$request->stop_date)
                ->whereIn('employee_id',$employees)
                ->paginate(115);
        } elseif (!empty($request->start_date)&& !empty($request->stop_date)) {
            $services = Service::where('exam_date','>=',$request->start_date)
                ->where('exam_date','<=',$request->stop_date)
                ->paginate(115);
        } elseif (!empty($request->employee)){
            $employees = DB::table('employees')->select('id')->where('name','like','%'.$request->employee.'%');

            $services = Service::whereIn('employee_id',$employees)
                ->paginate(115);
        } elseif (!empty($request->company)){
            $companies = DB::table('companies')->select('id')->where('name','like','%'.$request->company.'%');

            $services = Service::whereIn('company_id',$companies)
                ->paginate(115);
        }


        $data = $this->getData('all');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $data = $this->getData();
        $menu = 'service';
        return view('service.create', compact(['service','menu', 'data']));
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function finished(Request $request)
    {
        $service = Service::find($request->id);
        $service->status = 1;
        $service->save();
        return redirect()->action('ServiceController@index');
    }
    public function cancel($id)
    {
        $service = Service::find($id);
        $service->status = 2;
        $service->save();
        return redirect()->action('ServiceController@index');
    }

    public function destroy($id)
    {
        DB::table('services_has_exams')->where('service_id', '=', $id)->delete();
        $service = Service::find($id);
        $service->delete();

        return redirect()->action('ServiceController@index');
    }

    public function destroyExam($id)
    {
        $exam = Services_has_Exams::find($id);
        $service = $exam->service;
        $exam->delete();
        $exams = 'active';
        $menu = 'service';
        return view('service.create', compact(['service', 'exams', 'menu']));
    }

    public function getRecent()
    {
        $services = Service::where('exam_date', '=', date('Y-m-d'))->where('status','=','0');

        $data = $this->getData('recent');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));

    }

    public function getScheduled()
    {
        $services = Service::where('exam_date', '>', date('Y-m-d'))->where('status','=','0')->orderBy('exam_date','start_time')->paginate(8);

        $data = $this->getData('scheduled');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }

    public function getNotFinished()
    {
        $services = Service::where('exam_date', '<', date('Y-m-d'))->where('status','=','0')->orderBy('exam_date','start_time')->paginate(8);

        $data = $this->getData('notFinished');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }

    public function getFinished()
    {
        $services = Service::where('status','=','1')->orderBy('exam_date','start_time')->paginate(15);

        $data = $this->getData('finished');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }

    public function getCancel()
    {
        $services = Service::where('status','=','2')->orderBy('exam_date','start_time')->paginate(15);

        $data = $this->getData('cancel');
        $menu = 'service';

        return view('service.index', compact(['services','menu','data']));
    }

    protected function getData($subMenu = null)
    {
        return [
            'subMenu'   => $subMenu,
            'qtdAll'    => DB::table('services')->count(),
            'qtdRecent' => DB::table('services')->where('exam_date', '=', date('Y-m-d'))->count(),
            'qtdScheduled' => DB::table('services')->where('exam_date', '>', date('Y-m-d'))->where('status','=','0')->count(),
            'qtdNotFinished' => DB::table('services')->where('exam_date', '<', date('Y-m-d'))->where('status','=','0')->count(),
            'qtdFinished' => DB::table('services')->where('status','=','1')->count(),
            'qtdCancel' => DB::table('services')->where('status','=','2')->count(),
        ];
    }

    public function deletes()
    {
        $services = DB::select('CALL `services_delete`');
        return view('service.services_delete', compact('services'));
    }
}
