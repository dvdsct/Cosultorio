<?php

namespace App\Livewire;

use App\Models\Abono;
use App\Models\AbonoXTurno;
use App\Models\Consulta;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ObraSocial;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Perfil;
use App\Models\ObraSocialXPerfil;
use App\Models\Pap;
use App\Models\Colposcopia;
use App\Models\Turno;
use Livewire\Attributes\On;


class Agenda extends Component
{
    public $turnos;
    public $fecha;
    public $perfil;
    public $dni;
    public $nombre;
    public $oss = [];
    public $modal;

    public $os;
    public $abono;
    public $apellido;
    public $persona = [];
    public $horario;
    public $motivo;





    public function mount()
    {
        $this->oss = ObraSocial::all();

        $this->fecha = Carbon::now()->format('Y-m-d');

        $this->turnos =Turno::whereDate('turnos.fecha_turno', '=', $this->fecha)
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


    public function delTurn()
    {

        dd($this->turnos);
        // Consulta::find($turno)->delete();
    }





    public function addTurno()
    {

        $validated = $this->validate([
            'fecha' => 'required|min:3',
            'horario' => 'required|min:3',
            'dni' => 'required|min:3',
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
        ]);



        if (count($this->persona) >= 1) {

            $this->perfil = $this->persona[0]->id;
            $turno = Turno::create([
                'perfil_id' => $this->perfil,
                'motivo' => $this->motivo,
                'fecha_turno' =>  $this->fecha . ' ' . $this->horario,
                'estado' => '1'


            ]);
        } else {
            $persona = new Persona;

            $persona->nombre = $this->nombre;
            $persona->apellido = $this->apellido;
            $persona->dni = $this->dni;
            $persona->tipo = 'fisica';
            $persona->estado = '1';
            $persona->save();

            $p = new Perfil;

            $p->persona_id = $persona->id;
            $p->descripcion = 'paciente';
            $p->estado = '1';
            $p->save();
            $this->perfil = $p->id;

            $osxp = new ObraSocialXPerfil;
            $osxp->perfil_id = $p->id;
            $osxp->obra_social_id = $this->os;
            $osxp->plan = 'defecto';
            $osxp->save();

            $turno = Turno::create([
                'perfil_id' => $p->id,
                'motivo' => $this->motivo,
                'fecha_turno' => $this->fecha . ' ' . $this->horario,
                'estado' => '1'

            ]);
        }


        // dd($this->perfil);
        if ($this->motivo == '1') {
            Pap::create(
                [
                    'perfil_id' => $this->perfil,
                    'turno_id' => $turno->id
                ]
            );
        }
        if ($this->motivo == '2') {

            Colposcopia::create(
                [
                    'perfil_id' => $this->perfil,
                    'turno_id' => $turno->id
                ]
            );
        }
        if ($this->motivo == '3') {
            Consulta::create(
                [
                    'perfil_id' => $this->perfil,
                    'turno_id' => $turno->id
                ]
            );
        }


        $abono = new Abono;
        $abono->monto = $this->abono;
        $abono->tipo = 'plus';
        $abono->estado = '1';
        $abono->save();

        $axc = new AbonoXTurno;
        $axc->turno_id = $turno->id;
        $axc->abono_id = $abono->id;
        $axc->save();




        $this->reset('dni', 'nombre', 'apellido', 'abono');
    }










    public function upPaciente()
    {
        if (strlen($this->dni) > 7) {


            $persona = DB::table('personas')
                ->select(
                    'personas.nombre as nombre',
                    'personas.apellido as apellido',
                    'personas.id',
                    'perfils.id as perfil_id',
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
        } else {
            $this->nombre = '';
            $this->apellido = '';
            $this->oss =  ObraSocial::all();
        }
    }









    // #[On('refresh-turn')]
    public function render()
    {



        $this->turnos = Turno::whereDate('turnos.fecha_turno', '=', $this->fecha)

            ->get();

        return view(
            'livewire.agenda',
            ['fecha' => $this->fecha]
        );
    }
}
