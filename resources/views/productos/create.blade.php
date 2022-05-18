@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Nuevo Producto'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('productos.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Productos</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nombre"
                                            placeholder="Ingrese su nombre" value="{{ old('nombre') }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="precio" class="col-sm-2 col-form-label">precio de compra</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="precio"
                                            placeholder="Ingrese el precio de compra si se conoce" value="{{ old('precio') }}">
                                    </div>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <a href="/productos" class="btn btn-dark">Cancelar</a>
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
