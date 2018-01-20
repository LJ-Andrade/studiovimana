<aside class="sidebar">
    <div class="padding-top-2x hidden-lg-up"></div>
    <!-- Order Summary Widget-->
    <section class="widget widget-order-summary">
        <h3 class="widget-title">Resumen de Pedido</h3>
        <table class="table">
        <tr>
            <td>Subtotal:</td>
            <td class="text-medium"> {{ $activeCart['cartTotal'] }}</td>
        </tr>
        <tr>
            <td>Envío:</td>
            <td class="text-medium">$ 0</td>
        </tr>
        <tr>
            <td>Otros:</td>
            <td class="text-medium">$ 0</td>
        </tr>
        <tr>
            <td></td>
            <td class="text-lg text-medium">Total $ {{ $activeCart['cartTotal'] }}</td>
        </tr>
        </table>
    </section>
    <!-- Featured Products Widget-->  
</aside>