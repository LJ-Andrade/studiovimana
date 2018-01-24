@extends('layouts.store.main')

@section('content')

  <div class="container padding-bottom-3x mb-2 marg-top-25">
    <div class="row">
		<!-- Checkout Adress-->
		<div class="col-xl-9 col-lg-8">
			@component('layouts.store.partials.checkout-steps')
				@slot('step1status', 'active')
			@endcomponent
			<h4>Billing Address</h4>
			<hr class="padding-bottom-1x">
			<form class="row" method="POST" action="{{ route('store.checkoutCustomerData') }}">
				{{ csrf_field() }}
				<div class="col-md-6">
					<div class="form-group">
						<label>E-mail</label>
						<input class="form-control" type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nombre de Usuario</label>
						<input class="form-control" type="text" name="username" value="{{ Auth::guard('customer')->user()->username }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nombre</label>
						<input class="form-control" type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Apellido</label>
						<input class="form-control" type="text" name="surname" value="{{ Auth::guard('customer')->user()->surname }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="account-phone">Teléfono</label>
						<input class="form-control" type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Teléfono 2</label>
						<input class="form-control" type="text" name="phone2" value="{{ Auth::guard('customer')->user()->phone2 }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Dirección</label>
						<input class="form-control" type="text" name="address" value="{{ Auth::guard('customer')->user()->address }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Código Postal</label>
						<input class="form-control" type="text" name="cp" value="{{ Auth::guard('customer')->user()->cp }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Provincia</label>
						<input class="form-control" type="text" name="province_id" value="{{ Auth::guard('customer')->user()->province_id }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Localidad</label>
						<input class="form-control" type="text" name="location_id" value="{{ Auth::guard('customer')->user()->location_id }}" required>
					</div>
				</div>
				<div class="checkout-footer">
					<div class="column"><a class="btn btn-outline-secondary" href="{{ route('store.activecart') }}">
						<i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver al Carro</span></a>
					</div>
					<div class="column"><button type ="submit" class="btn btn-primary">
						<span class="hidden-xs-down">Continuar&nbsp;</span><i class="icon-arrow-right"></i></button>
					</div>
				</div>
			</form>
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