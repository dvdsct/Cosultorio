<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PapPrevio;

class PapPrevioSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paps =[
            'No Sabe',
            'Insatisfactorio',
            'Negativo/Normal/Inflamatorio',
            'ASC/Atipia/Malignidad'
        ];

        foreach($paps as $pap){
         PapPrevio::create([

            'estado'=>'1',
            'descripcion'=> $pap
         ]);

        }

    }


}
