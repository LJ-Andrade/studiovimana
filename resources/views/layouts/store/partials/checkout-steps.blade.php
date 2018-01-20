<div class="checkout-steps">
    <a class="@if(isset($step4status)) {{ $step4status }} @endif" href="{{ route('store') }}">{{ $step4 }}</a> 
    <a class="@if(isset($step3status)) {{ $step3status }} @endif" href="{{ route('store') }}"><span class="angle"></span>{{ $step3 }}</a>
    <a class="@if(isset($step2status)) {{ $step2status }} @endif" href="{{ route('store') }}"><span class="angle"></span>{{ $step2 }}</a>
    <a class="@if(isset($step1status)) {{ $step1status }} @endif" href="{{ route('store.checkout') }}"><span class="angle"></span>{{ $step1 }}</a>
</div>