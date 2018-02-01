<aside class="sidebar">
    <div class="padding-top-2x hidden-lg-up"></div>
    <!-- Order Summary Widget-->
    <section class="widget widget-order-summary">
        <h3 class="widget-title">Resumen de Pedido</h3>
        <table class="table">
        <tr>
            <td>Subtotal:</td>
            <td class="text-medium">$ {{ $activeCart['cartTotal'] }}</td>
        </tr>
        <tr>
            <td>Costo de envío:</td>
            <td class="text-medium">
                @if($activeCart['activeCart']->shipping != null && $activeCart['activeCart']->shipping)
                <?php $shippingCost = $activeCart['activeCart']->shipping->price ?>
                    $ {{ $activeCart['activeCart']->shipping->price }}
                @else
                    <?php $shippingCost = '0'; ?>
                    $ 0
                @endif
            </td>
        </tr>
        <tr>
            
            @if($activeCart['activeCart']->payment !=null && $activeCart['activeCart']->payment->percent > '0')
            <td>Recargo: (% {{ $activeCart['activeCart']->payment->percent }}) </td>
            <td class="text-medium">
                <?php $chargesCost = calcPercent($activeCart['cartTotal'], $activeCart['activeCart']->payment->percent) ?>
                $ {{ $chargesCost }}
            </td>    
            @else
            <td>Recargo: </td>
            <td class="text-medium">
                <?php $chargesCost = '0'; ?>
                $ 0
            </td>
            </td>
            @endif
        </tr>
        <tr>
            <td></td>
            <td class="text-lg text-medium">Total $ {{ $activeCart['cartTotal'] + $shippingCost + $chargesCost  }}</td>
            <input id="CartTotal" type="hidden" name="carttotal" value="{{ $activeCart['cartTotal'] + $shippingCost + $chargesCost }}">
        </tr>
        </table>
    </section>
    <!-- Featured Products Widget-->  
</aside>