<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocialXPerfil extends Model
{
    use HasFactory;

    protected $fillable = ['perfil_id', 'obra_social_id', 'plan', 'nro_afil', 'estado'];

    protected $table = 'obra_social_x_perfils'; // Nombre de la tabla en la base de datos

    // Relación muchos a muchos con el modelo 'Perfil'
    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'obra_social_x_perfils', 'obra_social_id', 'perfil_id');
    }
}
