<?php

namespace App\Livewire;

use App\Models\Consulta;
use App\Models\Laboratorio;
use App\Models\LaboratorioXConsulta;
use Livewire\Attributes\On;
use Livewire\Component;

class CargaEstudios extends Component
{

    public $estudios;
    public $consEstudios;
    public $estudio;
    public $estModal = false;
    public $oldConsulta;
    public $consulta;
    public $valor;


    public function mount($consulta){
        $this->consulta = $consulta;

        $this->oldConsulta = Consulta::where('estado', '4')
        ->where('perfil_id',$this->consulta->perfil_id)
        ->first();
        if(count($this->oldConsulta->first()->laboratorios)> 0){

            $this->estudios = $this->oldConsulta->first()->laboratorios;
        }
    }

public function setLab($id){

    $estudio = Laboratorio::find($id);
    $estudio->update(
        [
            'valor' => $this->valor,
            'estado' => '100'
        ]
    );

}


    #[On('editLab')]
    public function cargarEstudios(){

         $this->estModal = true;


    }
    public function render()
    {


        return view('livewire.carga-estudios');
    }
}
