@if (count($detalleventa))
<table id="resultados" class="table"> 
    <thead class="text-info">
        <th>ID</th>
        <th>Detalle de ventas</th>
        <th>Pago</th>
        <th>Cambio</th>
        <th>Total</th>
    </thead>
    <tbody>
        @foreach ($detalleventa as $detalleventa)
            <tr>
                <td>{{ $detalleventa->id }}</td>
                <td>{{ $detalleventa->detalleventa }}</td>
                <td>{{ $detalleventa->pagado }}</td>
                <td>{{ $detalleventa->cambio }}</td>
                <td>{{ $detalleventa->total}}</td>
            </tr>
        @endforeach
    </tbody>
</table> 
@endif