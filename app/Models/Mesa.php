<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $primaryKey = 'numeroMesa'; // Nombre de tu columna de identificación
    public $incrementing = true; // Si tu columna de identificación es autoincremental
    protected $keyType = 'int';
    protected $table = 'mesas';

    protected $fillable = ['numeroMesa', 'recinto', 'aula', 'facultad', 'carrera', 'tipo', 'ubicacion','capMaxima'];
    public $timestamps = false;
    public function votantes()
    {
        return $this->belongsToMany(Votante::class);
    }
}
