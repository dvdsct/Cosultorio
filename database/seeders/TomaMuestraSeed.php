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
            '1',
            '2',
            '3',
            '4'
        ];

        foreach($tomas as $toma)[
            'estado'=>'1',
            'descripcion'=> $toma

        ];
    }
}
