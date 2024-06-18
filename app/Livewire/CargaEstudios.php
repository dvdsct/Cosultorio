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


    public function mount($consulta)
    {
        $this->consulta = $consulta;

        $this->oldConsulta = Consulta::where('estado', '3')
            ->where('paciente_id', $this->consulta->paciente_id)->latest('created_at')
            ->first();
        /*         if(count($this->oldConsulta->first()->laboratorios)> 0){

            $this->estudios = $this->oldConsulta->first()->laboratorios;
        } */
        /* PRIMERO VERIFICA SI ES NULL */
        if ($this->oldConsulta !== null && count($this->oldConsulta->laboratorios) > 0) {
            $this->estudios = $this->oldConsulta->laboratorios;
        } else {
            $this->estudios = 'vacio';
        }
    }

    public function setLab($id)
    {

        $estudio = Laboratorio::find($id);
        $estudio->update(
            [
                'valor' => $this->valor,
                'estado' => '100'
            ]
        );
    }

    public function closeModal()
    {

        $this->estModal = false;
    }

    #[On('editLab')]
    public function cargarEstudios()
    {

        if ($this->estModal == true) {

            $this->estModal = false;
        } else {
            $this->estModal = true;
        }
    }
    public function render()
    {


        return view('livewire.carga-estudios');
    }
}
