<?php

namespace App\Livewire;

use App\Models\Perfil;
use Livewire\Component;

class PacienteReceta extends Component
{

    public $query = '';

    public function search()
    {
        // $this->resetPage();
    }
    public function render()
    {
        return view('livewire.paciente-receta',[

            'pacientes' =>  Perfil::select('perfils.*', 'personas.*', 'obra_social_x_perfils.perfil_id', 'obra_socials.descripcion', 'personas.dni')
            ->leftJoin('personas', 'perfils.persona_id', '=', 'personas.id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.perfil_id', '=', 'perfils.id')
            ->leftJoin('obra_socials', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->where('personas.dni', $this->query)
            ->get()
        ]);
    }
}
