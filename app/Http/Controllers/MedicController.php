<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medic;

class MedicController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $medics = Medic::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $medics = Medic::orderBy("name", "desc")->get();
        }
        return view('medic', ['medics' => $medics]);
    }

    public function store(Request $request) {
        Medic::create($request->all());
        return redirect('/medic');
    }

    public function update(Request $request, $id) {
        Medic::where('cpf', $id)->update($request->except(['_method', '_token']));
        return redirect('/medic');
    }

    public function delete($id) {
        Medic::where('cpf', $id)->delete();
        return redirect('/medic');
    }
}
