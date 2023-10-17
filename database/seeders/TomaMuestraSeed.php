<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TomaMuestra;

class TomaMuestraSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tomas = [
            'Espátula',
            'Cepillo',
            'Espátula y Cepillo',
            'Hisopo Liquido',
            'Sin Datos'
        ];

        foreach($tomas as $toma){
            TomaMuestra::create([
            'estado'=>'1',
            'descripcion'=> $toma
        ]);
    };
    }
}
