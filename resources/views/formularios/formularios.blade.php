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

</head>
<body>

	<h1 class="text-center">Carpetas de {{ $userName }}</h1>

	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif

	<div class="container">
		<h2 class="text-center">Formularios individuales</h2>
			@foreach ($aFormPorId as $aFormulario)
				<div class="cardForm mt-0 mb-0" style="width: 18rem;">
		  			<div class="cardForm-body">
			    		<div class="mb-3">
			    			<h4 class="cardForm-title"><strong>Carpeta Nº: {{ $aFormulario->datos_numero_carpeta }}</strong></h4>
				    		<h5 class="cardForm-title">Eje A</h5>
				    		{{-- <p class="cardForm-text">Some quick example text to build on the cardForm title and make up the bulk of the cardForm's content.</p> --}}
				    		<a href="/formularios/edicion/A/{{$aFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/A/{{$aFormulario->id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
			    		</div>
			    		
						<div class="mb-3">
							@foreach ($bFormPorId as $bFormulario)
								@if ($aFormulario->datos_numero_carpeta == $bFormulario->numeroCarpeta)
				    				<h5 class="cardForm-title">Eje B</h5>
									<a href="/formularios/edicion/B/{{ $bFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
						    		@if (auth()->user()->isAdmin === 1)
						    			<form action="/formularios/edicion/B/{{ $bFormulario->id }}" class="" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i> Borrar </span>
											</button>
										</form>
						    		@endif
								@endif
							@endforeach
						</div>

						<div class="mb-3">
							@foreach ($cFormPorId as $cFormulario)
								@if ($aFormulario->datos_numero_carpeta == $cFormulario->numeroCarpeta)
				    				<h5 class="cardForm-title">Eje C</h5>
									<a href="/formularios/edicion/C/{{ $cFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
						    		@if (auth()->user()->isAdmin === 1)
						    			<form action="/formularios/edicion/C/{{ $cFormulario->id }}" class="" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i> Borrar </span>
											</button>
										</form>
						    		@endif
								@endif
							@endforeach
						</div>

						<div class="mb-3">
							@foreach ($dFormPorId as $dFormulario)
								@if ($aFormulario->datos_numero_carpeta == $dFormulario->numeroCarpeta)
				    				<h5 class="cardForm-title">Eje D</h5>
									<a href="/formularios/edicion/D/{{ $dFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
						    		@if (auth()->user()->isAdmin === 1)
						    			<form action="/formularios/edicion/D/{{ $dFormulario->id }}" class="" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i> Borrar </span>
											</button>
										</form>
						    		@endif
								@endif
							@endforeach
						</div>

						<div class="mb-3">
							@foreach ($eFormPorId as $eFormulario)
								@if ($aFormulario->datos_numero_carpeta == $eFormulario->numeroCarpeta)
				    				<h5 class="cardForm-title">Eje E</h5>
									<a href="/formularios/edicion/E/{{ $eFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
						    		@if (auth()->user()->isAdmin === 1)
						    			<form action="/formularios/edicion/E/{{ $eFormulario->id }}" class="" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i> Borrar </span>
											</button>
										</form>
						    		@endif
								@endif
							@endforeach
						</div>

						<div class="mb-3">
							@foreach ($fFormPorId as $fFormulario)
								@if ($aFormulario->datos_numero_carpeta == $fFormulario->numeroCarpeta)
				    				<h5 class="cardForm-title">Eje F</h5>
									<a href="/formularios/edicion/F/{{ $fFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
						    		@if (auth()->user()->isAdmin === 1)
						    			<form action="/formularios/edicion/F/{{ $fFormulario->id }}" class="" method="post">
											@method('DELETE')
											@csrf
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i> Borrar </span>
											</button>
										</form>
						    		@endif
								@endif
							@endforeach
						</div>
		  			</div>
				</div>
			@endforeach
	</div>


	{{-- <div class="container">
		<h2 class="text-center">Formularios del Eje A: Datos institucionales</h2>
			@foreach ($aFormPorId as $aFormulario)
				<div class="cardForm" style="width: 18rem;">
		  			<div class="cardForm-body">
			    		<h5 class="cardForm-title">Carpeta Nº: {{ $aFormulario->datos_numero_carpeta }}</h5>
			    		<a href="/formularios/edicion/A/{{$aFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    		<form action="/formularios/edicion/A/{{$aFormulario->id}}" class="" method="post">
							@method('DELETE')
							@csrf
							<button class="btn btn-danger">
								<i class="far fa-trash-alt"></i> Borrar </span>
							</button>
						</form>
		  			</div>
				</div>
			@endforeach
	</div>

	<div class="container">
		<h2 class="text-center">Formularios del Eje B: Caracterización de la victima</h2>
		@foreach ($bFormPorId as $bFormulario)
	@dd($bFormulario->numeroCarpeta)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $bFormulario->victima_nombre_y_apellido }} - DNI: {{ $bFormulario->victima_documento }}</h5>
			    <a href="/formularios/edicion/B/{{$bFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    <form action="/formularios/edicion/B/{{$bFormulario->id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<i class="far fa-trash-alt"></i> Borrar </span>
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
			    <a href="/formularios/edicion/C/{{$cFormulario->cformulario_id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    <i class="far fa-edit"></i>
			    <form action="/formularios/edicion/C/{{$cFormulario->cformulario_id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<i class="far fa-trash-alt"></i> Borrar </span>
					</button>
				</form>
			  </div>
			</div>
		@endforeach
	</div>

	<div class="container">
		<h2 class="text-center">Formularios del Eje D: Datos de delito</h2>
		@foreach ($dFormPorId as $dFormulario)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $dFormulario->calificaciongeneral_id }}</h5>
			    <a href="/formularios/edicion/D/{{$dFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    <form action="/formularios/edicion/D/{{$dFormulario->id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<i class="far fa-trash-alt"></i> Borrar </span>
					</button>
				</form>
			  </div>
			</div>
		@endforeach
	</div>

	<div class="container">
		<h2 class="text-center">Eje E: Datos del imputado</h2>
		@foreach ($eFormPorId as $eFormulario)
			<div class="cardForm" style="width: 18rem;">
			  <div class="cardForm-body">
			    <h5 class="cardForm-title">{{ $eFormulario->nombreApellido }}</h5>
			    <a href="/formularios/edicion/E/{{$eFormulario->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    <form action="/formularios/edicion/E/{{$eFormulario->id}}" method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-danger">
						<i class="far fa-trash-alt"></i> Borrar </span>
					</button>
				</form>
			  </div>
			</div>
		@endforeach
	</div> --}}

</body>
</html>