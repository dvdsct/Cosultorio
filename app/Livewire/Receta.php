<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vademecum;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Receta extends Component
{
    use WithPagination;


    #[Locked]
    public $recetados = [];


    #[Locked]
    public $modal = false;

    public $cantidad;
    public $horas;
    public $indicacion;



    public $query = '';

    public function search()
    {
        $this->resetPage();
    }



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

    public function indicacionar($id){
        $remedio = Vademecum::find($id);
        $this->indicacion = [
            'medicamento' => $remedio,
            'cantidad' => $this->cantidad,
            'horas' => $this->horas,
            'estado' => '0'
        ];

    }

    public function recetar()
    {




        $this->recetados[] = $this->indicacion;
        $this->reset('indicacion');
        // dd($this->recetados);
    }
    public function receta()
    {

        dd($this->recetados);
    }



    public function render()
    {
        return view('livewire.receta', [
            'vademecum' => Vademecum::where('droga', 'like', '%' . $this->query . '%')
                ->orWhere('presentacion', 'like', '%' . $this->query . '%')
                ->paginate(10),
            'recetados' => $this->recetados
        ]);
    }
}
