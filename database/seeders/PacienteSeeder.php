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
            'David',
            'Nahuel',
            'Saso',
            'Valentina'
          ];
        foreach ($personas as $persona){

            Persona::create([

                'nombre'=> $persona,
                'apellido'=> 'Perez',
                'fecha_de_nacimiento'=> '1995-11-11',
                'dni'=> '3984849' +1,
                'ocupacion' => 'estudiante',
                'tipo'=> 'fisica',
                'estado'=> '1'
            ]);
        }

              Perfil::create([

                  'persona_id'=> '1',
                  'descripcion'=> 'paciente',
                  'estado'=> '1'
              ]);

              Perfil::create([

                  'persona_id'=> '2',
                  'descripcion'=> 'paciente',
                  'estado'=> '1'
              ]);

              Perfil::create([

                  'persona_id'=> '3',
                  'descripcion'=> 'paciente',
                  'estado'=> '1'
              ]);

              Perfil::create([

                  'persona_id'=> '3',
                  'descripcion'=> 'paciente',
                  'estado'=> '1'
              ]);




    }
}
