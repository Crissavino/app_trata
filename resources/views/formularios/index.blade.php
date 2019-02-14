<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formularios</title>
	@include('partials.head')
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		body {
			padding: 40px
		}
		.page-item.active .page-link {
			background-color: tomato;
			border-color: tomato
		}

		.menu-lista{
			display: flex;
			align-items: center;
		}

	</style>
</head>
<header>
	@if (auth()->user()->isAdmin == 2)
		<div class="menu">
			<nav>
				<span class="mobile-btn"><img width="40px" height="40px" src="/img/profile-user.png" alt=""></span>
				<ul class="menu-mobile">
			  		<li><a href="/mapas" title="">Mapas de calor</a></li>
					<li><a href="/descargarEstadisticas" title="">Estadísticas</a></li>
			  		<li><a href="/logout" title="">Cerrar sesión</a></li>
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Costos</a></li> --}}
					{{-- <li><a href="" title="">Testimonios</a></li> --}}
				</ul>
			</nav>
		</div>
	@else
		<div class="menu">
			<nav>
				<span class="mobile-btn"><img width="40px" height="40px" src="/img/profile-user.png" alt=""></span>
				<ul class="menu-mobile">
			  		<li><a href="/logout" title="">Cerrar sesión</a></li>
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Formularios</a></li> --}}
					{{-- <li><a href="" title="">Costos</a></li> --}}
					{{-- <li><a href="" title="">Testimonios</a></li> --}}
				</ul>
			</nav>
		</div>
	@endif
</header>
<body>
	<h1 class="text-center mb-5" style="margin-top: 60px;">Bienvenido {{ auth()->user()->name }}</h1>

	<div class="list-group menu-lista">
		@if (auth()->user()->isAdmin !== 2)
			<a href="/formularios/A" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Cargar carpeta</a><br>
		@endif
		{{-- <a href="/formularios" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Continuar carga</a><br> --}}
		{{-- <a href="/formularios" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Carpetas cargadas</a><br> --}}
		<a href="/formularios/buscador" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Buscador</a><br>
		{{-- <a href="/formularios/D" class="list-group-item list-group-item-action text-center active btn-primary">Eje D: Datos de delito</a><br>
		<a href="/formularios/E" class="list-group-item list-group-item-action text-center active btn-primary">Eje E: Datos del imputado</a><br>
		<a href="/formularios/F" class="list-group-item list-group-item-action text-center active btn-primary">Eje F: Atención del caso</a><br>
		<a href="/formularios/G" class="list-group-item list-group-item-action text-center active btn-primary">Eje G: Documentación</a><br> --}}
	</div>

	<script src="/js/menu-mobile.js"></script>

</body>
</html>