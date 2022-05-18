<div class="sidebar" data-color="azure" data-background-color="white"
    data-image="{{ asset('logo-mini.png') }}">
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
                    <i class="material-icons">storefront</i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>
            
            @can('post_index')
                <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
                    <a class="nav-link" href="/productos">
                        <i class="material-icons">shopping_bag</i> 
                        <p>{{ __('Productos') }}</p>
                    </a>
                </li>
            @endcan
            @can('post_index')
                <li class="nav-item{{ $activePage == 'venta' ? ' active' : '' }}">
                    <a class="nav-link" href="/ventas">
                        <i class="material-icons">shopping_cart</i> 
                        <p>{{ __('ventas') }}</p>
                    </a>
                </li>
            @endcan
             @can('post_index')
                <li class="nav-item{{ $activePage == 'detalles' ? ' active' : '' }}">
                    <a class="nav-link" href="/detalleventas">
                        <i class="material-icons">edit_note</i> 
                        <p>{{ __('Detalles de Ventas') }}</p>
                    </a>
                </li>
            @endcan 
            @can('post_index')
            <li class="nav-item{{ $activePage == 'detallestock' ? ' active' : '' }}">
                <a class="nav-link" href="/detallestock">
                    <i class="material-icons">pending_actions</i> 
                    <p>{{ __('Inventario') }}</p>
                </a>
            </li>
        @endcan 
        </ul>
    </div>
</div>
