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
			@include('vadmin.portfolio.searcher')
		@endslot
	@endcomponent
@endsection

{{--  If section has fixed actions  --}}
@section('top-space')
<div class="top-space"></div>
@endsection

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
						<th>Categoría</th>
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
								<td>@if($item->category) {{ $item->category->name }} @endif</td>
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
	$('.CatalogLi').addClass('open');
	$('.CatalogList').addClass('active');

	$(document).ready(function(e) {
		$('.PauseArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				console.log("Error en checkbox");
			} else {
				console.log("Pausar");
				var id     = cbx.data('id');
				console.log(id);
				updateStatus(id, '0');
			}
		});

		$('.ActivateArticle').click(function() {
			var cbx = $(this);
			if (cbx[0].checked) {
				var id = cbx.data('id');
				console.log("Activar");
				console.log(id);
				updateStatus(id, '1');
			} else {
				console.log("Error en checkbox");
			}
		});
	});

	function updateStatus(id, status)
	{
		var route = "{{ url('/vadmin/cat_article_status') }}/"+id+"";
		$.ajax({
			
			url: route,
			method: 'POST',             
			dataType: 'JSON',
			data: { id: id, status: status },
			success: function(data){
				console.log(data);
			},
			error: function(data){
				$('#Error').html(data.responseText);
			}
		});
	}

	</script>
@endsection