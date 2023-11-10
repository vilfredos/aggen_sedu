<div>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Facultad</th>
        <th>Tipo</th>
        <th>Cargo</th>
    </tr>
    @foreach ($jurados as $jurado)
    <tr>
        <td>{{ $jurado->id }}</td>
        <td>{{ $jurado->name }}</td>
        <td>{{ $jurado->facultad }}</td>
        <td>{{ $jurado->tipo }}</td>
        <td>{{ $jurado->cargo }}</td>
    </tr>
    @endforeach
</table>
<button wire:click="actualizarJurados">Actualizar lista de jurados</button>
</div>
