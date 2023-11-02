@extends('Home')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">     
    <a class="btn btn-warning" href="{{route('usuarios.create')}}">Nuevo</a>
    
   
                         
    <table class="table table-striped mt-2">
      <thead style="background-color:#6777ef;">                                     
          <th style="display: none;">ID</th>
          <th style="color:#000;">Nombre</th>
          <th style="color:#000;">E-mail</th>
          <th style="color:#000;">Rol</th>
          <th style="color:#000;">Acciones</th>                                                                   
      </thead>
      <tbody>
        @foreach ($usuarios as $usuario)
          <tr>
            <td style="display: none;">{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
              @if(!empty($usuario->getRoleNames()))
                @foreach($usuario->getRoleNames() as $rolNombre)                                       
                  <h5><span class="badge badge-dark text-dark">{{ $rolNombre }}</span></h5>
                @endforeach
              @endif
            </td>

            <td>                                  
              <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

              {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
     

      </tbody>
    </table>
         
   <!-- Centramos la paginacion a la derecha -->
   <div class="pagination justify-content-end">
    {!! $usuarios->links() !!}
  </div>     

</div>
</div>
</div>
</div>
</div>
</body>
@endsection