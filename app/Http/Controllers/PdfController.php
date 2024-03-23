<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
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

        $items = $consulta->recetas;
        // dd($items);
        $fecha = $consulta->turnos;
        // $encargado = $consulta->clientes->perfiles->personas;
        $medico = Auth::user()->name;

        $pdf = Pdf::loadView('Consultorio.pdf.receta', [
            'items' => $items,
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
