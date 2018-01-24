@extends('layouts.store.main')

@section('content')
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="container padding-bottom-3x mb-1">
                <h1>Pedido N° {{ $cart->id }}</h1>
        <!-- Shopping Cart-->
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Detalle</th>
                                <th class="text-center">Talle</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--  Calc  Order Total Value  --}}
                            @foreach($cart->details as $item)
                            
                            <tr id="Detail{{$item->id}}">
                                <td>
                                    <div class="product-item"><a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
                                        <img src="{{ asset('webimages/catalogo/'. $item->article->thumb ) }}" alt="{{ $item->name }}"></a>
                                        <div class="product-info">
                                        <h4 class="product-title"><a href="{{ url('tienda/articulo/'.$item->article->id) }}">{{ $item->article->name }}</a></h4>
                                        <span><em>Categoría:</em> {{ $item->article->category->name}}</span>
                                        <span><em>id de detalle:</em> #{{ $item->id }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $item->size }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-center text-lg text-medium">$ {{ $item->article->price }}</td>
                                {{--  <td class="text-center"><a class="RemoveArticleFromCart cursor-pointer" data-detailid="{{ $item->id }}"><i class="icon-cross"></i></a></td>  --}}
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart-footer">
                    {{--  <div class="column">
                        <form class="coupon-form" method="post">
                        <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required>
                        <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
                        </form>
                    </div>  --}}
                    <div class="column text-lg">Total: <span class="text-medium">$ {{ $cartTotal }}</span></div>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column">
                        <a class="btn btn-outline-secondary" href="{{ route('store') }}"><i class="icon-arrow-left"></i>&nbsp;Volver a la tienda</a>
                    </div>
                    <div class="column">
                        <a class="btn btn-outline-primary">Estado : {{ orderStatusTrd($cart->status) }}</a>
                        {{--  <a class="btn btn-primary" href="#">Actualizar Carro</a>
                        <a class="btn btn-success" href="checkout-address.html">Checkout</a>  --}}
                    </div>
                </div>
            </div>
		</div>
		<div id="Error"></div>
    </div>

@endsection

@section('custom_js')
	@include('store.components.bladejs')
@endsection