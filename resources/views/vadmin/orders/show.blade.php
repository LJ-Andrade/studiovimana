@extends('layouts.vadmin.main')
@section('title', 'Vadmin | Pedido N {{ $order->id }}')


{{-- HEADER --}}
@section('header')
	@component('vadmin.components.header-list')
		@slot('breadcrums')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('carts.index')}}">Listado de pedidos</a></li>
            <li class="breadcrumb-item active">Pedido <b>#{{ $order->id }}</b></li>
		@endslot
		@slot('actions')
			{{-- Actions --}}
			<div class="list-actions">
                {{-- Edit --}}
				<button class="EditBtn btn btnGreen Hidden"><i class="icon-pencil2"></i> Editar</button>
				<input id="EditId" type="hidden">
				{{-- Delete --}}
				{{--  THIS VALUE MUST BE THE NAME OF THE SECTION CONTROLLER  --}}
				<input id="ModelName" type="hidden" value="cartdetails">
				<button class="DeleteBtn btn btnRed Hidden"><i class="icon-bin2"></i> Eliminar</button>
				<input id="RowsToDeletion" type="hidden" name="rowstodeletion[]" value="">

			</div>
		@endslot
		@slot('searcher')
			@include('vadmin.catalog.payments.searcher')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <h2><span style="color: #ada8a8">Orden de pedido </span>#{{ $order->id }}</h2>
                 <p>
                    Cliente: <a href="" data-toggle="modal" data-target="#CustomerDataModal"><b>{{ $order->customer->name }} {{ $order->customer->surname }}</b></a><br>
                    {{ transDateT($order->created_at) }}
                 </p>
            @endslot
            @slot('content')
                <div class="col-md-12">
                    <table class="table table-bordered table-striped custom-list">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Artículo</th>
                                <th>Talle</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $detail)
                            <tr>
                                <td class="w-50">
									<label class="custom-control custom-checkbox list-checkbox">
										<input type="checkbox" class="List-Checkbox custom-control-input row-checkbox" data-id="{{ $detail->id }}">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description"></span>
									</label>
								</td>
                                <td><a href="">{{ $detail->article->name }} (#{{ $detail->article->code }})</a></td>
                                <td>{{ $detail->size }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>$ {{ $detail->price }}</td>
                                <td>% {{ $detail->discount }}</td>
                                <td>$ {{ calcValuePercentNeg($detail->price, $detail->discount)}} </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td><td></td><td></td><td></td><td></td>
                                <td><b>SUBTOTAL</b></td>
                                <td><b>$ {{ $subtotal }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row col-md-6 pull-right">
                        <table class="table table-bordered table-striped custom-list">
                            <tbody>
                                <tr>
                                    @if($order->shipping_id != null)
                                    <td><b>Envío:</b></td>
                                    <td>{{ $order->shipping->name }}</td>
                                    <td>$ {{ $order->shipping->price }}</td>
                                    @else
                                    <td>Envío no seleccionado</td>
                                    <td></td>
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($order->payment_method_id != null)
                                    <td><b>Método de pago:</b></td>
                                    <td>{{ $order->payment->name }} (% {{ $order->payment->percent }})</td>
                                    <td>${{ calcValuePercentNeg($subtotal,$order->payment->percent) }}</td>
                                    @else
                                    <td>Método de pago no seleccionado</td>
                                    <td></td>
                                    <td>-</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>TOTAL</b></td>
                                    <td><b>$ {{ $total }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                </div>
            @endslot
        @endcomponent
    </div>


    <!-- Customer data modal -->
    <div class="modal fade" id="CustomerDataModal" tabindex="-1" role="dialog" aria-labelledby="CustomerDataModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cliente: {{ $customer->name }} {{ $customer->surname }}</h4>
                </div>
                <div class="modal-body">
                    {{ $customer->email}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('custom_js')
	
@endsection