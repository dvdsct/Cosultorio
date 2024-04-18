<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;

    protected $fillable = ['direccion', 'estado'];

    // Relación muchos a muchos con el modelo 'Persona' a través de 'correo_x_personas'
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'correo_x_personas', 'correo_id', 'persona_id');
    }
}
