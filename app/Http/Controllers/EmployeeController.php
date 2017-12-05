<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(8);
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Employee::create($request->all());
        return redirect()->action('EmployeeController@index');
    }

    public function show(Request $request)
    {
        $searchs = DB::table('employees')->where('name','like',$request->name . "%")->get();
        return view('employee.index', compact('searchs'));
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        return $employee;
    }


    public function update(Request $request)
    {

        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->function = $request->function;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->save();
        return redirect()->action('EmployeeController@index');
    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->action('EmployeeController@index');
    }

    public function all(Request $request)
    {

        $employees = DB::table('employees')->select('name')->where('name', 'like', '%'.$request->term.'%')->get();
        $result = '[ ';
        $fim = false;
        foreach ($employees as $employee){
            if($fim){
                $result .= ', ';
            } else{
                $fim = true;
            }
            $result .= json_encode($employee->name);
        }
        $result .= ' ]';
        return $result;
    }

    public function getEmployeeId(Request $request)
    {
        $employee = DB::table('employees')->select('id')->where('name', 'like', '%'.$request->name.'%')->get();

        return $employee;
    }
}
