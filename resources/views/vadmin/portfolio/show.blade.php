@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Perfil de Usuario')

@section('header')
    @component('vadmin.components.header')
		@slot('left')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('portfolio.index')}}">Artículos</a></li>
            <li class="breadcrumb-item active">Hoja del artículo <b></b></li>
		@endslot
		@slot('right')
		@endslot
        @slot('bottom')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <h1>{!! $article->title !!}</h1>
            @endslot
            @slot('content')
            	<p>{!! $article->content !!}</p>
            	@foreach($article->images as $image)
					<img src="{{ asset('webimages/portfolio/'.$image->name ) }}" class="img-responsive img-article" style="max-width: 200px">
				@endforeach
				<hr class="softhr">
				Slug: <span class="badge">{!! $article->slug !!}</span>
				<hr class="softhr">
				Categoría: <span class="badge">{!! $article->category->name !!}</span>
				<hr class="softhr">
				Tags:
				@foreach($article->tags as $tag)
					<span class="badge">{!! $tag->name !!}</span>
				@endforeach
				<br><br>
				<button class="btn btnGreen">Editar Artículo</button>
				
            @endslot

        @endcomponent
    </div>

@endsection



@section('custom_js')
@endsection

