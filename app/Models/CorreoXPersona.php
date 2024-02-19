<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorreoXPersona extends Model
{
    use HasFactory;

    protected $table = 'correo_x_personas'; // Nombre de la tabla en la base de datos

    // Definir la relación muchos a muchos con la tabla 'correos'
    public function correos()
    {
        return $this->belongsToMany(Correo::class, 'correo_x_personas', 'persona_id', 'correo_id');
    }

}
