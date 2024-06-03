<?php

namespace App\Livewire;

use App\Models\ConsultasXMedico;
use App\Models\Medico;
use App\Models\Vademecum;
use Livewire\Component;
use Livewire\Attributes\Validate;

class RecetaSecretaria extends Component
{
    public $consulta;
    public $paciente;
    public $modalMedico = true;
    public $medicos;
    public $modalRemedios = false;

    #[Validate('required', message: 'Seleccionar un medico para continuar')]
    public $medico;

    public $query = '';


    public function mount($consulta, $paciente)
    {
        $this->consulta = $consulta;
        $this->paciente = $paciente;
        $this->medicos = Medico::all();
    }
    public function search()
    {
        $this->resetPage();
    }

    public function modalMedicoOnOff()
    {
        if ($this->modalMedico == true) {
            $this->modalMedico = false;
        } else {
            $this->modalMedico = true;
        }
    }
    public function modalRemedioOnOff()
    {
        if ($this->modalRemedios == true) {
            $this->modalRemedios = false;
        } else {
            $this->modalRemedios = true;
        }
    }
    public function selMed()
    {
        $this->validate();
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


    public function searchV(){
        $this->modalRemedioOnOff();
    }



    public function render()
    {
        return view('livewire.receta-secretaria', [
            'vademecum' => Vademecum::select('vademecums.*')
                ->where('vademecums.droga', 'LIKE',  '%' . $this->query . '%')
                ->orWhere('vademecums.presentacion', 'LIKE', '%' . $this->query . '%')
                ->orWhere('vademecums.nombre', 'LIKE', '%' . $this->query . '%')
                ->paginate(10),
        ]);
    }
}
