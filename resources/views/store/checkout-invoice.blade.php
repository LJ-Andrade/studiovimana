@extends('layouts.store.invoice')

@section('title', 'Comprobante | Pedido N°'.$order->id)

@section('content')
    <div class="invoice-ticket">
        <div class="title">Comprobante de compra | Pedido N° <b>{{ $order->id }}</b></div>
        <div class="content">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Talle</th>
                            <th>Color</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->details as $item)
                        <tr>
                            <td>{{ $item->article->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->article->color }}</td>
                            @if($item->discount > 0)
                                <td>$ {{ calcValuePercentNeg($item->price, $item->discount) }}</td>
                            @else
                                <td>$ {{ $item->price }}</td>
                            @endif
                            <td></td>
                        </tr>
                        @endforeach
                        <tr style="border: 1px solid black">
                            <td></td><td></td><td></td>
                            <td>Subtotal</td>
                            <td>$ {{ $cartData['subtotal'] }}</td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                            <td>Costo de envío</td>
                            <td>$ {{ $cartData['shipping'] }}</td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                            <td>Recargo por forma de pago</td>
                            <td>$ {{ $cartData['payment'] }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>TOTAL</td>
                            <td>$ {{ $cartData['total'] }}</td>
                        </tr>
                    </tbody>
                </table>

        </div>
    </div>
@endsection