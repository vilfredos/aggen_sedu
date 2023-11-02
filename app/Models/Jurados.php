<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurados extends Model
{
    protected $table = 'jurados';
    protected $fillable = ['nombre', 'turno', 'cargo', 'numeroMesa', 'gremio'];
    public $timestamps = false;
}
