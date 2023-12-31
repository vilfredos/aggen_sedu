<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votante extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function mesas()
{
    return $this->belongsToMany(Mesa::class);
}
    }