@extends('Home')

@section('content')
    <!-- Aquí va el contenido específico de esta plantilla -->
    <head>
        <title>Gestion de roles</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link  href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
      </head>
        <h1 class="m-3">Gestión de Roles</h1>
        <div class="card mx-3">
            <div class="card-body">
                
                    <button id="nuevo"class="btn btn-primary btn-sm d-flex align-items-center">Nuevo
                        <span class="material-symbols-outlined">
                        add
                        </span>
                    </button>
                
                    
                <div class="search">
                   <span>Buscar: </span> <input type="text" id="busqueda" placeholder="Buscar roles de usuario...">
                </div>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Rol</th>
                        <th scope="col">Permisos</th>
                        <th scope="col">Gestionar</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>Administrador</td>
                        <td>Otto</td>
                        <td></td>
                      </tr>
                      <tr>
                        
                        <td>Jurado</td>
                        <td></td>
                        <td></td>
                      </tr>
                      
                    </tbody>
                  </table>
                  
            </div>
            </div>
        </div>
       
@endsection