<!DOCTYPE html>
<html lang="es" data-textdirection="ltr" class="loading">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="Gestion de contenido">
		<meta name="keywords" content="">
		<meta name="author" content="Studio Vimana">
		<title>@yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('vadmin-ui/app-assets/images/ico/apple-icon-60.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vadmin-ui/app-assets/images/ico/apple-icon-76.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('vadmin-ui/app-assets/images/ico/apple-icon-120.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('vadmin-ui/app-assets/images/ico/apple-icon-152.png') }}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('vadmin-ui/app-assets/images/ico/favicon.ico') }}">
		<link rel="shortcut icon" type="image/png" href="{{ asset('vadmin-ui/app-assets/images/ico/favicon-32.png') }}">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<!-- BEGIN VENDOR CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap.css') }}">
		<!-- font icons-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/icomoon.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/vendors/css/extensions/pace.css') }}">
		<!-- END VENDOR CSS-->
		<!-- BEGIN ROBUST CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/bootstrap-extended.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/app.css') }}">
		{{-- <link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/colors.css') }}"> --}}
		<!-- END ROBUST CSS-->
		<!-- BEGIN Page Level CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/app-assets/css/core/colors/palette-gradient.css') }}">
		<!-- END Page Level CSS-->
		<!-- BEGIN Custom CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('vadmin-ui/assets/css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/vadmin.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}">
		<!-- END Custom CSS-->
		@yield('styles')
	</head>
  	<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">

		@include('layouts.vadmin.partials.nav')
		<div class="app-content content container-fluid">
			<div class="content-wrapper">
				<div class="content-header row">
				</div>
				<div class="container">
					{{-- Errors --}}
					@if(count($errors) > 0)
						<div class="alert alert-success"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
							<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach		
							</ul> 
						</div>
					@endif
					{{-- Messages --}}
					@if(Session::has('message'))
						<div class="alert alert-success"> 
							<i class="fa fa-star"></i> {{ Session::get('message') }}
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
						</div> 
					@endif

					{{-- Content --}}
					@yield('content')
				</div>	
			</div>
		</div>
		{{-- 
		<footer class="footer footer-static footer-light navbar-border">
			<p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://pixinvent.com" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
		</footer>
		--}}

		<!-- BEGIN VENDOR JS-->
		<script src="{{ asset('vadmin-ui/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
		<!-- BEGIN VENDOR JS-->
		<!-- BEGIN PAGE VENDOR JS-->
		<script src="{{ asset('vadmin-ui/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
		<!-- END PAGE VENDOR JS-->
		<!-- BEGIN ROBUST JS-->
		<script src="{{ asset('vadmin-ui/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
		<script src="{{ asset('vadmin-ui/app-assets/js/core/app.js') }}" type="text/javascript"></script>
		<!-- END ROBUST JS-->
		<!-- BEGIN PAGE LEVEL JS-->
		{{-- <script src="{{ asset('vadmin-ui/app-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script> --}}
		<script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/vadmin-ui.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/vadmin-functions.js') }}" type="text/javascript"></script>
		<!-- END PAGE LEVEL JS-->
		@yield('scripts')
		@yield('custom_js')
	</body>
</html>
