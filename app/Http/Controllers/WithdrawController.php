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
        $data['patients'] = $pacientes->get();

        return view('withdraw', $data);
    }

    public function store(Request $request) {
        $med_id = $request->input('idMedicament');
        $quantidade = $request->input('amount');

        $medicamento = Medicament::where('id', $med_id)->first();
        $nova_quantidade = ($medicamento->amount - intval($quantidade));
        if ($nova_quantidade >= 0) {
            Medicament::where('id', $med_id)->update(['amount' => $nova_quantidade]);
            Withdraw::create($request->all() + ['date' => date("Y-m-d H:i:s")]);
            return redirect('/withdraw');
        } else {
            return redirect('/withdraw')->withErrors(["negativo" => "Erro: Quantidade indisponível."]);
        }
    }

    public function update(Request $request, $id) {
        $withdraw = Withdraw::where([
            ['cpfNurse', explode('x', $id)[0]],
            ['cpfPac', explode('x', $id)[1]],
            ['idMedicament', explode('x', $id)[2]],
            ['date', explode('x', $id)[3]]
        ])->first();
        $medicament = Medicament::where('id', explode('x', $id)[2])->first();
        if ($withdraw->amount > $request->input('amount')) {
            Medicament::where('id', explode('x', $id)[2])->update(['amount' => $medicament->amount + ($withdraw->amount - $request->input('amount'))]);
        } else {
            Medicament::where('id', explode('x', $id)[2])->update(['amount' =>  $medicament->amount - ($request->input('amount') - $withdraw->amount)]);
        }

        Withdraw::where([
            ['cpfNurse', explode('x', $id)[0]],
            ['cpfPac', explode('x', $id)[1]],
            ['idMedicament', explode('x', $id)[2]],
            ['date', explode('x', $id)[3]]
        ])->update($request->except(['_method', '_token']));
        return redirect('/withdraw');
    }

    public function delete($id) {
        Withdraw::where([
            ['cpfNurse', explode('x', $id)[0]],
            ['cpfPac', explode('x', $id)[1]],
            ['idMedicament', explode('x', $id)[2]],
            ['date', explode('x', $id)[3]]
        ])->delete();
        return redirect('/withdraw');
    }
}
