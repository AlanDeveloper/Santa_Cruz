<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacient;

class PacientController extends Controller
{
    public function index() {
        $pacients = Pacient::orderBy("name", "desc")->get();

        return view('pacient', ['pacients' => $pacients]);
    }
}
