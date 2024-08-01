<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    use HasFactory;

    
    public function laboratorios()
    {
        return $this->hasMany(Laboratorio::class, 'cie10_id');
    }


    
}
