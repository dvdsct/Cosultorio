<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pap extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'turno_id',
        'estado',
        'tipo_muestra',
        'met_toma_mue',
        'res_vph',
        'fecha_tami',
        'fum',
        'menopausia',
        'metodo_anti_con',
        'otros_anti_con',
        'cirujias_pre',
        'causa_lesion',
        'thr',
        'embarazo_actual',
        'trata_rad',
        'quimio',
        'fecha_pp',
        'pap_previo_id',
    ];


    public function turnos()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }


    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'pap_x_medicos','pap_id');
    }



}
