<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['perfil_id', 'estado'];




    public function perfiles()
    {
        return $this->belongsTo(Perfil::class,'perfil_id');
    }

    public function turnos()
    {
        return $this->hasOne(Turno::class);
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }

    public function obrasociales()
    {

        return $this->belongsToMany(ObraSocial::class, 'obra_social_x_pacientes');
    }
    public function consultas()
    {

        return $this->hasMany(Consulta::class);
    }
    public function colposcopias()
    {

        return $this->hasMany(Colposcopia::class);
    }
    public function paps()
    {

        return $this->hasMany(Pap::class);
    }
}
