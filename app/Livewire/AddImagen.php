<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Imagen;
use App\Models\ImagenXConsulta;

class AddImagen extends Component
{
    public $eco_gin;
    public $eco_obs;
    public $eco_abd;
    public $eco_tiro;
    public $rmn_pelv;
    public $tac_abd;
    public $tac_pel;
    public $consulta;


    public function selectAll(){

        if($this->todas == false){
            $this-> eco_gin = false;
            $this->eco_obs = false;
            $this->eco_abd = false;
            $this->eco_tiro = false;
            $this->rmn_pelv = false;
            $this->tac_abd = false;
            $this->tac_pel = false;
        }else{
            $this-> eco_gin = true;
            $this->eco_obs = true;
            $this->eco_abd = true;
            $this->eco_tiro = true;
            $this->rmn_pelv = true;
            $this->tac_abd = true;
            $this->tac_pel = true;
        }
    }

    public function add_imag(){
        $imag = new Imagen;
        $imag->eco_gin= $this->eco_gin;
        $imag->eco_obs= $this->eco_obs;
        $imag->eco_abd= $this->eco_abd;
        $imag->eco_tiro= $this->eco_tiro;
        $imag->rmn_pelv= $this->rmn_pelv;
        $imag->tac_abd= $this->tac_abd;
        $imag->tac_pel= $this->tac_pel;
        $imag->save();

        $ixc = new ImagenXConsulta;
        $ixc->consulta_id=$this->consulta->id;
        $ixc->imagen_id=$imag->id;
        $ixc->descripcion='vacio';
        $ixc->estado='1';
        $ixc->save();
    }
    public function render()
    {
        return view('livewire.add-imagen');
    }
}
