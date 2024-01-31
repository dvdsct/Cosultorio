<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MetodoAnticonceptivo;

class MetodoAntiSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodos = [
            '-Seleccionar-',
            'Hormonal',
            'Barrera',
            'DIU',
            'Otros'
        ];

        foreach($metodos as $metodo){
            MetodoAnticonceptivo::create([
            'estado'=>'1',
            'descripcion'=> $metodo

        ]);

        };
    }
}
