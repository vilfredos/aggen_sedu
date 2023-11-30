@extends('Home')

@section('content')
<head>

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Aquí puedes agregar el contenido principal de tu página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
</head>
<h1>Activity Log</h1>

<ul>
    @foreach($activities as $activity)
        <li>
            <strong>{{ $activity->causer_type }}:</strong>
            {{ $activity->description }}
            ({{ $activity->created_at->diffForHumans() }})
        </li>
    @endforeach
</ul>
@endsection