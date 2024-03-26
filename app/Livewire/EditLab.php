<?php

namespace App\Livewire;

use Livewire\Component;

class EditLab extends Component
{
    public $laboratorio;
    public $valor;
    public $dis;

    public function mount($laboratorio){

        $this->laboratorio = $laboratorio;

    }

    

    public function updateLab(){

        $this->laboratorio->update([
            'valor' => $this->valor
        ]);

        $this->dis = 'disabled';
    }
    public function render()
    {
        return view('livewire.edit-lab');
    }
}
