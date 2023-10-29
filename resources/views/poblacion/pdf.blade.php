<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Gestion de roles</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/comite.css') }}">
    
   
    <style>
        .titulo{
            text-align: center;
            color:#0D4362;
        }
        .table{
            text-align: center;
            align-content: center;
        }
      
    </style>
</head>
<body>
  
    
    <h2 class="titulo">UNIVERSIDAD MAYOR DE SAN SIMON</h2>

    <div class="bg-white shadow p-4">
        <div class="table table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>Facultad</th>
                        <th>Tipo</th>
                        
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($votantes as $item)
                            <tr>
                                 <td>{{ $item->id}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->facultad}}</td>
                                <td>{{ $item->tipo}}</td>
                                
                               
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
 <!-- Script -->
 <script src="{{ asset('js/poblacion.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>