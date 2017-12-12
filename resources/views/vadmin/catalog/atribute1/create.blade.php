{{-- 
    modelName:       CatalogAtribute1 
    routeGroup:      
    viewName:        catalog-atribute1
    viewTemplateDir: vadmin\catalog.catalog-atribute1
    cudeNameCap:     Catalogatribute1
    crudName:        catalogatribute1
--}}

@extends('layouts.vadmin.main')
@section('title', 'VADmin | Nuevo Talle')

@section('styles')
@endsection

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
			<li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="{{ route('cat_atribute1.index')}}">Listado de talles</a></li>
			<li class="breadcrumb-item active">Nuevo talle</li>
		@endslot
		@slot('actions')
			<div class="list-actions">
				<h1>Nuevo Talle</h1>
			</div>
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="inner-wrapper">
		<div class="row">
			<div class="col-md-5">
				{!! Form::open(['route' => 'cat_atribute1.store', 'method' => 'POST', 'class' => 'row big-form mw450', 'data-parsley-validate' => '']) !!}	
					@include('vadmin.catalog.atribute1.form')
					<div class="form-actions right">
						<a href="{{ route('cat_atribute1.index')}}">
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
			<div class="col-md-7">
				@component('vadmin.components.infoContainer')
					@slot('text')
					Agregue los <b>talles</b> correspondientes a sus modelos. <br>
					Luego saldrán en el catálogo sobre la imágen del producto y a su vez los usuarios podrán filtrar los artículos por talle. <br><br>
					<b>Ejemplos de talles:</b> S, SM, X, XL, etc. 
					@endslot
				@endcomponent
			</div>
		</div>
	</div>  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
@endsection

@section('custom_js')
	<script>
		$('.CatalogAtribute1Li').addClass('open');
		$('.CatalogAtribute1New').addClass('active');
	</script>
@endsection