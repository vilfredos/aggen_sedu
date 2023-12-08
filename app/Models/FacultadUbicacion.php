<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultadUbicacion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'facultad_ubicacion';

    protected $fillable = [
        'facultad',
        'ubicacion',
        'script',
        
    ];
}
