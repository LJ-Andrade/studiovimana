@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Catálogo')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.headerfixed')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Productos del Catálogo</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('catalogo.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo Producto</a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="catalogo">
				<button id="DeleteBtn" class="btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['title']) || isset($_GET['category']))
				<a href="{{ url('vadmin/catalogo') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				<div class="results">{{ $articles->total() }} resultados de búsqueda</div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.searcher')
		@endslot
	@endcomponent
@endsection

@if(isset($_GET['title']) || isset($_GET['category']))
	{{--  If section has fixed actions  --}}
	@section('top-space')
		<div class="top-space"></div>
	@endsection
@else
	@section('top-space')
		<div class="top-space-small"></div>
	@endsection
@endif

{{-- CONTENT --}}
@section('content')
	<div class="list-wrapper">
		{{-- Search --}}
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('title', 'Productos de Catálogo')
					@if($articles->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th class="w-50">
							@component('vadmin.components.checkAllCheckBox')
							@endcomponent
						<th></th>
						<th>Cód.</th>
						<th>Título</th>
						<th>Stock</th>
						<th>Precio</th>
						<th>Oferta (%)</th>
						<th>Fecha de Creación</th>
						<th>Estado</th>
					@endslot
					@slot('tableContent')
						@foreach($articles as $item)
							<tr>
								<td class="w-50">
									<label class="CheckBoxes custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								<td class="thumb">
									@if($item->thumb != '' || $item->thumb != null)
										<img src="{{ asset('webimages/catalogo/'. $item->thumb ) }}">
									@else
										<img src="{{ asset('webimages/gen/catalog-gen.jpg') }}">
									@endif
								</td>
								<td class="w-50">{{ $item->code }}</td>
								<td class="show-link max-text"><a href="{{ url('vadmin/catalogo/'.$item->id) }}">{{ $item->name }}</a></td>
								{{--  STOCK  --}}
								<td class="Modificable-Stock-Input modificable-input">
									@if($item->stock > $item->stockmin)
										<input class="UpdateStockInput List-Input Hidden" type="number" name="stock">
										<div class="DisplayStockData">{{ $item->stock }}</div>
										<div class="UpdateStockBtn action-button Hidden" data-id="{{ $item->id }}"><i class="icon-checkmark2"></i></div>
									@else
										<input class="UpdateStockInput List-Input Hidden" type="number" name="stock">
										<div class="DisplayStockData custom-badge btnRed">{{ $item->stock }}</div>
										<div class="UpdateStockBtn action-button Hidden" data-id="{{ $item->id }}"><i class="icon-checkmark2"></i></div>
									@endif
								</td>
								{{--  PRICE  --}}
								<td class="Modificable-Price-Input modificable-input">
									<input class="UpdatePriceInput List-Input Hidden" type="text" name="price">
									<span class="Extra-Data">$ </span><span class="DisplayPriceData">{{ $item->price }}</span>
									<div class="UpdatePriceBtn action-button Hidden" data-id="{{ $item->id }}"><i class="icon-checkmark2"></i></div>
								</td>
								{{--  OFFER PERCENT and PRICE  --}}
								<td class="Modificable-Offer-Input modificable-input">
									@if($item->offer == '0')
									<input class="UpdateOfferInput List-Input Hidden" type="text" name="price">
									<span class="Extra-Data">-</span>
									@else
									<input class="UpdateOfferInput List-Input Hidden" type="text" name="price">
									<span class="Extra-Data">%</span><span class="DisplayOfferData">{{ $item->offer }}</span><span class="Extra-Data"> ($ {{ calcValuePercentNeg($item->price, $item->offer) }})</span>
									@endif
									<div class="UpdateOfferBtn action-button Hidden" data-id="{{ $item->id }}"><i class="icon-checkmark2"></i></div>
								</td>
								{{--  DATE   --}}
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
								<td class="w-50 pad0 centered">
									@if($item->status == '1')
										<label class="switch">
											<input class="PauseArticle switch-checkbox" data-id="{{ $item->id }}" type="checkbox" checked>
											<span class="slider round"></span>
										</label>
									@elseif($item->status == '0')
										<label class="switch">
											<input class="ActivateArticle" data-id="{{ $item->id }}" type="checkbox">
											<span class="slider round"></span>
										</label>
									@else 
										Sin estado
									@endif
								</td>
							</tr>					
						@endforeach
						@endif
				@endslot
			@endcomponent
			{{--  Pagination  --}}
			@if(isset($_GET['title']))
				{!! $articles->appends(['title' => $_GET['title']])->render() !!}
			@elseif(isset($_GET['category']))
				{!! $articles->appends(['category' => $_GET['category']])->render() !!}
			@else
				{!! $articles->render() !!}
			@endif
		</div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

{{-- CUSTOM JS SCRIPTS--}}
@section('custom_js')
	<script>
	$(document).ready(function(e) {
		$('.CatalogLi').addClass('open');
		$('.CatalogList').addClass('active');

		// Article Status
		$('.PauseArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				// console.log("Error en checkbox");
			} else {
				console.log("Pausar");
				var id     = cbx.data('id');
				var route = "{{ url('/vadmin/cat_article_status') }}/"+id+"";
				updateStatus(id, route, '0');
			}
		});

		$('.ActivateArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				var id = cbx.data('id');
				console.log("Activar");
				var route = "{{ url('/vadmin/cat_article_status') }}/"+id+"";
				updateStatus(id, route, '1');
			} else {
				//console.log("Error en checkbox");
			}
		});
	});

	</script>
@endsection