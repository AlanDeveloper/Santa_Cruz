<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;


class WithdrawController extends Controller
{
    public function index() {
        /* $withdraws = Withdraw::orderBy("id", "desc")->get(); */

        return view('withdraw', ['withdraws' => $withdraws]);
    }

    public function store(Request $request) {
        /* if (strlen($request->input('cpfNurse')) === 14 && intval($request->input('amount')) >= 0) {
            Withdrawal::create($request->all());
            return redirect('/withdrawal');
        } else {
            return redirect('/Withdrawal')->withErrors(["amount" => "Campo inválido", "cpfNurse" => "Campo inválido"]);
        } */
    }

    public function delete($id) {
       /*  Withdraw::where('id', $id)->delete(); */

        return redirect('/withdraw');
    }
}
