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
		/*.page-item.active .page-link {
			background-color: tomato;
			border-color: tomato
		}*/
	</style>
</head>
<body>



	<h1 class="text-center">Formularios individuales</h1>

	{{-- @if (session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif --}}
	
	<div class="container">
		<h2 class="text-center">Formularios del Eje A: Datos institucionales</h2>
			@foreach ($aFormularios as $aFormulario)
				<div class="cardForm" style="width: 18rem;">
		  			<div class="cardForm-body">
			    		<h5 class="cardForm-title">Carpeta Nº: {{ $aFormulario->datos_numero_carpeta }}</h5>
			    		{{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
			    		<a href="/formularios/edicion/A/{{$aFormulario->id }}" class="btn btn-primary">Ver/Editar</a>
		  			</div>
				</div>
			@endforeach
	</div>

	<a href="#B" title="B"></a>
	<div class="container">
		<h2 class="text-center">Formularios del Eje B: Caracterización de la victima</h2>
		@foreach ($bFormularios as $bFormulario)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $bFormulario->victima_nombre_y_apellido }} - DNI: {{ $bFormulario->victima_documento }}</h5>
			    {{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
			    <a href="/formularios/edicion/B/{{$bFormulario->id }}" class="btn btn-primary">Ver/Editar</a>
			  </div>
			</div>
		@endforeach
	</div>

</body>
</html>