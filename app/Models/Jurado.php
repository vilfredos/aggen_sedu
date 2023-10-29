<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    protected $table = 'Jurado';
    protected $fillable = ['nombre', 'turno', 'cargo', 'numeroMesa', 'observacion'];
}
