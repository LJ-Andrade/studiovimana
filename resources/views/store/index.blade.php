@extends('layouts.store.main')

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
							<a class="product-thumb" href="{{ url('producto/'.$article->id) }}">
								<div class="inner">
									<div class="data">
										<div class="text">
											<b>Tela: </b><span class="custom-badge trans-back-lblue">{{ $article->textile }}</span> <br>
											<b>Talles: </b>
											@foreach($article->atribute1 as $atribute)
												<span class="custom-badge trans-back-lblue">{{ $atribute->name }}</span> 	
											@endforeach
										</div>
									</div>
									@if($article->thumb)
									<img src="{{ asset('webimages/catalogo/'.$article->thumb) }}" alt="Product">
									@else
									<img src="{{ asset('webimages/gen/catalog-gen.jpg') }}" alt="Product"></a>
									@endif
								</div>
								<h3 class="product-title"><a href="shop-single.html">{{ $article->name }}</a></h3>
							</a>
							<h4 class="product-price">
								@if($article->offer > 0)
									<del>$ {{ $article->price }}</del> $ {{ calcValuePercentNeg($article->price, $article->offer) }}
								@else
									$ {{ $article->price }}
								@endif
							</h4>
							<div class="product-buttons">
								<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="A Favoritos"><i class="icon-heart"></i></button>
								<button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Agregar</button>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Pagination-->
				{!! $articles->render() !!}
			</div>
			@include('store.components.sidebar')
		</div>
	</div>
@endsection
	