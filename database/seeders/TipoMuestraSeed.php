<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoMuestra;

class TipoMuestraSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            '1',
            '2',
            '3',
            '4'
        ];

        foreach($tipos as $tipo)[
            'estado'=>'1',
            'descripcion'=> $tipo

        ];
    }
}
