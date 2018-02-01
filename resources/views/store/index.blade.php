@extends('layouts.store.main')

@section('header-image')
	<div class="index-header">
		
	</div>
@endsection

@section('content')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<div class="row">
			<!-- Products-->
			<div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
				<!-- Products Grid-->
				<div class="isotope-grid cols-3 mb-2">
					<div class="gutter-sizer"></div>
					<div class="grid-sizer"></div>
					<!-- Product-->
					@foreach($articles as $article)
					<div class="grid-item">
						<div class="product-card">
							{{--  <div class="product-badge text-danger">50% Off</div>  --}}
							<a class="product-thumb" href="{{ url('tienda/articulo/'.$article->id) }}">
								<div class="inner">
									<div class="data">
										<div class="text">
											<b>Tela: </b><span class="custom-badge trans-back-lblue">{{ $article->textile }}</span> <br>
											<b>Talles: </b>
											@foreach($article->atribute1 as $atribute)
												<span class="custom-badge trans-back-lblue">{{ $atribute->name }}</span> 	
												<?php $sizes[] = $atribute->id ?>
											@endforeach
										</div>
									</div>
									@if($article->thumb)
									<img src="{{ asset('webimages/catalogo/'.$article->thumb) }}" alt="Product">
									@else
									<img src="{{ asset('webimages/gen/catalog-gen.jpg') }}" alt="Product"></a>
									@endif
								</div>
								<h3 class="product-title max-text"><a href="">{{ $article->name }}</a></h3>
							</a>
							<h4 class="product-price">
								@if($article->discount > 0)
								<del>$ {{ $article->price }}</del> $ {{ calcValuePercentNeg($article->price, $article->discount) }}
								@else
								$ {{ $article->price }}
								@endif
							</h4>
							<div class="product-buttons">
								@if(Auth::guard('customer')->check())
								{{--  Check if product is in favs  --}}
								<button class="AddToFavs btn btn-outline-secondary btn-sm-round btn-wishlist
									@if(in_array($article->id, $favs['articleFavs'])) addedToFavs @endif
									" data-id="{{ $article->id }}" data-toggle="tooltip" title="A Favoritos"><i class="icon-heart"></i>
								</button>

								<a href="{{ url('tienda/articulo/'.$article->id) }}" class="btn btn-outline-primary btn-sm">Agregar</a>

								{{--  <form class="pad0" action="{{ url('/tienda/cart') }}" method="POST">
									{{ csrf_field() }}
									<input name="article_id" type="hidden" value="{{ $article->id }}">
									<input name="quantity" type="hidden" value="1">
									<input name="discount" type="hidden" value="0">
								</form>  --}}
								@else 
									<a href="{{ route('customer.login') }}" class="btn btn-outline-secondary btn-sm-round btn-wishlist" data-toggle="tooltip" title="Agregar a Favoritos"><i class="icon-heart"></i></a>	
									<a href="{{ route('customer.login') }}" class="btn btn-outline-primary btn-sm">Agregar</a>
								@endif
							</div>
						</div>
					</div>
					{{ $article->catalogfavs }}
					@endforeach
				</div>
				<!-- Pagination-->
				{!! $articles->render() !!}
			</div>
			@include('store.components.sidebar')
		</div>
	</div>
	<div id="Error"></div>
@endsection

@section('custom_js')
	@include('store.components.bladejs')
@endsection

	