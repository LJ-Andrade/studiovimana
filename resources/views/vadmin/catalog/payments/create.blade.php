@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nuevo Payment')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('payments.index')}}">Listado de Métodos de Pago</a></li>
			<li class="breadcrumb-item active">Nuevo Método de Pago</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nuevo Método de Pago</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		{!! Form::open(['route' => 'payments.store', 'method' => 'POST', 'class' => 'row big-form mw450', 'data-parsley-validate' => '']) !!}	
			@include('vadmin.catalog.payments.form')
			<div class="form-actions right">
				<a href="{{ route('payments.index')}}">
					<button type="button" class="btn btnRed">
						<i class="icon-cross2"></i> Cancelar
					</button>
				</a>
				<button type="submit" class="btn btnGreen">
					<i class="icon-check2"></i> Guardar
				</button>
			</div>
		{!! Form::close() !!}
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

