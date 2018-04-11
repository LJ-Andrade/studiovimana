@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Inicio')

@section('header_subtitle')
	Bienvenid@ <b>{{ Auth::user()->name }}</b>
@endsection

@section('styles')
@endsection

@section('content')
	<div class="dashboard">
		<div class="content-body"><!--native-font-stack -->
			<section id="global-settings" class="card">
				{{-- --}}
				<div class="card-header">
					<h4 class="card-title">Bienvenid@ a Vadmin {{ Auth::user()->name }}</h4>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<div class="card-text">
							{{-- Dev Messages Here --}}
						</div>
					</div>
				</div>
			</section>
			<div class="row match-height">
				<a href="">
					<div class="col-xl-4 col-lg-12">
						<div class="card">
							<div class="card-body dash-item1">
								<div class="media">
									<div class="p-2 text-xs-center blue-back media-left media-middle">
										<i class="icon-newspaper font-large-2 white"></i>
									</div>
									<div class="p-2 media-body">
										<h5>Item</h5>
										<h5 class="text-bold-400">0</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<a href="">
					<div class="col-xl-4 col-lg-12">
						<div class="card">
							<div class="card-body dash-item1">
								<div class="media">
									<div class="p-2 text-xs-center green-back media-left media-middle">
										<i class="icon-images2 font-large-2 white"></i>
									</div>
									<div class="p-2 media-body">
										<h5>Item</h5>
										<h5 class="text-bold-400">0</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
	<div id="Error"></div>
@endsection

@section('scripts')
	
@endsection

@section('custom_js')

@endsection
