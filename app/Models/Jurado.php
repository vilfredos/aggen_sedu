<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    use HasFactory;
    protected $table = 'jurados';
    protected $primaryKey = 'sis';
    protected $fillable = ['sis', 'name', 'facultad', 'carrera', 'ci', 'cargo', 'numeroMesa', 'tipo'];
    public $timestamps = false;
}