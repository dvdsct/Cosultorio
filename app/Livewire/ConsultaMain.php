<?php

namespace App\Livewire;

use Livewire\Component;

class ConsultaMain extends Component
{

    public $step;
    public $consulta;
    public function mount($consulta)
    {
        $this->step = 1;
        $this->consulta = $consulta;
    }


    public function setStep($step){
        $this->step = $step;
    }

    public function render()
    {
        return view('livewire.consulta-main');
    }
}
