<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recepcionist;


class RecepcionistController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $recepcionists = Recepcionist::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $recepcionists = Recepcionist::orderBy("name", "desc")->get();
        }
        return view('recepcionist', ['recepcionists' => $recepcionists]);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpfNurse')) === 14 && intval($request->input('amount')) >= 0) {
            Recepcionist::create($request->all());
            return redirect('/recepcionist');
        } else {
            return redirect('/recepcionist')->withErrors(["amount" => "Campo inválido", "cpfNurse" => "Campo inválido"]);
        }
    }

    public function delete($id) {
        Recepcionist::where('id', $id)->delete();

        return redirect('/recepcionist');
    }
}
