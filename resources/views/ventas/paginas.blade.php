@if (count($productos))
<form action="/ventas/agregar" method="get">
    @csrf
    <div class="table-responsive">

        <table id="resultados" class="table"> 
            <thead class="text-info">
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td> <input type="text" name="id" id="id" value="{{ $producto->id }}" readonly></td>
                    <td> <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" readonly></td>
                    <td> <input type="text" name="descripcion" id="descripcion" value="{{ $producto->descripcion }}" readonly></td>
                    <td> <input type="text" name="precio" id="precio" value="{{ $producto->precio }}" readonly></td>
                </tr>
                @endforeach
            </tbody>
        </table>                                     
    </div>
</form>
    
@endif
    
























