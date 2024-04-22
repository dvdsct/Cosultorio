<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embarazo extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id','estado','descripcion','FUM','FPP'];

    public function perfiles (){

        return $this->belongsTo(Perfil::class);
    }
}
