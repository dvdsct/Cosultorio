<?php

namespace App\Livewire;

use Livewire\Component;

class Pedidos extends Component
{
    public $consulta;
    public $tipo;
    public $paciente;
    public function mount($consulta)
    {
        $this->consulta = $consulta;
        $this->paciente = $consulta->paciente;
    }
        public function render()
    {
        return view('livewire.pedidos');
    }
}
