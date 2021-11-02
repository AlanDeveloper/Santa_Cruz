<?php

use App\Http\Controllers\PacientController;
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

Route::group(['prefix' => 'paciente'], function () {
    Route::get('/', [PacientController::class, 'index']);
    Route::post('/', [PacientController::class, 'store']);
    // Route::put('/{id}', [PacientController::class, 'update']);
    Route::delete('/{id}', [PacientController::class, 'delete']);
});