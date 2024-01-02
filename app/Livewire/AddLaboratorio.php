<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaboratorioXConsulta;
use App\Models\Laboratorio;
class AddLaboratorio extends Component
{
     public $consulta;
     public $todas;
     public $e_gral;
     public $e_renal;
     public $e_gine;
     public $e_salud;
     public $e_embabarazo;

     public $hemo;
     public $hb;
     public $hto ;
     public $glucem ;
     public $ptog ;
     public $hb_glico ;
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
     public $cmv_lgg;
     public $cmv_lgm;
     public $ag_chlamidia;
     public $microplasma;
     public $ureaplasma;
     public $lysteria;


     /* Funcion para seleccionar TODAS las practicas */
     public function selectAll(){
            if($this->todas == false){
                $this->hemo = false;
                $this->hb = false;
                $this->hto = false ;
                $this->glucem = false ;
                $this->ptog = false ;
                $this->hb_glico = false ;
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
                $this->cmv_lgg = false;
                $this->cmv_lgm = false;
                $this->ag_chlamidia = false;
                $this->microplasma = false;
                $this->ureaplasma = false;
                $this->lysteria = false;

            }else{
                $this->hemo = true;
                $this->hb = true;
                $this->hto = true ;
                $this->glucem = true ;
                $this->ptog = true ;
                $this->hb_glico = true ;
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
                $this->cmv_lgg = true;
                $this->cmv_lgm = true;
                $this->ag_chlamidia = true;
                $this->microplasma = true;
                $this->ureaplasma = true;
                $this->lysteria = true;
            }
        }


        /* Funcion para seleccionar Evaluacion General y Hematologica */
     public function selectGeneral(){
        if($this->e_gral == false){
            $this->hemo = false;
            $this->hb = false;
            $this->hto = false ;
            $this->glucem = false ;
            $this->ptog = false ;
            $this->hb_glico = false ;
            $this->factor_rh = false ;
            
        }else{
            $this->hemo = true;
            $this->hb = true;
            $this->hto = true ;
            $this->glucem = true ;
            $this->ptog = true ;
            $this->hb_glico = true ;
            $this->factor_rh = true ;
        }
    }

    /* Funcion para seleccionar evaluacion Renal y Urinaria */
    public function selectRenal(){
        if($this->e_renal == false){
            $this->orina = false ;
            $this->urocult = false ;

        }else{
            $this->orina = true ;
            $this->urocult = true ;
        }
    }

     /* Funcion para seleccionar Evaluacion Ginecologica */
     public function selectGine(){
        if($this->e_gine == false){
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
            $this->ag_chlamidia = false;
            $this->microplasma = false;
            $this->ureaplasma = false;

        }else{
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
            $this->ag_chlamidia = true;
            $this->microplasma = true;
            $this->ureaplasma = true;
        }
    }

     /* Funcion para seleccionar evaluacion salud */
     public function selectSalud(){
        if($this->e_salud == false){
            $this->ferritina = false ;
            $this->transferri = false ;
            $this->anti_ttg = false ;
            $this->gliadina = false ;
            $this->lysteria = false;
            $this->glucosuria = false ;

        }else{
            $this->ferritina = true ;
            $this->transferri = true ;
            $this->anti_ttg = true ;
            $this->gliadina = true ;
            $this->lysteria = true;
            $this->glucosuria = true ;
        }
    }

         /* Funcion para seleccionar evaluacion embarazo */
         public function selectEmbarazo(){
            if($this->e_embabarazo == false){
                $this->chagas = false ;
                $this->toxo = false ;
                $this->vdrl_cual = false ;
                $this->hbs_ag = false ;
                $this->hiv = false;
                $this->cmv_lgg = false ;
                $this->cmv_lgm = false ;
    
            }else{
                $this->chagas = true ;
                $this->toxo = true ;
                $this->vdrl_cual = true ;
                $this->hbs_ag = true ;
                $this->hiv = true;
                $this->cmv_lgg = true ;
                $this->cmv_lgm = true ;
            }
        }





         public function add_lab(){
<<<<<<< HEAD

            dd($this->consulta);
            $labs = [
                $this->hemo,
                $this->hb,
                $this->hto,
                $this->glucem,
                $this->ptog,
                $this->hb_glico,
                $this->grupo,
                $this->factor_rh,
                $this->orina,
                $this->urocult,
                $this->fibrino,
                $this->flujo_vag,
                $this->coagulogram,
                $this->tsh,
                $this->fsh,
                $this->lh,
                $this->dhea,
                $this->testost_l,
                $this->testost_b,
                $this->h_antimull,
                $this->glucosuria,
                $this->ferritina,
                $this->transferri,
                $this->anti_ttg,
                $this->gliadina,
                $this->chagas,
                $this->toxo,
                $this->vdrl_cual,
                $this->hbs_ag,
                $this->hiv,
            ];
            foreach($labs as $lab){
                if($lab == true){

                    $lab = new Laboratorio;
                    $lab->estado= '2';
                    $lab->save();


                }

            }
=======
          $lab = new Laboratorio;
          $lab->hemo= $this->hemo;
          $lab->hb= $this->hb;
          $lab->hto= $this->hto;
          $lab->glucem= $this->glucem;
          $lab->ptog= $this->ptog;
          $lab->hb_glico= $this->hb_glico;
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
          $lab->cmv_lgg = $this->cmv_lgg;
          $lab->cmv_lgm = $this->cmv_lgm;
          $lab->ag_chlamidia = $this->ag_chlamidia;
          $lab->microplasma = $this->microplasma;
          $lab->ureaplasma = $this->ureaplasma;
          $lab->lysteria = $this->lysteria;
          $lab->estado= '2';
          $lab->save();
>>>>>>> e802992fd6841bb2fe1f00e02790753bf7c1c181

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
