<!-- Toolbar-->
<div class="toolbar">
    <div class="inner">
        <div class="tools">
            {{--  <div class="search"><i class="icon-search"></i></div>  --}}
            @if(Auth::check())
            <div class="account"><a href="account-orders.html"></a>
                    <img src="{{ asset('images/users/'.Auth::user()->avatar ) }}" class="CheckImg" alt="">
                @if(Auth::user()->avatar)
                @else
                    <i class="icon-head"></i>
                @endif
                <ul class="toolbar-dropdown">
                    <li class="sub-menu-title"><span>Hola,</span> {{ Auth::user()->name }}</li>
                    <li><a href="account-profile.html">Perfil</a></li>
                    <li><a href="account-orders.html">Lista de Órdenes</a></li>
                    <li><a href="account-wishlist.html">Favoritos</a></li>
                    <li class="sub-menu-separator"></li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-unlock"></i> Desconectar
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>	
                        </a>
                    </li> 
                    {{ csrf_field() }}
                </ul>
            </div>
            <div class="cart"><a href="cart.html"></a><i class="icon-bag"></i><span class="count">3</span><span class="subtotal">$289.68</span>
                <div class="toolbar-dropdown">
                    <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/01.jpg" alt="Product"></a>
                        <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
                    </div>
                    <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/02.jpg" alt="Product"></a>
                        <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
                    </div>
                    <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/03.jpg" alt="Product"></a>
                        <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
                    </div>
                    <div class="toolbar-dropdown-group">
                        <div class="column"><span class="text-lg">Total:</span></div>
                        <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
                    </div>
                    <div class="toolbar-dropdown-group">
                        <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
                        <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
                    </div>
                </div>
            </div>
            @else
                <a href="{{ url('tiendalogin') }}"><button class="btn btn-outline-primary btn-sm">Ingresar</button></a>
                <a href="{{ url('tiendaregister') }}"><button class="btn btn-outline-primary btn-sm">Registrarse</button></a>
            @endif


        </div>
    </div>
</div>