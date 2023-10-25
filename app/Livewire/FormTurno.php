<?php

namespace App\Livewire;

use App\Models\Persona;
use App\Models\Perfil;
use App\Models\Consulta;
use App\Models\ObraSocial;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Models\ObraSocialXPerfil;



class FormTurno extends Component
{

    public $dni;
    public $nombre;
    public $oss = [];

    public $os;
    public $abono;
    public $apellido;
    public $persona;
    public $hora;
    public $fecha;


    public function mount($fecha)
    {
        $this->oss = ObraSocial::all();
        $this->fecha = $fecha;
    }



    public function addTurno()
    {



        if (count($this->persona) >= 1) {
            dd('a1');
            $this->nombre = $this->persona[0]->nombre;
            $this->apellido = $this->persona[0]->apellido;
            $this->oss = $this->persona;

            $turno = new Consulta;
            dd('a');
            $turno->save();
        } else {
            // dd('b1');

            $persona = new Persona;

            $persona->nombre = $this->nombre;
            $persona->apellido = $this->apellido;
            $persona->dni = $this->dni;
            $persona->tipo = 'fisica';
            $persona->estado = '1';
            $persona->save();

            $perfil = new Perfil;

            $perfil->persona_id = $persona->id;
            $perfil->descripcion = 'paciente';
            $perfil->estado = '1';
            $perfil->save();

            $osxp = new ObraSocialXPerfil;
            $osxp->perfil_id = $perfil->id;
            $osxp->obra_social_id = $this->os;
            $osxp->save();







            $turno = new Consulta;
            $turno->perfil_id = $perfil->id;
            $turno->estado = '2';
            $turno->fecha_consulta = $this->fecha .' '. $this->horario;


            $turno->save();

            $this->dispatch('added');
        }
    }


    public function upPaciente()
    {
        if (strlen($this->dni) > 1 ) {


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
            $this->persona = $persona;

            if (count($persona) >= 1) {
                $this->nombre = $persona[0]->nombre;
                $this->apellido = $persona[0]->apellido;
                $this->oss = $persona;
            } else {
                $this->nombre = '';
                $this->apellido = '';
                $this->oss =  ObraSocial::all();

            }
        }
    }






    public function render()
    {



        return view('livewire.form-turno');
    }
}
