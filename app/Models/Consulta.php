<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [

    'temperatura',
    'fum',
    'ea',
    'tension_arterial',
    'indice_mc',
    'embarazo',
    'edad_geatacional',
    'estado'
    ];





    public function perfiles (){

        return $this->belongsTo(Perfil::class,'perfil_id');
    }

}
