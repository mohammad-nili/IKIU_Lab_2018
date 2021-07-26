<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show()
    {
        $exams = \App\Exam::all()->groupBy('category_en');
        return view('layouts.exams.show',compact('exams'));
    }

    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('layouts.exams.edit',compact('exam'));
    }

    public function update(Request $request,$id)
    {
        $exam = Exam::find($id);
        if ($request->input('cost') != $exam->cost) {
            Exam::where("id", $id)->Update(["cost" => $request->input('cost')]);
            alert()->success('هزینه آزمون مورد نظر تغییر یافت', 'هزینه آزمون')->autoclose(3500);
            return redirect()->route('ShowExam');
        } else {
            alert()->info('بدون تغییر', 'هزینه آزمون')->autoclose(3500);
            return redirect()->route('ShowExam');
        }
    }
    public function create()
    {
        $categories = \App\Exam::select(['category as fa', 'category_en as en'])->distinct()->get();
        return view('layouts.exams.add',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'cost'     => 'required',
            'category_en'      => 'required',
        ]);

        $exam = new Exam();
        $exam->name = $request->input('name');
        $exam->category_en = $request->input('category_en');
        $exam->category = Exam::where('category_en',$request->input('category_en'))->first()->category;
        $exam->cost = $request->input('cost');
        $exam->description = $request->input('description');
        $exam->save();
        alert()->success('آزمون جدید با موفقیت ثبت  شد', 'ثبت آزمون')->autoclose(3500);
        return redirect()->route('ShowExam');
    }
}
