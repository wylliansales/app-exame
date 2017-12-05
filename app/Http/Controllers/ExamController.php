<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::paginate(8);
        return view('exam.index', compact('exams'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        Exam::create($request->all());
        return redirect()->action('ExamController@index');
    }

    public function show(Request $request)
    {
        $searchs = DB::table('exams')->where('name','like',$request->name . "%")->get();
        return view('exam.index', compact('searchs'));
    }


    public function edit($id)
    {
        $exam = Exam::find($id);
        return $exam;
    }


    public function update(Request $request)
    {

        $exam = Exam::find($request->id);
        $exam->name = $request->name;
        $exam->price = $request->price;
        $exam->description = $request->description;
        $exam->save();
        return redirect()->action('ExamController@index');
    }


    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect()->action('ExamController@index');
    }

    public function all(Request $request)
    {

        $exams = DB::table('exams')->select('name')->where('name', 'like', '%'.$request->term.'%')->get();
        $result = '[ ';
        $fim = false;
        foreach ($exams as $exam){
            if($fim){
                $result .= ', ';
            } else{
                $fim = true;
            }
            $result .= json_encode($exam->name);
        }
        $result .= ' ]';
        return $result;
    }

    public function getExamId(Request $request)
    {
        $exam = DB::table('exams')->select('id')->where('name', 'like', '%'.$request->name.'%')->get();

        return $exam;
    }
}
