<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $doctors = Doctor::paginate(8);
        $menu = 'doctor';
        return view('doctor.index', compact(['doctors','menu']));
    }

    public function store(Request $request)
    {

        Doctor::create($request->all());
        return redirect()->action('DoctorController@index');
    }

    public function show(Request $request)
    {
        $searchs = DB::table('doctors')->where('name','like',$request->name . "%")->get();
        $menu = 'doctor';
        return view('doctor.index', compact(['searchs','menu']));
    }


    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return $doctor;
    }


    public function update(Request $request)
    {

        $doctor = Doctor::find($request->id);
        $doctor->name = $request->name;
        $doctor->crm = $request->crm;
        $doctor->save();
        return redirect()->action('DoctorController@index');
    }


    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->action('DoctorController@index');
    }

    public function all(Request $request)
    {

        $doctors = DB::table('doctors')->select('name')->where('name', 'like', '%'.$request->term.'%')->get();
        $result = '[ ';
        $fim = false;
        foreach ($doctors as $doctors){
            if($fim){
                $result .= ', ';
            } else{
                $fim = true;
            }
            $result .= json_encode($doctors->name);
        }
        $result .= ' ]';
        return $result;
    }

    public function getDoctorId(Request $request)
    {
        $doctor = DB::table('doctors')->select('id')->where('name', 'like', '%'.$request->name.'%')->get();

        return $doctor;
    }
}
