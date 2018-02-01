@extends('layouts.store.main')

@section('content')
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.store.partials.profile-aside')
            </div>
            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="table-responsive">
                    <table class="table table-hover margin-bottom-none">
                    <thead>
                        <tr>
                        <th>Pedido #</th>
                        <th>Fecha de Compra</th>
                        <th>Estado</th>
                        <th>Cant.Prod.</th>
                        <th>Total</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(!$carts->isEmpty())
                        <?php $total = 0 ?>
                        @foreach($carts as $cart)
                            {{--  Calcs total items price  --}}
                            @foreach($cart->details as $detail)
                                <?php $total += $detail->price ?>
                            @endforeach
                                <tr>
                                    <td><span class="text-medium">{{ $cart->id }}</span></td>
                                    <td>{{ transDateAndTime($cart->created_at) }}</td>
                                    <td><span class="text-danger">{{ orderStatusTrd($cart->status) }}</span></td>
                                    <td><span class="text-medium">{{ $cart->details->count() }}</span></td>
                                    <td>$ {{ $total }}</td>
                                    @if($cart->status == 'Active')
                                    <td><a href="{{ route('store.activecart') }}">Ver Detalle</a></td>                                    
                                    @else
                                    <td><a href="{{ route('store.cartdetail', ['id' => $cart->id]) }}">Ver Detalle</a></td>
                                    @endif
                                </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td>
                                No se han realizado órdenes al momento.
                            </td>
                            <td></td><td></td><td></td><td></td><td></td>

                        </td>
                        @endif
                        </tbody>
                    </table>
                </div>
                <hr>
            
            </div>
            
		</div>
		<div id="Error"></div>
    </div>

@endsection

@section('custom_js')
	@include('store.components.bladejs')
@endsection