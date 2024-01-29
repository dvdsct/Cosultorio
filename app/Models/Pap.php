<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
    use HasFactory;

    protected $fillable = [
        'perfil_id',
        'turno_id',
        'estado',
        'tipo_muestra',
        'met_toma_mue',
        'res_vph',
        'fecha_tami',
        'fum',
        'menopausia',
        'metodo_anti_con', 'cirujias_pre',
        'causa_lesion', 'thr', 'embarazo_actual', 'trata_rad', 'quimio'
    ];


    public function turnos()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }


    public function perfiles()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}
