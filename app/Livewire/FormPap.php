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

    public $pap;
    public $check_tvph = '';
    public $switch = '';
    public $check_cp;
    public $v_cp = 'disabled';

    public $v_fum = '';

    public $check_vph;
    public $resultado_vph = '0';
    public $v_test = 'disabled';

    public $v_pp = 'disabled';
    public $check_pap;
    public $fec_pap_previo;
    public $pap_prev;
    public $pap_prevs;
    public $in_otros = 'd-none';

    public $tipo_muestra;
    public $tipos_muestras;
    public $toma_muestra;
    public $tomas_muestras;
    public $metodo_anti;
    public $metodos_antis;
    public $ciru_prev;
    public $cirus_prevs;
    public $anti_otros;

    public $fec_tam;

    public $fum;
    public $menop;
    public $causales;
    public $thr;
    public $embarazo;
    public $trat_rad;
    public $quimio;

    public function mount($consulta)
    {
        $this->pap = $consulta;

        // Inicializar los valores del formulario con los datos existentes
        $this->check_tvph = $this->pap->check_tvph ?? '';
        $this->switch = $this->pap->switch ?? '';
        $this->check_cp = $this->pap->check_cp ?? '';
        $this->v_cp = $this->pap->check_cp == 1 ? '' : 'disabled';
        $this->v_fum = $this->pap->menop == 1 ? 'disabled' : '';

        $this->check_vph = $this->pap->check_vph ?? '';
        $this->resultado_vph = $this->pap->res_vph ?? '0';
        $this->v_test = $this->pap->check_vph == 1 ? '' : 'disabled';
        $this->fec_tam = $this->pap->fecha_tami ?? '';

        $this->check_pap = $this->pap->check_pap ?? '';
        $this->v_pp = $this->pap->check_pap == 1 ? '' : 'disabled';
        $this->fec_pap_previo = $this->pap->fecha_pp ?? '';
        $this->pap_prev = $this->pap->pap_previo_id ?? ''; 

        $this->tipo_muestra = $this->pap->tipo_muestra ?? '';
        $this->toma_muestra = $this->pap->met_toma_mue ?? '';
        $this->metodo_anti = $this->pap->metodo_anti_con ?? '';
        $this->anti_otros = $this->pap->otros_anti_con ?? '';
        $this->in_otros = $this->pap->metodo_anti_con == '5' ? '' : 'd-none';

        $this->fum = $this->pap->fum ?? '';
        $this->menop = $this->pap->menopausia ?? '';
        $this->causales = $this->pap->causa_lesion ?? '';
        $this->thr = $this->pap->thr ?? '';
        $this->embarazo = $this->pap->embarazo_actual ?? '';
        $this->trat_rad = $this->pap->trata_rad ?? '';
        $this->quimio = $this->pap->quimio ?? '';

        // Asignar cirugías previas
        $this->ciru_prev = $this->pap->cirujias_pre ?? [];

        if ($this->pap->menopausia == 1) {
            $this->menop = true;
        }

        if ($this->pap->cirujias_pre != '') {
            $this->check_cp = true;
        }

        if ($this->pap->thr == 1) {
            $this->thr = true;
        }

        if ($this->pap->embarazo_actual == 1) {

            $this->embarazo = true;
        }

        if ($this->pap->trata_rad == 1) {
            $this->trat_rad = true;
        }

        if ($this->pap->quimio == 1) {
            $this->quimio = true;
        }

        if ($this->pap->fecha_tami != '') {
            $this->check_vph = true;
        }

        if ($this->pap->res_vph == 1) {
            $this->resultado_vph = true;
        }

        if ($this->pap->fecha_pp != '') {
            $this->check_pap = true;
        }
    }

    /* Metodo para habilitar y desabilitar Cirugias previas */
    public function cir_previas()
    {
        if ($this->check_cp == 1) {
            $this->v_cp = '';
        } else {
            $this->v_cp = 'disabled';
            $this->reset('causales', 'ciru_prev');
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
        if ($this->metodo_anti == '5') {
            $this->in_otros = '';
        } else {
            $this->in_otros = 'd-none';
            $this->reset('anti_otros');
        }
    }

    /* Metodo para habilitar o desabilitar opciones de Test de VPH */
    public function test_vph()
    {
        if ($this->check_vph == 1) {
            $this->v_test = '';
            $this->switch = 'custom-switch-off-danger custom-switch-on-success';
            $this->check_tvph = '';
            /* $this->resultado_vph = ''; ignorar */
        } else {
            $this->v_test = 'disabled';
            $this->fec_tam = '';
            $this->switch = '';
            $this->check_tvph = 'disabled';
            $this->resultado_vph = null;
            /*  $this->resultado_vph = 'disabled';  ignorar*/
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
    // Verificar si pap_prev tiene un valor válido o asignar null
    $papPrevioId = !empty($this->pap_prev) ? $this->pap_prev : null;

        // Verificar si el valor de 'otros_anti_con' es '-Seleccionar-' y establecerlo como null
        $otrosAntiCon = $this->anti_otros === '-Seleccionar-' ? null : $this->anti_otros;
        $tipoMuestra = in_array($this->tipo_muestra, ['-Seleccionar-', '1']) ? null : $this->tipo_muestra;
        $metodoMuestra = in_array($this->toma_muestra, ['-Seleccionar-', '1']) ? null : $this->toma_muestra;
        $metodoAnti = in_array($this->metodo_anti, ['-Seleccionar-', '1']) ? null : $this->metodo_anti;

        $this->pap->update([
            'tipo_muestra' => $tipoMuestra,
            'met_toma_mue' => $metodoMuestra,
            'res_vph' => $this->resultado_vph,
            'check_vph' => $this->check_vph, // Guardar el estado del check del test de VPH
            'fecha_tami' => $this->fec_tam,
            'fum' => $this->fum,
            'menopausia' => $this->menop,
            'metodo_anti_con' => $metodoAnti,
            'otros_anti_con' => $otrosAntiCon, // Utiliza el valor calculado
            'cirujias_pre' => $this->ciru_prev,
            'causa_lesion' => $this->causales,
            'thr' => $this->thr,
            'embarazo_actual' => $this->embarazo,
            'trata_rad' => $this->trat_rad,
            'quimio' => $this->quimio,
            'fecha_pp' => $this->fec_pap_previo,
            'pap_previo_id' =>$papPrevioId,
            'estado' => '3'
        ]);


        return redirect('colpos/' . $this->pap->id);
    }




    public function render()
    {

        $this->tipos_muestras = TipoMuestra::all();
        $this->tomas_muestras = TomaMuestra::all();
        $this->metodos_antis = MetodoAnticonceptivo::all();
        $this->cirus_prevs = CirujiasPrevias::all();
        $this->pap_prevs = PapPrevio::all();

        return view('livewire.form-pap');
    }
}
