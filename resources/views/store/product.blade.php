@extends('layouts.store.main')

@section('content')
	<div class="container padding-bottom-3x mb-1">
		<div class="row">
			<div class="col-md-6">
				<div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
					<div class="gallery-wrapper">
						<div class="gallery-item active"><a href="{{ asset('webimages/catalogo/12-0.jpg') }}" data-hash="one" data-size="1000x667"></a></div>
						<div class="gallery-item"><a href="img/shop/single/02.jpg" data-hash="two" data-size="1000x667"></a></div>
						<div class="gallery-item"><a href="img/shop/single/03.jpg" data-hash="three" data-size="1000x667"></a></div>
						<div class="gallery-item"><a href="img/shop/single/04.jpg" data-hash="four" data-size="1000x667"></a></div>
						<div class="gallery-item"><a href="img/shop/single/05.jpg" data-hash="five" data-size="1000x667"></a></div>
					</div>
					<div class="product-carousel owl-carousel">
						@foreach($article->images as $image)
							<div data-hash="{{ $image->id }}"><img src="{{ asset('webimages/catalogo/'. $image->name) }}" alt="Product"></div>
						@endforeach
						
					</div>
					<ul class="product-thumbnails">
						@foreach($article->images as $image)
							<li><a href="#{{ $image->id }}"><img src="{{ asset('webimages/catalogo/'. $image->name) }}" alt="Product"></a></li>
						@endforeach
						
					</ul>
				</div>
			</div>


 	       	<div class="col-md-6">
    	       <div class="padding-top-2x mt-2 hidden-md-up"></div>
              
            	<h2 class="padding-top-1x text-normal">{{ $article->name }}</h2>
            	{{--  En caso de OFERTA  --}}
				<span class="h2 d-block">
				{{--  <del class="text-muted text-normal">$68.00</del>  --}}
				&nbsp; ${{ $article->price }}</span>
            	<p>{{ strip_tags($article->description) }}</p>
					<div class="row margin-top-1x">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="size">Talles</label>
								<select class="form-control" id="size">
									@foreach($article->atribute1 as $atribute1)
									<option>{{ $atribute1->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					<div class="col-sm-5">
					<div class="form-group">
					<label for="color">Choose color</label>
					<select class="form-control" id="color">
					<option>White/Red/Blue</option>
					<option>Black/Orange/Green</option>
					<option>Gray/Purple/White</option>
					</select>
					</div>
					</div>
					<div class="col-sm-3">
					<div class="form-group">
					<label for="quantity">Cantidad</label>
					<select class="form-control" id="quantity">
						<option>1</option>
					</select>
					</div>
					</div>
				</div>
				<div class="pt-1 mb-2"><span class="text-medium">Código:</span> #{{ $article->code }}</div>
				<div class="padding-bottom-1x mb-2">
					<span class="text-medium">Categoría:&nbsp;</span><a class="navi-link" href="#">{{ $article->category->name }}</a>
				</div>
				<hr class="mb-3">
				<div class="d-flex flex-wrap justify-content-between">

					<div class="sp-buttons mt-2 mb-2">
						<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="icon-heart"></i></button>
						<button class="btn btn-primary" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Agregar al Carro</button>
					</div>
				</div>
			</div>



		</div>
	</div>
  
@endsection
    