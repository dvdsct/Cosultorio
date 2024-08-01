<?php

namespace App\Livewire;

use App\Models\Imagen;
use App\Models\Laboratorio;
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

    public function deletedItem($id,$tipo){

        if($tipo == 'lab'){
            $item = Laboratorio::find($id);
            $item->delete();
        }
        if($tipo == 'img'){
            $item = Imagen::find($id);
            $item->delete();

        }
  
        $this->dispatch('added');
    }


    #[On('added')]
    public function freshPedidos(){
        $this->imagenes = $this->consulta->imagenes;
    }
        public function render()
    {
        return view('livewire.pedidos');
    }
}
