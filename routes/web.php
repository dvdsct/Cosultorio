<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\PapsController;
use App\Http\Controllers\ColonscopiaController;
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

Route::resource('turnos', TurnosController::class);
Route::resource('consulta', ConsultasController::class);
Route::resource('paps', PapsController::class);
Route::resource('colpos', ColonscopiaController::class);


Route::get('/', function () {
    return redirect('turnos');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
     Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');




});
