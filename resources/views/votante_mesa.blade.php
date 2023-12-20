@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/votosMesa.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<div class=contvotosMesaPrincipal>

    <div class="contenerVM">
        
        <div class="superiorVm">
            <h1 class="tituloVm">Votantes</h1>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SIS</th>
                    <th>Nombre</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>CI</th>
                    <th>Numero Mesa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $votante)
                    <tr>
                        <td>{{ $votante->sis }}</td>
                        <td>{{ $votante->name }}</td>
                        <td>{{ $votante->facultad }}</td>
                        <td>{{ $votante->carrera }}</td>
                        <td>{{ $votante->ci }}</td>
                        <td>{{ $votante->id_mesa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection