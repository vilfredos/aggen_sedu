<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function mostrarUsuarios()
    {
        $usuarios = estudiante::all(); // Suponiendo que tienes un modelo "Usuario" que representa la tabla de usuarios en tu base de datos
    
        return view('usuarios', ['usuarios' => $usuarios]);
    }
    public function inicio()
    {
        return view('usuarios');
    }
}
