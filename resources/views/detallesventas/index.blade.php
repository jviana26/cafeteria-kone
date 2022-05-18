
@extends('layouts.main', ['activePage' => 'detalles', 'titlePage' => 'Detalles Ventas'])
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
                                    <form action="/buscadordetalle" method="get">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <div class="input-group">                                             
                                                    <input type="search" class="form-control rounded" placeholder="Buscar un producto" name="texto" id="texto" />
                                                <button type="submit" class="btn btn-info">BUSCAR</button>
                                                </form>                                       
                                        </div>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="resultados" class="table"> 
                                            <thead class="text-info">
                                                <th>ID</th>
                                              
                                                <th>Detalle de ventas</th>
                                                <th>cantidad</th>
                                                <th>Total</th>
                                                <th>Pago</th>
                                                <th>Cambio</th>
                                                <th>Metodo de Pago</th>
                                                <th>Cliente</th>
                                                <th>Fecha de creacion</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($detalleventa as $detalleventas)
                                                    <tr>
                                                        <td>{{ $detalleventas->id }}</td>
                                                      
                                                        <td>{{$detalleventas->detalleventa}} 
                                                        <div class="containes">
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Ver Mas...</button>
                                                            </td>
                                                        </div>
                                                        <td>{{ $detalleventas->cantidad}}</td>
                                                        <td>{{ $detalleventas->total}}</td>
                                                        <td>{{ $detalleventas->pagado }}</td>
                                                        <td>{{ $detalleventas->cambio }}</td>
                                                        <td>{{ $detalleventas->metodo }}</td>
                                                        <td>{{ $detalleventas->cliente }}</td>
                                                        <td>{{ $detalleventas->created_at}}</td>
                                                    </tr>  
                                                    @endforeach
                                            </tbody>
                                        </table>     
                                         <!-- Modal -->
                                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalle de la Venta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                               
                                                    <table class="table">
                                                    <thead class="text-info">
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Empanada</td>
                                                            <td>2500</td>
                                                            <td>4</td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                               
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                            </div>
                                        </div>                          
                                    </div>
                                </div>
                            </div>
                            {!! $detalleventa->links() !!}

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
             fetch(`/buscadordetalleauto?texto=${document.getElementById("texto").value}`,{
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
