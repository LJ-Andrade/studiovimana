@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nueva Categoría')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('portfolio.index')}}">Listado de Categorías</a></li>
			<li class="breadcrumb-item active">Nueva Categoría</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Creación de Nuevo Artículo</h1>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		{!! Form::open(['route' => 'portfolio.store', 'method' => 'POST', 'files' => true, 'id' => 'NewItemForm', 'class' => 'row big-form', 'data-parsley-validate' => '']) !!}	
			@include('vadmin.portfolio.categories.form')
			<div class="row centered">
				{!! Form::submit('Agregar artículo', ['class' => 'btn btnGreen']) !!}
			</div>
		{!! Form::close() !!}
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')

@endsection


