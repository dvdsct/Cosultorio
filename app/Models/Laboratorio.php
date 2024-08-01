<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $fillable = ['cie10_id',
    'tipo_laboratorio_id','estado','valor','consulta_id'];


    public function tiposLaboratorios(){

        return $this->belongsTo(TipoLaboratorio::class , 'tipo_laboratorio_id');
    }
    public function consultas()
    {
        return $this->belongsTo(Consulta::class);
    }

    public function ciediez(){

        return $this->belongsTo(Cie10::class, 'cie10_id');
    }
}
