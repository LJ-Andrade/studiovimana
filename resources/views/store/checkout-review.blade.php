@extends('layouts.store.main')

@section('content')

  <div class="container padding-bottom-3x mb-2 marg-top-25">
    <div class="row">
		<!-- Checkout Adress-->
		<div class="col-xl-9 col-lg-8">
			<div class="checkout-steps">
				<a href="checkout-review.html">4. Review</a><a href="checkout-payment.html">
					<span class="angle"></span>3. Payment</a><a href="checkout-shipping.html">
					<span class="angle"></span>2. Shipping</a><a class="active" href="checkout-address.html">
					<span class="angle"></span>1. Address</a>
			</div>
			<h4>Billing Address</h4>
			<hr class="padding-bottom-1x">




		</div>
			<!-- Sidebar          -->
			<div class="col-xl-3 col-lg-4">
			@include('layouts.store.partials.checkout-aside')
			</div>
		</div>
  </div>

@endsection

@section('scripts')
@endsection