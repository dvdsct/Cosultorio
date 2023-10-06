<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;


    public function personas (){

        return $this->hasOne(Persona::class);
    }

    public function obrasociales (){

        return $this->belongsToMany(ObraSocial::class,'obra_social_x_perfils');
    }


}
