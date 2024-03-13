<?php

namespace App\Livewire;

use App\Models\Cie10;
use App\Models\Consulta as ModelsConsulta;
use App\Models\Receta;
use App\Models\RecetaXConsulta;
use Livewire\Component;
use App\Models\Vademecum;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Consulta;


class Recetar extends Component
{
    use WithPagination;


    #[Locked]
    public $recetados;


    #[Locked]
    public $modal = false;

    public $cantidad;
    public $horas;
    public $remedio;
    public $indicacion;
    public $consulta;
    public $cie10 = '1';

    public $cantidadMedicamentos;


    public function mount($consulta)
    {

        $this->consulta = $consulta;
        $this->cie10 = Cie10::all();
    }


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

    public function indicacionar($id)
    {
        $this->remedio = Vademecum::find($id);
    }

    public function borrarRecetado($id)
    {   $med = Receta::find($id);
        $med->delete();
        $this->dispatch('added-rem');
    }

    public function recetar()
    {

        $c10 = $this->cie10->first()->id;
        $rec =  Receta::create([
            'vademecum_id' => $this->remedio->id,
            'cie10_id' => $c10,
            'indicacion' => $this->horas,
            'cantidad' => $this->cantidad,
            'estado' => '1',

        ]);

        RecetaXConsulta::create([
            'consulta_id' => $this->consulta->id,
            'receta_id' => $rec->id,
            'estado' => '1'
        ]);


        $this->reset('remedio', 'indicacion', 'cantidad', 'horas');
        $this->dispatch('added-rem');
    }





    public function guardarReceta($id)
    {
        $this->reset('remedio', 'indicacion', 'cantidad', 'horas');
        $this->closeModal();
    }
    



    #[On('added-rem')]
    public function render()
    {
        $this->recetados = $this->consulta->recetas;

        return view('livewire.recetar', [
            'vademecum' => Vademecum::where('droga', 'like', '%' . $this->query . '%')
                ->orWhere('presentacion', 'like', '%' . $this->query . '%')
                ->paginate(10),
            'recetados' => $this->consulta->recetas,
            'cie10' => $this->cie10
        ]);
    }
}
