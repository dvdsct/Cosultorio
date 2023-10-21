<?php

namespace App\Livewire;

use Livewire\Component;

class Laboratorio extends Component
{
     public $todas;
     public $hemo;
     public $hb;
     public $hto;
     public $glucem;
     public $ptog;
     public $hb_glico;
     public $grupo;
     public $factor_rh;
     public $orina;
     public $urocult;
     public $fibrino;
     public $flujo_vag;
     public $coagulogram;
     public $tsh;
     public $fsh;
     public $lh;
     public $dhea;
     public $testost_l;
     public $testost_b;
     public $h_antimull;
     public $glucosauria;
     public $ferritina;
     public $transferri;
     public $anti_ttg;
     public $gliadina;
     public $chagas;
     public $toxo;
     public $vdrl_cual;
     public $hbs_ag;
     public $hiv;

    public function render()
    {
        return view('livewire.laboratorio');
    }
}
