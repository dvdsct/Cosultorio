<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vademecum;
use Livewire\Attributes\On;

class Receta extends Component
{

    public $vademecum;
    public $recetados = [];
    public $modal = false;

    #[On('modalOn')]
    public function openModal()
    {
        // dd('aqui');

        $this->modal = true;
    }
    public function closeModal()
    {

        $this->modal = false;
    }

    public function recetar($id)
    {

        $remedio = Vademecum::find($id);
        // dd($remedio->droga);

        $this->recetados[] = $remedio->toArray();
        // dd($this->recetados[0]);
    }
    public function receta()
    {

        dd($this->recetados);
    }



    public function render()
    {
        $this->vademecum = Vademecum::all();
        return view('livewire.receta', [
            'recetados' => $this->recetados
        ]);
    }
}
