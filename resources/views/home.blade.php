@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => 'Bienvenidos'])
@section('content')
    <h6 style="margin-top: 50px; margin-left:30px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
    <div class="content" style="margin-block: -40px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="row">
                                    <div class="col">
                                      <div class="card">
                                        <div class="card-body">
                                            <a href="/ventas"> <img class="card-img-top" src="{{ asset('img/01.webp') }}" alt="Card image cap" style="width: 70%" id="coffe"></a>                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
