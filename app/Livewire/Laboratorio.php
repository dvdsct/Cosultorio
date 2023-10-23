<?php

namespace App\Livewire;

use Livewire\Component;

class Laboratorio extends Component
{
     public $todas;
     public $hemo;
     public $hb;
     public $hto ;
     public $glucem ;
     public $ptog ;
     public $hb_glico ;
     public $grupo ;
     public $factor_rh ;
     public $orina ;
     public $urocult ;
     public $fibrino ;
     public $flujo_vag ;
     public $coagulogram ;
     public $tsh ;
     public $fsh ;
     public $lh ;
     public $dhea ;
     public $testost_l ;
     public $testost_b ;
     public $h_antimull ;
     public $glucosauria ;
     public $ferritina ;
     public $transferri ;
     public $anti_ttg ;
     public $gliadina ;
     public $chagas ;
     public $toxo ;
     public $vdrl_cual ;
     public $hbs_ag ;
     public $hiv ;


     public function selectAll(){


            if($this->todas == false){
                $this->hemo = false;
                $this->hb = false;
                $this->hto = false ;
                $this->glucem = false ;
                $this->ptog = false ;
                $this->hb_glico = false ;
                $this->grupo = false ;
                $this->factor_rh = false ;
                $this->orina = false ;
                $this->urocult = false ;
                $this->fibrino = false ;
                $this->flujo_vag = false ;
                $this->coagulogram = false ;
                $this->tsh = false ;
                $this->fsh = false ;
                $this->lh = false ;
                $this->dhea = false ;
                $this->testost_l = false ;
                $this->testost_b = false ;
                $this->h_antimull = false ;
                $this->glucosauria = false ;
                $this->ferritina = false ;
                $this->transferri = false ;
                $this->anti_ttg = false ;
                $this->gliadina = false ;
                $this->chagas = false ;
                $this->toxo = false ;
                $this->vdrl_cual = false ;
                $this->hbs_ag = false ;
                $this->hiv = false ;
            }else{
                $this->hemo = true;
                $this->hb = true;
                $this->hto = true ;
                $this->glucem = true ;
                $this->ptog = true ;
                $this->hb_glico = true ;
                $this->grupo = true ;
                $this->factor_rh = true ;
                $this->orina = true ;
                $this->urocult = true ;
                $this->fibrino = true ;
                $this->flujo_vag = true ;
                $this->coagulogram = true ;
                $this->tsh = true ;
                $this->fsh = true ;
                $this->lh = true ;
                $this->dhea = true ;
                $this->testost_l = true ;
                $this->testost_b = true ;
                $this->h_antimull = true ;
                $this->glucosauria = true ;
                $this->ferritina = true ;
                $this->transferri = true ;
                $this->anti_ttg = true ;
                $this->gliadina = true ;
                $this->chagas = true ;
                $this->toxo = true ;
                $this->vdrl_cual = true ;
                $this->hbs_ag = true ;
                $this->hiv = true ;

            }
        }




        

    public function render()
    {
        return view('livewire.laboratorio');
    }
}
