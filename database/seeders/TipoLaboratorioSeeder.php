<?php

namespace Database\Seeders;

use App\Models\TipoLaboratorio;
use Illuminate\Database\Seeder;

class TipoLaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposLaboratorio = [
            'Hemograma',
            'Hb',
            'Hto',
            'Glucemia',
            'PTOG',
            'hb Glicosilada',
            'Grupo factor RH',
            'Orina',
            'Urocultivo',
            'Fibrinogeno',
            'Exudado vaginal y cultivo',
            'Coagulograma',
            'TSH',
            'FSH',
            'LH',
            'DHEA',
            'Testosterona Libre',
            'Testosterona Biodisponible',
            'H. Antimulleriana',
            'Ferritina',
            'Transferrina',
            'Anti TTG',
            'Gliadina',
            'Chagas',
            'Toxoplasma',
            'VDRL',
            'HBsAg',
            'HIV'
        ];

        foreach ($tiposLaboratorio as $tipo) {
            TipoLaboratorio::create([

                'estado'=>'1',
                'tipo_laboratorio'=>$tipo ]);
        };
    }
}
