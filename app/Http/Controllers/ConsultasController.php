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
        $consultas = Consulta::all();
        return view('Consultorio.Consulta.index', [
            'consultas' => $consultas
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
        if(Consulta::find($id)){


        $consulta = Consulta::find($id);


        if ($consulta->estado == '1') {
            $consulta->update([
                'estado' => '2'
            ]);
        }
/*             $turno = $consulta->turnos;
            $turno->update([
                'estado' => '2'
            ]);
        } */



        $turno = $consulta->turnos;

        if ($turno) {
            $turno->update(['estado' => '2']);
        }



        return view('Consultorio.Consulta.show', [
            'consulta' => $consulta
        ]);   }else{
            return redirect('turnos');
        }
    }


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
