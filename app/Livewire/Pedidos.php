<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Pedidos extends Component
{
    public $consulta;
    public $tipo;
    public $imagenes;
    public $paciente;
    public function mount($consulta)
    {
        $this->consulta = $consulta;
        $this->paciente = $consulta->paciente;
    }

    #[On("added-img")]
    public function added(){
        $this->imagenes = $this->consulta->imagenes;
    }
        public function render()
    {
        return view('livewire.pedidos');
    }
}
