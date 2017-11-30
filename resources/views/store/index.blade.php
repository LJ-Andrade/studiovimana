@extends('layouts.store.main')

@section('content')
	<!-- Page Content-->
	<div class="container padding-bottom-3x mb-1">
		<div class="row">
			<!-- Products-->
			<div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
				<!-- Shop Toolbar-->
				<div class="shop-toolbar padding-bottom-1x mb-2">
					<div class="column">
					{{-- <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>  --}}
					</div>
				</div>
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
								@if($article->thumb)
								<img src="{{ asset('webimages/catalogo/'.$article->thumb) }}" alt="Product">
								@else
								<img src="{{ asset('webimages/gen/catalog-gen.jpg') }}" alt="Product"></a>
								@endif
								<h3 class="product-title"><a href="shop-single.html">{{ $article->name }}</a></h3>
							</a>
							<h4 class="product-price">
							{{--  <del>$99.99</del>  --}}
								$ {{ $article->price }}
							</h4>
							<div class="product-buttons">
								<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
								<button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
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
	