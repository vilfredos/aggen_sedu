@extends('Home')

@section('content')
<head>
    <title>Gestion de roles</title>
    <link href="{{ asset('css/poblacion.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="m-3">Registrar poblacion</h1>

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

        <!-- Selection -->
        <div class="seleccion form-check form-check-inline pl-3 pr-3 pt-2 ml-5">
            <h5><strong>Elegir poblacion</strong> </h5><br>
            <label class="form-check-label">Docentes</label>
            <input class="form-check-input" type="radio">
        </div>

        <!-- Table -->
        <table class="table ml-5 p-5">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Facultad</th>
                    <th>Tipo</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody>
                <!-- Data Rows -->
                <!-- You can add more data rows here -->
                <!-- Row 1 -->
                <tr>
                    <td>Jorge lopez Perez</td>
                    <td>Economia</td>
                    <td>Estudiante</td>
                </tr>

                <!-- Row 2 -->
                <tr>
                    <td>Pamela Maldonado Ugarte</td>
                    <td>Medicina</td>
                    <td>Estudiante</td>
                </tr>

            </tbody>
        </table>

        <!-- Footer Buttons -->
        <div class="btn-footer">
            <button id="nuevo" class="btn btn-danger  mr-4">Exportar Listas</button>
            <button id="nuevo" class="btn btn-success save-button" onclick=terimar_proceso()>Siguiente</button>
        </div>

    </div>

    <!-- Script -->
    <script src="{{ asset('js/poblacion.js') }}"></script>

@endsection