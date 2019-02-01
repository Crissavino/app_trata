<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje E: Datos del imputado</title>
</head>
<header>
	<ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="B">Eje B: Caracterización de la víctima</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li> --}}
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/A/{{ $carpeta->aformulario_id }}">Eje A: Datos institucionales</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/B/{{ $carpeta->bformulario_id }}">Eje B: Caracterización de la víctima</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/C/{{ $carpeta->cformulario_id }}">Eje C: Grupo Conviviente</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/D/{{ $carpeta->dformulario_id }}">Eje D: Datos de delito</a> </li>
                @break
            @endif
        @endforeach
        <li class="nav-item"> <a class="nav-link active" href="#">Eje E: Datos del imputado</a> </li>
        <li class="nav-item"> <a class="nav-link " href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="G">Eje G: Documentación</a> </li>
    </ul>
</header>
<body>
	@if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <section class="container">
    	<form action="" class="form-group" method="post">
	    	{{ csrf_field() }}
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $numeroCarpeta }}">

            <h1 class="text-center" style="padding: 15px;">
                Eje E: Datos del imputado
                <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $numeroCarpeta }}</h5>
                {{-- <h5 style="text-align: center;" >Seleccioná la carpeta sobre la que deseas trabajar
                <select name="numeroCarpeta" class="select-sinborde">
                    @foreach ($todoFormA as $formA)
                        <option value="{{ $formA->datos_numero_carpeta }}">{{ $formA->datos_numero_carpeta }}</option>
                    @endforeach
                </select>
                </h5> --}}
            </h1>

	    	<div class="form-group">
	    		<label for=""><span>E 1.</span> Nombre y Apellido:</label>
	    		<input type="text" class="form-control nombreApellido" name="nombreApellido">

	    		<label for="nomDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="nomDesconoce" class="nomSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 2.</span> Tipo de documento:</label>
		    	<select class="form-control documentos" name="edocumentos_id">
		    		<option value="">Seleccioná el tipo de documento</option>
		    		@foreach ($documentos as $documento)
		    			<option value="{{ $documento->getId() }}">{{ $documento->getNombre() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="documentoOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control documentoCual" name="documentoCual">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 3.</span> Número de documento:</label>
	    		<input type="text" class="form-control numeroDocumento" name="numeroDocumento">

	    		<label for="docDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="docDesconoce" class="docSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 4.</span> Edad:</label>
	    		<input type="text" class="form-control edad" name="edad">

	    		<label for="edadDesconoce">Se desconoce</label>
	    		<input type="checkbox" id="edadDesconoce" class="edadSeDesconoce">
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 5.</span> Género:</label>
		    	<select class="form-control genero" name="genero_id">
		    		<option value="">Seleccioná género</option>
		    		@foreach ($generos as $genero)
		    			<option value="{{ $genero->getIdGenero() }}">{{ $genero->getNombreGenero() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="generoOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control generoCual" name="generoCual">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 6.</span> Vinculación con la víctima:</label>
		    	<select class="form-control vinculacion" name="vinculacion_id">
		    		<option value="">Seleccioná vinculación</option>
		    		@foreach ($vinculaciones as $vinculacion)
		    			<option value="{{ $vinculacion->getId() }}">{{ $vinculacion->getNombre() }}</option>
		    		@endforeach
		    	</select>

		    	<div class="vinculacionOtro" style="display: none;">
		    		<label for="">Cual?</label>
		    		<input type="text" class="form-control vinculacionCual" name="vinculacionCual">
		    	</div>
	    	</div>

	    	<div class="form-group">
	    		<label for=""><span>E 7.</span> Rol en el delito:</label>
	    		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label><br>
	    		@foreach ($roles as $rol)
	    			@if ($rol->getNombre() == 'Se desconoce')
	    				<label for="" style="margin-left: 15px;">{{ $rol->getNombre() }}</label>
	    				<input type="checkbox" name="rolDelito_id[]" id="{{ $rol->getNombre() }}" class="rolDesconoce" value="{{ $rol->getId() }}">
	    			@else
	    				<label for="" style="margin-left: 15px;">{{ $rol->getNombre() }}</label>
	    				<input type="checkbox" name="rolDelito_id[]" id="{{ $rol->getNombre() }}" value="{{ $rol->getId() }}">
	    			@endif
	    		@endforeach
	    	</div>

	    	<button type="submit" class="btn btn-primary col-xl" name="button">Guardar</button><br><br>
	    </form>
    </section>
			        
    <script src="/js/formularioE.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	{{-- ALERTA PARA LLENAR PRIMERO EL FORMULARIO A --}}
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          swal(msg);
        }
    </script>
    {{-- FIN SCRIPT --}}

</body>
</html>