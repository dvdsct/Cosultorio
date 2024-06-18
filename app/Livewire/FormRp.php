<?php

namespace App\Livewire;

use App\Models\Cie10;
use App\Models\Receta;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormRp extends Component
{
    public $consulta;

    public $remedio;

    #[Validate('required', message:'Escriba una indicacion para el medicamento')]
    public $indicacion;
    public $rp;
    public $formRp = true;
    public $cie10s;

    #[Validate('required', message:'Elija un diagnostico')]
    public $cie10;


    public function mount($consulta,$rp)
    {
        $this->consulta = $consulta;
        $this->rp = $rp;
        $this->cie10s = Cie10::all();
        $this->indicacion = $this->rp->indicacion;
        $this->cie10 = $this->rp->cie10_id;;
    }


    public function recetar(){

        $this->validate();

        $this->rp->update([
            'cie10_id' => $this->cie10,
            'indicacion' => $this->indicacion,
            'estado' => '2'
        ]);

        $this->formRp = false;
    }


    public function close($id){
        $rp = Receta::find('id');
        dd($rp);
    }



    public function render()
    {
        return view('livewire.form-rp');
    }
}
