<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frente extends Model
{
    use HasFactory;
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'id_eleccion');
    }
    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'id_eleccion', 'id');
    }
}
