@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Previsualización de Artículo')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('catalogo.index')}}">Artículos</a></li>
            <li class="breadcrumb-item active">Previsualización del artículo <b></b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <h1>{!! $article->name !!}</h1>
            @endslot
            @slot('content')
            	<p>{!! $article->description !!}</p>
				@component('vadmin.components.catalogactualimg')
					@slot('images')
						@foreach($article->images as $image)
						<li id="Img{{ $image->id }}" class="Edit_Actual_Image" data-imgid="{{ $image->id }}">	
							<img src="{{ asset('webimages/catalogo/'.$image->name) }}">
							<div class="overlayItemCenter"><i class="icon-ios-trash-outline"></i><i class="icon-star-full"></i></div>
						</li>
						@endforeach
					@endslot
 				@endcomponent
				<hr class="softhr">
				Slug: <span class="badge">{!! $article->slug !!}</span>
				<hr class="softhr">
				Categoría: <span class="badge">{!! $article->category->name !!}</span>
				<hr class="softhr">
				Talles:
				@foreach($article->atribute1 as $atribute1)
					<span class="custom-badge btnBlue">{!! $atribute1->name !!}</span>
				@endforeach
				<hr class="softhr">
				Etiquetas:
				@foreach($article->tags as $tag)
					<span class="custom-badge btnRed">{!! $tag->name !!}</span>
				@endforeach
				<br><br>
				<a href="{{ url('vadmin/catalogo/'.$article->id.'/edit') }}" class="btn btnGreen"><i class="icon-pencil2"></i> Editar Artículo</a> 
				
            @endslot

        @endcomponent
    </div>

@endsection



@section('custom_js')
@endsection

