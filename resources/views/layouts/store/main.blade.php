<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Tienda</title>
		<!-- SEO Meta Tags-->
		<meta name="description" content="Tienda - Vimana Studio">
		<meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
		<meta name="author" content="Vimana Studio">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Mobile Specific Meta Tag-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Favicon and Apple Icons-->
		{{--  <link rel="icon" type="image/x-icon" href="favicon.ico">  --}}
		<link rel="icon" type="image/png" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('store-ui/images/favicon.png') }}">
		<link rel="apple-touch-icon" sizes="167x167" href="{{ asset('store-ui/images/favicon.png') }}">
		<!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
		<link rel="stylesheet" media="screen" href="{{ asset('store-ui/css/vendor.min.css') }}">
		<link rel="stylesheet" media="screen" href="{{ asset('store-ui/css/iziToast.min.css') }}">
		<!-- Main Template Styles-->
		<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('store-ui/css/styles.min.css') }}">
		<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('css/store-custom.css') }}">
		<!-- Modernizr-->
		<script src="{{ asset('store-ui/js/modernizr.min.js') }}"></script>
			  
		
	</head>
	<!-- Body-->
	<body>
		@yield('modal')
		@include('layouts.store.partials.topbar')
		@include('layouts.store.partials.mobilemenu')
		@include('layouts.store.partials.nav') {{-- ToolBar in inside this nav include --}}
		<!-- Off-Canvas Wrapper-->
		<div class="offcanvas-wrapper">
		<!-- Page Title-->
		{{--  <div class="page-title">
			<div class="container">
			<div class="column">
				<h1>Santa Osadía | Tienda </h1>
			</div>
			</div>
		</div>  --}}
		<div class="container custom-page-title">
			{{--  <h1>Tienda</h1>  --}}
			@yield('header-image')
			@include('layouts.store.partials.alerts')
		</div>
		
		@yield('content')
		@include('layouts.store.partials.foot')
		<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
		<!-- Backdrop-->
		<div class="site-backdrop"></div>
		<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
		
		<script src="{{ asset('store-ui/js/vendor.min.js') }}"></script>
		<script src="{{ asset('store-ui/js/iziToast.min.js') }}"></script>
		<script src="{{ asset('store-ui/js/scripts.min.js') }}"></script>
		<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('store-ui/js/custom-scripts.js') }}"></script>
		<script>
			$('.CheckImg').on('error', function(){
				var defaultImg = "{{ asset('images/users/default.jpg') }}"
				$(this).attr('src', defaultImg);
			});
			// Laravel Token
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
		</script>
		@yield('scripts')
		@yield('custom_js')
	</body>
</html>