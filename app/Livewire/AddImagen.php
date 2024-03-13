<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Imagen;
use App\Models\ImagenXConsulta;
use App\Models\Cie10;
use Livewire\Attributes\On;
use Livewire\Attributtes\Locked;

class AddImagen extends Component
{
    public $consulta;
    public $modal  = false;
    // Categorias
    public $todas;
    public $eco;
    public $l_eco;
    public $rnm;
    public $l_rnm;
    public $tac;
    public $l_tac;

    // Tipos
    public $eco_gin;
    public $tipos;
    public $eco_obs;
    public $eco_abd;
    public $eco_tiro;
    public $rmn_pelv;
    public $tac_abd;
    public $tac_abd_cc;
    public $tac_pel;
    public $tac_pel_cc;

    public $ecografias;

    public $imgs_ped;
    public $cie10 ='1';
    public $cie10s;



    public function mount(){
        $this->cie10s = Cie10::all();
        $this->tipos = [

            [$this->eco_gin , '1'],
            [$this->eco_obs , '2'],
            [$this->eco_abd , '3'],
            [$this->eco_tiro , '4'],
            [$this->rmn_pelv , '5'],
            [$this->tac_abd , '6'],
            [$this->tac_abd_cc , '7'],
            [$this->tac_pel , '8'],
            [$this->tac_pel_cc , '9'],
        ];


    }


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
        if ($cat == 'tac') {
            $tipos = [
                $this->tac_abd,
                $this->tac_abd_cc,
                $this->tac_pel,
                $this->tac_pel_cc
            ];
            $this->vItems($tipos, $cat);
        }

        if ($cat = 'eco') {


            $ecos = [$this->eco_gin, $this->eco_obs, $this->eco_abd, $this->eco_tiro];
            $this->vItems($ecos, $cat);
        }
        if ($cat = 'rnm') {
            $rns = [$this->rmn_pelv];
            $this->vItems($rns, $cat);
        }
    }

    public function vItems($tipos, $cat)
    {

        foreach ($tipos as $e) {
            if ($e == true) {
                $this->$cat = true;
                break;
            } else {
                $this->$cat = false;
            }
        }
    }


    public function save_img()
    {   
    
        $this->tipos = [

            [$this->eco_gin , '1'],
            [$this->eco_obs , '2'],
            [$this->eco_abd , '3'],
            [$this->eco_tiro , '4'],
            [$this->rmn_pelv , '5'],
            [$this->tac_abd , '6'],
            [$this->tac_abd_cc , '7'],
            [$this->tac_pel , '8'],
            [$this->tac_pel_cc , '9'],
        ];

        foreach($this->tipos as $t){
            if($t[0] == true){
                $i =  Imagen::firstOrCreate([
                    'tipo_imagen_id' => $t[1],
                	'cie10_id' => $this->cie10,
                	'estado' => '1',

                ]);
                
                ImagenXConsulta::firstOrCreate([
                    'consulta_id'=> $this->consulta->id,
                	'imagen_id'=> $i->id,
                	'estado'=>'1',
                    
                ]);
                
            }
            
        }
        $this->modalImgOff();
        $this->dispatch('added');
    }



    public function render()
    {


        return view('livewire.add-imagen');
    }
}
