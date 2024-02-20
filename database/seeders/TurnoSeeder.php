<?php

namespace Database\Seeders;

use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();

        // Establecer la hora en 00:00:00
        $date->startOfDay();

        // Agregar un número aleatorio de segundos al día


        // Obtener la hora del día aleatoria
        $ls = ['1','2','3','1','2','1'];

        foreach($ls as $l){
            Turno::create([


                'perfil_id' => $l,
                'motivo' => random_int(1, 3),
                'estado' => '2',

                'fecha_turno' => $date->addSeconds(random_int(0, 36000)),

            ]);

        }

    }
}
