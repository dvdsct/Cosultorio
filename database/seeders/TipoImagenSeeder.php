<?php

namespace Database\Seeders;

use App\Models\TipoImagen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposImagen = [
            'Ecografia Ginecologica',
            'Ecografia Obstetrica',
            'Ecografia Abdominal',
            'Ecografia Tiroidea',
            'RMN Pelviana',
            'Tac Abdominal',
            'Tac Pelviana',
            'Tac abdominal con contraste',
            'Tac Pelviana con contraste',
        ];

        foreach ($tiposImagen as $tipo) {
            TipoImagen::create([
                'estado' => '1',
                'tipo_img' => $tipo,
            ]);
        }
    }
}
