@extends('Home')

@section('content')
<head>
    <title>Gestion de roles</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link  href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  </head>
<div>
    <h1 class="m-3">Registrar poblacion</h1>
    <div class="card mx-3">
        <div class="card-body">
            <button id="nuevo" class="btn btn-primary btn-sm d-flex align-items-center">Nuevo</button>
    
   
<div class="form-check form-check-inline">
    <label class="form-check-label" for="inlineRadio1">Docentes</label>
    <input class="form-check-input" type="radio" name="opcion" id="inlineRadio1" value="option1">
   
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label" for="inlineRadio2">Estudiantes</label>
    <input class="form-check-input" type="radio" name="opcion" id="inlineRadio2" value="option2">
   
  </div>
  <br>
  <button id="nuevo"class="btn btn-primary btn-sm d-flex align-items-center">Nuevo
    <span class="material-symbols-outlined">
    add
    </span>
</button>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Gestionar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jorge lopez</td>
                <td>Estudiante</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Pamela Maldonado</td>
                <td>Estudiante</td>
                <td></td>
                <td></td>
            </tr>
            <!-- Puedes agregar más filas de datos aquí -->
        </tbody>
    </table>
    <button id="nuevo" class="btn btn-success btn-sm d-flex align-items-center">Descargar Lista</button>
        </div>
        
    </div>
 
</div>
@endsection