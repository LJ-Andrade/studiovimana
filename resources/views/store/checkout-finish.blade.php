@extends('layouts.store.main')

@section('content')

<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="back-to-store"><a href="{{ url('tienda') }}"><i class="icon-arrow-left"></i> Volver a la tienda</a></div>
    <div class="row">

        <div class="container padding-bottom-3x mb-2">
            <div class="card text-center">
                <div class="card-block padding-top-2x">
                    <h2 class="card-title">Gracias por tu compra!</h2>
                    <h4 class="card-text">Tu pedido ya está en proceso.</h4>
                    <div class="short-divisor"><div class="inner"></div></div>
                    No te olvides de agendar el número de pedido: <b>#{{ $cart->id }}</b></p>
                    <p class="card-text">Podés revisar el estado del mismo en la <b>"Lista de Pedidos"</b> desde tu perfil<br>
                    <div class="padding-top-1x padding-bottom-1x">
                        <a class="btn btn-outline-primary" href="{{ route('store.orderInvoice', $cart->id) }}">Descargar Comprobante</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<div id="Error"></div>
@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection