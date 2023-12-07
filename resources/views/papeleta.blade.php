@extends('Home')

@section('content')
<head>
<link href="{{ asset('css/papeleta.css') }}" rel="stylesheet">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<div class="container">
<h2 style="text-align:center;">Papeleta electoral</h2>
    <table id="myTable">
    <tr>
        @foreach ($data as $frente)
        <td>
            <div>
                <h3>{{ $frente->nombre_frente }}</h3>
                @foreach ($frente->candidatos as $candidato)
                <p>{{ $candidato->cargo_postular }}<br>
                {{ $candidato->sis_candidato }}</p>
                @endforeach
                <div class="vote-box"></div>
            </div>
        </td>
        @endforeach
    </tr>
</table>
</div>
<script>
</script>
@endsection