<!-- Toolbar-->
<div class="toolbar">
    <div class="inner">
        <div class="tools">
            {{--  <div class="search"><i class="icon-search"></i></div>  --}}
            @if(Auth::guard('customer')->check())
            <div class="account"><a href="#" onclick="event.preventDefault();"></a>
                    <img src="{{ asset('images/users/'.Auth::guard('customer')->user()->avatar ) }}" class="CheckImg" alt="">
                @if(Auth::guard('customer')->user()->avatar)
                @else
                    <i class="icon-head"></i>
                @endif
                <ul class="toolbar-dropdown">
                    <li class="sub-menu-title"><span>Hola,</span> {{ Auth::guard('customer')->user()->name }}</li>
                    <li><a href="{{ route('store.customer-account') }}">Cuenta</a></li>
                    <li><a href="{{ route('store.customer-orders') }}">Lista de Pedidos</a></li>
                    <li><a href="{{ route('store.customer-wishlist') }}">Favoritos</a></li>
                    <li class="sub-menu-separator"></li>
                    <li>
                        <a href="{{ route('customer.logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-unlock"></i> Desconectar
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li> 
                    {{ csrf_field() }}
                </ul>
            </div>
                @if($activeCart['activeCart'])
                <div class="cart"><a href="#" onclick="event.preventDefault();"></a><i class="icon-bag"></i><span class="count">{{ $activeCart['activeCart']->details->count() }}</span>
                    <span class="subtotal">$ {{ $activeCart['cartTotal'] }}</span>
                    <div class="toolbar-dropdown">
                        @foreach($activeCart['activeCart']->details as $detail)
                            <div class="dropdown-product-item">
                                <span class="RemoveArticleFromCart dropdown-product-remove" data-detailid="{{ $detail->id }}">
                                    <i class="icon-cross"></i></span>
                                <a class="dropdown-product-custom-thumb" href="{{ url('tienda/articulo/'.$detail->id) }}">
                                    <img src="{{ asset('webimages/catalogo/'.$detail->article->thumb) }}" alt="Product">
                                </a>
                                <div class="dropdown-product-info">
                                    <a class="dropdown-product-title" href="shop-single.html">
                                        @if(strlen($detail->article->name) > 38)
                                            {{ substr($detail->article->name, 0, 38) }}...
                                        @else
                                            {{ $detail->article->name }}
                                        @endif
                                    </a>
                                    <span class="dropdown-product-details">{{ $detail->quantity }} x {{ $detail->price }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="toolbar-dropdown-group">
                            <div class="column"><span class="text-lg">Total:</span></div>
                            <div class="column text-right"><span class="text-lg text-medium">$ {{ $activeCart['cartTotal'] }} &nbsp;</span></div>
                        </div>
                        <div class="toolbar-dropdown-group">
                            <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="{{ route('store.activecart') }}">Ver Carrito</a></div>
                            <div class="column"><a class="btn btn-sm btn-block btn-success" href="{{ route('store.checkout') }}">Checkout</a></div>
                        </div>
                    </div>
                </div>
                @else  
                <div class="cart"><a href="#"></a><i class="icon-bag"></i><span class="count">0</span>
                </div>
                @endif
            @else
                <a href="{{ route('customer.login') }}"><button class="btn btn-outline-primary btn-sm">Ingresar</button></a>
                <a href="{{ route('customer.register') }}"><button class="btn btn-outline-primary btn-sm">Registrarse</button></a>
            @endif
        </div>
    </div>
</div>