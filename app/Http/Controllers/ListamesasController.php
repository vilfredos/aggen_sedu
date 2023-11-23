<?php
namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Http\Controllers\Controller;

class ListamesasController extends Controller
{
    public function mostrarListadoMesas()
    {
        $mesas = Mesa::all();
        return view('listamesas', compact('mesas'));
    }
}