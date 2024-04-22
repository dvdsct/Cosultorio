<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\ObraSocialXPaciente;
use App\Models\ObraSocialXPerfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $consulta = Consulta::find($id);
        $consulta->update(
            ['estado' => '5']);

        if (!$consulta) {
            abort(404); // consulta no encontrada
        }

        $items = $consulta->recetas->chunk(2);

        $fecha = $consulta->turnos;
        $medico = $consulta->medicos;
        $paciente1 = $consulta->pacientes;

        $paciente = $consulta->pacientes->personas->nombre.'  '. $consulta->pacientes->personas->apellido .'  ' . $consulta->pacientes->personas->dni ;
        $os = ObraSocialXPaciente::select('obra_social_x_pacientes.*','obra_socials.descripcion')
        ->leftjoin('obra_socials','obra_social_x_pacientes.obra_social_id','=','obra_socials.id')
        ->where('paciente_id', $paciente1->first()->id)
        ->get();

        $osd =  $os->filter(function ($oxs) {
            return $oxs->estado == '1';
        });

        $pdf = Pdf::loadView('Consultorio.pdf.receta', [
            'items' => $items,
            // 'perfil' => $perfil,
            'os' => $os,
            'osd' => $osd,
            'paciente' => $paciente,
            'fecha' => $fecha,
            'medico' => $medico
        ]);

        return $pdf->stream('consulta_' . $consulta->id . '.pdf');
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
