<?php

namespace App\Livewire;

use App\Models\ObraSocial;
use Livewire\Component;

class DatosPerPaciente extends Component
{

    public $consulta;
    public $nombre;
    public $apellido;
    public $nacimiento;
    public $dni;
    public $email;
    public $os;
    public $nroAfil;
    public $plan;


    public $oss = [];

    public function mount()
    {
        $this->nombre = $this->consulta->perfiles->personas->nombre;
        $this->apellido =  $this->consulta->perfiles->personas->apellido;
        $this->nacimiento = $this->consulta->perfiles->personas->fecha_de_nacimiento;
        $this->dni = $this->consulta->perfiles->personas->dni;
        $this->email = $this->consulta->perfiles->personas->correos->first()->direccion ?? '';
        $this->os = $this->consulta->perfiles->obrasociales->first(); /*
        $this->oss = ObraSocial::all();
        $this->plan = $this->consulta->perfiles->obrasociales->first()->plan; */
    }

    public function guardarDatos()
    {
        $this->consulta->perfiles->personas->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_de_nacimiento' => $this->nacimiento,
            'dni' => $this->dni,
        ]);
    }
    

    public function render()
    {
        $this->oss = ObraSocial::all();
        return view('livewire.datos-per-paciente');
    }
}
