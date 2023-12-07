<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotosNulosMesa extends Model
{
    public $timestamps = false;
    protected $table = 'eleccion_votosnulos_mesa';
    protected $fillable = ['id_mesa', 'id_eleccion', 'votos_nulos'];
}