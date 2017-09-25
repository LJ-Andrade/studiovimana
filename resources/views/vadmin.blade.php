@extends('vadmin.layouts.main')
@section('title', 'Vadmin | Gestor de Contenido')
@section('header_title', 'Inicio | ')
@section('header_subtitle')
	Bienvenido <b>{{ Auth::user()->name }}</b>
@endsection

@section('content')

	 <div class="container">
		<div class="row">
			<span>Tu nivel de permisos es <b>{{ typeTrd(Auth::user()->type) }}</b></span>
			<hr>			
		</div>
	 </div>  

@endsection


