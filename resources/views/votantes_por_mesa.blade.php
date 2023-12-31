@extends('Home')

@section('content')

<head>
    <link href="{{ asset('css/votosPorMesa.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class=contMesaPrincipal>

    <div class="contenerVPM">
        
        <div class="superiorVm">
            <h1 class="tituloVm">Lista de Eleccion</h1>
        </div>
        <table class="miTablaMesa">
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Comite</th>
                    <th>Frentes y Candidatos</th>
                    <th>Mesas</th>
                    <th>Papeleta</th>
                    <th>Resultados Totales</th>
                    <th>Eliminar</th>
                </tr>
            
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->id }}</td>
                    <td>{{ $dato->titulo }}</td>
                    <td>{{ $dato->descripcion }}</td>
                    <td>
                        <button class="btn_comite">
                            <i class="fa-solid fa-users"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn_frente">
                            <i class="fa-solid fa-users-viewfinder"></i>
                        </button>
                    </td>

                    <td>
                        <button class="btn_mesas" data-id="{{ $dato->id }}">
                            <i class="fa-solid fa-person-booth"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn_papeleta" data-id="{{ $dato->id }}">
                            <i class="fa-solid fa-sheet-plastic"></i>
                        </button>
                    </td>
                    <td>                        
                        <button class="btn_VOTOS" data-id="{{ $dato->id }}">
                            <i class="fa-solid fa-sheet-plastic"></i>
                        </button>
                    </td>
                    {{--<td>
                        <form action="{{ route('enviarCorreoJurados', ['id_eleccion' => $dato->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn_enviar_correo">
                                <i class="fa-solid fa-envelope"></i> Enviar Correo
                            </button>
                        </form>
                    </td>--}}
                    <td>
                    <form action="{{ route('eliminarEleccion', ['id' => $dato->id]) }}" method="post">
                        @csrf
                        @method('delete') {{-- Agrega esta línea para indicar que es una solicitud de eliminación --}}
                        <button type="submit" class="btn_eliminar" data-id="{{ $dato->id }}">
                            <i class="fas fa-trash-alt"></i> 
                        </button>
                    </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        
        <div class="btnRegistro">
            <a href="{{ url('/convocatoria') }}" class="btnConvocatoria"> Registrar Eleccion </a>
        </div>    
    
    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".btn_eliminar").click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');

        // Mostrar un cuadro de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                $(this).closest('form').submit();
            }
        });
    });
    $(document).ready(function() {
        $(".btn_informacion").click(function() {
            var id = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/informacion/' + id;
        });
    });
    $(document).ready(function() {
        $(".btn_comite").click(function() {
            var eleccionId = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/lista_comite/' + eleccionId;
        });
    });
    $(document).ready(function() {
        $(".btn_frente").click(function() {
            var sis = $(this).closest('tr').find('td:eq(0)').text();
            window.location.href = '/frente/' + sis;
        });
    });
    $(document).ready(function() {
        $(".btn_mesas").click(function() {
            var eleccionId = $(this).data('id');
            window.location.href = '/listamesas/' + eleccionId;
        });
    });
    $(document).ready(function() {
        $(".btn_papeleta").click(function() {
            var eleccionId = $(this).data('id');
            window.location.href = '/papeleta/' + eleccionId;
        });
    });
    $(document).ready(function() {
        $(".btn_VOTOS").click(function() {
            var eleccionId = $(this).data('id');
            window.location.href = '/tabla_votos/' + eleccionId;
        });
    });
    btn_papeleta

     
    
</script>
@if(session('mensaje'))
    <script>
        Swal.fire({
            title: 'Éxito',
            text: '{{ session('mensaje') }}',
            icon: 'success',
            timer: 5000,
            timerProgressBar: true,
        });
    </script>
@endif

@if(session('mensajeError'))
    <script>
        Swal.fire({
            title: 'Error',
            text: '{{ session('mensajeError') }}',
            icon: 'error',
            timer: 5000,
            timerProgressBar: true,
        });
    </script>
@endif

@endsection