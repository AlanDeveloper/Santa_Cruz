<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Receptionist;
use App\Models\Patient;
use App\Models\Medic;
use App\Models\Nurse;
use App\Models\Exam;
use App\Models\TakeExam;
use App\Models\Performs;


class AppointmentController extends Controller
{
    public function index() {
        $recepcionistas = Receptionist::select('cpf','name as nameRec');
        $pacientes = Patient::select('cpf as cpfPac', 'name as namePac');
        $medicos = Medic::select('cpf as cpfMed', 'name as nameMed');
        $nurses = Nurse::select('cpf as cpfNurse', 'name as nameNurse');
        $exams = Exam::select('id as idExam', 'name as nameExam');
        
        $appointments = Appointment::joinSub($pacientes, 'pacientes', function ($join) {
            $join->on('appointment.cpfPac', '=', 'pacientes.cpfPac');
        })->joinSub($recepcionistas, 'recepcionistas', function ($join) {
            $join->on('appointment.cpfRec', '=', 'recepcionistas.cpf');
        });

        $data['appointments'] = $appointments->orderBy('appointment.date', 'DESC')->get();
        $data['receptionists'] = $recepcionistas->get();
        $data['patients'] = $pacientes->get();
        $data['medics'] = $medicos->get();
        $data['nurses'] = $nurses->get();
        $data['exams'] = $exams->get();

        return view('appointment', $data);
    }

    public function store(Request $request) {
        date_default_timezone_set('America/Sao_Paulo');
        Appointment::create($request->all() + ['date' => date("Y-m-d H:i:s")]);

        return redirect('/appointment');
    }

    public function storeExam(Request $request) {

        $date = [
            'date' => $request->input('data') . ' ' . $request->input('hora') . ":00"
        ];
        TakeExam::create($request->all() + $date);

        return redirect('/appointment');
    }


    public function storePerforms(Request $request) {
        $date = [
            'date' => $request->input('data') . ' ' . $request->input('hora') . ":00"
        ];

        Performs::create($request->all() + $date);

        return redirect('/appointment');
    }

    public function delete($id) {
        Appointment::where('id', $id)->delete();
        return redirect('/appointment');
    }
}
