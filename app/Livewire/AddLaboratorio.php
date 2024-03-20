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
    public $e_embarazo;

    public $l_gral;
    public $l_renal;
    public $l_gine;
    public $l_salud;
    public $l_embarazo;


    public $hemo;
    public $hb;
    public $hto;
    public $glucem;
    public $ptog;
    public $hb_glico;
    public $factor_rh;
    public $orina;
    public $urocult;
    public $fibrino;
    public $flujo_vag;
    public $coagulogram;
    public $tsh;
    public $fsh;
    public $lh;
    public $dhea;
    public $testost_l;
    public $testost_b;
    public $h_antimull;
    public $glucosuria;
    public $ferritina;
    public $transferri;
    public $anti_ttg;
    public $gliadina;
    public $chagas;
    public $toxo;
    public $vdrl_cual;
    public $hbs_ag;
    public $hiv;
    public $cmv_lgg;
    public $cmv_lgm;
    public $ag_chlamidia;
    public $microplasma;
    public $ureaplasma;
    public $lysteria;



    /* Funcion para seleccionar TODAS las practicas */
    public function selectAll()
    {
        if ($this->todas) {

            $this->e_gral = true;
            $this->selectGeneral();
            $this->e_renal = true;
            $this->selectRenal();

            $this->e_embarazo = true;
            $this->selectEmbarazo();
            $this->e_gine = true;
            $this->selectGine();
            $this->e_salud = true;
            $this->selectSalud();
        } else {
            $this->e_gral = false;
            $this->selectGeneral();
            $this->e_renal = false;
            $this->selectRenal();

            $this->e_embarazo = false;
            $this->selectEmbarazo();
            $this->e_gine = false;
            $this->selectGine();
            $this->e_salud = false;
            $this->selectSalud();
        }
    }

    // Funcion Seleccionar por Categoria
    // Recibe la categoría, y tras un condicional selecciona a todos los item hayados en el interior de la categoria recibida

    public function checkCat($categoria)
    {
        if ($categoria == 'general') {
            $this->selectGeneral();
        }
        if ($categoria == 'renal') {

            $this->selectRenal();
        }
        if ($categoria == 'gine') {
            $this->selectGine();
        }
        if ($categoria == 'salud') {

            $this->selectSalud();
        }
        if ($categoria == 'embarazo') {

            $this->selectEmbarazo();
        }
    }


    public function checkItem($categoria, $item)
    {

        // Categoria General por Item

        if ($categoria == 'general') {
            if ($this->$item) {

                $this->e_gral = true;
                $this->l_gral += 1;
            } else {

                $this->l_gral -= 1;
                if ($this->l_gral == 0) {

                    $this->e_gral = false;
                }
                $this->$item = false;
            }
        }


        // Categoria Renal por Item
        if ($categoria == 'renal') {

            if ($this->$item) {

                $this->e_renal = true;
                $this->l_renal += 1;
            } else {

                $this->l_renal -= 1;
                if ($this->l_renal == 0) {

                    $this->e_renal = false;
                }
                $this->$item = false;
            }
        }

        // Categoria Genecologíca por Item



        if ($categoria == 'gine') {

            if ($this->$item) {

                $this->e_gine = true;
                $this->l_gine += 1;
            } else {

                $this->l_gine -= 1;
                if ($this->l_gine == 0) {

                    $this->e_gine = false;
                }
                $this->$item = false;
            }
        }


        // Categoria Salud  por Item

        if ($categoria == 'salud') {

            if ($this->$item) {

                $this->e_salud = true;
                $this->l_salud += 1;
            } else {

                $this->l_salud -= 1;
                if ($this->l_salud == 0) {

                    $this->e_salud = false;
                }
                $this->$item = false;
            }
        }

        // Categoria Emabarazo por Item

        if ($categoria == 'embarazo') {

            if ($this->$item) {

                $this->e_embarazo = true;
                $this->l_embarazo += 1;
            } else {

                $this->l_embarazo -= 1;
                if ($this->l_embarazo == 0) {

                    $this->e_embarazo = false;
                }
                $this->$item = false;
            }
        }
    }

    /* Funcion para seleccionar Evaluacion General y Hematologica */
    public function selectGeneral()
    {
        if ($this->e_gral == false) {
            $this->hemo = false;
            $this->hb = false;
            $this->hto = false;
            $this->glucem = false;
            $this->ptog = false;
            $this->hb_glico = false;
            $this->factor_rh = false;
            $this->l_gral = 0;
        } else {
            $this->hemo = true;
            $this->hb = true;
            $this->hto = true;
            $this->glucem = true;
            $this->ptog = true;
            $this->hb_glico = true;
            $this->factor_rh = true;
            $this->l_gral = 7;
        }
    }

    /* Funcion para seleccionar evaluacion Renal y Urinaria */
    public function selectRenal()
    {
        if ($this->e_renal == false) {
            $this->orina = false;
            $this->l_renal = 0;
            $this->urocult = false;
        } else {
            $this->orina = true;
            $this->urocult = true;
            $this->l_renal = 2;
        }
    }

    /* Funcion para seleccionar Evaluacion Ginecologica */
    public function selectGine()
    {
        if ($this->e_gine == false) {
            $this->fibrino = false;
            $this->flujo_vag = false;
            $this->coagulogram = false;
            $this->tsh = false;
            $this->fsh = false;
            $this->lh = false;
            $this->dhea = false;
            $this->testost_l = false;
            $this->testost_b = false;
            $this->h_antimull = false;
            $this->ag_chlamidia = false;
            $this->microplasma = false;
            $this->ureaplasma = false;
            $this->l_gine = 0;
        } else {
            $this->fibrino = true;
            $this->flujo_vag = true;
            $this->coagulogram = true;
            $this->tsh = true;
            $this->fsh = true;
            $this->lh = true;
            $this->dhea = true;
            $this->testost_l = true;
            $this->testost_b = true;
            $this->h_antimull = true;
            $this->ag_chlamidia = true;
            $this->microplasma = true;
            $this->ureaplasma = true;
            $this->l_gine = 13;
        }
    }

    /* Funcion para seleccionar evaluacion salud */
    public function selectSalud()
    {
        if ($this->e_salud == false) {
            $this->ferritina = false;
            $this->transferri = false;
            $this->anti_ttg = false;
            $this->gliadina = false;
            $this->lysteria = false;
            $this->glucosuria = false;
            $this->l_salud = 0;
        } else {
            $this->transferri = true;
            $this->anti_ttg = true;
            $this->gliadina = true;
            $this->lysteria = true;
            $this->glucosuria = true;
            $this->ferritina = true;
            $this->l_salud = 6;
        }
    }

    /* Funcion para seleccionar evaluacion embarazo */
    public function selectEmbarazo()
    {
        if ($this->e_embarazo == false) {
            $this->chagas = false;
            $this->toxo = false;
            $this->vdrl_cual = false;
            $this->hbs_ag = false;
            $this->hiv = false;
            $this->cmv_lgg = false;
            $this->cmv_lgm = false;
            $this->l_embarazo = 0;
        } else {
            $this->chagas = true;
            $this->toxo = true;
            $this->vdrl_cual = true;
            $this->hbs_ag = true;
            $this->hiv = true;
            $this->cmv_lgg = true;
            $this->cmv_lgm = true;
            $this->l_embarazo = 7;
        }
    }





    public function add_lab()
    {
        // Categoria General
        if ($this->e_gral) {


            if ($this->hemo) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '1',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->hb) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '2',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->hto) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '3',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->glucem) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '4',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->ptog) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '5',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->hb_glico) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '6',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->factor_rh) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '7',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
        }

        // Categoria Renal
        if ($this->e_renal) {

            if ($this->orina) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '8',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->urocult) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '9',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
        }

        // Categoria Ginecologica
        if ($this->e_gine) {
            // Fibrinogeno 10
            if ($this->fibrino) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '10',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            // Exudado Vaginal y cultivo
            if ($this->flujo_vag) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '11',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            if ($this->coagulogram) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '12',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            if ($this->tsh) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '13',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->fsh) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '14',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->lh) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '15',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->dhea) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '16',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->testost_l) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '17',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->testost_b) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '18',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->h_antimull) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '19',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->ag_chlamidia) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '32',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->microplasma) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '33',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            if ($this->ureaplasma) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '34',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
        }
        // Categoria Salud
        if ($this->e_salud) {
            // Ferretina N° 20
            if ($this->ferritina) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '20',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // Transferrina N° 21
            if ($this->transferri) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '21',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // Anti TTG N° 22
            if ($this->anti_ttg) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '22',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // Gliadina N° 23
            if ($this->gliadina) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '23',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // Lysteria N° 35
            if ($this->lysteria) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '35',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            // glucosuria N° 35
            if ($this->glucosuria) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '29',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
        }

        // Categoria Embarazo
        if ($this->e_embarazo) {
            // Chagas N° 24
            if ($this->chagas) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '24',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
            // Toxoplasma N° 25
            if ($this->toxo) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '25',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // VDRL N° 26
            if ($this->vdrl_cual) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '26',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // HBS AG N° 27
            if ($this->hbs_ag) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '27',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // HIV N° 28
            if ($this->hiv) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '28',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }


            // Cmv_lgg N° 30
            if ($this->cmv_lgg) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '30',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }

            // Cmv_lgm N° 31
            if ($this->cmv_lgm) {
                $lab = Laboratorio::create([
                    'tipo_laboratorio_id' => '31',
                    'estado' => '1',
                    'cie10_id' => '1'
                ]);

                LaboratorioXConsulta::create([
                    'laboratorio_id' => $lab->id,
                    'consulta_id' => $this->consulta->id,
                    'estado' => '1',

                ]);
            }
        }

        $this->dispatch('added')->to(EnfermedadActual::class);
    }

    public function render()
    {

        

        return view('livewire.add-laboratorio');
    }
}
