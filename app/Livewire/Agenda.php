<?php

namespace App\Livewire;

use App\Models\Abono;
use App\Models\AbonoXConsulta;
use App\Models\Consulta;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ObraSocial;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Perfil;
use App\Models\ObraSocialXPerfil;

use Livewire\Attributes\On;




class Agenda extends Component
{
    public $turnos;
    public $fecha;
    public $perfil;
    public $dni;
    public $nombre;
    public $oss = [];






    public $os;
    public $abono;
    public $apellido;
    public $persona;
    public $hora;





    public function mount()
    {
        $this->oss = ObraSocial::all();

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

            $abono = new Abono;
            $abono->monto = $this->abono;
            $abono->tipo = 'plus';
            $abono->estado = '1';
            $abono->save();



            $turno = new Consulta;
            $turno->perfil_id = $perfil->id;
            $turno->estado = '2';
            $turno->fecha_consulta = $this->fecha . ' ' . $this->horario;
            $turno->save();

            $axc = new AbonoXConsulta;
            $axc->consulta_id = $turno->id;
            $axc->abono_id = $abono->id;
            $axc->save();



            $this->reset('dni',);


            $this->dispatch('added');
        }
    }







    public function upPaciente()
    {
        if (strlen($this->dni) > 7) {

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
                // $this->dni = $persona[0]->dni;
                $this->oss = $persona;
            } else {
                $this->nombre = '';
                $this->apellido = '';
                $this->oss =  ObraSocial::all();
            }
        } else {
            $this->nombre = '';
            $this->apellido = '';
            $this->oss =  ObraSocial::all();
        }
    }









    #[On('added')]
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
            'livewire.agenda',
            ['fecha' => $this->fecha]
        );
    }
}
