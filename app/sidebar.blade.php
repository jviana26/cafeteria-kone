<div class="sidebar" data-color="azure" data-background-color="white"
    data-image="{{ asset('img/sidebar-1.jpg') }}">
    <div class="logo">
        <a href="/home" class="simple-text logo-normal"><img style="width:50px" src="{{ asset('img/logo-mini.png') }}"
                alt="">
            {{ __('Cafetería') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">search</i>
                    <p>{{ __('Buscar') }}</p>
                </a>
            </li>
            
            @can('ventas_niza')
          <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
              <a class="nav-link" href="/productos">
                  <i class="material-icons">switch_account</i> 
                  <p>{{ __('Productos SEDE Niza') }}</p>
              </a>
          </li>
         @endcan
            @can('ventas_smdl')
            <li class="nav-item{{ $activePage == 'productos2' ? ' active' : '' }}">
                <a class="nav-link" href="/productos2">
                    <i class="material-icons">switch_account</i> 
                    <p>{{ __('Productos SEDE SMDL') }}</p>
                </a>
            </li>
        @endcan
            @can('ventas_niza')
                <li class="nav-item{{ $activePage == 'venta' ? ' active' : '' }}">
                    <a class="nav-link" href="/ventas">
                        <i class="material-icons">Ventas</i> 
                        <p>{{ __('ventas SEDE Niza') }}</p>
                    </a>
                </li>
            @endcan
            @can('ventas_smdl')
            <li class="nav-item{{ $activePage == 'venta2' ? ' active' : '' }}">
                <a class="nav-link" href="/ventas2">
                    <i class="material-icons">Ventas</i> 
                    <p>{{ __('ventas SEDE SMDL') }}</p>
                </a>
            </li>
        @endcan
            @can('ventas_niza')
            <li class="nav-item{{ $activePage == 'detalles' ? ' active' : '' }}">
                <a class="nav-link" href="/detalleventas">
                    <i class="material-icons">pending_actions</i> 
                    <p>{{ __('DetallesVentas SEDE Niza') }}</p>
                </a>
            </li>
        @endcan 
        @can('ventas_smdl')
        <li class="nav-item{{ $activePage == 'detalles2' ? ' active' : '' }}">
            <a class="nav-link" href="/detalleventas2">
                <i class="material-icons">pending_actions</i> 
                <p>{{ __('DetallesVentas SEDE SMDL') }}</p>
            </a>
        </li>
    @endcan 
        </ul>
    </div>
</div>
