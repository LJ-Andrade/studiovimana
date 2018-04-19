@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Creación de Usuario')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Listado de Usuarios</a></li>
            <li class="breadcrumb-item active">Nuevo Usuario</li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="row">
		@component('vadmin.components.container')
			@slot('title', 'Creación de Usuario')
			@slot('content')
			<form class="form" method="POST" action="{{ route('users.store') }}">
				{{ csrf_field() }}
				@include('vadmin.users.form')
				<div class="form-actions right">
					<a href="{{ route('users.index')}}">
						<button type="button" class="btn btnRed">
							<i class="icon-cross2"></i> Cancelar
						</button>
					</a>
					<button type="submit" class="btn btnGreen">
						<i class="icon-check2"></i> Guardar
					</button>
				</div>
            </form>
			@endslot
		@endcomponent
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')
	<script>
		$('.UsersLi').addClass('open');
		$('.UsersNew').addClass('active');
	</script>
@endsection