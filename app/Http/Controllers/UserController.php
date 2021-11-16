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


class UserController extends Controller
{
    public function index() {
        return view('user');
    }

    public function profile(Request $request) {
            
        $data['patient'] = Patient::select('*')->where('cpf', $request->input('cpf'))->first();

        if($data['patient'] == null) return redirect('/user-area')->withErrors(["cpf" => 'CPF invalido']);

        $pacientes = Patient::select('cpf as cpfPac', 'name as namePac')->where('cpf', $request->input('cpf'));
        $recepcionistas = Receptionist::select('cpf','name as nameRec');
        $medicos = Medic::select('cpf as cpfMed', 'name as nameMed');
        $nurses = Nurse::select('cpf as cpfNurse', 'name as nameNurse');
        $exams = Exam::select('id as idExam', 'name as nameExam');
        $takeExams = TakeExam::select('*', 'date as dateExam');
        $performs= Performs::select('*', 'date as datePerforms');
        
        $appointments = Appointment::joinSub($pacientes, 'pacientes', function ($join) {
            $join->on('appointment.cpfPac', '=', 'pacientes.cpfPac');
        })->joinSub($recepcionistas, 'recepcionistas', function ($join) {
            $join->on('cpfRec', '=', 'recepcionistas.cpf');
        });

        $data['appointments'] = $appointments->joinSub($performs, 'performs', function ($join) {
            $join->on('appointment.id', '=', 'performs.idAppointment');
        })->joinSub($medicos, 'medicos', function ($join) {
            $join->on('performs.cpfMed', '=', 'medicos.cpfMed');
        })->orderBy('datePerforms')->get();

        $data['takeExams'] = $appointments->joinSub($takeExams, 'takeExam', function ($join) {
            $join->on('appointment.id', '=', 'takeExam.idAppointment');
        })->joinSub($nurses, 'nurses', function ($join) {
            $join->on('takeExam.cpfNurse', '=', 'nurses.cpfNurse');
        })->joinSub($exams, 'exams', function ($join) {
            $join->on('takeExam.idExam', '=', 'exams.idExam');
        })->orderBy('takeExam.dateExam')->get();

        

        return view('profile', $data);
    }

    
}
