<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Services_has_Exams;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::paginate(8);
        $menu = 'service';
        return view('service.index', compact(['services','menu']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = 'service';
        return view('service.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {

        if(!empty($request->service_id)){
            $service = Service::find($request->service_id);
            $service->employee_id = $request->employee_id;
            $service->company_id = $request->company_id;
            $service->doctor_id = $request->doctor_id;
            $service->exam_date = $request->exam_date;
            $service->save();
        } else {
          $service = Service::create($request->all());
        }

        if(!empty($request->exam_id)){
            $services_has_exams = new Services_has_Exams();
            $services_has_exams->service_id = $service->id;
            $services_has_exams->exam_id = $request->exam_id;
            $services_has_exams->save();
            $exams = 'active';
            $menu = 'service';
            return view('service.create', compact(['service', 'exams','menu']));
        }

        return redirect()->action('ServiceController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        $menu = 'service';
        return view('service.details', compact(['service','menu']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $menu = 'service';
        return view('service.create', compact(['service','menu']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
}
