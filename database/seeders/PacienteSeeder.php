<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Perfil;

class PacienteSeeder extends Seeder
{




    public function run(): void
    {
          $personas =[
            'Eugenia',
            'Romina',
            'Marina',
            'Valentina',
            'Daniela',
            'Nahir'
          ];

        foreach ($personas as $persona){



            $p = Persona::create([

                'nombre'=> $persona,
                'apellido'=> 'Perez',
                'fecha_de_nacimiento'=> '1995-11-11',
                'dni'=> rand(20000000, 60000000),
                'ocupacion' => 'estudiante',
                'tipo'=> 'fisica',
                'estado'=> '1'
            ]);
            Perfil::create([

                'persona_id'=> $p->id,
                'descripcion'=> 'paciente',
                'estado'=> '1'
            ]);
        }








    }
}
