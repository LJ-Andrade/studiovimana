<aside class="user-info-wrapper">
    {{--  Cambiar fondo de cabecera de aside  --}}
    <div class="user-cover" style="background-image: url(img/account/user-cover-img.jpg);">
        {{--  <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div>  --}}
    </div>
    <div class="user-info">
        <div class="user-avatar"><a class="edit-avatar" href="#"></a><img src="{{ asset('images/users/'.Auth::guard('customer')->user()->avatar ) }}" alt="User"></div>
        <div class="user-data">
            <h4>{{ Auth::guard('customer')->user()->name }}</h4><span>Miembro desde {{ transDateT(Auth::guard('customer')->user()->created_at) }}</span>    
        </div>
    </div>
</aside>
<nav class="list-group">
    <a class="list-group-item justify-content-between" href="account-orders.html">
        <span><i class="icon-bag"></i>Pedidos</span><span class="badge badge-primary badge-pill">6</span>
    </a>
    <a class="list-group-item {{ Menu::activeMenu('cuenta') }}" href="{{ route('store.client-account') }}"><i class="icon-head"></i>Cuenta</a>
    <a class="list-group-item" href="account-address.html"><i class="icon-map"></i>Ubicación y Datos de Contacto</a>
    <a class="list-group-item justify-content-between {{ Menu::activeMenu('favoritos') }}" href="{{ route('store.client-wishlist') }}">
        
        <span><i class="icon-heart "></i>Favoritos</span>
        {{--  <span class="badge badge-primary badge-pill"> @if(isset($favs)) {{ $favs['articleFavs']->count() }} @else 0 @endif  --}}
        </span>
    </a>
    <a class="list-group-item justify-content-between" href="{{ route('store.client-account') }}">
        <span><i class="icon-tag"></i>Ayuda y Reclamos</span>
    </a>
    <a class="list-group-item" href="{{ route('store') }}"><i class="icon-arrow-left"></i> Volver a la Tienda</a>
</nav>