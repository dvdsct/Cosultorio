<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pap;
use App\Models\PapPrevio;
use App\Models\TipoMuestra;
use App\Models\TomaMuestra;
use App\Models\MetodoAnticonceptivo;
use App\Models\CirujiasPrevias;


class FormPap extends Component
{

  public $check_tvph = '';
  public $switch = '';
  public $check_cp;
  public $v_cp = 'disabled';

  public $v_fum = '';

  public $check_vph;
  public $masmenos;
  public $v_test = 'disabled';

  public $v_pp = 'disabled';
  public $check_pap;
  public $fec_pap_previo;
  public $pap_prev;
  public $in_otros = 'd-none';

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


  /* Metodo para habilitar y desabilitar Cirugias precias */
  public function cir_previas(){
    if($this->check_cp == 1){
      $this->v_cp = '';
    }else{
      $this->v_cp = 'disabled';
    }
  }

  /* Metodo para habilitar o desabilitar FUM */
  public function fum_meno()
  {
    if ($this->menop == 1) {
      $this->v_fum = 'disabled';
      $this->fum = '';
    } else {
      $this->v_fum = '';
    }
  }

  /* Metodo para habilitar o desabilitar input de Metodos Anticonceptivos */
  public function setStatus()
  {
    if ($this->metodo_anti == '4') {
      $this->in_otros = '';
    } else {
      $this->in_otros = 'd-none';
    }
  }

  /* Metodo para habilitar o desabilitar opciones de Test de VPH */
  public function test_vph()
  {
    if ($this->check_vph == 1) {
      $this->v_test = '';
      $this->switch = 'custom-switch-off-danger custom-switch-on-success';
      $this->check_tvph = '';
    } else {
      $this->v_test = 'disabled';
      $this->fec_tam = '';
      $this->switch = '';
      $this->check_tvph = 'disabled';
    }
  }

  /* Metodo para habilitar o desabilitar el calendario de pap previo */
  public function pap_previo()
  {
    if ($this->check_pap == 1) {
      $this->v_pp = '';
    } else {
      $this->v_pp = 'disabled';
      $this->fec_pap_previo = '';
    }
  }

  public function add_pap()
  {


    $pap = new Pap;
    $pap->perfil_id = '1';
    $pap->descripcion = 'vacio';
    $pap->estado = '1';
    $pap->tipo_muestra = $this->tipo_muestra;
    $pap->met_toma_mue = $this->toma_muestra;
    $pap->tamizaje = $this->tamizaje;
    $pap->fecha_tami = $this->fec_tam;
    $pap->fum = $this->fum;
    $pap->menopausia = $this->menop;
    $pap->metodo_anti_con = $this->metodo_anti;
    $pap->cirujias_pre = $this->ciru_prev;
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
    $this->pap_prev = PapPrevio::all();


    return view('livewire.form-pap');
  }
}
