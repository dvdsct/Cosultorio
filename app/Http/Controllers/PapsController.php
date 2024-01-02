<?php

namespace App\Http\Controllers;

use App\Models\Pap;
use Illuminate\Http\Request;

class PapsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Consultorio.Practicas.Paps.index');
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
        $consulta = Pap::find($id);
        $turno = $consulta->turnos;

        // dd($turno);
        $turno->update([
            'estado' => '2'
        ]);
        return view('Consultorio.Practicas.Paps.show', [
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
