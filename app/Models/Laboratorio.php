<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $fillable = ['cie10_id',
    'tipo_laboratorio_id','estado','valor'];


    public function tiposLaboratorios(){

        return $this->belongsTo(TipoLaboratorio::class , 'tipo_laboratorio_id');
    }

    public function consultas(){

        return $this->belongsToMany(Consulta::class, 'laboratorio_x_consultas');
    }

    public function ciediez(){

        return $this->belongsTo(Cie10::class, 'cie10_id');
    }
}
