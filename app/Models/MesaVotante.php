<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaVotante extends Model
{
    use HasFactory;
    protected $table = 'mesa_votante';
    protected $fillable = ['mesa_id', 'votante_id'];
    public $timestamps = false;
    // Resto del código del modelo...
}
