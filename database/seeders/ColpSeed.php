<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Colposcopia;
use App\Models\Biopsia;
use App\Models\Citologia;
use App\Models\Hallazgo;
use App\Models\Tratamiento;
use App\Models\ZonaTransfor;

class ColpSeed extends Seeder
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

    public function run(): void
    {

    }
}
