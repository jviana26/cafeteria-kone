@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Nuevo Producto'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('productos.update', $productoempa->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Productos</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name=""
                                            placeholder="" value="{{ old('nombre', $productoempa->id) }}" autofocus readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nombre"
                                            placeholder="Ingrese su nombre" value="{{ old('nombre', $productoempa->nombre) }}" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="precio" class="col-sm-2 col-form-label">precio de compra</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="preciocompra"
                                            placeholder="Ingrese el precio de compra"  value="{{ old('precio', $productoempa->preciocompra) }}"">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="precio" class="col-sm-2 col-form-label">precio de venta</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="precioventa"
                                            placeholder="Ingrese el precio de venta"  value="{{ old('precio', $productoempa->precioventa) }}"">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="stock" class="col-sm-2 col-form-label">existencia</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nuevostock"
                                            placeholder="{{ old('stock', $productoempa->stock) }}" value="">
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
