<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medic;

class MedicController extends Controller
{
    public function index() {
        $medics = Medic::orderBy("name", "desc")->get();

        return view('medic', ['medics' => $medics]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpf')) === 14 && strlen($request->input('telephone')) === 14) {
            Medic::create($request->all());

            return redirect('/medic');
        } else {
            return redirect('/medic')->withErrors(["telephone" => "Campo inválido", "cpf" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Medic::where('cpf', $id)->delete();

        return redirect('/medic');
    }
}
