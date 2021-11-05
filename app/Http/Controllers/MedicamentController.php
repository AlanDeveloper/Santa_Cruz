<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;


class MedicamentController extends Controller
{
    public function index() {
        $medicaments = Medicament::orderBy("medicament.name", "desc")->get();
        /* ->join('nurse', 'medicament.cpfNurse', '=', 'nurse.cpf')
        ->get(); */

        return view('medicament', ['medicaments' => $medicaments]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpfNurse')) === 14 && intval($request->input('amount')) >= 0) {
            Medicament::create($request->all());
            return redirect('/medicament');
        } else {
            return redirect('/medicament')->withErrors(["amount" => "Campo inválido", "cpfNurse" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Medicament::where('id', $id)->delete();

        return redirect('/medicament');
    }
}
