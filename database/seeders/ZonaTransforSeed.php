<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ZonaTransfor;

class ZonaTransforSeed extends Seeder
{

    public $zona_trans;
    
    public function run(): void
    {

        $zonas = [
            '(1) Union Escamocolumnar (UEC) completamente visible',
            '(2) UEC parcialmente visible',
            '(3) UEC no visible'
        ];

        foreach($zonas as $zona){
          ZonaTransfor::create ([
            'estado'=>'1',
            'descripcion'=> $zona

          ]);
        };
    }
}
