@extends('layouts.vadmin.main')
{{-- PAGE TITLE --}}
@section('title', 'Vadmin | Usuarios')

{{-- STYLE INCLUDES --}}
@section('styles')
	
@endsection
{{-- CONTENT --}}
@section('header')
	@component('vadmin.components.headerfixed')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de Usuarios</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('users.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo Usuario</a>
				{{--  Actions  --}}
				<div class="btn-group">
					<button type="button" class="btn dropdown-toggle btnBlue" 
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Acciones</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('vadmin.exportViewPdf', ['view' => 'vadmin.users.invoice', 'model' => 'User', 'filename' => 'usuarios']) }}">Descargar Pdf</a>
						<a class="dropdown-item" href="#">Descargar Excel</a>
						{{--  <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Separated link</a>  --}}
					</div>
				</div>
				<button id="SearchFiltersBtn" class="btn btnGreen"><i class="icon-ios-search-strong"></i></button>
				@if(Auth::guard('user')->user()->role <= 2)
					{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btn-sm btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="users">
				<button id="DeleteBtn" class="btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				@endif
				{{-- If Search --}}
				@if(isset($_GET['name']) || isset($_GET['group']) || isset($_GET['role']))
					<a href="{{ url('vadmin/users') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
					{{--  <div class="results">{{ $items->total() }} resultados de búsqueda: </div>  --}}
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.users.searcher')
		@endslot
	@endcomponent
@endsection

{{--  If section has fixed actions  --}}
@section('top-space')
<div class="top-space"></div>
@endsection

@section('content')
	<div class="list-wrapper">
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('title', 'Usuarios del Sistema')
				@slot('tableTitles')
					@if(!$items->isEmpty())
						@if(Auth::guard('user')->user()->role <= 2)
						<th></th>
						@endif
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Grupo</th>
						<th>Fecha de Ingreso</th>
					@else
						<th></th>
					@endif
				@endslot

				@slot('tableContent')
					@if(!$items->isEmpty())
						@foreach($items as $item)
							<tr>
								@if(Auth::guard('user')->user()->role <= 2)
								<td>
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
								@endif
								<td class="show-link"><a href="{{ url('vadmin/users/'.$item->id) }}">{{ $item->username }}</a></td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>{{ roleTrd($item->role) }}</td>
								<td>{{ groupTrd($item->group) }}</td>
								<td>{{ transDateT($item->created_at) }}</td>
							</tr>						
						@endforeach
					@else
						<tr>
							<td>No se han encontrado resultados</td>
						</tr>
					@endif
				@endslot
			@endcomponent
			
			@if(isset($_GET['name']))
				{!! $items->appends(['name' => $name])->render(); !!}
			@elseif(isset($_GET['role']) || isset($_GET['group']))
				{!! $items->appends(['group' => $group])->appends(['role' => $role])->render(); !!}
			@else
				{!! $items->render(); !!}
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
		$('.AdminLi').addClass('open');
		$('.UsersLi').addClass('open');
		$('.UsersList').addClass('active');
	</script>
@endsection