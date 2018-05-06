@extends('layouts.store.main')

@section('styles')
	<style>
		body {
			background: url('../store/backlogin.jpg') no-repeat center center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover ;
		}

		.offcanvas-wrapper {
			background: transparent
		}
	</style>
@endsection

@section('content')
<div class="container padding-bottom-3x mb-2 marg-top-25">
	<div class="row centered-form">
		<div class="centered-notification">
			<div class="content">
				<h3>Gracias por registrarse !</h3>
				Su nuevo usuario está en proceso de revisión. <br>
				En cuanto sea aprobado se lo notificaremos vía e-mail.
			</div>
			<div class="bottom">
				Mientras tanto lo invitamos a <br>
				<a href="{{ url('tienda') }}" class="btn btn-outline-primary btn-sm"> Seguir viendo la tienda </a>
			</div>
		</div>
	</div>
</div>
@endsection
    