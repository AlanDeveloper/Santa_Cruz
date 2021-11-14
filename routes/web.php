<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ReceptionistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'patient'], function () {
    Route::get('/', [PatientController::class, 'index']);
    Route::post('/', [PatientController::class, 'store']);
    Route::put('/{id}', [PatientController::class, 'update']);
    Route::delete('/{id}', [PatientController::class, 'delete']);
});

Route::group(['prefix' => 'medic'], function () {
    Route::get('/', [MedicController::class, 'index']);
    Route::post('/', [MedicController::class, 'store']);
    Route::put('/{id}', [MedicController::class, 'update']);
    Route::delete('/{id}', [MedicController::class, 'delete']);
});

Route::group(['prefix' => 'medicament'], function () {
    Route::get('/', [MedicamentController::class, 'index']);
    Route::post('/', [MedicamentController::class, 'store']);
    Route::put('/{id}', [MedicamentController::class, 'update']);
    Route::delete('/{id}', [MedicamentController::class, 'delete']);
});

Route::group(['prefix' => 'nurse'], function () {
    Route::get('/', [NurseController::class, 'index']);
    Route::post('/', [NurseController::class, 'store']);
    Route::put('/{id}', [NurseController::class, 'update']);
    Route::delete('/{id}', [NurseController::class, 'delete']);
});


Route::group(['prefix' => 'receptionist'], function () {
    Route::get('/', [ReceptionistController::class, 'index']);
    Route::post('/', [ReceptionistController::class, 'store']);
    Route::put('/{id}', [ReceptionistController::class, 'update']);
    Route::delete('/{id}', [ReceptionistController::class, 'delete']);
});

Route::group(['prefix' => 'appointment'], function () {
    Route::get('/', [AppointmentController::class, 'index']);
    Route::post('/', [AppointmentController::class, 'store']);
    // Route::put('/{id}', [AppointmentController::class, 'update']);
    Route::delete('/{id}', [AppointmentController::class, 'delete']);
});

Route::group(['prefix' => 'withdraw'], function () {
    Route::get('/', [WithdrawController::class, 'index']);
    Route::post('/', [WithdrawController::class, 'store']);
    Route::put('/{id}', [WithdrawController::class, 'update']);
    Route::delete('/{id}', [WithdrawController::class, 'delete']);
});

Route::group(['prefix' => 'exam'], function () {
    Route::get('/', [ExamController::class, 'index']);
    Route::post('/', [ExamController::class, 'store']);
    Route::put('/{id}', [ExamController::class, 'update']);
    Route::delete('/{id}', [ExamController::class, 'delete']);
});