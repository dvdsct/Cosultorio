<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;


    public function personas()
    {

        return $this->hasOne(Persona::class, 'id');
    }

    public function obrasociales()
    {

        return $this->belongsToMany(ObraSocial::class, 'obra_social_x_perfils', 'perfil_id', 'obra_social_id');
    }

    public function consultas()
    {

        return $this->hasMany(Consulta::class);
    }
    public function embarazos()
    {

        return $this->hasMany(Embarazo::class);
    }
    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
