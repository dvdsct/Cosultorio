<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consulta;
use App\Models\Turno;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultas=[

           '2023-07-22 12:15:32',
           '2023-10-02 15:22:52',
           '2022-08-22 07:15:09',
           '2022-08-22 09:11:00',
           '2022-08-22 16:55:33'
        ];
        $a = 1;
     foreach($consultas as $consulta){

        Turno::create([

            'perfil_id'=>$a,
            'fecha_turno'=>$consulta,
            'motivo' => 'PAP',
            'estado'=>'2'
        ]);
        Turno::create([

            'perfil_id'=>$a,
            'fecha_turno'=>$consulta,
            'motivo' => 'Colp',
            'estado'=>'2'
        ]);
        Turno::create([

            'perfil_id'=>$a,
            'fecha_turno'=>$consulta,
            'motivo' => 'Consulta',
            'estado'=>'2'
        ]);
        $a += 1 ;

     }
          Consulta::create([

        'perfil_id'=>'2',
        'fecha_consulta'=>$consultas[0],
        'estado'=>'2'
    ]);

          Consulta::create([

        'perfil_id'=>'1',
        'fecha_consulta'=>$consultas[1],
        'estado'=>'2'
    ]);

    Consulta::create([

        'perfil_id'=>'4',
        'fecha_consulta'=>$consultas[2],
        'estado'=>'2'
    ]);
    }
}
