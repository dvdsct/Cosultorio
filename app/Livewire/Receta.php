<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vademecum;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Receta extends Component
{
    use WithPagination;


    // public $vademecum;
    public $recetados = [];
    public $modal = false;

    // public function mount(){
    //             $this->vademecum = Vademecum::paginate(15);

    // }

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
        return view('livewire.receta', [
            'vademecum' => Vademecum::paginate(10),
            'recetados' => $this->recetados
        ]);
    }
}
