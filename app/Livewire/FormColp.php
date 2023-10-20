<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Biopsia;
use App\Models\Citologia;
use App\Models\Colposcopia;
use App\Models\Hallazgo;
use App\Models\Tratamiento;
use App\Models\ZonaTransfor;

class FormColp extends Component
{

    public $responsable_n;
    public $responsable_a;
    public $establecimiento;
    public $localidad;
    public $vph;
    public $ascus;
    public $lsil;
    public $hsil;
    public $ca;
    public $otros;
    public $observaciones;
    public $evaluacion_adec;
    public $evaluacion_inadec;
    public $zona_trans;
    public $hall_normales;
    public $anormales1;
    public $anormales2;
    public $no_especifico;
    public $sospecha_inv;
    public $hall_varios;
    public $evaluacion;
    public $negat;
    public $cin1;
    public $cin2;
    public $cin3;
    public $cis;
    public $ca_inv;
    public $adenocis;
    public $adeno_ca_inv;
    public $bio_otros;
    public $tratam;
    public $tratamientos;
    public $seguimiento;

    public $zonas;



    public function add_colp(){

        $bio = new Biopsia;
         $bio->negativo =  $this->negat ?? '1';
         $bio->cin1 =$this->cin1 ?? '1';
         $bio->cin2 =$this->cin2 ?? '1';
         $bio->cin3 =$this->cin3 ?? '1';
         $bio->cis=$this->cis ?? '1';
         $bio->ca_inv=$this->ca_inv ?? '1';
         $bio->adenocis=$this->adenocis ?? '1';
         $bio->ac_invasor=$this->adeno_ca_inv ?? '1';
         $bio->otros=$this->bio_otros ?? '1';
         $bio->estado='1';
        $bio->save();

        $cito = new Citologia;
            $cito-> asc_us= $this-> ascus ?? '1';
            $cito-> l_sil= $this-> lsil ?? '1';
            $cito-> asc_h= $this-> asch ?? '1';
            $cito-> hsil= $this-> hsil ?? '1';
            $cito->  ca= $this-> ca ?? '1';
            $cito-> otros= $this-> otros ?? '1';
            $cito-> estado= '1';
        $cito->save();


        $hallaz = new Hallazgo;
           $hallaz->normales = $this->hall_normales ?? '1';
           $hallaz->anormales_g1 = $this->anormales1 ?? '1';
           $hallaz->anormales_g2 = $this->anormales2 ?? '1';
           $hallaz->no_especifico = $this->no_especifico ?? '1';
           $hallaz->sospecha_inv = $this->sospecha_inv ?? '1';
           $hallaz->varios = $this->hall_varios ?? '1';
           $hallaz->biopsia = $this->biopsia ?? '1';
           $hallaz->ecc = $this->evaluacion ?? '1';
           $hallaz->estado = '1';
        $hallaz->save();

        $colp = new Colposcopia;
        $colp->perfil_id = '1';
        $colp->biopsia_id = $bio ->id;
        $colp->citologia_id = $cito ->id;
        $colp->hallazgo_id = $hallaz ->id;
        $colp->descripcion = 'vacio';
        $colp->estado = '1';
        $colp->tipo_muestra=$this->tipo_muestra;
        $colp->met_toma_mue=$this->toma_muestra;
        $colp->tamizaje =$this->tamizaje;
        $colp->fecha_tami = $this->fec_tam;
        $colp->fum = $this->fum;
        $colp->menopausia = $this->menop;
        $colp->metodo_anti_con=$this->metodo_anti;
        $colp->cirujias_pre=$this->ciru_prev;
        $colp->causa_lesion = $this->causales;
        $colp->thr = $this->thr;
        $colp->embarazo_actual = $this->embarazo;
        $colp->trata_rad = $this->trat_rad;
        $colp->quimio = $this->quimio;
        $colp->save();



      }
    public function render()
    {

        $this->zonas= ZonaTransfor::all();
        $this->tratamientos= Tratamiento::all();


        return view('livewire.form-colp');
    }
}
