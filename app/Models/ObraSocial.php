<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
    use HasFactory;


    
    // Relación muchos a muchos con el modelo 'Perfil' a través de 'obra_social_x_perfils'
    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'obra_social_x_perfils', 'obra_social_id', 'perfil_id');
    }
}
