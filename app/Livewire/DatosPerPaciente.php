<?php

namespace App\Livewire;

use App\Models\Correo;
use App\Models\CorreoXPersona;
use App\Models\ObraSocial;
use App\Models\ObraSocialXPerfil;
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
    public $nroAfil;
    public $plan;
    public $oso;

    // del Modal Completar datos paciente
    public $emails;
    public $emailEdit;
    public $os;
    public $fHoy;
    public $emailForm = false;
    public $modalDP = false;

    public $oss;

    public function mount()
    {
        $f = Carbon::now();
        $this->fHoy = $f->format('Y-m-d');
        $this->setForm();
        // $this->nacimiento = $this->fHoy;

    }

    #[On('modalDPOn')]
    public function modalDatoPac()
    {

        if ($this->modalDP == true) {

            $this->modalDP = false;
        } else {

            $this->modalDP = true;
        }
    }

    public function addEmail()
    {
        $this->emailForm = true;
        $this->reset('emailEdit');
    }

    public function guardarDatos($id)
    {
        $fechaNacimiento = Carbon::parse($this->nacimiento)->format('Y-m-d');

        $this->consulta->perfiles->personas->update([
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
                'persona_id' => $this->consulta->perfiles->personas->id,
                'correo_id' => $m->id,
                'estado' => '2'
            ]);
        } elseif($this->emailEdit != null && $this->email != null && $this->emailForm == false) {
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

        if ($this->os) {
            $this->oso  = ObraSocialXPerfil::find($id);
            $this->oso->update([
                'estado' => '2'
            ]);

            ObraSocialXPerfil::create([
                'perfil_id' => $this->consulta->perfiles->id,
                'obra_social_id' => $this->os,
                'plan' => $this->plan,
                'nro_afil' => $this->nroAfil,
                'estado' => '1'
            ]);
        }





        // __________________________________________________________________
        // __________________________________________________________________
        //                     Editar Telefono
        // __________________________________________________________________
        // __________________________________________________________________



        $this->setForm();

        $this->modalDatoPac();
    }

    public function setForm()
    {

        $this->nombre = $this->consulta->perfiles->personas->nombre ?? '';
        $this->apellido = $this->consulta->perfiles->personas->apellido ?? '';
        $this->nacimiento = $this->consulta->perfiles->personas->fecha_de_nacimiento ?? $this->fHoy;
        $this->dni = $this->consulta->perfiles->personas->dni ?? '';

        $this->emails = $this->consulta->perfiles->personas->correos()->orderBy('estado', 'desc')->get();
        if ($this->emails->isEmpty()) {
            $this->emailForm = true;
        } else {

            $this->emailForm = false;
            $this->email = $this->emails->first();
        }
        $this->telefono = $this->consulta->perfiles->personas->telefonos->first()->numero ?? '';


        $this->oss = ObraSocial::all();

        $this->plan = $this->consulta->perfiles->obrasociales->first()->pivot->plan ?? '';
        $this->nroAfil = $this->consulta->perfiles->obrasociales->first()->pivot->nro_afil ?? '';
    }



    public function render()
    {
        $this->oso = ObraSocial::select('obra_socials.descripcion', 'obra_social_x_perfils.nro_afil', 'obra_social_x_perfils.id as os_id', 'obra_social_x_perfils.perfil_id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->where('obra_social_x_perfils.estado', '1')
            ->where('obra_social_x_perfils.perfil_id', $this->consulta->perfiles->id)
            ->first();
        // $this->os = $this->oso->id;


        return view('livewire.datos-per-paciente');
    }
}
