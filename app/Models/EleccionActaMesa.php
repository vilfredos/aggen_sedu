<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EleccionActaMesa extends Model
{
    public $timestamps = false;
    protected $table = 'eleccion_acta_mesa'; // Asegúrate de que coincide con el nombre real de tu tabla en la base de datos

    protected $fillable = ['id_eleccion', 'acta', 'id_mesa'];

    // Puedes agregar otras relaciones o métodos aquí si es necesario

    // ...
}