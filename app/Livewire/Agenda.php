<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Agenda extends Component
{
    public $turnos;
    
    public function render()
    {
        $this->turnos = DB::table('consultas')
        ->select('consultas.estado', 'perfils.id', 'personas.*', 'obra_social_x_perfils.*', 'obra_socials.descripcion', 'consultas.fecha_consulta')
        ->leftJoin('perfils', 'consultas.perfil_id', '=', 'perfils.id')
        ->leftJoin('personas', 'perfils.persona_id', '=', 'personas.id')
        ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.perfil_id', '=', 'perfils.id')
        ->leftJoin('obra_socials', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
        ->where('consultas.estado', '=', '2')
        ->get();
    
        return view('livewire.agenda');
    }
}
