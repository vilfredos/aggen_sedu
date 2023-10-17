@extends('Home')

@section('content')
<head>
    <title>Gestion de roles</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" type="text/css" href="{{ mix('css/poblacion.css') }}">

  </head>
<div>
    <h1 class="m-3">Registrar poblacion</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Importar Base de datos</div>
    
                    <div class="card-body">
                        @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        </div>
                        @endif
    
                        <form class="miFormulario ml-2"  enctype="multipart/form-data">
                            @csrf
    
                            <input type="file" name="import_file" />
    
                            <button class="btn btn-primary" type="submit">Importar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<div class="seleccion form-check form-check-inline pl-3 pr-3 pt-2 ml-5">
    <h5><strong>Elegir poblacion</strong> </h5><br>
    <label class="form-check-label" >Docentes</label>
    <input class="form-check-input" type="radio" >
   
  </div>
  <div class="form-check form-check-inline ml-5 pt -4 pl-3 pr-4 ">
    
    <label class="form-check-label" for="inlineRadio2">Estudiantes</label>
    <input class="form-check-input" type="radio" name="opcion" id="inlineRadio2" value="option2">
   
  </div>
  <br>
  
    <table class="table ml-5 p-5"  >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Facultad</th>
                <th>Tipo</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jorge lopez Perez</td>
                <td>Economia</td>
                <td>Estudiante</td>
                
            </tr>
            <tr>
                <td>Pamela Maldonado Ugarte</td>
                <td>Medicina</td>
                <td>Estudiante</td>
                
            </tr>
            <!-- Puedes agregar más filas de datos aquí -->
        </tbody>
    </table>
    <div class="btn-footer">
    <button id="nuevo" class="btn btn-danger  mr-4">Exportar Listas</button>
    <button id="nuevo" class="btn btn-success save-button " onclick=terimar_proceso()>Siguiente</button>
 
</div>
</div>
        
    </div>
    <button class="save-button" onclick="terimar_proceso()">terminar registro de eleccion</button>
</div>
<script src="{{ asset('js/poblacion.js') }}"></script>@endsection