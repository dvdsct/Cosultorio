<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_de_nacimiento', // Asegúrate de incluir este campo
        // Agrega otros campos que quieras permitir en asignación masiva
    ];

    protected $dates = ['fecha_de_nacimiento'];

    public function perfils()
    {
        return $this->hasMany(Perfil::class, 'id');
    }

    public function correos()
    {
        return $this->belongsToMany(Correo::class, 'correo_x_personas', 'persona_id', 'correo_id');
    }

    public function telefonos()
    {
        return $this->belongsToMany(Telefono::class, 'telefono_x_personas', 'persona_id', 'telefono_id');
    }

    // método de acceso para calcular y formatear la edad
    public function getEdadAttribute()
    {
        if ($this->attributes['fecha_de_nacimiento']) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['fecha_de_nacimiento'])->age . ' años';
        } else {
            return '-';
        }
    }
    
    
}
