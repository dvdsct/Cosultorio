<?php

namespace App\Livewire;

use App\Models\Cie10;
use App\Models\ConsultasXMedico;
use App\Models\Medico;
use App\Models\Receta;
use App\Models\RecetaXConsulta;
use App\Models\Vademecum;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;

class RecetaSecretaria extends Component
{
    public $consulta;
    public $paciente;
    public $modalMedico = true;
    public $medicos;
    public $remedio;
    public $rps;
    public $cie10s;
    public $cie10;
    public $modalRemedios = false;


    #[Validate('required', message: 'Seleccionar un medico para continuar')]
    public $medico;

    public $query = '';


    public function mount($consulta, $paciente)
    {
        $this->consulta = $consulta;
        $this->paciente = $paciente;
        $this->medicos = Medico::all();
        $this->cie10s = Cie10::all();
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


    public function searchV()
    {
        $this->modalRemedioOnOff();
    }


    public function addRp($id)
    {
        $this->remedio = Vademecum::find($id);

        $r = Receta::create([
            'vademecum_id' => $this->remedio->id,
            'estado' => '1'
        ]);

        RecetaXConsulta::create([
            'receta_id' => $r->id,
            'consulta_id' => $this->consulta->id,
            'estado' => '1'
        ]);

        $this->dispatch('newsRp');

        $this->modalRemedioOnOff();
    }


    #[On('newsRp')]
    public function resRp(){

        $this->rps = $this->consulta->recetas;
    }

    public function render()
    {
        $this->rps = $this->consulta->recetas;


        return view('livewire.receta-secretaria', [
            'vademecum' => Vademecum::select('vademecums.*')
                ->where('vademecums.droga', 'LIKE',  '%' . $this->query . '%')
                ->orWhere('vademecums.presentacion', 'LIKE', '%' . $this->query . '%')
                ->orWhere('vademecums.nombre', 'LIKE', '%' . $this->query . '%')
                ->paginate(10),
        ]);
    }
}
