@extends('layouts.store.main')

@section('content')
	<div class="container padding-bottom-3x mb-1 marg-top-25">
		<div class="row">
			<div class="col-md-6">
				<div class="product-gallery"><span class="product-badge text-danger">@if($article->offer > 0) DESCUENTO % {{ $article->offer }}!! @endif</span>
					<div class="gallery-wrapper">
						@foreach($article->images as $index => $image)
						<div class="gallery-item {{ $index == 0 ? 'active' : '' }}"><a href="{{ asset('webimages/catalogo/'. $image->name) }}" data-hash="{{ $image->id }}" data-size="1000x1000"></a></div>
						@endforeach
					</div>
					<div class="product-carousel owl-carousel">
						@foreach($article->images as $image)
							<div data-hash="{{ $image->id }}"><img src="{{ asset('webimages/catalogo/'. $image->name) }}" alt="Product"></div>
						@endforeach
					</div>
					<ul class="product-thumbnails">
						@foreach($article->images as $image)
							<li class=""><a href="#{{ $image->id }}"><img src="{{ asset('webimages/catalogo/'. $image->name) }}" alt="Product"></a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-md-6">
				<div class="padding-top-2x mt-2 hidden-md-up"></div>
				{{--  Reviews Not Implemented  --}}
				{{--  <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
					<i class="icon-star filled"></i><i class="icon-star"></i>
				</div>  --}}
				{{--  <span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span>  --}}
				
				{{--  Article Name  --}}
				<h2 class="padding-top-1x text-normal">{{ $article->name }}</h2>

				{{--  Article Price and Discount  --}}
				@if($article->discount > 0)
					<span class="h2 d-block">
						<del class="text-muted text-normal">$ {{ $article->price }}</del>
						&nbsp; ${{ calcValuePercentNeg($article->price, $article->discount) }}
					</span>
				@else
					<span class="h2 d-block">$ {{ $article->price }}</span>
				@endif
			
				{{--  Article Description  --}}
				<p>{{ strip_tags($article->description) }}</p>
				<div class="row margin-top-1x">
					{{--  Sizes  --}}
					<div class="col-sm-4">
						<div class="form-group">
							<label for="size">Talle</label>
							<select class="form-control" id="SelectedSize">
							@foreach($article->atribute1 as $atribute)
								<option value="{{ $atribute->name }}">{{ $atribute->name }}</option>
							@endforeach
							</select>
						</div>
					</div>
					{{--  Quantity  --}}
					<div class="col-sm-3">
						<div class="form-group">
							<label for="quantity">Cantidad</label>
							<input id="SelectedQuantity" class="form-control" type="number" min="1" value="1">
						</div>
					</div>
					{{--  <div class="col-sm-5">
						<div class="form-group">
							<label for="color">Choose color</label>
							<select class="form-control" id="color">
							<option>White/Red/Blue</option>
							<option>Black/Orange/Green</option>
							<option>Gray/Purple/White</option>
							</select>
						</div>
					</div>  --}}
				</div>
				<div class="pt-1 mb-2"><span class="text-medium">Código:</span> #{{ $article->id }}</div>
				<div class="padding-bottom-1x mb-2"><span class="text-medium">Categoría:&nbsp;</span>
					<a class="navi-link" href="#">{{ $article->category->name }}</a>
				</div>
				<hr class="mb-3">
				<div class="d-flex flex-wrap justify-content-between">
					<div class="entry-share mt-2 mb-2"><span class="text-muted">Compartir:</span>
						<div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
					</div>
					<div class="sp-buttons mt-2 mb-2">
						<button class="AddToFavs btn btn-outline-secondary btn-sm btn-wishlist
							@if($isFav) addedToFavs @endif" data-id="{{ $article->id }}" data-toggle="tooltip" title="Agregar a Favoritos">
							<i class="icon-heart"></i>
						</button>
						<button id="AddArticleToCart" type="button" class="btn btn-outline-primary btn-sm" data-articleid="{{ $article->id }}">Agregar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<!-- Photoswipe container // This Shows Big Image Preview -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="pswp__bg"></div>
			<div class="pswp__scroll-wrap">
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>
				<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
					<button class="pswp__button pswp__button--share" title="Share"></button>
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="Error"></div>
	@endsection
	
	@section('custom_js')
		@include('store.components.bladejs')
	@endsection

	@section('scripts')
		<script>
			
		</script>
	@endsection