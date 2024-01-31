<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ZonaTransfor;

class ZonaTransforSeed extends Seeder
{

  public $zona_trans;

  protected $listeners = ['resetZonaTrans'];

  public function resetZonaTrans()
  {
    $this->zona_trans = '-Seleccionar-';
  }

  public function run(): void
  {

    $zonas = [
      '-Seleccionar-',
      '(1) Union Escamocolumnar (UEC) completamente visible',
      '(2) UEC parcialmente visible',
      '(3) UEC no visible'
    ];

    foreach ($zonas as $zona) {
      $estado = $zona === '-Seleccionar-' ? null : '1';
      
      ZonaTransfor::firstOrCreate([
        'descripcion' => $zona
      ], [
        'estado' => '1',
      ]);
    }
  }
}
