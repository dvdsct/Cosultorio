<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // protected $table = 'personas';

    // public function perfiles()
    // {
    //     return $this->hasOne(Perfil::class);
    // }

    // public function obraSocial()
    // {
    //     return $this->hasOneThrough(
    //         ObraSocial::class,
    //         Perfil::class,
    //         'persona_id', // Clave foránea de Perfil
    //         'id', // Clave principal de Personas
    //         'id', // Clave principal de ObraSocials
    //         'obra_social_id' // Clave foránea de ObraSocialXPerfils
    //     );
    // }
}
