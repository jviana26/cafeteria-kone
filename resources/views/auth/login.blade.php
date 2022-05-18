@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('CAFETERIA ')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <br>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-info text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Bienvenidos a CAFETERIA.') }} <br>{{ __(' Ingresa tus datos.') }} </p>
            
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">account_circle</i>
                  </span>
                </div>
                <input type="username" name="username" class="form-control" placeholder="{{ __('Usuario...') }}"  required required autocomplete="email" autofocus>
              </div>
              @if ($errors->has('username'))
                <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
              @endif
            </div>

            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" secret" : "" }}" required required autocomplete="current-password">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="politicas"> {{ __('Politicas') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-info btn-link btn-info">{{ __('ENTRAR') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  .navbar .navbar-brand {
    position: relative;
    color: inherit;
    height: 50px;
    font-size: 2.125rem;
    font-weight: 700;
    line-height: 30px;
    padding: 0.625rem 0;
    font-weight: 300;
    margin-left: -15.5rem;
    transition: all 400ms;
}
.navbar:hover .navbar-brand {
  transform: scale(1.2,1.2)
}
</style>
@endsection

