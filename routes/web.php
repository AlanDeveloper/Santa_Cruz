<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\RecepcionistController;
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
    // Route::put('/{id}', [PatientController::class, 'update']);
    Route::delete('/{id}', [PatientController::class, 'delete']);
});

Route::group(['prefix' => 'medic'], function () {
    Route::get('/', [MedicController::class, 'index']);
    Route::post('/', [MedicController::class, 'store']);
    // Route::put('/{id}', [MedicController::class, 'update']);
    Route::delete('/{id}', [MedicController::class, 'delete']);
});

Route::group(['prefix' => 'medicament'], function () {
    Route::get('/', [MedicamentController::class, 'index']);
    Route::post('/', [MedicamentController::class, 'store']);
    // Route::put('/{id}', [MedicamentController::class, 'update']);
    Route::delete('/{id}', [MedicamentController::class, 'delete']);
});

Route::group(['prefix' => 'nurse'], function () {
    Route::get('/', [NurseController::class, 'index']);
    Route::post('/', [NurseController::class, 'store']);
    // Route::put('/{id}', [NurseController::class, 'update']);
    Route::delete('/{id}', [NurseController::class, 'delete']);
});


Route::group(['prefix' => 'recepcionist'], function () {
    Route::get('/', [RecepcionistController::class, 'index']);
    Route::post('/', [RecepcionistController::class, 'store']);
    // Route::put('/{id}', [RecepcionistController::class, 'update']);
    Route::delete('/{id}', [RecepcionistController::class, 'delete']);
});

Route::group(['prefix' => 'appointment'], function () {
    Route::get('/', [AppointmentController::class, 'index']);
    Route::post('/', [AppointmentController::class, 'store']);
    // Route::put('/{id}', [AppointmentController::class, 'update']);
    Route::delete('/{id}', [AppointmentController::class, 'delete']);
});

Route::group(['prefix' => 'withdrawal'], function () {
    Route::get('/', [WithdrawalController::class, 'index']);
    Route::post('/', [WithdrawalController::class, 'store']);
    // Route::put('/{id}', [WithdrawalController::class, 'update']);
    Route::delete('/{id}', [WithdrawalController::class, 'delete']);
});