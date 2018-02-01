@extends('layouts.store.main')

@section('content')
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.store.partials.profile-aside')
            </div>
            <div class="col-lg-8">
				<div class="padding-top-2x mt-2 hidden-lg-up"></div>
				<!-- Wishlist Table-->
				<div class="table-responsive wishlist-table margin-bottom-none">
					<table class="table">
						<thead>
							<tr>
								<th>Productos Favoritos</th>
								<th class="text-center"><a class="RemoveAllFromFavs btn btn-sm btn-outline-danger" data-customerid="{{ $customer->id }}" href="">Limpiar Lista</a></th>
							</tr>
						</thead>
						<tbody>

							@if(!$favs['favs'])
								@foreach($favs['favs'] as $fav)	
								<tr>
									<td>
										<div class="product-item"><a class="product-thumb" href="shop-single.html"><img src="{{ asset('webimages/catalogo/'.$fav->article->thumb) }}" alt="Product"></a>
											<div class="product-info">
												<h4 class="product-title"><a href="shop-single.html">{{ $fav->article->name }}</a></h4>
												<div class="text-lg text-medium text-muted">
														@if($fav->article->offer > 0)
														<del>$ {{ $fav->article->price }}</del> $ {{ calcValuePercentNeg($fav->article->price, $fav->article->offer) }}
														@else
														$ {{ $fav->article->price }}
														@endif
												</div>
												<div>Disponibilidad:
													<div class="d-inline text-success">
														@if($fav->article->status == '0')
															No disponible
														@else
															@if($fav->article->stock > 1)
															En stock
															@else
															Sin Stock
															@endif
														@endif
													</div>
												</div>
											</div>
										</div>
									</td>
									<td class="text-center"><a class="RemoveFromFavs remove-from-cart cursor-pointer" data-favid="{{ $fav->id }}" data-toggle="tooltip" title="Remover de Favoritos"><i class="icon-cross"></i></a></td>
								</tr>
								@endforeach
							@else 
								<tr>
									<td>
										No tiene productos favoritos al momento...
									</tr>
								</td>
							@endif
						</tbody>
					</table>
				</div>
				<hr class="mb-4">
				{{--  <label class="custom-control custom-checkbox d-block">
					<input class="custom-control-input" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Inform me when item from my wishlist is available</span>
				</label>  --}}
            </div>
		</div>
		<div id="Error"></div>
    </div>

@endsection

@section('custom_js')
	@include('store.components.bladejs')
@endsection