<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
    'fecha_turno',
    'motivo',
    'paciente_id',
    'estado'
    ];

    public function abonos(){

        return $this->belongsToMany(Abono::class,'abono_x_turnos');
    }


    public function pacientes(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }


    public function colposcopias(){
        return $this->hasOne(Colposcopia::class);
    }

    public function paps(){
        return $this->hasOne(Pap::class);
    }

    public function consultas(){
        return $this->hasOne(Consulta::class);
    }
}
