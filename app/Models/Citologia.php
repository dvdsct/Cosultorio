<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citologia extends Model
{
    use HasFactory;

    // Establecer la relación con Colposcopia
    public function colposcopias()
    {
        return $this->hasMany(Colposcopia::class, 'citologia_id');
    }
}