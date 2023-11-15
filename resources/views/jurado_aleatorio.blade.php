@extends('Home')

@section('content')
<table>
        <tr>
            <th>SIS</th>
            <th>Nombre</th>
            <th>Facultad</th>
            <th>Carrera</th>
            <th>Ci</th>
            <th>Gremio</th>
            <th>Cargo</th>
        </tr>
        @if (!empty($jurados))
            @foreach ($jurados as $jurado)
                <tr>
                    <td>{{ $jurado->sis }}</td>
                    <td>{{ $jurado->name }}</td>
                    <td>{{ $jurado->facultad }}</td>
                    <td>{{ $jurado->carrera }}</td>
                    <td>{{ $jurado->ci }}</td>
                    <td>{{ $jurado->tipo }}</td>
                    <td>{{ $jurado->cargo }}</td>
                </tr>
            @endforeach
        @endif
    </table>


    <form class="jurrr" action="/jurado_aleatorio" method="post">
    @csrf
    @foreach ($jurados as $index => $jurado)
        <input type="hidden" name="jurados[{{ $index }}][sis]" value="{{ $jurado->sis }}">
        <input type="hidden" name="jurados[{{ $index }}][nombre]" value="{{ $jurado->nombre }}">
        <input type="hidden" name="jurados[{{ $index }}][facultad]" value="{{ $jurado->facultad }}">
        <input type="hidden" name="jurados[{{ $index }}][carrera]" value="{{ $jurado->carrera }}">
        <input type="hidden" name="jurados[{{ $index }}][ci]" value="{{ $jurado->ci }}">
        <input type="hidden" name="jurados[{{ $index }}][gremio]" value="{{ $jurado->gremio }}">
        <input type="hidden" name="jurados[{{ $index }}][cargo]" value="{{ $jurado->cargo }}">
    @endforeach
    <input type="submit" value="Guardados Jurados">
</form>
<button id="refreshButton">Elegir otros jurados</button>
<script>
    document.getElementById('refreshButton').addEventListener('click', function() {
        location.reload();
    });
</script>
@endsection