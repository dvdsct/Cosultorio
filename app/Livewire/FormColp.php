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
    public function changeCursor()
    {
        // This method can be left empty as it's just triggered on mouseover
    }

    public $switchColp = 'custom-switch-off-danger custom-switch-on-success';

    public $responsable_n;
    public $responsable_a;
    public $establecimiento;
    public $localidad;

    public $vph='0';
    public $citologia;

    /* Citologia Variables  */
    public $ascus='';
    public $lsil='';
    public $asch='';
    public $hsil='';
    public $ca='';
    public $otros='';

    public $observaciones;
    public $e_general='0';
    public $zona_trans;

    /* Hallazgos variables */
    public $hall_normales='';
    public $anormales1='';
    public $anormales2='';
    public $no_especifico='';
    public $sospecha_inv='';
    public $hall_varios='';
    public $biopsia='';
    public $evaluacion='';
    public $schiller='';

    /* Biopsia variables */
    public $negat='';
    public $cin1='';
    public $cin2='';
    public $cin3='';
    public $cis='';
    public $ca_inv='';
    public $adenocis='';
    public $adeno_ca_inv='';
    public $bio_otros='';
    public $tratam;
    public $tratamientos;
    public $seguimiento;

    public $zonas;
    public $colpos;



    public function mount($consulta)
    {
        $this->colpos = $consulta;
        $responsableParts = explode(' ', $consulta->responsable);
        $this->responsable_n = $responsableParts[0];
        $this->responsable_a = isset($responsableParts[1]) ? $responsableParts[1] : '';
        $this->establecimiento = $consulta->establecimiento;
        $this->localidad = $consulta->localidad;

        if($this->colpos->test_vph == 1){
            $this->vph = true;
        }
        
        $citologia = Citologia::find($consulta->citologia_id);
        if ($citologia) {
            $this->ascus = (bool) $citologia->asc_us;
            $this->lsil = (bool) $citologia->l_sil;
            $this->asch = (bool) $citologia->asc_h;
            $this->hsil = (bool) $citologia->hsil;
            $this->ca = (bool) $citologia->ca;
            $this->otros = (bool) $citologia->otros;
        }
    
        $this->observaciones = $consulta->observaciones;

        if($this->colpos->evaluacion == 1)
        $this->e_general = true;

        $this->zona_trans = $consulta->zona_trans;


        $hallazgo = Hallazgo::find($consulta->hallazgo_id);
        if ($hallazgo) {
            $this->hall_normales = (bool) $hallazgo->normales;
            $this->anormales1 = (bool) $hallazgo->anormales_g1;
            $this->anormales2 = (bool) $hallazgo->anormales_g2;
            $this->no_especifico = (bool) $hallazgo->no_especifico;
            $this->sospecha_inv = (bool) $hallazgo->sospecha_inv;
            $this->hall_varios = (bool) $hallazgo->varios;
            $this->biopsia = (bool) $hallazgo->biopsia;
            $this->evaluacion = (bool) $hallazgo->ecc;
            $this->schiller = (bool) $hallazgo->test_schiller;
        }

        $biopsia = Biopsia::find($consulta->biopsia_id);
        if ($biopsia) {
            $this->negat = (bool) $biopsia->negativo;
            $this->cin1 = (bool) $biopsia->cin_1;
            $this->cin2 = (bool) $biopsia->cin_2;
            $this->cin3 = (bool) $biopsia->cin_3;
            $this->cis = (bool) $biopsia->cis;
            $this->ca_inv = (bool) $biopsia->ca_invasor;
            $this->adenocis = (bool) $biopsia->adenocis;
            $this->adeno_ca_inv = (bool) $biopsia->ac_invasor;
            $this->bio_otros = (bool) $biopsia->otros;
        }

        $this->tratam = $consulta->tratamiento;
        $this->seguimiento = $consulta->seguimiento;
    }

    public function add_colp()
    {

        $bio = new Biopsia;
        $bio->negativo =  $this->negat;
        $bio->cin_1 = $this->cin1;
        $bio->cin_2 = $this->cin2;
        $bio->cin_3 = $this->cin3;
        $bio->cis = $this->cis;
        $bio->ca_invasor = $this->ca_inv;
        $bio->adenocis = $this->adenocis;
        $bio->ac_invasor = $this->adeno_ca_inv;
        $bio->otros = $this->bio_otros;
        $bio->estado = '1';
        $bio->save();

        $cito = new Citologia;
        $cito->asc_us = $this->ascus;
        $cito->l_sil = $this->lsil;
        $cito->asc_h = $this->asch;
        $cito->hsil = $this->hsil;
        $cito->ca = $this->ca;
        $cito->otros = $this->otros;
        $cito->estado = '1';
        $cito->save();


        $hallaz = new Hallazgo;
        $hallaz->normales = $this->hall_normales;
        $hallaz->anormales_g1 = $this->anormales1;
        $hallaz->anormales_g2 = $this->anormales2;
        $hallaz->no_especifico = $this->no_especifico;
        $hallaz->sospecha_inv = $this->sospecha_inv;
        $hallaz->varios = $this->hall_varios;
        $hallaz->biopsia = $this->biopsia;
        $hallaz->ecc = $this->evaluacion;
        $hallaz->test_schiller = $this->schiller;
        $hallaz->estado = '1';
        $hallaz->save();

        $this->colpos->update([

            'responsable' => $this->responsable_n . ' ' . $this->responsable_a,
            'establecimiento' => $this->establecimiento,
            'localidad' => $this->localidad,
            'test_vph' => $this->vph,
            'citologia_id' => $cito->id,
            'observaciones' => $this->observaciones,
            'evaluacion' => $this->e_general,
            'zona_trans' => $this->zona_trans,
            'hallazgo_id' => $hallaz->id,
            'biopsia_id' => $bio->id,
            'tratamiento' => $this->tratam,
            'seguimiento' => $this->seguimiento,
            'estado' => '3'
        ]);

        if ($this->colpos->turnos) {
            $this->colpos->turnos->update([
                'estado' => '3'
            ]);
        }

        return redirect('turnos');
    }
    public function render()
    {

        $this->zonas = ZonaTransfor::all();
        $this->tratamientos = Tratamiento::all();


        return view('livewire.form-colp');
    }
}
