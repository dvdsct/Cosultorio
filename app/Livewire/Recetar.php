<?php

namespace App\Livewire;

use App\Models\Cie10;
use App\Models\Consulta as ModelsConsulta;
use App\Models\Receta;
use App\Models\RecetaXConsulta;
use Livewire\Component;
use App\Models\Vademecum;
use App\Models\VademecumDetalle;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Consulta;


class Recetar extends Component
{
    use WithPagination;


    // #[Locked]
    public $recetados;


    #[Locked]
    public $modal = false;

    public $cantidad;
    public $horas;
    public $remedio;
    public $indicacion;
    public $consulta;
    public $cie10s;
    protected $paginationTheme = 'bootstrap';

    public $query = '';


    #[Validate('required', message: 'Seleccionar un diagnostico para continuar')]
    public $cie10;

    public $des = '';

    public function mount($consulta)
    {
        $this->consulta = $consulta;
        $this->cie10s = Cie10::all();
        $this->recetados = $this->consulta->recetas;
        if(count($this->recetados) > 0){
            $this->cie10 = $this->recetados->first()->cie10_id;
            // dd($this->cie10);
        }else{
            $this->des = '';
        }
        // $this->cie10 = $this->recetados->first()->cie10_id;
    }



    public function search()
    {
        $this->resetPage();
    }



    #[On('modalOn')]
    public function openModal()
    {
        $this->modal = true;
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

        $this->validate();
        $rec =  Receta::create([
            'vademecum_id' => $this->remedio->id,
            'cie10_id' => $this->cie10,
            'indicacion' => $this->horas,
            'cantidad' => $this->cantidad,
            'estado' => '1',

        ]);

        RecetaXConsulta::create([
            'consulta_id' => $this->consulta->id,
            'receta_id' => $rec->id,
            'estado' => '1'
        ]);

        $this->des = 'disabled';
        $this->reset('remedio', 'indicacion', 'cantidad', 'horas');
        $this->dispatch('added-rem');
    }


    public function guardarReceta($id)
    {
        $this->reset('remedio', 'indicacion', 'cantidad', 'horas');
        $this->closeModal();
    }

    public function ver(){
        dd($this->cie10 = $this->recetados->first());
    }



    #[On('added-rem')]
    public function render()
    {
        $this->recetados = $this->consulta->recetas;
        $this->cie10s = Cie10::all();

        if(count($this->recetados) != 0){
            $this->des = 'disabled';
        }else{
            $this->des = '';

        }

        return view('livewire.recetar', [
            'vademecum' => Vademecum::select('vademecums.*')
            ->orWhere('vademecums.droga', 'LIKE',  '%'. $this->query .'%')
            ->orWhere('vademecums.presentacion', 'LIKE', '%'. $this->query .'%' )
            ->orWhere('vademecums.nombre', 'LIKE', '%'. $this->query .'%' )
                ->paginate(10),
        ]);
    }
}
