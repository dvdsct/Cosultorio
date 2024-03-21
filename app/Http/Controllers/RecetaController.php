<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Perfil;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $pacientes = Perfil::where('descripcion','paciente  ')->get();
        return view('Consultorio.Recetas.index',[
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
