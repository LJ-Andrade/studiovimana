@extends('layouts.vadmin.main')

@section('title', 'Vadmin | ')

@section('header_title', 'Inicio | ')

@section('header_subtitle')
	Bienvenid@ <b>{{ Auth::user()->name }}</b>
@endsection

@section('styles')
	
@endsection

@section('content')
	<div class="dashboard">
		<div class="main-title">BIENVENIDOS AL ESPECTACULAR ADMINISTRADOR <b class="black">VADMIN</b> DE <br>
		
			<img src="{{ asset('webimages/logos/logo.png') }}" alt="">
		
		</div>

		@if($messages > 0)
			<img src="{{ asset('images/gral/cat.png') }}" alt="">
			<div class="messages-text"><a href="{{ url('vadmin/stored_contacts')}}"><h1>Mensajes Recibidos: {{ $messages }}</h1></a></div>
		@else
			<img src="{{ asset('images/gral/catsad.png') }}" alt="">
			<div class="messages-text"><h1>Mensajes Recibidos: 0</h1></div>
		@endif

		<div class="motivation">
			<button class="btn btnBlue" data-toggle="modal" data-target="#MotiveModal">Click Aquí para obtener motivación</button>

			<div class="modal fade" id="MotiveModal" tabindex="-1" role="dialog" aria-labelledby="MotiveModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<img src="{{ asset('images/gral/motive.jpg') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	
@endsection

@section('custom_js')

@endsection
