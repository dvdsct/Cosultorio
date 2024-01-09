<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Consultorio.Consulta.index');

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

        $consulta->update([
            'estado' => '2'
        ]);
        $turno = $consulta->turnos;
        $turno->update([
            'estado' => '2'
        ]);
        return view('Consultorio.Consulta.show',[
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
