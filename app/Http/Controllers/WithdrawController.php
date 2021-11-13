<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Medicament;


class WithdrawController extends Controller
{
    public function index() {

        $nurses = Nurse::select('cpf', 'name as nameNurse');
        $pacientes = Patient::select('cpf as cpfPac', 'name as namePac');
        $medicamentos = Medicament::select('id as idMed', 'name as nameMed', 'amount as amountMed');



        $withdraws = Withdraw::joinSub($medicamentos, 'medicamentos', function ($join) {

            $join->on('withdraw.idMedicament', '=', 'medicamentos.idMed');

        })->joinSub($nurses, 'nurses', function ($join) {

            $join->on('withdraw.cpfNurse', '=', 'nurses.cpf');

        })->joinSub($pacientes, 'pacientes', function ($join) {

            $join->on('withdraw.cpfPac', '=', 'pacientes.cpfPac');

        });

        $data['withdraws'] = $withdraws->orderBy("date", "desc")->get();
        $data['nurses'] = $nurses->get();
        $data['medicaments'] = $medicamentos->get();

        return view('withdraw', $data);
    }

    public function store(Request $request) {
        $med_id = $request->input('idMedicament');
        $quantidade = $request->input('amount');

        if(!is_numeric($quantidade)) return redirect('/withdraw')->withErrors(['amount' => 'Erro: Quantidade inválida.']);

        $medicamento = Medicament::where('id', $med_id)->first();
        $nova_quantidade = ($medicamento->amount - intval($quantidade));
        if ($nova_quantidade >= 0) {
            $med_request = [
                'amount' => $nova_quantidade
            ];

            $data = $request->input('data') . ' ' . $request->input('hora');
            Medicament::where('id', $med_id)->update($med_request);
            Withdraw::create($request->all() + ['date' => $data]);
            return redirect('/withdraw');
        } else {
            return redirect('/withdraw')->withErrors(["negativo" => "Erro: Quantidade indisponível."]);
        }
    }

    public function delete($id) {
        Withdraw::where('id', $id)->delete();
        return redirect('/withdraw');
    }
}
