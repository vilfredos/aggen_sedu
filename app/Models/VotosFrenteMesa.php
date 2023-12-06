<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotosFrenteMesa extends Model
{
    public $timestamps = false;
    protected $table = 'eleccion_votosfrente_mesa';
    protected $fillable = ['id_eleccion', 'sigla_frente', 'votos_frente', 'id_mesa'];
}