<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Santa Osadía | Tienda</title>
		<!-- SEO Meta Tags-->
		<meta name="description" content="Unishop - Universal E-Commerce Template">
		<meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
		<meta name="author" content="Rokaux">
		<!-- Mobile Specific Meta Tag-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- Favicon and Apple Icons-->
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="icon" type="image/png" href="favicon.png">
		<link rel="apple-touch-icon" href="touch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
		<!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
		<link rel="stylesheet" media="screen" href="{{ asset('store-ui/css/vendor.min.css') }}">
		<!-- Main Template Styles-->
		<link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('store-ui/css/styles.min.css') }}">
		<!-- Modernizr-->
		<script src="{{ asset('store-ui/js/modernizr.min.js') }}"></script>
	</head>
	<!-- Body-->
	<body>
		@include('layouts.store.partials.nav')
		    <!-- Off-Canvas Wrapper-->
		<div class="offcanvas-wrapper">
		<!-- Page Title-->
		<div class="page-title">
			<div class="container">
			<div class="column">
				<h1>Santa Osadía | Tienda </h1>
			</div>
			</div>
		</div>
		
		@yield('content')
		@include('layouts.store.partials.foot')
			<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
		<!-- Backdrop-->
		<div class="site-backdrop"></div>
		<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
		<script src="{{ asset('store-ui/js/vendor.min.js') }}"></script>
		<script src="{{ asset('store-ui/js/scripts.min.js') }}"></script>
	</body>
</html>