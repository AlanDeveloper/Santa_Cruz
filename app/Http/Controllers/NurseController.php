<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;

class NurseController extends Controller
{
    public function index() {
        $nurses = Nurse::orderBy("name", "desc")->get();

        return view('nurse', ['nurses' => $nurses]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpf')) === 14 && strlen($request->input('telephone')) === 14) {
            Nurse::create($request->all());

            return redirect('/nurse');
        } else {
            return redirect('/nurse')->withErrors(["amount" => "Campo inválido", "cpf" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Nurse::where('cpf', $id)->delete();

        return redirect('/nurse');
    }
}
