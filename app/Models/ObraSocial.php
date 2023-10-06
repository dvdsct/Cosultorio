<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    use HasFactory;

    public function perfiles(){
        return $this->belongsToMany(Perfil::class,'obra_social_x_perfils');
    }
}
