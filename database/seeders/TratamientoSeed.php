<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tratamiento;
class TratamientoSeed extends Seeder
{

    public function run(): void
    {
        $tratamientos = [

            'tipo 1',
            'tipo 2',
            'tipo 3'
          ];

          foreach($tratamientos as $t){
            Tratamiento::create([
                'estado'=>'1',
                'descripcion'=> $t
            ]);
          };
    }
}
