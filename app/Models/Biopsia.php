<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biopsia extends Model
{
    use HasFactory;

    protected $fillable = ['negativo',
    'cin_1', 'cin_2', 'cin_3', 'cis', 'ca_invasor', 'adenocis', 'ac_invasor', 'otros', 'estado'];

}
