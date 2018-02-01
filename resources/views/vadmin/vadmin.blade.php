@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Inicio')

@section('header_title', 'Inicio | ')

@section('header_subtitle')
	Bienvenid@ <b>{{ Auth::user()->name }}</b>
@endsection

@section('styles')
@endsection

@section('content')
	<div class="dashboard">


	<div class="content-body"><!--native-font-stack -->
		<section id="global-settings" class="card">
			<div class="card-header">
				<h4 class="card-title">Bienvenid@ a Vadmin</h4>
			</div>
			<div class="card-body collapse in">
				<div class="card-block">
					<div class="card-text">
						<p>
							Esta es una <b>breve demostración</b> del administrador <b>VADMIN.</b> <br>
							No está expresado aquí todo el potencial de la aplicación. <br>
							En el sistema final la cantidad de secciones dependerá de la complejidad de lo que se requiera gestionar y
							las funcionalidades que se quieran incluír. <br>
							Para saber más sobre las funcionalidades del VADMIN haga click en el siguiente botón:
						</p>
						<a href="{{ url('vadmin/docs') }}" class="btn btnBlue">Más información Sobre VADMIN</a>
						<hr class="softhr">
						<p>
							<b><i class="icon-share4"></i> Estructura</b> <br>
							Esta demo contiene:<br><br>
							
							- <b><a href="{{ url('/') }}" style="color: blue">Una web</a></b> con secciones públicas. <br>
							Por ej: Inicio - Info Institucional - Contacto - Etc. <br> <br>
							
							- <a href="{{ route('store') }}" style="color: blue"><b> Un catálogo</b></a> donde se verán los items cargados en el sistema a modo de prueba.<br><br>
							
							- <b><a href="{{ url('vadmin') }}" style="color: blue">El sistema de gestión (Vadmin)</a></b> 
							solo accesible mediante una URL y <b>protegido</b> por acceso con nombre de usuario y contraseña.
							<br><br>


						</p>
						<hr class="softhr">
						<p>
							<b><i class="icon-help2"></i> Como empezar</b> <br><br>
							Desde el menú de la izquierda se puede ver el link <b>"Sección1".</b> <br>
							Esta es una sección genérica para probar el funcionamiento del sistema y la carga de datos. <br>
							En "Nuevo Item" se ingresan y en "Listado" se administran los mismos.
							<br><br>
							La <b>Sección1</b> tiene a su vez <b>secciones dependientes:</b><br>
							- <a style="color: blue" href="{{ route('cat_categorias.index') }}">Categorías</a> <br>
							- <a style="color: blue" href="{{ route('cat_tags.index') }}">Etiquetas</a> <br>
							- <a style="color: blue" href="{{ route('cat_atribute1.index') }}">Cualidades</a> <br><br>
							En ellas se ingresarán distintos datos que serán posible seleccionar al momento de cargar 
							items en la sección <b>"Sección1".</b><br>
							Son datos relacionales que permiten tanto filtrar los items en los buscadores como ahorrar trabajo a la hora de 
							la carga de items.
							<br><br>
							Luego los items cargados se podrán ver en una <a href="{{ route('store') }}" style="color: blue"> sección pública (web)</a>
							 que es accesible a <b>cualquier persona en internet.</b> <br>
							 
							Si se pausa algún item desde el listado no será visible en la web. <br>
						</p>
						<hr class="softhr">
						<p>
							<b><i class="icon-mail6"></i> Formulario de Mensajes</b> <br><br>
							En la página principal de la <a href="{{ url('/') }}" style="color: blue">web pública</a> hay un formulario en el que se pueden ingresar <b>mensajes de prueba.</b><br>
							Una vez ingresados mensajes se pueden visualizar y gestionar desde el administrador.
						</p>
						<hr class="softhr">	
						<p>
							<b><i class="icon-cog3"></i> Testeé Libremente</b> <br><br>
							Sientasé libre de crear, modificar y eliminar lo que deseé. <br>
						</p>
						Le recordamos ingresar a la <a href="{{ url('vadmin/docs') }}" style="color: blue">siguiente sección</a> para conocer más sobre el potencial de VADMIN.
						<hr class="softhr">							
						<a href="{{ url('/') }}" class="btn btnBlue">Web - Página Principal</a>
						<a href="{{ route('store') }}" class="btn btnBlue">Web - Items Cargados</a>
						
					</div>
				</div>
			</div>
		</section>
		<!--/ Global settings -->
	
	
		</section>
				</div>
	<div id="Error"></div>
@endsection

@section('scripts')
	
@endsection

@section('custom_js')

@endsection
