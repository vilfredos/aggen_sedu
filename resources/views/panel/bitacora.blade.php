@extends('Home')

@section('content')
    <head>
        <!-- ... -->
    </head>
    <div>
        <h1>Activity Log</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Fecha y hora</th>
                    <th>Realizado por</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->created_at }}</td>
                        <td>{{ $activity->causer->name }} ({{ $activity->causer->email }})</td>
                        <td>
                            @if($activity->description === 'Cambio de contraseña')
                                <!-- Detalles adicionales del cambio de contraseña -->
                                ...
                            @elseif($activity->description === 'Cambio de nombre')
                                <!-- Detalles adicionales del cambio de nombre -->
                               
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
