<?php

namespace App\Livewire;

use App\Models\Persona;
use Livewire\Component;
use Illuminate\Support\Facades\DB;



class FormTurno extends Component
{

    public $dni;
    public $nombre;
    public $oss = [];
    public $os;
    public $abono;
    public $apellido;
    public $per;

    // public $search;
    // protected $queryString = ['search'];



    public function upPaciente()
    {
        if (strlen($this->dni) >1) {


        $persona = DB::table('personas')
            ->select(
                'personas.nombre as nombre',
                'personas.apellido as apellido',
                'personas.id',
                'perfils.persona_id',
                'obra_social_x_perfils.obra_social_id',
                'obra_socials.descripcion as descripcion',
                'personas.dni as dni'
            )
            ->leftJoin('perfils', 'perfils.persona_id', '=', 'personas.id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.perfil_id', '=', 'perfils.id')
            ->leftJoin('obra_socials', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->where('personas.dni', 'like', $this->dni . '%')
            ->get();

            if ($persona) {
                $this->nombre = $persona[0]->nombre;
                $this->apellido = $persona[0]->apellido;
                $this->oss = $persona;
                $this->per = $persona;
            }

        }else{
            // $persona = [];
            $this->nombre = '';
            $this->apellido = '';
            $this->oss = [];
            // $this->per = '';
            // dd(count($persona));
            }

    }
    public function render()
    {




        return view('livewire.form-turno');
    }
}
