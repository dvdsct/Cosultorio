<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pap;
use App\Models\TipoMuestra;
use App\Models\TomaMuestra;
use App\Models\MetodoAnticonceptivo;
use App\Models\CirujiasPrevias;


class FormPap extends Component
{

    public $tipo_muestra;
    public $tipos_muestras;
    public $toma_muestra;
    public $tomas_muestras;
    public $metodo_anti;
    public $metodos_antis;
    public $ciru_prev;
    public $cirus_prevs;

    public $tamizaje;
    public $fec_tam;
    public $fum;
    public $menop;
    public $causales;
    public $embarazo;
    public $trat_rad;
    public $quimio;


    public function add_pap(){

    $pap = new Pap;
    $pap->perfil_id = '1';
    $pap->descripcion = 'vacio';
    $pap->estado = '1';
    $pap->tipo_muestra=$this->tipo_muestra;
    $pap->met_toma_mue=$this->toma_muestra;
    $pap->tamizaje =$this->tamizaje;
    $pap->fecha_tami = $this->fec_tam;
    $pap->fum = $this->fum;
    $pap->menopausia = $this->menop;
    $pap->metodo_anti_con=$this->metodo_anti;
    $pap->cirujias_pre=$this->ciru_prev;
    $pap->causa_lesion = $this->causales;
    $pap->thr = $this->thr;
    $pap->embarazo_actual = $this->embarazo;
    $pap->trata_rad = $this->trat_rad;
    $pap->quimio = $this->quimio;
    $pap->save();

  }



    public function render()
    {

        $this->tipos_muestras = TipoMuestra::all();
        $this->tomas_muestras = TomaMuestra::all();
        $this->metodos_antis = MetodoAnticonceptivo::all();
        $this->cirus_prevs = CirujiasPrevias::all();



        return view('livewire.form-pap');
    }
}
