<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formularios</title>
	@include('partials.head')
	<style type="text/css">
		body {
			padding: 40px
		}
		/*.page-item.active .page-link {
			background-color: tomato;
			border-color: tomato
		}*/
	</style>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<body>



	<h1 class="text-center">Formularios individuales</h1>

	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif
	
	<div class="container">
		<h2 class="text-center">Formularios del Eje A: Datos institucionales</h2>
			@foreach ($aFormPorId as $aFormulario)
				<div class="cardForm" style="width: 18rem;">
		  			<div class="cardForm-body">
			    		<h5 class="cardForm-title">Carpeta Nº: {{ $aFormulario->datos_numero_carpeta }}</h5>
			    		{{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
			    		<a href="/formularios/edicion/A/{{$aFormulario->id }}" class="btn btn-primary float-left" style="margin-right: 10px;">Ver/Editar</a>
			    		<form action="/formularios/edicion/A/{{$aFormulario->id}}" class="" method="post">
							@method('DELETE')
							@csrf
							<button class="btn btn-danger">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
						</form>
		  			</div>
				</div>
			@endforeach
	</div>

	<div class="container">
		<h2 class="text-center">Formularios del Eje B: Caracterización de la victima</h2>
		@foreach ($bFormPorId as $bFormulario)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $bFormulario->victima_nombre_y_apellido }} - DNI: {{ $bFormulario->victima_documento }}</h5>
			    {{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
			    <a href="/formularios/edicion/B/{{$bFormulario->id }}" class="btn btn-primary float-left" style="margin-right: 10px;">Ver/Editar</a>
			    <form action="/formularios/edicion/B/{{$bFormulario->id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<span class="fa fa-trash" aria-hidden="true"></span>
					</button>
				</form>
			  </div>
			</div>
		@endforeach
	</div>

	<div class="container">
		<h2 class="text-center">Formularios del Eje C: Grupo Conviviente</h2>
		@foreach ($cFormPorId as $cFormulario)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $cFormulario->nombre_apellido }}</h5>
			    {{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
			    <a href="/formularios/edicion/C/{{$cFormulario->cformulario_id }}" class="btn btn-primary float-left" style="margin-right: 10px;">Ver/Editar</a>
			    <form action="/formularios/edicion/C/{{$cFormulario->cformulario_id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<span class="fa fa-trash" aria-hidden="true"></span>
					</button>
				</form>
			  </div>
			</div>
		@endforeach
	</div>

</body>
</html>