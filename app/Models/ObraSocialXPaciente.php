<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocialXPaciente extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'obra_social_id', 'plan', 'nro_afil', 'estado'];
    public function pacientes()
    {
        return $this->belongsToMany(Perfil::class, 'obra_social_x_pacientes', 'obra_social_id', 'paciente_id');
    }

}
