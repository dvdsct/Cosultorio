<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pap;
use App\Models\TiposMuestra;

class FormPap extends Component
{

    public $tipo_muertra;
    public $tipos_muertras;



    public function render()
    {
        $this->tipos_muertras = TiposMuestra::all();

        return view('livewire.form-pap');
    }



}
