<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function perfils (){

        return $this->hasMany(Perfil::class,'id');
    }

    public function correos()
    {

        return $this->belongsToMany(Correo::class, 'correo_x_persona', 'persona_id', 'correo_id');
    }
}
