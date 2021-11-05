<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::orderBy("name", "desc")->get();

        return view('patient', ['patients' => $patients]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpf')) === 14 && strlen($request->input('telephone')) === 14) {
            Patient::create($request->all());

            return redirect('/patient');
        } else {
            return redirect('/patient')->withErrors(["telephone" => "Campo inválido", "cpf" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Patient::where('cpf', $id)->delete();

        return redirect('/patient');
    }
}
