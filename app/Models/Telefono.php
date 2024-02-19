<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    // Relación muchos a muchos con el modelo 'Persona' a través de 'telefono_x_personas'
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'telefono_x_personas', 'telefono_id', 'persona_id');
    }
}
