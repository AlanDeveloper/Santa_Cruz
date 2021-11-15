<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Receptionist;
use App\Models\Patient;

class AppointmentController extends Controller
{
    public function index() {
        $recepcionistas = Receptionist::select('cpf','name as nameRec');
        $pacientes = Patient::select('cpf as cpfPac', 'name as namePac');
        
        $appointments = Appointment::joinSub($pacientes, 'pacientes', function ($join) {
            $join->on('appointment.cpfPac', '=', 'pacientes.cpfPac');
        })->joinSub($recepcionistas, 'recepcionistas', function ($join) {
            $join->on('appointment.cpfRec', '=', 'recepcionistas.cpf');
        });

        $data['appointments'] = $appointments->orderBy('appointment.date', 'DESC')->get();
        $data['receptionists'] = $recepcionistas->get();
        $data['patients'] = $pacientes->get();

        return view('appointment', $data);
    }

    public function store(Request $request) {
        date_default_timezone_set('America/Sao_Paulo');
        Appointment::create($request->all() + ['date' => date("Y-m-d H:i:s")]);

        return redirect('/appointment');
    }

    public function delete($id) {
        Appointment::where('id', $id)->delete();
        return redirect('/appointment');
    }
}
