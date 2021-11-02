<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;

class PacientController extends Controller
{
    public function index() {
        $pacients = Pacient::orderBy("name", "desc")->get();

        return view('pacient', ['pacients' => $pacients]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpf')) === 14 && strlen($request->input('telephone')) === 14) {
            Pacient::create($request->all());

            return redirect('/paciente');
        } else {
            return redirect('/paciente')->withErrors(["telephone" => "Campo inválido", "cpf" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Pacient::where('cpf', $id)->delete();

        return redirect('/paciente');
    }
}
