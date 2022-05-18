@extends('layouts.main', ['activePage' => 'reportespdf', 'titlePage' => 'Reportes PDF SEDE SMDL'])
@section('content')
<h6 style="margin-top: 50px; margin-left:30px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
<div class="content" style="margin-bottom: -160px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <form action="/ventas/agregar" method="get">
                        <div class="row">
                            <div class="col-12 text-right">
                                <div class="input-group">                                             
                                        <input type="search" class="form-control rounded mt-4" placeholder="Buscar un producto" name="texto" id="texto" />
                                    <button type="submit" class="btn btn-info mt-4">bUSCAR</button>
                                </div>
                            </div>
                   </form>
                  </div>
                </div> 
        </div>
    </div>
</div>
                   
@endsection
