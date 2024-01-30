<?php

namespace App\Livewire;

use App\Models\Cie10;
use App\Models\Receta;
use Livewire\Component;
use App\Models\Vademecum;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\WithPagination;


class Recetar extends Component
{
    use WithPagination;


    #[Locked]
    public $recetados = [];


    #[Locked]
    public $modal = false;

    public $cantidad;
    public $horas;
    public $remedio;
    public $indicacion;
    public $consulta;
    public $cie10;

    public function mount($consulta){

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
    {
        // Buscar la clave asociada al id
        $clave = array_search($id, array_column($this->recetados, 'id'));

        // Verificar si se encontró el id
        if ($clave !== false) {
            // Eliminar el elemento usando la clave
            unset($this->recetados[$clave]);
        }

        // Reindexar el array si es necesario
        $this->recetados = array_values($this->recetados);
    }

    public function recetar()
    {
        $this->indicacion = [
            'id' => $this->remedio->id,
            'medicamento' => $this->remedio,
            'cantidad' => $this->cantidad,
            'horas' => $this->horas,
        ];



        $this->recetados[] = $this->indicacion;
        $this->reset('remedio', 'indicacion');
    }

    public function guardarReceta() {

        // dd('here');
        foreach($this->recetados as $r){

            dd($r['medicamento']['id']);
            Receta::create([
                'vademecum_id' => $r['medicamento'],
                'cie10_id' => $this->cie10,
                'indicacion' => $r['horas'],
                'cantidad' => $r['cantidad'],
                'estado' => '1',

            ]);


        }

    }
    public function receta()
    {

        dd($this->recetados);
    }



    public function render()
    {
        return view('livewire.recetar', [
            'vademecum' => Vademecum::where('droga', 'like', '%' . $this->query . '%')
                ->orWhere('presentacion', 'like', '%' . $this->query . '%')
                ->paginate(10),
            'recetados' => $this->recetados,
            'cie10' => $this->cie10
        ]);
    }
}
