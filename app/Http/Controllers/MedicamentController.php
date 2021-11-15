<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;
use App\Models\Nurse;

class MedicamentController extends Controller
{
    public function index(Request $request) {
        $nurses = Nurse::select('cpf', 'name as nameNurse');

        if ($request->input("search")) {
            $medicament = Medicament::where("name", "ILIKE", "%" . $request->input("search") . "%")->orderBy("name", "desc");
        } else {
            $medicament = Medicament::orderBy("name", "desc");
        }

        $data['medicaments'] = $medicament->joinSub($nurses, 'nurses', function ($join) {
            $join->on('medicament.cpfNurse', '=', 'nurses.cpf');
        })->get();

        $data['nurses'] = Nurse::select('cpf','name')->get();
        
        return view('medicament', $data);
    }

    public function store(Request $request) {
        if (strlen($request->input('cpfNurse')) === 14 && intval($request->input('amount')) >= 0) {
            Medicament::create($request->all());
            return redirect('/medicament');
        } else {
            return redirect('/medicament')->withErrors(["amount" => "Campo inválido", "cpfNurse" => "Campo inválido"]);
        }
    }

    public function update(Request $request, $id) {
        Medicament::where('id', $id)->update($request->except(['_method', '_token']));
        return redirect('/medicament');
    }

    public function delete($id) {
        Medicament::where('id', $id)->delete();

        return redirect('/medicament');
    }
}
