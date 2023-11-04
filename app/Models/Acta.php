<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'nombre_mesa', 'resultados', 'observaciones'];
    
}
