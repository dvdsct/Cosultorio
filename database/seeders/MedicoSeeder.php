<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Perfil;
use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicos = [
            ['Caceres', 'Walter', '4646135', '', '555', 'Ginecologo', 'Dr.', '3'],
            ['Ingrata', 'Maria Marta', '54846', '', '2097', 'Ginecologo', 'Dr.', '4'],
        ];

        foreach ($medicos as $m) {

            $persona = Persona::create([
                'nombre' => $m[1],
                'apellido' => $m[0],
                'dni' => $m[2],
            ]);
            $perfil = Perfil::create([
                'persona_id' => $persona->id,
                'user_id' => $m[7],

            ]);
            $med = Medico::create([
                'perfil_id' => $perfil->id,
                'matricula' => $m[4],
                'especialidad' => $m[5],
                'titulo' => $m[6],
                'estado' => '1'
            ]);
        }
    }
}
