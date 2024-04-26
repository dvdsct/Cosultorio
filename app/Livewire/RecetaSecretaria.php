<?php

namespace App\Livewire;

use App\Models\ConsultasXMedico;
use App\Models\Medico;
use Livewire\Component;

class RecetaSecretaria extends Component
{
    public $consulta;
    public $paciente;
    public $modalMedico = true;
    public $medicos;
    public $medico;

    public function mount($consulta, $paciente){
        $this->consulta = $consulta;
        $this->paciente = $paciente;
        $this->medicos = Medico::all();
    }

    public function modalMedicoOnOff(){
        if($this->modalMedico== true){
            $this->modalMedico = false ;
        }
        else{
            $this->modalMedico = true;

        }
    }
    public function selMed(){
        $this->consulta->update([
            'estado' => '2',
            'medico_id' => $this->medico
        ]);

        ConsultasXMedico::create([
            'medico_id' => $this->medico,
            'consulta_id' => $this->consulta->id,
            'estado' => '1'
        ]);
        $this->medico = Medico::find($this->medico);
        $this->modalMedicoOnOff();
    }
    public function render()
    {
        return view('livewire.receta-secretaria');
    }
}
