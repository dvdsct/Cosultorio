<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vademecum;

class Receta extends Component
{

    public $vademecum;
    public $remedio = array();

    public function render()
    {
        $this->vademecum = Vademecum::all();
        return view('livewire.receta');
    }
}
