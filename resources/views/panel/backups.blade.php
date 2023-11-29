@extends('Home')

@section('content')
<head>

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Aquí puedes agregar el contenido principal de tu página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
</head>
   <h4>Backups  Recovery</h4>
   <div class="card">
    <div class="table-responsive text-nowrap">
        <form action="{{ route('pages-backups-create') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Crear Nuevo Backup</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Estado</th>
                    <th>Creado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($backups as $backup)
                    <tr>
                        <td>{{ $backup->id }}</td>
                        <td>{{ $backup->status }}</td>
                        <td>{{ $backup->created_at }}</td>
                        <td>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection