<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotosBlancosMesa extends Model
{
    public $timestamps = false;
    protected $table = 'eleccion_votosblancos_mesa';
    protected $fillable = ['id_mesa', 'id_eleccion', 'votos_blancos'];
}