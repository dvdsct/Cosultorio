<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pap;

class FormPap extends Component
{
    public function add_pap(){

      Pap::create([

          'perfil_id' => '1',
          'descripcion' => '1',
          'estado' =>'1',
          'tipo_muestra' =>'1',
          'met_toma_mue' =>'1',
          'tamizaje' =>'1',
          'fecha_tami' =>'1',
          'fum' =>'1',
          'menopausia' =>'1',
          'metodo_anti_con' =>'1',
          'cirujias_pre' =>'1',
          'causa_lesion' =>'1',
          'thr' =>'1',
    	  'embarazo_actual' =>'1',
          'trata_rad' =>'1',
          'quimio' =>'1'

      ]);


    }
    public function render()
    {
        return view('livewire.form-pap');
    }
}
