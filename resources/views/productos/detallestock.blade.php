@extends('layouts.main', ['activePage' => 'detallestock', 'titlePage' => 'Inventario'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Productos</h4>
                                    <p class="card-category">Productos registrados</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="/buscadorstock2" method="get">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <div class="input-group">                                             
                                                    <input type="search" class="form-control rounded" placeholder="Buscar un producto" name="texto" id="texto" />
                                                <button type="submit" class="btn btn-info">bUSCAR</button>
                                                </form>
                                               </div> <br>                             
                                        </div>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="resultados" class="table"> 
                                            <thead class="text-info">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Precio de compra</th>
                                                <th>Precio de venta</th>
                                                <th>Stock antiguo</th>
                                                <th>Stock agregado</th>
                                                <th>Stock nuevo</th>
                                                <th>fecha de compra</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)
                                                    <tr>
                                                        <td>{{ $producto->idprod }}</td>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>{{ $producto->preciocompra }}</td>
                                                        <td>{{ $producto->precioventa }}</td>
                                                        <td>{{ $producto->stock_antiguo}}</td>
                                                        <td>{{ $producto->stock_agregar}}</td>
                                                        <td>{{ $producto->stock_agregar + $producto->stock_antiguo}}</td>
                                                        <td>{{ $producto->fecha_actualizacion}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>                                     
                                    </div>
                                </div>
                            </div>
                            {!! $productos->links() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
  
    <script>
        ///eyupp

        window.addEventListener("load",function(){
            document.getElementById("texto").addEventListener("keyup",function(){
             //console.log(document.getElementById("texto").value)
             fetch(`/buscadorauto2?texto=${document.getElementById("texto").value}`,{
                    method:'get'
                })
              .then(response => response.text() )
              .then(html => {
                  document.getElementById("resultados").innerHTML = html
              })
            })
        })
    </script>
        
@endsection
