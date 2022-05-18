@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Listado de productos</h4>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="/buscador" method="get">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <div class="input-group">                                             
                                                    <input type="search" class="form-control rounded" placeholder="Buscar un producto" name="texto" id="texto" />
                                                <button type="submit" class="btn btn-info">bUSCAR</button>
                                                </form>
                                               </div> 
                                            <a href="{{ route('productos.create') }}" class="btn btn-sm btn-facebook" style="align-content:inherit">Añadir
                                                    Producto</a>                                      
                                        </div>
                                    </div>
                                    <div class="table-responsive">

                                        <table id="resultados" class="table"> 
                                            <thead class="text-info">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Precio de compra</th>
                                                <th>Precio de venta</th>
                                                <th>existencia</th>
                                                <th>fecha de creacion</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)
                                                    <tr>
                                                         <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="form-horizontal">
                                                        @csrf
                                                        @method('PUT')
                                                        <td><input class="border-0" type="text" name="idprod" id="idprod" value="{{ $producto->id }}" readonly></td>
                                                        <td><input class="border-0" type="text" name="nombre" id="" value="{{ $producto->nombre }}" readonly></td>
                                                        <td><input class="border-0" type="text" name="preciocompra" id="" value="{{ $producto->preciocompra }}"></td>
                                                        <td><input class="border-0" type="text" name="precioventa" id="" value="{{ $producto->precioventa }}"></td>
                                                        <td><input class=" border-0" type="text" name="nuevostock" id="nuevostock" value="" placeholder="{{ $producto->stock}}">
                                                            <button type="submit" class="btn btn-info" hidden>Guardar</button>
                                                            </form>
                                                        </td>
                                                        <td>{{ $producto->created_at}}</td>
                                                        <td>
                                                        </form>
                                                            <form action="{{ route('productos.destroy', $producto->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Deseas eliminar este elemento?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('productos.edit', $producto->id) }}"
                                                                    class="btn btn-info">Editar</a>
                                                                <button class="btn btn-danger" type="submit" rel="tooltip">Eliminar</button>
                                                            </form>
                                                            </td>
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
             fetch(`/buscadorauto?texto=${document.getElementById("texto").value}`,{
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
