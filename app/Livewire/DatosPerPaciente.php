<?php

namespace App\Livewire;

use App\Models\Correo;
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
    public $os;
    public $oso;
    public $nroAfil;
    public $plan;


    public $oss;

    public function mount()
    {
        $this->nombre = $this->consulta->perfiles->personas->nombre ?? '';
        $this->apellido = $this->consulta->perfiles->personas->apellido ?? '';
        $this->nacimiento = $this->consulta->perfiles->personas->fecha_de_nacimiento ?? '';
        $this->dni = $this->consulta->perfiles->personas->dni ?? '';
        $this->email =  $this->consulta->perfiles->personas->correos->where('estado', '2')->first()->direccion ?? '';
        /* filter(function ($correo) {
            return $correo->estado = '100'; */


        $this->telefono = $this->consulta->perfiles->personas->telefonos->first()->numero ?? '';


        $this->oss = ObraSocial::all();
        $this->plan = $this->consulta->perfiles->obrasociales->first()->pivot->plan ?? '';
        $this->nroAfil = $this->consulta->perfiles->obrasociales->first()->pivot->nro_afil ?? '';
    }

    public function guardarDatos($id)
    {

        $this->consulta->perfiles->personas->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_de_nacimiento' => $this->nacimiento ?? Carbon::now(),
            'dni' => $this->dni,
        ]);

        $this->email->update([
            'estado' => '1'
        ]);

        $this->email = Correo::create([
            'direccion' => $this->email
        ]);


        $xx  = ObraSocialXPerfil::find($id);
        $xx->update([
            'estado' => '2'
        ]);

        $this->oso = ObraSocialXPerfil::create([
            'perfil_id' => $this->consulta->perfiles->id,
            'obra_social_id' => $this->os,
            'plan' => $this->plan,
            'nro_afil' => $this->nroAfil,
            'estado' => '1'
        ]);
    }


    public function render()
    {
        $this->oso = ObraSocial::select('obra_socials.descripcion', 'obra_social_x_perfils.nro_afil', 'obra_social_x_perfils.id as os_id', 'obra_social_x_perfils.perfil_id')
            ->leftJoin('obra_social_x_perfils', 'obra_social_x_perfils.obra_social_id', '=', 'obra_socials.id')
            ->where('obra_social_x_perfils.estado', '1')
            ->where('obra_social_x_perfils.perfil_id', $this->consulta->perfiles->id)
            ->first();
        /*         $this->oss = ObraSocial::all(); */
        return view('livewire.datos-per-paciente');
    }
}
