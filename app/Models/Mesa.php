<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $primaryKey = 'numeroMesa';
    // Otras propiedades y métodos de la clase...
    public $timestamps = false;
    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'id_eleccion');
    }
    public function frentes()
    {
        return $this->hasMany(Frente::class, 'id_eleccion');
    }
}
