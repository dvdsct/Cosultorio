<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['perfil_id','estado'];




    public function perfiles(){
        return $this->belongsTo(Perfil::class,'perfil_id',);
    }

    public function turnos()
    {
        return $this->hasOne(Turno::class);
    }
    
    public function medicos(){
        return $this->belongsToMany(Medico::class);

    }
}
