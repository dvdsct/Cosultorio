<?php

namespace App\Livewire;

use App\Models\Correo;
use App\Models\CorreoXPersona;
use App\Models\ObraSocial;
use App\Models\ObraSocialXPaciente;
use App\Models\ObraSocialXPerfil;
use App\Models\Telefono;
use App\Models\TelefonoXPersona;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class DatosPerPaciente extends Component
{

    public $consulta;
    public $nombre;
    public $apellido;
    public $nacimiento;
    public $dni;
    public $email;
    public $telefono;
    public $nTelefono;

    // del Modal Completar datos paciente
    public $emails;
    public $emailEdit;
    public $fHoy;
    public $emailForm = false;
    public $modalDP = false;
    public $telefonos;
    public $telForm;


    public $oss;
    public $os;
    public $oso;
    public $plan;
    public $nroAfi;




    public function mount()
    {

        $this->oso = ObraSocialXPaciente::where('paciente_id', '=', $this->consulta->pacientes->id)
            ->where('estado', '1')
            ->first();

        $f = Carbon::now();
        $this->fHoy = $f->format('Y-m-d');
        // $this->setForm();
        $this->os = $this->oso;

        // $this->nacimiento = $this->fHoy;

    }

    #[On('modalDPOn')]
    public function modalDatoPac()
    {

        if ($this->modalDP) {
            
            // $this->setForm();
            $this->modalDP = false;
        } else {
            $this->setForm();

            $this->modalDP = true;
        }
    }

    public function addEmail()
    {
        $this->emailForm = true;
        $this->reset('emailEdit');
    }

    public function addTel()
    {
        $this->telForm = true;
        $this->reset('nTelefono');
    }

    public function guardarDatos()
    {
        $fechaNacimiento = Carbon::parse($this->nacimiento)->format('Y-m-d');

        $this->consulta->pacientes->perfiles->personas->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_de_nacimiento' => $fechaNacimiento,
            'dni' => $this->dni,
        ]);


        // __________________________________________________________________
        // __________________________________________________________________
        //                     Editar Email
        // __________________________________________________________________
        // __________________________________________________________________

        if ($this->emailForm == true) {

            if ($this->email != null) {

                $this->email->update([
                    'estado' => '1'
                ]);
            }

            $m = Correo::create([
                'direccion' => $this->emailEdit,
                'estado' => '2'
            ]);

            CorreoXPersona::create([
                'persona_id' => $this->consulta->pacientes->perfiles->personas->id,
                'correo_id' => $m->id,
                'estado' => '2'
            ]);
        } elseif ($this->emailEdit != null && $this->email != null && $this->emailForm == false) {
            $this->email->update([
                'estado' => '1'
            ]);

            $m = CorreoXPersona::find($this->emailEdit);
            $mm = Correo::find($m->correo_id);
            $mm->update([
                'estado' => '2'
            ]);
        }


        // __________________________________________________________________
        // __________________________________________________________________
        //                     Editar Obra Social
        // __________________________________________________________________
        // __________________________________________________________________


        // dd($this->os .'    '. $this->oso->obra_social_id);

        if ($this->os == $this->oso->obra_social_id) {
            $this->oso->update([
                'plan' => $this->plan,
                'nro_afil' => $this->nroAfi,
            ]);
        } else {
            $this->oso->update([

                'estado' => '2'
            ]);

            ObraSocialXPaciente::firstOrCreate([
                'paciente_id' => $this->consulta->pacientes->id,
                'obra_social_id' => $this->os,
                'plan' => $this->plan,
                'nro_afil' => $this->nroAfi,
                'estado' => '1'
            ]);
        }








        // __________________________________________________________________
        // __________________________________________________________________
        //                     Editar Telefono
        // __________________________________________________________________
        // __________________________________________________________________

        if ($this->nTelefono && $this->telForm == true) {

            if ($this->telefono != null) {
                $this->telefono->update([
                    'estado' => '1'
                ]);
            }
            $x = Telefono::create([
                'numero' => $this->nTelefono,
                'estado' => '2'
            ]);

            TelefonoXPersona::create([
                'persona_id' => $this->consulta->pacientes->perfiles->personas->id,
                'telefono_id' => $x->id
            ]);
        } elseif ($this->nTelefono != null && $this->telefono != null && $this->telForm == false) {

            $this->telefono->update([
                'estado' => '1'
            ]);

            $x = TelefonoXPersona::find($this->nTelefono);
            $xt = Telefono::find($x->telefono_id);
            $xt->update([
                'estado' => '2'
            ]);
        }



        // $this->setForm();

        $this->modalDatoPac();
    }

    public function setForm()
    {

        $this->nombre = $this->consulta->pacientes->perfiles->personas->nombre ?? '';
        $this->apellido = $this->consulta->pacientes->perfiles->personas->apellido ?? '';
        $this->nacimiento = $this->consulta->pacientes->perfiles->personas->fecha_de_nacimiento ?? $this->fHoy;
        $this->dni = $this->consulta->pacientes->perfiles->personas->dni ?? '';

        $this->emails = $this->consulta->pacientes->perfiles->personas->correos()->orderBy('estado', 'desc')->get();
        if ($this->emails->isEmpty()) {
            $this->emailForm = true;
        } else {

            $this->emailForm = false;
            $this->email = $this->emails->first();
        }

        $this->telefonos = $this->consulta->pacientes->perfiles->personas->telefonos()->orderBy('estado', 'desc')->get();
        if ($this->telefonos->isEmpty()) {
            $this->telForm = true;
        } else {

            $this->telForm = false;
            $this->telefono = $this->telefonos->first();
        }


        $this->oss = ObraSocial::all();



        $this->os = $this->oso->where('estado', '1')->first()->obra_social_id;
        $this->plan = $this->oso->plan ?? '';
        $this->nroAfi = $this->oso->nro_afil ?? '';
    }



    public function render()
    {
        $this->oss = ObraSocial::all();
        $this->oso = ObraSocialXPaciente::where('paciente_id', '=', $this->consulta->pacientes->id)
            ->where('estado', '1')
            ->first();

        $f = Carbon::now();
        $this->fHoy = $f->format('Y-m-d');
        // $this->os = $this->oso;

        return view('livewire.datos-per-paciente');
    }
}
