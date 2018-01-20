<!-- Off-Canvas Category Menu-->
<div class="offcanvas-container" id="shop-categories">
	<div class="offcanvas-header">
		<h3 class="offcanvas-title">Shop Categories</h3>
	</div>
	<nav class="offcanvas-menu">
		<ul class="menu">
			<li class="has-children"><span><a href="#">Men's Shoes</a><span class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					<li><a href="#">Sneakers</a></li>
					<li><a href="#">Loafers</a></li>
					<li><a href="#">Boat Shoes</a></li>
					<li><a href="#">Sandals</a></li>
					<li><a href="#">View All</a></li>
				</ul>
			</li>
			<li class="has-children"><span><a href="#">Women's Shoes</a><span class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					<li><a href="#">Sandals</a></li>
					<li><a href="#">Flats</a></li>
					<li><a href="#">Sneakers</a></li>
					<li><a href="#">Heels</a></li>
					<li><a href="#">View All</a></li>
				</ul>
			</li>
			<li class="has-children"><span><a href="#">Men's Clothing</a><span class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					<li><a href="#">Shirts &amp; Tops</a></li>
					<li><a href="#">Pants</a></li>
					<li><a href="#">Jackets</a></li>
					<li><a href="#">View All</a></li>
				</ul>
			</li>
			<li class="has-children"><span><a href="#">Women's Clothing</a><span class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					<li><a href="#">Dresses</a></li>
					<li><a href="#">Shirts &amp; Tops</a></li>
					<li><a href="#">Shorts</a></li>
					<li><a href="#">Swimwear</a></li>
					<li><a href="#">View All</a></li>
				</ul>
			</li>
			<li class="has-children"><span><a href="#">Kid's Shoes</a><span class="sub-menu-toggle"></span></span>
				<ul class="offcanvas-submenu">
					<li><a href="#">Boots</a></li>
					<li><a href="#">Sandals</a></li>
					<li><a href="#">Crib Shoes</a></li>
					<li><a href="#">Loafers</a></li>
					<li><a href="#">View All</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<!-- Navbar-->
<!-- Remove ".navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar navbar-sticky">
	<!-- Search-->
	<form class="site-search" method="get">
		<input type="text" name="site_search" placeholder="Type to search...">
		<div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
	</form>
	<div class="site-branding">
		<div class="inner">
		{{--  This Is the SIDEMENU  --}}
		{{--  <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
		<!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>  --}}
		<!-- Site Logo--><a class="site-logo" href="{{ url('/') }}"><img src="{{ asset('store-ui/images/logo.png') }}" alt="Logo"></a>
		</div>
	</div>
	<!-- Main Navigation-->
	@include('layouts.store.partials.userbar')
</header>