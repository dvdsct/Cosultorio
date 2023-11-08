<?php

namespace App\Livewire;

use App\Models\Laboratorio;
use Livewire\Component;
use Livewire\Attributes\On;
class EnfermedadActual extends Component
{
    public $ea = 'sajgdsag';
    public $obs;
    public $consulta;
    public $laboratorios;

    public function mount($consulta)
    {

        $this->consulta = $consulta;
        $this->ea = $this->consulta->ea;
        $this->obs = $this->consulta->observaciones;
    }

    public function setEa()
    {


        $this->consulta->update(
            [
                'observaciones' =>  $this->obs,
                'ea' =>  $this->ea
            ]
        );
    }




    #[On('added')]
    public function render()
    {   $this->laboratorios = Laboratorio::where('estado','2')->get();

        return view('livewire.enfermedad-actual',[
            'consulta' => $this->consulta
        ]);
    }
}
