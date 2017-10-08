@extends('layouts.vadmin.main')

@section('title', 'Vadmin | ')

@section('header_title', 'Inicio | ')

@section('header_subtitle')
	Bienvenid@ <b>{{ Auth::user()->name }}</b>
@endsection

@section('styles')
	
@endsection

@section('content')
	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body"><!-- stats -->
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	
@endsection

@section('custom_js')

@endsection
