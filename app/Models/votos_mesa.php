<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class votos_mesa extends Model
{
    use HasFactory;
    protected $table = 'registro_votos_por_mesa';
    protected $fillable = [
        'num_mesa',
        'votos_FR',
        'votos_UXSS',
        'votos_PSS',
        'votos_blancos',
        'votos_nulos',
        'votos_totales'
    ];   
     public $timestamps = false;
}
