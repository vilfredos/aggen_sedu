<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class remplazar_jurado extends Model
{
    use HasFactory;
    protected $table = 'remplazo_jurados';
    protected $fillable = ['antiguo_sis', 'razon', 'descripcion', 'archivo', 'facultad', 'carrera', 'tipo', 'nuevo_sys'];
    public $timestamps = false;
}
