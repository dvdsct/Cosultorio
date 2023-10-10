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
            '1',
            '2',
            '3',
            '4'
        ];

        foreach($metodos as $metodo)[
            'estado'=>'1',
            'descripcion'=> $metodo

        ];
    }
}
