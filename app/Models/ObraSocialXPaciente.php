<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraSocialXPaciente extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'obra_social_id', 'plan', 'nro_afil', 'estado'];


    public function pacientes(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    
    
    }

    public function obrasocialesx(){
        return $this->belongsTo(ObraSocial::class,'obra_social_id');
    }

}
