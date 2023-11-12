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
    {{---mesagge success--}}
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success')}}
            </div>
        @endif

     
           
                <table  class="table table-striped ">
                    <thead>
                        <tr>
                            
                            <th scope="col"> Codigo sis</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Carnet</th>
                            <th scope="col">Facultad</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Tipo</th>
                           
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        
                        @foreach ($barangs as $item)
                                <tr>
                                  
                                     <td>{{ $item->sis}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->ci}}</td>
                                    <td>{{ $item->facultad}}</td>
                                    <td>{{ $item->carrera}}</td>
                                    <td>{{ $item->tipo}}</td>
                                   
                                </tr>
                            @endforeach
                    </tbody>
                </table>
           <div class="d-flex justify-content-end">
            {{ $barangs->links() }}
           </div>
        
   </div>

   <!-- Modal Import -->
   <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="importModalLabel">Importar poblacion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('votante.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Archivo excel</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <button class="btn btn-success" type="submit">Import</button>
            </form>
            
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-success btn-lg px-4 gap-3 save-button" onclick="terimar_proceso()">Siguiente</button>

    <!-- Script -->
    <script src="{{ asset('js/poblacion.js') }}"></script>
</body>
@endsection