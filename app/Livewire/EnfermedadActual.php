<?php

namespace App\Livewire;

use Livewire\Component;

class EnfermedadActual extends Component
{
    public $ea = 'sajgdsag';
    public $obs;
    public $consulta;

    public function mount()
    {

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




    public function render()
    {
        return view('livewire.enfermedad-actual');
    }
}
