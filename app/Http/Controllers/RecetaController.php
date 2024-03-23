<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use App\Models\Perfil;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $paciente = Perfil::find($id);
        $turno = Turno::create([

            'perfil_id' => $paciente->id,
            'motivo' => '40',
            'estado' => '3',
            'fecha_turno' => Carbon::now(),

        ]);

        $consulta = Consulta::create([
            'perfil_id' => $paciente->id,
            'turno_id' => $turno->id,

        ]);
        return view('Consultorio.Recetas.show',[
            'consulta' => $consulta
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
