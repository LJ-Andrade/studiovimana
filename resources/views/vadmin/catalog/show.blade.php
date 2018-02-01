@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Previsualización de Item')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('catalogo.index')}}">Listado de Items</a></li>
            <li class="breadcrumb-item active">Previsualización del Item <b></b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                </b><h1>{!! $article->name !!}</h1>
				<p class="text-muted">Código: #{!! $article->code !!} </p>
            @endslot
            @slot('content')
				<b>Descripción:</b> <p>{!! $article->description !!}</p>
				<hr class="softhr">
				<div class="row">
					<div class="col-md-3">
						<h2><i class="icon-star-full"></i> Imágen Destacada</h2>
						@if($article->thumb != '')
							<img class="Featured-Image-Container" src="{{ asset('webimages/catalogo/'.$article->thumb) }}">
						@else
							<img class="Featured-Image-Container" src="{{ asset('webimages/gen/catalog-gen.jpg') }}">
						@endif
					</div>
					<div class="col-md-9">
					@if(count($article->images) != 0 )
					<div class="actual-images horizontal-list">
						<h2>Imágenes Adicionales</h2>
						<ul>
							@foreach($article->images->reverse() as $image)
							<li id="Img{{ $image->id }}">	
								<img src="{{ asset('webimages/catalogo/'.$image->name) }}">
								<div class="overlayItemCenter">
									<i class="Delete-Product-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					@endif
					</div>
				</div>
				<hr class="softhr">
				<b>Precio:</b> <span class="custom-badge btnBlue"> $ {!! $article->price !!}</span> <br>
				<b>Descuento: </b> 
					<span class="custom-badge btnRed">
						@if($article->offer == null || $article->offer == '0')
						Sin descuento						
						@else %  {{ $article->offer }}
						@endif
					</span> 
				<br>
				<b> Precio c/ Desc.: </b> <span class="custom-badge btnGreen"> $ {{ $article->price - ($article->price * $article->offer) / 100 }}</span>
				<hr class="softhr">
				<b>Cualidades:</b>
				@foreach($article->atribute1 as $atribute1)
				<span class="custom-badge btnRed">{!! $atribute1->name !!}</span>
				@endforeach <br>
				<b>Propiedad: </b> <span class="custom-badge btnBlue">{{ $article->textile }}</span>
				<hr class="softhr">
				<b>Categoría:</b> <span class="custom-badge btnBlue">{!! $article->category->name !!}</span> |
				<b>Etiquetas:</b>
				@foreach($article->tags as $tag)
				<span class="custom-badge btnRed">{!! $tag->name !!}</span>
				@endforeach
				<hr class="softhr">
				
				<b>Url - Dirección web amigable (Slug):</b> <span class="badge">{!! $article->slug !!}</span>
				<hr class="softhr">
				<a href="{{ url('vadmin/catalogo/'.$article->id.'/edit') }}" class="btn btnGreen"><i class="icon-pencil2"></i> Editar Artículo</a> 
        	@endslot
        @endcomponent
    </div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/chosen/chosen.jquery.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/parsley.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/validation/es/parsley-es.min.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('plugins/jqueryFileUploader/jquery.fileuploader.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/vadmin-forms.js') }}" ></script>
	@include('vadmin.components.bladejs')
@endsection

@section('custom_js')
@endsection

