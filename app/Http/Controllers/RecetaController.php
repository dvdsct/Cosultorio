<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Perfil;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Paciente;

class RecetaController extends Controller
{

    public function index()
    {

        return view('Consultorio.Recetas.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        $paciente = Paciente::find($id);

        $turno = Turno::firstOrCreate([
            'paciente_id' => $paciente->id,
            'estado' => '1',
        ]);

        $turno->update([
            'motivo' => '40',
            'fecha_turno' => Carbon::now(),
        ]);


        $consulta = Consulta::firstOrCreate([
            'paciente_id' => $paciente->id,
            'turno_id' => $turno->id,
            'estado' => '2'

        ]);



        return view('Consultorio.Recetas.show', [
            'consulta' => $consulta,
            'paciente' => $paciente
        ]);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
