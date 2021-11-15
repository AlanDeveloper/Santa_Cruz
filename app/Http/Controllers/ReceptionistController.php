<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receptionist;


class ReceptionistController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $receptionists = Receptionist::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $receptionists = Receptionist::orderBy("name", "desc")->get();
        }
        return view('receptionist', ['receptionists' => $receptionists]);
    }

    public function store(Request $request) {
        Receptionist::create($request->all());
        return redirect('/receptionist');
    }

    public function update(Request $request, $id) {
        Receptionist::where('cpf', $id)->update($request->except(['_method', '_token']));
        return redirect('/receptionist');
    }

    public function delete($id) {
        Receptionist::where('cpf', $id)->delete();

        return redirect('/receptionist');
    }
}
