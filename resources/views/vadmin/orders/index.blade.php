
@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Pedidos')
{{-- STYLE INCLUDES --}}
@section('styles')
@endsection

{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Listado de pedidos</li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
				<a href="{{ route('payments.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo </a>
				<button id="SearchFiltersBtn" class="btn btnBlue"><i class="icon-ios-search-strong"></i></button>
				
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="carts">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">
				{{-- If Search --}}
				@if(isset($_GET['name']))
				<a href="{{ url('vadmin/payments') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a>
				@endif
			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.payments.searcher')
		@endslot
	@endcomponent
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
				@slot('actions', '')
				@slot('title', 'Pedidos')
					@if($items->count() == '0')
						@slot('tableTitles', '')
						@slot('tableContent', '')
					@else
					@slot('tableTitles')
						<th>N°</th>
						<th>Cliente</th>
						<th>Valor</th>
						<th>Estado</th>
						<th>Fecha</th>
						<th></th>
						<th class="w-50"></th>
					@endslot

					@slot('tableContent')
						@foreach($items as $item)
							<tr>
								<td class="w-50">#{{ $item->id }}</td>
								<td class="show-link max-text">
									<a href="{{ url('vadmin/customers/'.$item->customer_id) }}">
										{{ $item->customer->name }} {{ $item->customer->surname }} ({{ $item->customer->username }})
									</a>
								</td>
								<td>
									<div class="input-group"> 
										<span class="input-group-btn">
											<span class="btn btnSquare grey-back">
												@switch($item->status)
													@case('Active')
														<i class="icon-download"></i>
														@break
													@case('Process')
														<i class="icon-cog"></i>
														@break
													@case('Approved')
														<i class="icon-forward2"></i>
														@break
													@case('Canceled')
														<i class="icon-cancel-circle"></i>
														@break
													@case('Finished')
														<i class="icon-checkmark2"></i>
														@break
													@default
														<i class="icon-close"></i>
												@endswitch
											</span>
										</span>
										{!! Form::select('group', 
										[ 'Active' => 'Iniciado', 'Process' => 'En proceso', 'Approved' => 'Aprobado', 'Canceled' => 'Cancelado', 'Finished' => 'Finalizado'], 
										$item->status, ['class' => 'form-control custom-select minWidth150', 'onChange' => 'updateCartStatus(this, this.dataset.id)', 'data-id' => $item->id]) !!}
									</div>
								</td>
								<td class="w-200">{{ transDateT($item->created_at) }}</td>
								<td class="w-50"><a href="{{ url('vadmin/carts/'.$item->id) }}" class="btn btnSm btnGreen"><i class="icon-eye6"></i></a></td>
								<td class="w-50">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $item->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
							</tr>						
						@endforeach
					@endif
				@endslot
			@endcomponent
			
			{{--  Pagination  --}}
			{{-- {!! $items->render() !!} --}}
		</div>
		<div id="Error"></div>	
	</div>
@endsection

{{-- SCRIPT INCLUDES --}}
@section('scripts')
	@include('vadmin.components.bladejs')
@endsection

