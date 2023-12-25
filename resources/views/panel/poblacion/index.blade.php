@extends('Home')

@section('content')
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Gestion de roles</title>
    <link href="{{ asset('css/poblacion.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   
    <div class="px-4 mt-3 mb-3 text-center">
       
        <h6 class="display-6 fw-bold title-poblacion">Población </h6>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4 fw-bold">Importar población</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-success btn-lg px-4 gap-3" data-bs-toggle="modal" data-bs-target="#importModal">Import</button>
            <button type="button" class="btn btn-success btn-lg px-4 gap-3" data-bs-toggle="modal" data-bs-target="#importFacultadModal">Importar Ubicaciones</button>
            <a href="{{route('poblacion.pdf')}}" class="btn btn-outline-success btn-lg px-4" >Generar Pdf</a>
          </div>
        </div>
    </div>
   
    <div class="d-md-flex justify-content-md-end">
        <form action="{{ route('poblacion.index')}}" method="GET">
            <div class="btn-group">
                <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
               
                <button class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass" style="color: #e2e5e9;"></i></button>
               
            </div>
        </form>
    </div>
    <!-- DATOS TABLA -->
    <div class="">
        {{-- Mensaje de éxito --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código sis</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Facultad</th>
                    <th scope="col">Carrera</th>
                  
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($barangs as $item)
                    <tr>
                        <td>{{ $item->sis }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->ci }}</td>
                        <td>{{ $item->facultad }}</td>
                        <td>{{ $item->carrera }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        
    </div>
    

   <!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="importModalLabel">Importar población</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('votante.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Archivo excel para estudiantes</label>
                        <input type="file" class="form-control" name="file_estudiantes">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Archivo excel para docentes</label>
                        <input type="file" class="form-control" name="file_docentes">
                    </div>
                    <button class="btn btn-success" type="submit">Importar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  -->

<div class="modal fade" id="importFacultadModal" tabindex="-1" aria-labelledby="importFacultadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="importFacultadModalLabel">Importar Ubicaciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ubicacion.import') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="file_ubicacion">Archivo excel para Ubicación de Facultades</label>
                        <input type="file" class="form-control" name="file_ubicacion">
                    </div>
                    
                    <button class="btn btn-success" type="submit">Importar</button>
                </form>
            </div>
        </div>
    </div>
</div>


  

    <!-- Script -->
    <script src="{{ asset('js/poblacion.js') }}"></script>
    
</body>

@endsection