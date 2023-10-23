<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Consulta;

class Consultas extends Component
{
    public $consulta;
    public $consultas;


    public function render()
    {
        if($this->consulta){
            $this->consultas = Consulta::where('perfil_id',$this->consulta->perfil_id)->get();

        }else{

            $this->consultas = Consulta::all();
        }

        return view('livewire.consultas');
    }
}
