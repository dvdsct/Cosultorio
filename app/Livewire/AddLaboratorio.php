<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaboratorioXConsulta;
use App\Models\Laboratorio;
class AddLaboratorio extends Component
{
     public $consulta;
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
     public $glucosuria ;
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
                $this->glucosuria = false ;
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
                $this->glucosuria = true ;
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


         public function add_lab(){
          $lab = new Laboratorio;
          $lab->hemo= $this->hemo;
          $lab->hb= $this->hb;
          $lab->hto= $this->hto;
          $lab->glucem= $this->glucem;
          $lab->ptog= $this->ptog;
          $lab->hb_glico= $this->hb_glico;
          $lab->grupo= $this->grupo;
          $lab->factor_rh= $this->factor_rh;
          $lab->orina= $this->orina;
          $lab->urocult= $this->urocult;
          $lab->fibrino= $this->fibrino;
          $lab->flujo_vag= $this->flujo_vag;
          $lab->coagulogram= $this->coagulogram;
          $lab->tsh= $this->tsh;
          $lab->fsh= $this->fsh;
          $lab->lh= $this->lh;
          $lab->dhea= $this->dhea;
          $lab->testost_l= $this->testost_l;
          $lab->testost_b= $this->testost_b;
          $lab->h_antimull= $this->h_antimull;
          $lab->glucosuria= $this->glucosuria;
          $lab->ferritina= $this->ferritina;
          $lab->transferri= $this->transferri;
          $lab->anti_ttg= $this->anti_ttg;
          $lab->gliadina= $this->gliadina;
          $lab->chagas= $this->chagas;
          $lab->toxo= $this->toxo;
          $lab->vdrl_cual= $this->vdrl_cual;
          $lab->hbs_ag= $this->hbs_ag;
          $lab->hiv= $this->hiv;
          $lab->estado= '2';
          $lab->save();

          $lxc = new LaboratorioXConsulta;
          $lxc->consulta_id=$this->consulta->id;
          $lxc->laboratorio_id=$lab->id;
          $lxc->descripcion= 'vacio';
          $lxc->estado= '2';
          $lxc->save();

          $this->dispatch('added')->to(EnfermedadActual::class);
        }
    public function render()
    {
        return view('livewire.add-laboratorio');
    }
}
