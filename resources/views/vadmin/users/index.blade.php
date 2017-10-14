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
            <li class="breadcrumb-item active">Usuarios</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('users.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo Usuario</a>
				<button id="SearchFiltersBtn" class="btn btnGreen"><i class="icon-ios-search-strong"></i></button>
				@if(Auth::user()->role <= 2)
					{{-- Edit --}}
				<a href="#" id="EditBtn" class="btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</a>
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
					<div class="results">{{ $items->total() }} resultados de búsqueda: </div>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.users.searcher')
		@endslot
	@endcomponent
@endsection

@section('content')
	<div class="list-wrapper">
		{{-- Test --}}
		<div id="TestBox" class="col-xs-12 test-box Hidden">
		</div>
		<div class="row">
			@component('vadmin.components.list')
				@slot('title', 'Listado de Usuarios')
				@slot('tableTitles')
					@if(Auth::user()->role <= 2)
					<th></th>
					@endif
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Rol</th>
					<th>Grupo</th>
					<th>Fecha de Ingreso</th>
				@endslot

				@slot('tableContent')
					@foreach($items as $item)
						<tr>
							@if(Auth::user()->role <= 2)
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

	</script>

@endsection