<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;

class NurseController extends Controller
{
    public function index(Request $request) {
        if ($request->input("search")) {
            $nurses = Nurse::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc")->get();
        } else {
            $nurses = Nurse::orderBy("name", "desc")->get();
        }
        return view('nurse', ['nurses' => $nurses]);
    }

    public function store(Request $request) {
        Nurse::create($request->all());
        return redirect('/nurse');
    }

    public function delete($id) {
        Nurse::where('cpf', $id)->delete();

        return redirect('/nurse');
    }
}
