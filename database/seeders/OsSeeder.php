<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ObraSocial;
use App\Models\ObraSocialXPerfil;
class OsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obrasociales = [
            'IOSEP',
            'OSDE',
            'OSDOP',
            'OSECAC',
            'OSFATUN',
            'OSPAT',
            'OSPE',
            'OSPEGA.P',
            'OSPIFSE',
        ];

        foreach ($obrasociales as $obrasocial){

            ObraSocial::create([

                'descripcion'=> $obrasocial,
                'estado'=> '1'
            ]);
        }

        ObraSocialXPerfil::create([

            'perfil_id'=>'1',
            'obra_social_id'=>'1',
            'plan'=>'3',
            'nro_afil'=>'509683217456',
            'descripcion'=>'1',
            'estado'=>'1'

        ]);

        ObraSocialXPerfil::create([

            'perfil_id'=>'2',
            'obra_social_id'=>'2',
            'plan'=>'3',
            'nro_afil'=>'874230561982',
            'descripcion'=>'1',
            'estado'=>'1'

        ]);

        ObraSocialXPerfil::create([

            'perfil_id'=>'3',
            'obra_social_id'=>'3',
            'plan'=>'3',
            'nro_afil'=>'362198745030',
            'descripcion'=>'1',
            'estado'=>'1'

        ]);

        ObraSocialXPerfil::create([

            'perfil_id'=>'4',
            'obra_social_id'=>'4',
            'plan'=>'3',
            'nro_afil'=>'695174802831',
            'descripcion'=>'1',
            'estado'=>'1'

        ]);
    }
}
