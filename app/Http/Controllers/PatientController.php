<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $patients = Patient::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $patients = Patient::orderBy("name", "desc")->get();
        }
        return view('patient', ['patients' => $patients]);
    }

    public function store(Request $request) {
        Patient::create($request->all());
        return redirect('/patient');
    }

    public function update(Request $request, $id) {
        Patient::where('cpf', $id)->update($request->except(['_method', '_token']));
        return redirect('/patient');
    }

    public function delete($id) {
        Patient::where('cpf', $id)->delete();

        return redirect('/patient');
    }
}
