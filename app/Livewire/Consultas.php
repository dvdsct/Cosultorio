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
            $this->consultas = Consulta::where('paciente_id',$this->consulta->paciente_id)
            ->where('estado', '3')


            ->get();

        }else{

            $this->consultas = Consulta::where('motivo', '!=', '40')
            ->get();
        }

        return view('livewire.consultas');
    }
}
