<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $exams = Exam::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $exams = Exam::orderBy("name", "desc")->get();
        }
        return view('exam', ['exams' => $exams]);
    }

    public function store(Request $request) {
        Exam::create($request->all());
        return redirect('/exam');
    }

    public function update(Request $request, $id) {
        Exam::where('id', $id)->update($request->except(['_method', '_token']));
        return redirect('/exam');
    }

    public function delete($id) {
        Exam::where('id', $id)->delete();

        return redirect('/exam');
    }
}
