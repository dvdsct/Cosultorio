<?php

namespace App\Http\Controllers;

use App\Models\Colposcopia;
use App\Models\Consulta;
use App\Models\Pap;
use App\Models\Persona;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\Component;



use function PHPUnit\Framework\returnSelf;

class Paciente extends Component
{
    use WithPagination;

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pacientes = Persona::where('nombre', 'like', '%' . $this->query . '%')
            ->orWhere('apellido', 'like', '%' . $this->query . '%')
            ->with(['perfil', 'personas.telefonos', 'personas.correos'])
            ->paginate(10);

        return view('Consultorio.Pacientes.index.blade', [
            'pacientes' => $pacientes
        ]);
    }
}


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes =  Perfil::where('descripcion','paciente')->get();
        return view('Consultorio.Pacientes.index',[
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
    public function show(array $ids)
    {
        // $tipo = $ids[1];
        // $id= $ids[0];
        // dd($tipo);
        // if($tipo == 'consulta'){
        //     $todas = Consulta::where('perfil_id',$id)->get();
        // }
        // if($tipo == 'colpo'){
        //     $todas = Colposcopia::where('perfil_id',$id)->get();
        // }
        // if($tipo == 'pap'){
        //     $todas = Pap::where('perfil_id',$id)->get();
        // }

        // return view('Consultorio.Pacientes.show',[
        //     'todas' => $todas
        // ]);
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
    public function update(string $id, string $tipo)
    {
        if($tipo == 'consulta'){
            $todas = Consulta::where('perfil_id',$id)->get();
        }
        if($tipo == 'colpo'){
            $todas = Colposcopia::where('perfil_id',$id)->get();
        }
        if($tipo == 'pap'){
            $todas = Pap::where('perfil_id',$id)->get();
        }

        return view('Consultorio.Pacientes.show',[
            'todas' => $todas
        ]);
    }
    public function otro(string $id, string $tipo)
    {
        if($tipo == 'consulta'){
            $todas = Consulta::where('perfil_id',$id)->get();
        }
        if($tipo == 'colpo'){
            $todas = Colposcopia::where('perfil_id',$id)->get();
        }
        if($tipo == 'pap'){
            $todas = Pap::where('perfil_id',$id)->get();
        }

        return view('Consultorio.Pacientes.show',[
            'todas' => $todas
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
