<?php

namespace App\Http\Controllers;

use App\Models\Colposcopia;
use Illuminate\Http\Request;

class ColposcopiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colpos = Colposcopia::all();
        return view ('Consultorio.Practicas.Colposcopia.index',[
        'colpos' => $colpos
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
        $consulta = Colposcopia::find($id);
        $turno = $consulta->turnos;

        $turno->update([
            'estado' => '2'
        ]);
        return view('Consultorio.Practicas.Colposcopia.show', [
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
