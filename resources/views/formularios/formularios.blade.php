<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formularios</title>
	@include('partials.head')
	<style type="text/css">
		body {
			/*padding: 5px*/
		}
		/*.page-item.active .page-link {
			background-color: tomato;
			border-color: tomato
		}*/
	</style>

</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link" href="/home">Inicio</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li>
        <li class="nav-item active"> <a class="nav-link active" href="#">Formularios</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
    </ul>
</header>
<body>

	<h1 class="text-center">Carpetas de {{ $userName }}</h1>

	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif

	<div class="container" style="overflow: hidden;">
		<h2 class="text-center">Formularios individuales</h2>

			@foreach ($carpetas as $carpeta)
			    <div class="cardForm d-flex flex-column float-left">
			    	<h4 class="cardForm-title"><strong>Carpeta Nº: {{ $carpeta->numeroCarpeta }}</strong></h4>
				    
				    <div class="mb-3">
				    	<h5 class="cardForm-title">Eje A</h5>
			    		<a href="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
			    		@if (auth()->user()->isAdmin === 1)
			    			<form action="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="" method="post">
								@method('DELETE')
								@csrf
								<button class="btn btn-danger">
									<i class="far fa-trash-alt"></i> Borrar </span>
								</button>
							</form>
			    		@endif
				    </div>

				    <div class="mb-3">
				    	@if ($carpeta->bformulario_id)
				    		<h5 class="cardForm-title">Eje B</h5>
				    		<a href="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@else
				    		<h5 class="cardForm-title">Eje B</h5>
				    		<a href="/formularios/B" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div>

				    <div class="mb-3">
				    	@if ($carpeta->bformulario_id && $carpeta->cformulario_id)
				    		<h5 class="cardForm-title">Eje C</h5>
				    		<a href="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@elseif($carpeta->bformulario_id && !($carpeta->cformulario_id))
				    		<h5 class="cardForm-title">Eje C</h5>
				    		<a href="/formularios/C" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div>

				    <div class="mb-3">
				    	@if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id)
				    		<h5 class="cardForm-title">Eje D</h5>
				    		<a href="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@elseif($carpeta->bformulario_id && $carpeta->cformulario_id && !($carpeta->dformulario_id))
				    		<h5 class="cardForm-title">Eje D</h5>
				    		<a href="/formularios/D" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div>

				    {{-- <div class="mb-3">
				    	@if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id)
				    		<h5 class="cardForm-title">Eje E</h5>
				    		<a href="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->eformulario_id))
				    		<h5 class="cardForm-title">Eje E</h5>
				    		<a href="/formularios/E" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div> --}}

				    <div class="mb-3">
				    	@if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id)
				    		<h5 class="cardForm-title">Eje F</h5>
				    		<a href="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->fformulario_id))
				    		<h5 class="cardForm-title">Eje F</h5>
				    		<a href="/formularios/F" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div>

				    <div class="mb-3">
				    	@if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && $carpeta->gformulario_id)
				    		<h5 class="cardForm-title">Eje G</h5>
				    		<a href="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
				    		@if (auth()->user()->isAdmin === 1)
				    			<form action="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="" method="post">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger">
										<i class="far fa-trash-alt"></i> Borrar </span>
									</button>
								</form>
				    		@endif
				    	@elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && !($carpeta->gformulario_id))
				    		<h5 class="cardForm-title">Eje G</h5>
				    		<a href="/formularios/G" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
				    	@endif
				    </div>

			    </div>
			@endforeach
	</div>
</body>
</html>