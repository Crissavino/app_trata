<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje E: Datos del imputado</title>
</head>
<header>
    <ul class="nav nav-tabs">
        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link " href="B">Eje B: Caracterización de la victima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li>
        <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li> --}}
        <li class="nav-item"> <a class="nav-link active" href="#">Eje E: Datos del imputado</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="G">Eje G: Documentación</a> </li> --}}
    </ul>
</header>
<body>
	<h1 class="text-center" style="padding: 15px;">
        Eje E: Datos del imputado
        <h5 style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $numeroCarpeta }}</h5>
    </h1>

    <section class="container">
    	<form action="" class="form-group" method="post">
	    	{{ csrf_field() }}
	    	@method('PUT')
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $eFormulario->$numeroCarpeta }}">

	    	<div class="form-group">
	    		<label for=""><span>E 1.</span> Nombre y Apellido:</label>
	    		<input type="text" class="form-control" name="nombreApellido" value="{{ $eFormulario->nombreApellido }}">

	    		<label for="nomDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="nomDesconoce" class="nomSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 2.</span> Tipo de documento:</label>
		    	<select class="form-control documentos" name="edocumentos_id">
		    		<option value="">Seleccioná el tipo de documento</option>
		    		@foreach ($documentos as $documento)
		    			<option value="{{ $documento->getId() }}" {{ $documento->id == $eFormulario->edocumentos_id ? 'selected' : '' }}>{{ $documento->getNombre() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="documentoOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control documentoCual" name="documentoCual" value="{{ $eFormulario->documentoCual }}">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 3.</span> Número de documento:</label>
	    		<input type="text" class="form-control numeroDocumento" name="numeroDocumento" value="{{ $eFormulario->numeroDocumento }}">

	    		<label for="docDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="docDesconoce" class="docSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 4.</span> Edad:</label>
	    		<input type="text" class="form-control edad" name="edad" value="{{ $eFormulario->edad }}">

	    		<label for="edadDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="edadDesconoce" class="edadSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 5.</span> Género:</label>
		    	<select class="form-control genero" name="genero_id">
		    		<option value="">Seleccioná género</option>
		    		@foreach ($generos as $genero)
		    			<option value="{{ $genero->getIdGenero() }}" {{ $genero->id == $eFormulario->genero_id ? 'selected' : '' }}>{{ $genero->getNombreGenero() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="generoOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control generoCual" name="generoCual" value="{{ $eFormulario->generoCual }}">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 6.</span> Vinculación con la víctima:</label>
		    	<select class="form-control vinculacion" name="vinculacion_id">
		    		<option value="">Seleccioná vinculación</option>
		    		@foreach ($vinculaciones as $vinculacion)
		    			<option value="{{ $vinculacion->getId() }}" {{ $vinculacion->id == $eFormulario->vinculacion_id ? 'selected' : '' }}>{{ $vinculacion->getNombre() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="vinculacionOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control vinculacionCual" name="vinculacionCual" value="{{ $eFormulario->vinculacionCual }}">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 7.</span> Rol en el delito:</label>
	    		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label><br>
	    		@foreach ($roles as $rol)
	    			@php
						$rolIds = $eFormulario->roldelitos->pluck('id')->toArray();
						$checked = (in_array($rol->id, $rolIds)) ? 'checked' : ''
					@endphp
	    			@if ($rol->getNombre() == 'Se desconoce')
	    				<label for="" style="margin-left: 15px;">{{ $rol->getNombre() }}</label>
	    				<input {{ $checked }} type="checkbox" name="rolDelito_id[]" id="{{ $rol->getNombre() }}" class="rolDesconoce" value="{{ $rol->getId() }}">
	    			@else
	    				<label for="" style="margin-left: 15px;">{{ $rol->getNombre() }}</label>
	    				<input {{ $checked }} type="checkbox" name="rolDelito_id[]" id="{{ $rol->getNombre() }}" value="{{ $rol->getId() }}">
	    			@endif
	    		@endforeach
	    	</div>

	    	<button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button><br><br>
	    </form>
    </section>
			        
    <script src="/js/formularioE.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>