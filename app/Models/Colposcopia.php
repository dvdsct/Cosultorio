<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colposcopia extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id',
    'turno_id', 'biopsia_id', 'citologia_id', 'hallazgo_id', 'responsable', 'establecimiento', 'localidad', 'test_vph', 'observaciones', 'evaluacion', 'zona_trans', 'tratamiento', 'seguimiento','estado'];


    public function turnos(){
        return $this->belongsTo(Turno::class,'turno_id');
    }

    public function perfiles (){
        return $this->belongsTo(Perfil::class,'perfil_id');
    }

    public function pacientes()
    {

        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function citologias (){
        return $this->belongsTo(Citologia::class,'citologia_id');
    }

    public function Hallazgos (){
        return $this->belongsTo(Hallazgo::class,'hallazgo_id');
    }

}
