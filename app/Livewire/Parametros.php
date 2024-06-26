<?php

namespace App\Livewire;

use App\Models\Embarazo;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
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
    #[Validate('required', message: 'Se reuiere el peso')]
    public $peso;
    #[Validate('required', message: 'Se reuiere la altura')]
    public $altura;
    public $v_imc;


    // Temperatura

    public $temperatura;
    public $l_temp;
    public $v_temp;
    public $in_temp = 'd-none';

    // Fum
    public $fum;
    public $setFumForm = false;
    public $eg;
    public $fpp;

    public $in_emb = false;


    public function mount()
    {
        // $this->consulta = $consulta;

        $this->tension = $this->consulta->tension_arterial;
        $this->imc = $this->consulta->indice_mc;
        $this->temperatura = $this->consulta->temperatura;
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
        $this->validate();
        $this->l_imc = '';
        $this->in_imc = 'd-none';

        $this->imc = floatval($this->peso) / (floatval($this->altura / 100) * floatval($this->altura / 100));

        $this->consulta->update([
            'indice_mc' =>  $this->imc
        ]);
        $this->imc = $this->consulta->indice_mc;

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
    public function setForm()
    {
        if ($this->setFumForm) {

            $this->setFumForm = false;
        } else {
            $this->setFumForm = true;
        }
    }

    public function setFum()
    {

        if ($this->in_emb == true) {
            // dd($this->in_emb);
            $this->consulta->update(
                [
                    'fum' =>  $this->fum,
                    'embarazo' => 'si'
                ]
            );




            $e = Embarazo::firstOrCreate([
                'paciente_id' => $this->consulta->paciente_id,
                'estado' => '1',
            ]);


            $e->update([

                'FUM' => $this->fum,
                'FPP' => Carbon::parse($this->consulta->fum)
                    ->subMonths(3)
                    ->addDays(7)
                    ->addYear(),
                'descripcion' => 'descripcion',
            ]);
            $this->setEmbarazo();
            $this->setForm();
            $this->reset('in_emb');
        } else {
            // dd($this->in_emb);

            $this->consulta->update(
                [
                    'fum' =>  $this->fum,
                    'embarazo' => 'no'

                ]
            );
            $this->setForm();
        }
    }
    public function finEmbarazo()
    {

        $this->consulta->update(
            [
                'embarazo' => 'no'
            ]
        );
    }

    public function setEmbarazo()
    {
        $this->fum = Carbon::parse($this->consulta->fum)->format('d-m-Y');


        $this->eg = ceil(Carbon::now()->diffInDays($this->fum) / 7);

        $this->fpp = Carbon::parse($this->consulta->fum)
            ->subMonths(3)
            ->addDays(7)
            ->addYear()
            ->locale('es') // Establecer la localización a español
            ->isoFormat('D [de] MMMM [del] YYYY');
    }





    #[On('embarazo')]
    public function render()
    {
        $this->setEmbarazo();
        if (floatval($this->imc) < 24.9 and floatval($this->imc) > 18.5) {
            $this->v_imc = 'success';
        } else {
            $this->v_imc = 'danger';
        }
        if ($this->temperatura < 38 and $this->temperatura >= 37) {
            $this->v_temp = 'success';
        }
        if ($this->temperatura <= 36.99) {
            $this->v_temp = 'info';
        }
        if ($this->temperatura >= 38) {
            $this->v_temp = 'danger';
        }






        return view('livewire.parametros');
    }
}
