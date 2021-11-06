<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;


class AppointmentController extends Controller
{
    public function index() {
       /*  $appointments = Appointment::orderBy("id", "desc")->get(); */

        return view('appointment'/* , ['appointments' => $appointments] */);
    }

    public function store(Request $request) {
        /* if (strlen($request->input('cpfNurse')) === 14 && intval($request->input('amount')) >= 0) {
            Appointment::create($request->all());
            return redirect('/Appointment');
        } else {
            return redirect('/Appointment')->withErrors(["amount" => "Campo inválido", "cpfNurse" => "Campo inválido"]);
        } */
    }

    public function delete($id) {
       /*  Appointment::where('id', $id)->delete(); */

        return redirect('/appointment');
    }
}
