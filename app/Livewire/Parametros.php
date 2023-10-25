<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;


class Parametros extends Component
{
    public $consulta;
    // TA
    public $tension;
    public $in_ta = 'd-none';
    public $l_ta;

    // IMC

    public $imc;
    public $l_imc;
    public $in_imc = 'd-none';
    public $peso;
    public $altura;
    public $v_imc;


    // Temperatura

    public $temperatura;
    public $l_temp;
    public $v_temp;
    public $in_temp = 'd-none';

    // Fum
    public $fum;
    public $l_fum;
    public $eg;
    public $c_fum = 'info';
    public $fpp;
    public $emb = 'd-none';
    public $in_fum = 'd-none';
    public $in_emb = true;

    public function mount()
    {

        $this->tension = $this->consulta->tension_arterial;
        $this->imc = $this->consulta->indice_mc;
        $this->temperatura = $this->consulta->temperatura;
        $this->in_emb = $this->consulta->embarazo;
    }

    // TA Changes
    public function setTaClass()
    {
        $this->in_ta = '';
        $this->l_ta = 'd-none';
    }
    public function setTension()
    {
        $this->in_ta = 'd-none';
        $this->l_ta = '';
        // $this->tension = $this->tension;

        $this->consulta->update(
            [
                'tension_arterial' =>  $this->tension
            ]
        );
    }



    // IMC Changes

    public function setImcClass()
    {
        $this->l_imc = 'd-none';
        $this->in_imc = '';
    }

    public function setImc()
    {
        $this->l_imc = '';
        $this->in_imc = 'd-none';
        $this->imc = floatval($this->peso) / (floatval($this->altura) * floatval($this->altura));




    }

    // Temperatura

    public function setTempClass()
    {
        $this->l_temp = 'd-none';
        $this->in_temp = '';
    }
    public function setTemp()
    {
        $this->l_temp = '';
        $this->in_temp = 'd-none';

        $this->consulta->update(
            [
                'temperatura' =>  $this->temperatura
            ]
        );
    }


    // FUM
    public function setFumClass()
    {
        $this->l_fum = 'd-none';
        $this->in_fum = '';
    }

    public function setFum()
    {
        $this->l_fum = '';
        $this->in_fum = 'd-none';

        if($this->in_emb == 1){
            $this->consulta->update(
                [
                    'fum' =>  $this->fum,
                    'embarazo' => '1'
                ]
            );
        }else{
            $this->consulta->update(
                [
                    'fum' =>  $this->fum,
                    'embarazo' => '0'

                ]
            );
        }


    }




    public function render()
    {
        if(floatval($this->imc) < 24.9 and floatval($this->imc) >18.5 ){
            $this->v_imc = 'success';
        }
        else{
            $this->v_imc = 'danger';

        }
        if($this->temperatura < 38 and $this->temperatura >= 37){
            $this->v_temp = 'success';
         }
        if($this->temperatura <= 36.99){
            $this->v_temp = 'info';
        }
        if($this->temperatura >= 38){
            $this->v_temp = 'danger';
        }
        $this->fum = Carbon::parse($this->consulta->fum)->format('d-m-Y');

        if($this->consulta->embarazo == '1'){
            $this->l_fum ='d-none';
            $this->emb ='';
            $this->c_fum ='pink';
            $this->eg = ceil(Carbon::now()->diffInDays($this->fum) / 7);

            $this->fpp = Carbon::parse($this->consulta->fum)
            ->subMonths(3)
            ->addDays(7)
            ->addYear()
            ->locale('es') // Establecer la localización a español
            ->isoFormat('D [de] MMMM [del] YYYY');

        }


        return view('livewire.parametros');
    }
}
