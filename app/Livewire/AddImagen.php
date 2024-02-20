<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Imagen;
use App\Models\ImagenXConsulta;
use Livewire\Attributes\On;
use Livewire\Attributtes\Locked;

class AddImagen extends Component
{
    public $consulta;
    public $modal  = false;
    public $todas;
    public $eco;
    public $rnm;
    public $tac;
    public $tipos;
    public $eco_gin;
    public $eco_obs;
    public $eco_abd;
    public $eco_tiro;
    public $rmn_pelv;
    public $tac_abd;
    public $tac_abd_cc;
    public $tac_pel;
    public $tac_pel_cc;

    public $ecografias;




    /* Funcion que selecciona las Ecografias */

    #[On('modalImgOn')]
    public function modalImgOn()
    {
        $this->modal = true;
    }

    #[On('modalImgOff')]
    public function modalImgOff()
    {
        $this->modal = false;
    }

    // Selects

    public function selectAll()
    {
        if ($this->todas == true) {
            $this->eco = true;
            $this->tac = true;
            $this->rnm = true;
            $this->selectCat('eco');
            $this->selectCat('tac');
            $this->selectCat('rnm');
        } else {
            $this->eco = false;
            $this->tac = false;
            $this->rnm = false;
            $this->selectCat('eco');
            $this->selectCat('tac');
            $this->selectCat('rnm');
        }
    }

    public function selectCat($cat)
    {


        if ($cat == 'eco') {

            if ($this->eco == false) {
                $this->eco_gin = false;
                $this->eco_obs = false;
                $this->eco_abd = false;
                $this->eco_tiro = false;
            } else {
                $this->eco_gin = true;
                $this->eco_obs = true;
                $this->eco_abd = true;
                $this->eco_tiro = true;
            }
        }
        if ($cat == 'tac') {

            if ($this->tac == false) {

                $this->tac_abd = false;
                $this->tac_pel = false;
                $this->tac_abd_cc = false;
                $this->tac_pel_cc = false;
            } else {

                $this->tac_abd = true;
                $this->tac_pel = true;
                $this->tac_abd_cc = true;
                $this->tac_pel_cc = true;
            }
        }
        if ($cat == 'rnm') {

            if ($this->rnm == false) {

                $this->rmn_pelv = false;
            } else {

                $this->rmn_pelv = true;
            }
        }
    }


    public function checkItem($cat, $item)
    {


        if ($this->$item = false) {
            $this->$cat = false;
        } else {


            $this->$cat = true;
        }
    }








    
    /* Funcion que selecciona Resonancia Magnética */


    /* Funcion que selecciona las Tomografías  */



    public function render()
    {


        return view('livewire.add-imagen');
    }
}
