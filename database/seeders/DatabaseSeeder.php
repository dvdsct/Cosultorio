<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(PacienteSeeder::class);
       $this->call(OsSeeder::class);
       $this->call(ConsultaSeeder::class);
       $this->call(TipoMuestraSeed::class);
       $this->call(TomaMuestraSeed::class);
       $this->call(MetodoAntiSeed::class);
       $this->call(CiruPreSeed::class);
       $this->call(CitologiaSeed::class);
       $this->call(HallazgosSeed::class);
       $this->call(TratamientoSeed::class);
       $this->call(ZonaTransforSeed::class);
       $this->call(PapPrevioSeed::class);
    }
}
