<?php

namespace App\Livewire;

use App\Models\Consulta;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Perfil;
use App\Models\Persona;

class Agenda extends Component
{
    public $turnos;
    public $fecha;

    public $perfil;






    public function mount()
    {


        $this->fecha = Carbon::now()->format('Y-m-d');
        $this->turnos = Consulta::select('consultas.fecha_consulta', 'perfils.persona_id', 'personas.nombre', 'personas.apellido', 'personas.dni', 'obra_social_x_perfils.plan', 'obra_social_x_perfils.nro_afil', 'obra_socials.descripcion')
            ->leftJoin('perfils', 'consultas.perfil_id', '=', 'perfils.id')
            ->leftJoin('personas', 'perfils.persona_id', '=', 'personas.id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.perfil_id', '=', 'perfils.id')
            ->leftJoin('obra_socials', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->whereDate('consultas.fecha_consulta', '=', $this->fecha)
            ->get();
    }



    public function change_day($day)
    {


        if ($day == 'yes') {
            $this->fecha = Carbon::parse($this->fecha)->subDay()->format('Y-m-d');
        }
        if ($day == 'tmw') {
            $this->fecha = Carbon::parse($this->fecha)->addDay()->format('Y-m-d');
        }
    }


    public function add_turno()
    {

        Consulta::create([

            'perfil_id' => $this->perfil,
            'fecha_consulta' => $this->fecha,
            'estado' => '2'
        ]);
    }


    public function render()
    {


        $this->turnos = Consulta::select('consultas.fecha_consulta', 'perfils.persona_id', 'personas.nombre', 'personas.apellido', 'personas.dni', 'obra_social_x_perfils.plan', 'obra_social_x_perfils.nro_afil', 'obra_socials.descripcion')
            ->leftJoin('perfils', 'consultas.perfil_id', '=', 'perfils.id')
            ->leftJoin('personas', 'perfils.persona_id', '=', 'personas.id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.perfil_id', '=', 'perfils.id')
            ->leftJoin('obra_socials', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->whereDate('consultas.fecha_consulta', '=', $this->fecha)
            ->get();


        return view(
            'livewire.agenda'
        );
    }
}
