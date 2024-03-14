<?php

namespace Database\Seeders;

use App\Models\Colposcopia;
use App\Models\Consulta;
use App\Models\Pap;
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
            $ft = $date->addSeconds(random_int(0, 36000));
            $x = random_int(1, 2);

            $t = Turno::create([


                'perfil_id' => $l,
                'motivo' => $x,
                'estado' => '2',

                'fecha_turno' => $ft,

            ]);
            if($x == '3'){

                Consulta::create([
                    'perfil_id'=> $l,
                    'turno_id'=>$t->id,
                    'estado'=>'2'
                ]);
            }
            if($x == '2'){

                Colposcopia::create([
                    'perfil_id'=> $l,
                    'turno_id'=>$t->id,
                    'estado'=>'2'
                ]);
            }
            if($x == '1'){

                Pap::create([
                    'perfil_id'=> $l,
                    'turno_id'=>$t->id,
                    'estado'=>'2'
                ]);
            }


        }

    }
}
