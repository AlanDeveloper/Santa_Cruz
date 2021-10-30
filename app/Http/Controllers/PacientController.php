<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacientController extends Controller
{
    public function index() {
        $pacients = [];

        return view('pacient', ['pacients' => $pacients]);
    }
}
