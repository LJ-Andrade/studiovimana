{{-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">VADMIN</a>
	

	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active"><a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a></li>
			<li class="nav-item"><a class="nav-link" href="#">Item</a></li>
		</ul>
	</div>
</nav> --}}

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark navbar-shadow">
	<div class="navbar-wrapper">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
				<li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="{{ asset('vadmin-ui/app-assets/images/logo/robust-logo-light.png') }}" data-expand="{{ asset('vadmin-ui/app-assets/images/logo/robust-logo-light.png') }}" data-collapse="{{ asset('vadmin-ui/app-assets/images/logo/robust-logo-small.png') }}" class="brand-logo"></a></li>
				<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
			</ul>
		</div>
		<div class="navbar-container content container-fluid">
			<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
				<ul class="nav navbar-nav">
					<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
					<li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
				</ul>
				<ul class="nav navbar-nav float-xs-right">
					<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('images/users/'.Auth::user()->avatar ) }}" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>
						<div class="dropdown-menu dropdown-menu-right"><a href="{{ url('vadmin/users/'.Auth::user()->id) }}" class="dropdown-item"><i class="icon-head"></i> Perfil</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item">
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="icon-power3"></i> Desconectar
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>	
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>

	<!-- //////////////////////// SIDE MENU /////////////////////////////-->


	<!-- main menu-->
	<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
		<!-- main menu header-->
		{{--<div class="main-menu-header">
			<input type="text" placeholder="Search" class="menu-search form-control round"/>
		</div> --}}
		<!-- / main menu header-->
		<!-- main menu content-->
		<div class="main-menu-content">
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

			{{-- <li class="nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Item</span></a></li> --}}
			<li class="nav-item"><a href="#"><i class="icon-users2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Usuarios</span></a>
				<ul class="menu-content">
					<li><a href="{{ route('users.index') }}" class="menu-item"><i class="icon-list"></i> Listado</a></li>
					<li><a href="{{ route('users.create') }}" class="menu-item"><i class="icon-plus-round"></i> Nuevo Usuario</a></li>
				</ul>
			</li>

			<li class="nav-item has-sub"><a href="#"><i class="icon-folder-open"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Portfolio</span></a>
				<ul class="menu-content" style="">
					<li><a href="{{ route('portfolio.index') }}" class="menu-item"><i class="icon-list"></i> Listado</a></li>
					<li><a href="{{ route('portfolio.create') }}" class="menu-item"><i class="icon-plus-round"></i> Nuevo Artículo</a></li>
					<li class="has-sub is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Categorías</a>
						<ul class="menu-content" style="">
							<li class="is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> Listado</a></li>
							<li class="is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-plus-round"></i> Nueva Categoría</a></li>
						</ul>
					</li>
					<li class="has-sub is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item">Etiquetas</a>
						<ul class="menu-content" style="">
							<li class="is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-list"></i> Listado</a></li>
							<li class="is-shown"><a href="#" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item"><i class="icon-plus-round"></i> Nueva Etiqueta</a></li>
						</ul>
					</li>
				</ul>
			</li>

			
			<li class="navigation-header"><span data-i18n="nav.category.support">Ayuda</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
			</li>
			<li class="nav-item"><a href="#"><i class="icon-support"></i><span class="menu-title">Soporte</span></a>
			</li>
			<li class="nav-item"><a href="#"><i class="icon-document-text"></i><span class="menu-title">Documentación</span></a>
			</li>
		</ul>
		</div>
		<!-- /main menu content-->
		<!-- main menu footer-->
		<!-- include includes/menu-footer-->
		<!-- main menu footer-->
	</div>
	<!-- / main menu-->