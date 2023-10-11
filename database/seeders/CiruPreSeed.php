<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CirujiasPrevias;
class CiruPreSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cirujias = [
            '1',
            '2',
            '3',
            '4'
        ];

        foreach($cirujias as $cirujia){
          CirujiasPrevias::create([
            'estado'=>'1',
            'descripcion'=> $cirujia
        ]);
        };
    }
}
