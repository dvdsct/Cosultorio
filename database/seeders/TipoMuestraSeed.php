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
            '-Seleccionar-',
            'Exocervical (C)',
            'Endocervical (E)',
            'Exo y Endo Cervical (CE)',
            'Cúpula Vaginal'
        ];

        foreach($tipos as $tipo){
          TipoMuestra::create([

            'estado'=>'1',
            'descripcion'=> $tipo ]);
        };
    }
}
