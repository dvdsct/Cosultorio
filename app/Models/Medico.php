<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function perfiles(){
        return $this->belongsTo(Perfil::class,'perfil_id',);
    }

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'consultas_x_medicos');
    }
}
