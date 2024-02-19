<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoXPersona extends Model
{
    use HasFactory;

    protected $table = 'telefono_x_personas'; // Nombre de la tabla en la base de datos

    // Relación muchos a muchos con el modelo 'Telefono'
    public function telefonos()
    {
        return $this->belongsToMany(Telefono::class, 'telefono_x_personas', 'persona_id', 'telefono_id');
    }

    // También podrías necesitar definir las claves foráneas específicamente si no siguen la convención de Laravel
    // protected $primaryKey = 'id';
    // protected $foreignKeyPersona = 'persona_id';
    // protected $foreignKeyTelefono = 'telefono_id';
}
