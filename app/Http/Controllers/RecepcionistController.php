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
        Recepcionist::create($request->all());
        return redirect('/recepcionist');
    }

    public function delete($id) {
        Recepcionist::where('id', $id)->delete();

        return redirect('/recepcionist');
    }
}
