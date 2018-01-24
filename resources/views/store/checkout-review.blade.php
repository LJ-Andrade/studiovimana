@extends('layouts.store.main')

@section('content')

<div class="container padding-bottom-3x mb-2 marg-top-25">
    <div class="row">
		<!-- Checkout Adress-->
		<div class="col-xl-9 col-lg-8">
			@component('layouts.store.partials.checkout-steps')
				@slot('step4status', 'active')
			@endcomponent
			<h4>Resumen</h4>
			<hr class="padding-bottom-1x">
			<div class="table-responsive shopping-cart">
				<table class="table">
					<thead>
						<tr>
							<th>Productos</th>
							<th class="text-center">Subtotal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($activeCart['activeCart']->details as $item)
						<tr>
							<td>
								<div class="product-item">
									<a class="product-thumb" href="{{ url('tienda/articulo/'.$item->article->id) }}">
										<img src="{{ asset('webimages/catalogo/'. $item->article->thumb ) }}" alt="{{ $item->name }}">
									</a>
									<div class="product-info">
										<h4 class="product-title">
											<a href="shop-single.html">{{ $item->article->name }}<small>{{ $item->article->size }}</small></a>
										</h4>
										<span><em>Código:</em> #{{ $item->id }}</span><span><em>Talle: {{ $item->size }}</em></span>
									</div>
								</div>
							</td>
							@if($item->article->discount > 0)
								<td class="text-center text-lg text-medium">
									<del class="text-muted text-normal">$ {{ $item->article->price }}</del><br>
									$ {{ calcValuePercentNeg($item->article->price, $item->article->discount) }}
								</td>
							@else
								<td class="text-center text-lg text-medium">${{ $item->article->price }}</td>
							@endif
							
							<td class="text-center"><a class="btn btn-outline-primary btn-sm" href="cart.html">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="shopping-cart-footer">
				<div class="column"></div>
				<div class="column text-lg">Subtotal: <span class="text-medium">${{ $activeCart['cartTotal'] }}</span></div>
			</div>
			<?php $user = auth()->guard('customer')->user() ?>
			<div class="row padding-top-1x mt-3">
				<div class="col-sm-6">
					<h5>Datos de entrega:</h5>
					<ul class="list-unstyled">
					<li><span class="text-muted">Cliente: </span>{{ $user->name }} {{ $user->surname }}</li>
					<li><span class="text-muted">Dirección: </span>{{ $user->address }}</li>
					<li><span class="text-muted">Código postal: </span>{{ $user->cp }}</li>
					<li><span class="text-muted">Provincia: </span>{{ $user->province_id }}</li>
					<li><span class="text-muted">Localidad:</span> {{ $user->location_id }}</li>
					<li><span class="text-muted">E-Mail: </span>{{ $user->email }}</li>
					<li><span class="text-muted">Teléfonos: </span>{{ $user->phone }} 
						@if(auth()->guard('customer')->user()->phone2 != '')
						 // {{ auth()->guard('customer')->user()->phone2 }}
						@endif
					</li>
					<li><a href="{{ route('store.checkout') }}">Editar</a></li>
					</ul>
				</div>
				<div class="col-sm-6">
					<h5>Método de pago:</h5>
					<ul class="list-unstyled">
						<li><b>{{ $activeCart['activeCart']->payment->name	 }}:</b> % {{ $activeCart['activeCart']->payment->percent	 }}</li>
						<li><span class="text-muted"></span></li>
					</ul>
					<h5>Método de envío:</h5>
					<ul class="list-unstyled">
						<li><b>{{ $activeCart['activeCart']->shipping->name }}:</b> $ {{ $activeCart['activeCart']->shipping->price }}</li>
						<li><span class="text-muted"></span></li>
					</ul>
				</div>
			</div>
			<div class="checkout-footer">
					<div class="column"><a class="btn btn-outline-secondary"  onclick="window.history.back();">
						<i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver</span></a>
					</div>
					<div class="column"><button type ="submit" class="btn btn-primary">
						<span class="hidden-xs-down">Continuar&nbsp;</span><i class="icon-arrow-right"></i></button>
					</div>
				</div>
		</div>
		<!-- Sidebar          -->
		<div class="col-xl-3 col-lg-4">
		@include('layouts.store.partials.checkout-aside')
		</div>
	</div>
</div>

@endsection

@section('scripts')
@endsection