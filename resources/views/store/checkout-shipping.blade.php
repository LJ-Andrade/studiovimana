@extends('layouts.store.main')

@section('content')

  <div class="container padding-bottom-3x mb-2 marg-top-25">
    <div class="row">
		<!-- Checkout Adress-->
		<div class="col-xl-9 col-lg-8">
				@component('layouts.store.partials.checkout-steps')
				@slot('step1', 'Datos')
				@slot('step2', 'Método de Envío')
				@slot('step3', 'Método de Pago')
				@slot('step4', 'Resumen')
				@slot('step2status', 'active')
			@endcomponent
			<h4>Selecciones un método de envío</h4>
			<hr class="padding-bottom-1x">
			<div class="table-responsive">
				<table class="table">
					<thead class="thead-default">
						<tr>
							<th>Método de envío</th>
							<th>Costo</th>
							<th>Tiempo de entrega</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
						<tr>
							<td class="align-middle"><span class="text-medium">{{ $item->name }}</span><br><span class="text-muted text-sm">{{ $item->zone }}</span></td>
							<td class="align-middle">{{ $item->price }}</td>
							<td class="align-middle">{{ $item->delivery_time }}</td>
							<td class="align-middle">{{ $item->description }}</td>
							<td class="align-middle">
								<label class="custom-control custom-radio">
									<input class="custom-control-input" name="shipping-method" checked="" type="radio"><span class="custom-control-indicator"></span>
								</label>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="checkout-footer">
				<div class="column"><a class="btn btn-outline-secondary" href="{{ route('store.checkout') }}">
					<i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver al Carro</span></a>
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