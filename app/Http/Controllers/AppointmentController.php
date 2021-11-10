<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Medic;
use App\Models\Receptionist;
use App\Models\Patient;
use App\Models\Performs;

class AppointmentController extends Controller
{
    public function index() {
        $recepcionistas = Receptionist::select('cpf','name as nameRec');

        $medicos = Medic::select('cpf as cpfMed', 'name as nameMed');
        $pacientes = Patient::select('cpf as cpfPac', 'name as namePac');
        
        $performs = Performs::joinSub($medicos, 'medicos', function ($join) {
            $join->on('medicos.cpfMed', '=', 'performs.cpfMed');
        });

        $appointments = Appointment::joinSub($pacientes, 'pacientes', function ($join) {
            $join->on('appointment.cpfPac', '=', 'pacientes.cpfPac');
        })->joinSub($performs, 'performs', function ($join) {
            $join->on('appointment.id', '=', 'performs.idAppointment');
        });

        $data['appointments'] = $appointments->orderBy('appointment.date', 'DESC')->get();

        $data['recepcionistas'] = $recepcionistas->get();
        $data['medicos'] = $medicos->get();

        return view('appointment', $data);
    }

    public function store(Request $request) {
        
        $appointment_request = [
            'cpfRec' => $request->input('cpfRec'),
            'cpfPac' => $request->input('cpfPac'),
            'date' => Carbon::now()
        ];

        $idAppointment = Appointment::create($appointment_request);
        echo $idAppointment->id;

        $performs_request = [
            'idAppointment' => $idAppointment->id,
            'cpfMed' => $request->input('cpfMed'),
            'date' => $request->input('data') . ' ' . $request->input('hora')
        ];

        Performs::create($performs_request);

        return redirect('/appointment');
    }

    public function delete($id) {
        Performs::where('idAppointment', $id)->delete();
        Appointment::where('id', $id)->delete();
        return redirect('/appointment');
    }
}
