<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formularios</title>
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
<body>
	<h1 class="text-center mt-5">Bienvenido {{ auth()->user()->name }}</h1>

	<div class="list-group menu-lista">
		<a href="/formularios/A" class="w-50 list-group-item list-group-item-action text-center active btn-success mt-5 mb-5">Cargar carpeta</a><br>
		<a href="/formularios" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Continuar carga</a><br>
		<a href="/formularios" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Carpetas cargadas</a><br>
		<a href="/formularios/buscador" class="w-50 list-group-item list-group-item-action text-center active btn-success mb-5">Buscador</a><br>
		{{-- <a href="/formularios/D" class="list-group-item list-group-item-action text-center active btn-primary">Eje D: Datos de delito</a><br>
		<a href="/formularios/E" class="list-group-item list-group-item-action text-center active btn-primary">Eje E: Datos del imputado</a><br>
		<a href="/formularios/F" class="list-group-item list-group-item-action text-center active btn-primary">Eje F: Atención del caso</a><br>
		<a href="/formularios/G" class="list-group-item list-group-item-action text-center active btn-primary">Eje G: Documentación</a><br> --}}
	</div>

</body>
</html>