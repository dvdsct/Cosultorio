<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
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

            'pacientes' =>  Paciente::select('pacientes.*', 'perfils.id as perfil_paciente_id', 'personas.nombre', 'personas.apellido', 'personas.dni', 'obra_social_x_pacientes.paciente_id', 'obra_social_x_pacientes.obra_social_id', 'obra_social_x_pacientes.plan', 'obra_social_x_pacientes.nro_afil', 'obra_socials.descripcion')
            ->leftJoin('perfils', 'pacientes.perfil_id', '=', 'perfils.id')
            ->leftJoin('personas', 'perfils.persona_id', '=', 'personas.id')
            ->leftJoin('obra_social_x_pacientes', 'obra_social_x_pacientes.paciente_id', '=', 'pacientes.id')
            ->leftJoin('obra_socials', 'obra_social_x_pacientes.obra_social_id', '=', 'obra_socials.id')
            ->where('obra_social_x_pacientes.estado', '1')
            ->where('personas.dni', $this->query)
            ->get()
        ]);
    }
}
