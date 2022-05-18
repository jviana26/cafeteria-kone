@if (count($productos))
<table class="table"> 
    <thead class="text-info">
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($productos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->precio }}</td>
                <td>

                    <form action="{{ route('productos.destroy', $item->id) }}"
                        method="POST" style="display: inline-block;"
                        onsubmit="return confirm('Seguro?')">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('productos.edit', $item->id) }}"
                            class="btn btn-info">Editar</a>
                        <button class="btn btn-danger" type="submit" rel="tooltip">Eliminar</button>
                    </form>

                </td>
            </tr>

        @endforeach
    </tbody>
</table>


@endif