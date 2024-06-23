<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\PapsController;
use App\Http\Controllers\ColposcopiaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RecetaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return redirect('turnos');
});



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
     Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');


        Route::resource('turnos', TurnosController::class);
        Route::resource('consulta', ConsultasController::class);
        Route::resource('paps', PapsController::class);
        Route::resource('colpos', ColposcopiaController::class);
        Route::resource('receta', RecetaController::class);
        Route::resource('pacientes', PacienteController::class);
        Route::resource('pdf', PdfController::class);
        Route::get('/pdfTurno/{turno}', 'App\Http\Controllers\PdfController@showTurno')->name('pdfTurno');
        Route::get('/pdf-pap/{turno}', 'App\Http\Controllers\PdfController@showPap')->name('pdfPap');
        Route::get('/pdf-colpo/{turno}', 'App\Http\Controllers\PdfController@showColpo')->name('pdfColpo');
});
