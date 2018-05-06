<div class="checkout-steps">
    <a class="@if(isset($step4status)) {{ $step4status }} @endif">4. Resumen</a> 
    <a class="@if(isset($step3status)) {{ $step3status }} @endif"><span class="angle"></span>3. Método de Pago</a>
    <a class="@if(isset($step2status)) {{ $step2status }} @endif"><span class="angle"></span>2. Método de Envío</a>
    <a class="@if(isset($step1status)) {{ $step1status }} @endif"><span class="angle"></span>1. Datos</a>
</div>
