<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje D: Datos de delito</title>
	<style>
        .cerrarSesion{
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<header>
	<ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="B">Eje B: Caracterización de la víctima</a> </li> --}}
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
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/C/{{ $carpeta->cformulario_id }}">Eje C: Referentes afectivos</a> </li>
                @break
            @endif
        @endforeach
        <li class="nav-item"> <a class="nav-link active" href="D">Eje D: Datos de delito</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li> --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        <li class="nav-item"> <a class="nav-link " href="F">Eje E: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="G">Eje F: Detalle de intervención</a> </li>
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
                Eje D: Datos de delito
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
	    		<label for="">D 1. Calificación general: </label>
	    		<select class="form-control calificacionGeneral" name="calificaciongeneral_id" {{ $errors->has('calificaciongeneral_id') ? 'has-error' : ''}}>
	    			<option value="">Seleccioná una calificación</option>
	    			@foreach ($datosCalificacionGeneral as $calificacionGeneral)
	    				<option value="{{ $calificacionGeneral->getId() }}" {{ old('calificaciongeneral_id') == $calificacionGeneral->getId() ? 'selected' : '' }}>{{ $calificacionGeneral->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('calificaciongeneral_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	
	    	 	<div style="display: none;" class="calificacionGeneralCual" {{ $errors->has('calificaciongeneral_otra') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control calificacionGeneralOtraInput" name="calificaciongeneral_otra" value="{{ old('calificaciongeneral_otra') }}">
	    	 	</div>
	    		{!! $errors->first('calificaciongeneral_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group">
	    		<label for="">D 2. Calificación específica: </label>
	    		<select class="form-control" name="calificacionespecifica_id" {{ $errors->has('calificacionespecifica_id') ? 'has-error' : ''}}>
	    			<option value="">Seleccioná una calificación específica</option>
	    			@foreach ($datosCalificacionEspecifica as $calificacionEspecifica)
	    				<option value="{{ $calificacionEspecifica->getId() }}" {{ old('calificacionespecifica_id') == $calificacionEspecifica->getId() ? 'selected' : '' }}>{{ $calificacionEspecifica->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('calificacionespecifica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group">
	    		<label for="">D 3. Finalidad:</label>
	    		<select class="form-control finalidad" name="finalidad_id" {{ $errors->has('finalidad_id') ? 'has-error' : ''}}>
	    			<option value="">Seleccioná una finalidad</option>
	    			@foreach ($datosFinalidad as $finalidad)
	    				<option value="{{ $finalidad->getId() }}" {{ old('finalidad_id') == $finalidad->getId() ? 'selected' : '' }}>{{ $finalidad->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('finalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	
	    	 	<div style="display: none;" class="finalidadCual" {{ $errors->has('finalidad_otra') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control" name="finalidad_otra" value="{{ old('finalidad_otra') }}">
	    	 	</div>
	    		{!! $errors->first('finalidad_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group">
	    		<label for="">D 4. Actividad: </label>
	    		<select class="form-control actividad" name="actividad_id" {{ $errors->has('actividad_id') ? 'has-error' : ''}}>
	    			<option value="">Seleccioná una actividad</option>
	    			@foreach ($datosActividad as $actividad)
	    				<option value="{{ $actividad->getId() }}" {{ old('actividad_id') == $actividad->getId() ? 'selected' : '' }}>{{ $actividad->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('actividad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    		<div style="display: none;" class="actividadCual" {{ $errors->has('actividad_otra') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control actividadOtraInput" name="actividad_otra" value="{{ old('actividad_otra') }}">
	    	 	</div>
	    		{!! $errors->first('actividad_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	
	    	 	{{-- ver como persistir los checkbox --}}
	    	 	<div style="display: none;" class="privado">
	    	 		<label for="">D 5 II. Lugar de ofrecimiento:</label>
	    	 		{{-- ver como ponerlo como subtitulo --}}
	    	 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
	    	 		<div>
	    	 			<div class="checkPrivado" {{ $errors->has('privado_id[]') ? 'has-error' : ''}}>
	    	 				@foreach ($datosPrivado as $privado)
		    	 				@if ($privado->getNombre() == 'Otro')
		    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
		    	 					<input type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoOtro" value="{{ $privado->getId() }}" name="privado_id[]">
		    	 				@elseif($privado->getNombre() == 'Se desconoce')
		    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
			    	 				<input type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoDesconoce" value="{{ $privado->getId() }}" name="privado_id[]">
		    	 				@else
			    	 				<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
			    	 				<input type="checkbox" id="{{ $privado->getNombre().'Privado' }}" value="{{ $privado->getId() }}" name="privado_id[]">
		    	 				@endif
			    			@endforeach
	    					{!! $errors->first('privado_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 			</div>

	    	 			<div style="display: none;" class="privadoCual" {{ $errors->has('privado_otra') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input type="text" class="form-control privadoOtraInput" name="privado_otra" value="{{ old('privado_otra') }}">
			    	 	</div>
	    				{!! $errors->first('privado_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 		</div>
	    	 	</div>

	    	 	<div style="display: none;" class="textil">
	    	 		<label for="">D 5 III.</label>
	    	 		<div {{ $errors->has('marcaTextil') ? 'has-error' : ''}}>
	    	 			<label for="">a) Nombre de marca, sello, nombre registral o franquicia:</label>
	    	 			<input type="text" class="form-control marcaTextil" name="marcaTextil" value="{{ old('marcaTextil') }}">
	    	 		</div>
	    			{!! $errors->first('marcaTextil', '<p class="help-block" style="color:red";>:message</p>') !!}
	    			<div class="form-group">
	    				<label for="">Se desconoce</label>
	    				<input type="checkbox" class="marcaDesconoce" name="">
	    			</div>	

	    			<label for="">b) Lugar de venta:</label>
	    	 		{{-- ver como ponerlo como subtitulo --}}
	    	 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
	    	 		<div {{ $errors->has('textil_id[]') ? 'has-error' : ''}}>
	    	 			@foreach ($datosTextil as $textil)
	    	 				@if ($textil->getNombre() == 'Otro')
	    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
	    	 					<input type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilOtro" value="{{ $textil->getId() }}" name="textil_id[]">
    	 					@elseif ($textil->getNombre() == 'Se desconoce')
    	 						<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
    	 						<input type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilDesconoce" value="{{ $textil->getId() }}" name="textil_id[]">
	    	 				@else
	    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
	    	 					<input type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextil" value="{{ $textil->getId() }}" name="textil_id[]">
	    	 				@endif
		    			@endforeach
	    				{!! $errors->first('textil_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 		</div>

	    	 		<div style="display: none;" class="textilCual" {{ $errors->has('textil_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control textilOtraInput" name="textil_otra" value="{{ old('textil_otra') }}">
		    	 	</div>
	    			{!! $errors->first('textil_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	</div>

	    	 	<div style="display: none;" class="rural">
	    	 		<label for="">D 5 I.</label>
	    	 		<label for="">a) Tipo de negocio de venta: </label>
	    	 		{{-- ver como ponerlo como subtitulo --}}
	    	 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
	    	 		<div {{ $errors->has('rural_id[]') ? 'has-error' : ''}}>
	    	 			@foreach ($datosRural as $rural)
	    	 				@if ($rural->getNombre() == 'Otro')
	    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
	    	 					<input type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralOtro" value="{{ $rural->getId() }}" name="rural_id[]">
	    	 				@elseif ($rural->getNombre() == 'Se desconoce')
	    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
	    	 					<input type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralDesconoce" value="{{ $rural->getId() }}" name="rural_id[]">
	    	 				@else
	    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
	    	 					<input type="checkbox" id="{{ $rural->getNombre().'Rural' }}" value="{{ $rural->getId() }}" name="rural_id[]">
	    	 				@endif
		    			@endforeach
	    				{!! $errors->first('rural_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	 			<div style="display: none;" class="ruralCual" {{ $errors->has('rural_otra') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input type="text" class="form-control ruralOtraInput" name="rural_otra" value="{{ old('rural_otra') }}">
			    	 	</div>
	    	 		</div>
	    			{!! $errors->first('rural_otra', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	 		<div {{ $errors->has('domicilioVenta') ? 'has-error' : ''}}>
	    	 			<label for="">b) Domicilio del lugar de venta:</label>
		    	 		<input type="text" class="form-control ruralCualDomicilio" name="domicilioVenta" value="{{ old('domicilioVenta') }}">
		    	 		
		    	 		<label for="">Se desconoce</label>
			 			<input type="checkbox" class="ruralCualDesconoce" name="">
	    	 		</div>
	    			{!! $errors->first('domicilioVenta', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	</div>
	    	</div>

	    	<div class="form-group">
		 		<!-- {{-- PAISES --}} -->
		 		{{-- ver como hacer para los casos en que se desconozca --}}
		 			<label for="countryId">D 6. País de captación:</label>
			        <select name="paisCaptacion" class="countries order-alpha form-control" id="countryId">
					    <option value="">Seleccioná pais de captación</option>
					</select>

					<label for="desconocePaisCaptacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconocePaisCaptacion" value="Se desconoce"><br>

					<label for="stateId">D 7. Provincia de captación:</label>
			        <select name="provinciaCaptacion" class="states order-alpha form-control" id="stateId">
			            <option value="">Seleccioná provincia de captación</option>
			        </select>

			        <label for="desconoceProvinciaCaptacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconoceProvinciaCaptacion" value="Se desconoce"><br>

			        <label for="cityId">D 8. Localidad de captación:</label>
			        <select name="ciudadCaptacion" class="cities order-alpha form-control" id="cityId">
			            <option value="">Seleccioná ciudad de captación</option>
			        </select>

			        <label for="desconoceCiudadCaptacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconoceCiudadCaptacion" value="Se desconoce"><br>

			    <!-- {{-- FIN PAISES --}} -->
		 	</div>

		 	<div class="form-group" {{ $errors->has('contactoexplotacion_id') ? 'has-error' : ''}}>
	    		<label for="">D 9. Modo de contacto con lugar de explotación:</label>
	    		<select class="form-control contactoExplotacion" name="contactoexplotacion_id">
	    			<option value="">Seleccioná un modo de contacto</option>
	    			@foreach ($datosContactoExplotacion as $contactoExplotacion)
	    				<option value="{{ $contactoExplotacion->getId() }}" {{ old('contactoexplotacion_id') == $contactoExplotacion->getId() ? 'selected' : '' }}>{{ $contactoExplotacion->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('contactoexplotacion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	
	    	 	<div style="display: none;" class="contactoExplotacionCual" {{ $errors->has('contactoexplotacion_otro') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control" name="contactoexplotacion_otro" value="{{ old('contactoexplotacion_otro') }}">
	    	 	</div>
	    		{!! $errors->first('contactoexplotacion_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('viajo_id') ? 'has-error' : ''}}>
	    		<label for="">D 10 Viajó:</label>
	    		<select class="form-control viajo" name="viajo_id">
	    			<option value="">Seleccioná como viajó</option>
	    			@foreach ($datosViajo as $viajo)
	    				<option value="{{ $viajo->getId() }}" {{ old('viajo_id') == $viajo->getId() ? 'selected' : '' }}>{{ $viajo->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('viajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    		<div style="display: none;" class="viajoAcompanado">
	    	 		<div {{ $errors->has('acompanado_id') ? 'has-error' : ''}}>
	    	 			<label for="">D 10 I. ¿Por quién?:</label>
			    		<select class="form-control" name="acompanado_id">
			    			<option value="">Seleccioná quién la/lo acompañó</option>
			    			@foreach ($datosAcompanado as $acompanado)
			    				<option value="{{ $acompanado->getId() }}" {{ old('acompanado_id') == $acompanado->getId() ? 'selected' : '' }}>{{ $acompanado->getNombre() }}</option>
			    			@endforeach
			    		</select>
	    	 		</div>
	    			{!! $errors->first('acompanado_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	 		<div {{ $errors->has('acompanadored_id') ? 'has-error' : ''}}>
	    	 			<label for="">D 10 II. Acompañante relacionado con la red:</label>
			    		<select class="form-control" name="acompanadored_id">
			    			<option value="">Estaba relacionado?</option>
			    			@foreach ($datosAcompanadoRed as $acompanadoRed)
			    				<option value="{{ $acompanadoRed->getId() }}" {{ old('acompanadored_id') == $acompanadoRed->getId() ? 'selected' : '' }}>{{ $acompanadoRed->getNombre() }}</option>
			    			@endforeach
			    		</select>
	    	 		</div>
	    			{!! $errors->first('acompanadored_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 	</div>
	    	</div>

	    	<div class="form-group">
		 		<!-- {{-- PAISES --}} -->
		 		{{-- ver como hacer para los casos en que se desconozca --}}

		 			<label for="countryId2">D 11. País de explotación:</label>
			        <select name="paisExplotacion" class="countries2 order-alpha form-control" id="countryId2">
			            <option value="">Seleccioná pais de explotación</option>
			        </select>

			        <label for="desconocePaisExplotacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconocePaisExplotacion" value="Se desconoce"><br>

			        <label for="stateId2">D 12. Provincia de explotación:</label>
			        <select name="provinciaExplotacion" class="states2 order-alpha form-control" id="stateId2">
			            <option value="">Seleccioná provincia de explotación</option>
			        </select>

			        <label for="desconoceProvinciaExplotacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconoceProvinciaExplotacion" value="Se desconoce"><br>

			        <label for="cityId2">D 13. Localidad de explotación:</label>
			        <select name="ciudadExplotacion" class="cities2 order-alpha form-control" id="cityId2">
			            <option value="">Seleccioná ciudad de explotación</option>
			        </select>

			        <label for="desconoceCiudadExplotacion">Se desconoce</label>
					<input type="checkbox" name="" id="desconoceCiudadExplotacion" value="Se desconoce"><br>

			    <!-- {{-- FIN PAISES --}} -->
		 	</div>

		 	<div class="form-group">
		 		<div {{ $errors->has('domicilio') ? 'has-error' : ''}}>
		 			<label for="">D 14. Domicilio de explotación:</label>
		 			<input type="text" class="form-control domicilio" name="domicilio" value="{{ old('domicilio') }}">
		 		</div>
	    		{!! $errors->first('domicilio', '<p class="help-block" style="color:red";>:message</p>') !!}

		 		<label for="">Se desconoce</label>
		 		<input type="checkbox" class="domicilioDesconoce" name="">
		 	</div>

		 	<div class="form-group" {{ $errors->has('residelugar_id') ? 'has-error' : ''}}>
	    		<label for="">D 15. Reside en el lugar de explotación u otro espacio perteneciente a los tratantes?</label>
	    		<select class="form-control" name="residelugar_id">
	    			<option value="">Seleccioná donde reside</option>
	    			@foreach ($datosResideLugar as $resideLugar)
	    				<option value="{{ $resideLugar->getId() }}" {{ old('residelugar_id') == $resideLugar->getId() ? 'selected' : '' }}>{{ $resideLugar->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    	{!! $errors->first('residelugar_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	<div class="form-group" {{ $errors->has('engano_id') ? 'has-error' : ''}}>
	    		<label for="">D 16. Engaño en actividad y/o condiciones:</label>
	    		<select class="form-control" name="engano_id">
	    			<option value="">Fue engañada?</option>
	    			@foreach ($datosEngano as $engano)
	    				<option value="{{ $engano->getId() }}" {{ old('engano_id') == $engano->getId() ? 'selected' : '' }}>{{ $engano->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    	{!! $errors->first('engano_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	<div class="form-group" {{ $errors->has('haypersona_id') ? 'has-error' : ''}}>
	    		<label for="">D 17. ¿Hay personas retenidas en el lugar de explotación?</label>
	    		<select class="form-control" name="haypersona_id">
	    			<option value="">Hay mas personas?</option>
	    			@foreach ($datosHayPersona as $hayPersona)
	    				<option value="{{ $hayPersona->getId() }}" {{ old('haypersona_id') == $hayPersona->getId() ? 'selected' : '' }}>{{ $hayPersona->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    	{!! $errors->first('haypersona_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	<div class="form-group" {{ $errors->has('tipovictima_id') ? 'has-error' : ''}}>
	    		<label for="">D18. Tipo de víctima:</label>
	    		<select class="form-control" name="tipovictima_id">
	    			<option value="">Seleccioná una opción</option>
	    			@foreach ($datosTipoVictima as $tipoVictima)
	    				<option value="{{ $tipoVictima->getId() }}" {{ old('tipovictima_id') == $tipoVictima->getId() ? 'selected' : '' }}>{{ $tipoVictima->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    	{!! $errors->first('tipovictima_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	<div class="form-group" {{ $errors->has('tarea') ? 'has-error' : ''}}>
		 		<label for="">D 19. ¿Qué tareas realiza?</label>
		 		<input type="text" class="form-control" name="tarea" value="{{ old('tarea') }}">
		 	</div>
	    	{!! $errors->first('tarea', '<p class="help-block" style="color:red";>:message</p>') !!}

		 	<div class="form-group">
		 		<div {{ $errors->has('horasTarea') ? 'has-error' : ''}}>
		 			<label for="">D 20. Aproximado de horas diarias dedicadas a la actividad:</label>
		 			<input type="text" class="form-control horasTarea" name="horasTarea" value="{{ old('horasTarea') }}">
		 		</div>
	    		{!! $errors->first('horasTarea', '<p class="help-block" style="color:red";>:message</p>') !!}
		 		
		 		<label for="">Se desconoce</label>
		 		<input type="checkbox" class="horasTareaDesconoce" name="">
		 	</div>

		 	<div class="form-group" {{ $errors->has('frecuenciapago_id') ? 'has-error' : ''}}>
	    		<label for="">D 21. Frecuencia de pago:</label>
	    		<select class="form-control selectFrecuenciaPago" name="frecuenciapago_id">
	    			<option value="">Seleccioná frecuencia</option>
	    			@foreach ($datosFrecuenciaPago as $frecuenciaPago)
	    				<option value="{{ $frecuenciaPago->getId() }}" {{ old('frecuenciapago_id') == $frecuenciaPago->getId() ? 'selected' : '' }}>{{ $frecuenciaPago->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    	{!! $errors->first('frecuenciapago_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	<div class="form-group">
	    		<div {{ $errors->has('modalidadpagos_id') ? 'has-error' : ''}}>
	    			<label for="">D 22. Modalidad de pago: </label>
		    		<select class="form-control modalidadPagos" name="modalidadpagos_id">
		    			<option value="">Seleccioná modalidad</option>
		    			@foreach ($datosModalidadPago as $modalidadPago)
		    				<option value="{{ $modalidadPago->getId() }}" {{ old('modalidadpagos_id') == $modalidadPago->getId() ? 'selected' : '' }}>{{ $modalidadPago->getNombre() }}</option>
		    			@endforeach
		    		</select>
	    		</div>
	    		{!! $errors->first('modalidadpagos_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    		<div style="display: none;" class="especias">
	    			<label for="">D 22 I. Tipo de especias en concepto de pago:</label>
			 		{{-- ver como ponerlo como subtitulo --}}
			 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
			 		<div {{ $errors->has('especiaconcepto_id[]') ? 'has-error' : ''}}>
			 			@foreach ($datosEspeciaConcepto as $especiaConcepto)
			 				@if ($especiaConcepto->getNombre() == 'Otro')
			 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
	    	 					<input type="checkbox" class="especiasOtro" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
			 				@else
			 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
	    	 					<input type="checkbox" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
			 				@endif
		    			@endforeach
		    		</div>
	    			{!! $errors->first('especiaconcepto_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		 			<div style="display: none;" class="especiasCual" {{ $errors->has('especiaconceptos_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control" name="especiaconceptos_otro" value="{{ old('especiaconceptos_otro') }}">
		    	 	</div>
	    			{!! $errors->first('especiaconceptos_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>
	    	</div>

	    	<div class="form-group">
		 		<div {{ $errors->has('montoPago') ? 'has-error' : ''}}>
		 			<label for="">D 23. Monto en Pesos: $</label>
		 			<input type="text" class="form-control montoPago" name="montoPago" value="{{ old('montoPago') }}">
		 		</div>
	    		{!! $errors->first('montoPago', '<p class="help-block" style="color:red";>:message</p>') !!}

		 		<label for="">Se desconoce</label>
		 		<input type="checkbox" class="montoPagoDesconoce" name="">
		 	</div>

		 	<div class="form-group">
	    		<div {{ $errors->has('deuda_id') ? 'has-error' : ''}}>
	    			<label for="">D 24. Existencia de deuda:</label>
		    		<select class="form-control deuda" name="deuda_id">
		    			<option value="">Seleccioná si hubo deuda</option>
		    			@foreach ($datosDeuda as $deuda)
		    				<option value="{{ $deuda->getId() }}" {{ old('deuda_id') == $deuda->getId() ? 'selected' : '' }}>{{ $deuda->getNombre() }}</option>
		    			@endforeach
		    		</select>
	    			{!! $errors->first('deuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    		</div>

	    		<div style="display: none;" class="deudaSi">
	    			<label for="">D 24 I. Motivo de la deuda: </label>
			 		{{-- ver como ponerlo como subtitulo --}}
			 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
	    	 		<div class="" {{ $errors->has('motivodeuda_id[]') ? 'has-error' : ''}}>
				 		<div>
				 			@foreach ($datosMotivoDeuda as $motivoDeuda)
				 				@if ($motivoDeuda->getNombre() == 'Otro')
				 					<label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
		    	 					<input type="checkbox" class="deudaOtro" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
		    	 				@else
				    				<label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
			    	 				<input type="checkbox" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
				 				@endif
			    			@endforeach
	    					{!! $errors->first('motivodeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    				</div>

			 			<div style="display: none;" class="deudaCual" {{ $errors->has('motivodeuda_otro') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input type="text" class="form-control" name="motivodeuda_otro" value="{{ old('motivodeuda_otro') }}">
			    	 	</div>
	    				{!! $errors->first('motivodeuda_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
				 	</div>

	    	 		<div {{ $errors->has('lugardeuda_id') ? 'has-error' : ''}}>
	    	 			<label for="">D 24 II. Lugar de deuda</label>
			    		<select class="form-control" name="lugardeuda_id">
			    			<option value="">Lugar de dueda?</option>
			    			@foreach ($datosLugarDeuda as $lugarDeuda)
			    				<option value="{{ $lugarDeuda->getId() }}" {{ old('lugardeuda_id') == $lugarDeuda->getId() ? 'selected' : '' }}>{{ $lugarDeuda->getNombre() }}</option>
			    			@endforeach
			    		</select>
	    				{!! $errors->first('lugardeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	 		</div>
	    	 	</div>
	    	</div>

	    	<div class="form-group" {{ $errors->has('permanencia_id') ? 'has-error' : ''}}>
	    		<label for="">D 25. Tiempo de permanencia en situación de explotación:</label>
	    		<select class="form-control" name="permanencia_id">
	    			<option value="">Seleccioná tiempo de permanencia</option>
	    			@foreach ($datosPermanencia as $permanencia)
	    				<option value="{{ $permanencia->getId() }}" {{ old('permanencia_id') == $permanencia->getId() ? 'selected' : '' }}>{{ $permanencia->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('permanencia_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('testigo_id') ? 'has-error' : ''}}>
	    		<label for="">D 26. ¿Es testigo protegido?:</label>
	    		<select class="form-control testigo" name="testigo_id">
	    			<option value="">Seleccioná</option>
	    			@foreach ($datosTestigo as $testigo)
	    				<option value="{{ $testigo->getId() }}" {{ old('testigo_id') == $testigo->getId() ? 'selected' : '' }}>{{ $testigo->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('testigo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	    		<div style="display: none;" class="testigoSi">
	    	 		<div {{ $errors->has('coordinadorPTN') ? 'has-error' : ''}}>
	    	 			<label for=""> D 26 I. Coordinador PNT a cargo:</label>
			    		<input type="text" class="form-control" name="coordinadorPTN" value="{{ old('coordinadorPTN') }}">
	    	 		</div>
	    		{!! $errors->first('coordinadorPTN', '<p class="help-block" style="color:red";>:message</p>') !!}

	    	 		<div {{ $errors->has('coordinadorPTN_otro') ? 'has-error' : ''}}>
	    	 			<label for="">D 26 II. Otros datos:</label>
			    		<input type="text" class="form-control" name="coordinadorPTN_otro" value="{{ old('coordinadorPTN_otro') }}">
	    	 		</div>
	    	 	</div>
	    		{!! $errors->first('coordinadorPTN_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('haycorriente_id') ? 'has-error' : ''}}>
	    		<label for="">D 27. ¿El lugar de explotación cuenta con corriente eléctrica?:</label>
	    		<select class="form-control" name="haycorriente_id">
	    			<option value="">Cuenta con corriente?</option>
	    			@foreach ($datosHayCorriente as $hayCorriente)
	    				<option value="{{ $hayCorriente->getId() }}" {{ old('haycorriente_id') == $hayCorriente->getId() ? 'selected' : '' }}>{{ $hayCorriente->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('haycorriente_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('haygas_id') ? 'has-error' : ''}}>
	    		<label for="">D 28. ¿El lugar de explotación cuenta con gas?:</label>
	    		<select class="form-control" name="haygas_id">
	    			<option value="">Cuanta con gas?</option>
	    			@foreach ($datosHayGas as $hayGas)
	    				<option value="{{ $hayGas->getId() }}" {{ old('haygas_id') == $hayGas->getId() ? 'selected' : '' }}>{{ $hayGas->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('haygas_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	 		<div class="form-group">
	 			<label for="">D 29. ¿Qué medidas de control posee el lugar?:</label>
		 		{{-- ver como ponerlo como subtitulo --}}
		 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
		 		<div {{ $errors->has('haymedida_id[]') ? 'has-error' : ''}}>
		 			@foreach ($datosHayMedida as $hayMedida)
		 				@if ($hayMedida->getNombre() == 'Otro')
		 					<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
    	 					<input type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaOtro" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
    	 				@elseif($hayMedida->getNombre() == 'Se desconoce')
		    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
	    	 				<input type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaDesconoce" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
	    	 			@elseif($hayMedida->getNombre() == 'No posee')
	    	 				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
	    	 				<input type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaNoPosee" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
	    	 			@else
		    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
	    	 				<input type="checkbox" id="{{ $hayMedida->getNombre() }}" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
		 				@endif
	    			@endforeach
	    		</div>
	    		{!! $errors->first('haymedida_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	 			<div style="display: none;" class="hayMedidaCual" {{ $errors->has('haymedidas_otro') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control haymedidas_otro" name="haymedidas_otro" value="{{ old('haymedidas_otro') }}">
	    	 	</div>
	    		{!! $errors->first('haymedidas_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		 	</div>

		 	<div class="form-group" {{ $errors->has('hayhacinamiento_id') ? 'has-error' : ''}}>
	    		<label for="">D 30. ¿Se presentan condiciones de hacinamiento en el lugar de explotación?:</label>
	    		<select class="form-control" name="hayhacinamiento_id">
	    			<option value="">Hay hacinamiento?</option>
	    			@foreach ($datosHayHacinamiento as $hayHacinamiento)
	    				<option value="{{ $hayHacinamiento->getId() }}" {{ old('hayhacinamiento_id') == $hayHacinamiento->getId() ? 'selected' : '' }}>{{ $hayHacinamiento->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('hayhacinamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('hayagua_id') ? 'has-error' : ''}}>
	    		<label for="">D 31. ¿El lugar de explotación posee agua potable?:</label>
	    		<select class="form-control" name="hayagua_id">
	    			<option value="">Cuanta con agua potable?</option>
	    			@foreach ($datosHayAgua as $hayAgua)
	    				<option value="{{ $hayAgua->getId() }}" {{ old('hayagua_id') == $hayAgua->getId() ? 'selected' : '' }}>{{ $hayAgua->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('hayagua_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('haybano_id') ? 'has-error' : ''}}>
	    		<label for="">D 32. El lugar de explotación posee:</label>
	    		<select class="form-control" name="haybano_id">
	    			<option value="">Seleccioná una opción</option>
	    			@foreach ($datosHayBano as $hayBano)
	    				<option value="{{ $hayBano->getId() }}" {{ old('haybano_id') == $hayBano->getId() ? 'selected' : '' }}>{{ $hayBano->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('haybano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('cuantosbano_id') ? 'has-error' : ''}}>
	    		<label for="">D 33. ¿El lugar de explotación cuenta con una cantidad de baños suficientes?:</label>
	    		<select class="form-control" name="cuantosbano_id">
	    			<option value="">Hay baños suficientes?</option>
	    			@foreach ($datosCuantosBano as $cuantosBano)
	    				<option value="{{ $cuantosBano->getId() }}" {{ old('cuantosbano_id') == $cuantosBano->getId() ? 'selected' : '' }}>{{ $cuantosBano->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('cuantosbano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group">
	    		<div {{ $errors->has('material_id') ? 'has-error' : ''}}>
	    			<label for="">D 34. Material de contrucción predominante en las paredes del lugar de explotación:</label>
		    		<select class="form-control material" name="material_id">
		    			<option value="">Seleccioná material de contrucción</option>
		    			@foreach ($datosMaterial as $material)
		    				<option value="{{ $material->getId() }}" {{ old('material_id') == $material->getId() ? 'selected' : '' }}>{{ $material->getNombre() }}</option>
		    			@endforeach
		    		</select>
	    			{!! $errors->first('material_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    		</div>
	    	 	
	    	 	<div style="display: none;" class="materialCual" {{ $errors->has('material_otro') ? 'has-error' : ''}}>
	    	 		<label for="">Cuál?</label>
	    	 		<input type="text" class="form-control" name="material_otro" value="{{ old('material_otro') }}">
	    	 	</div>
	    		{!! $errors->first('material_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('elementotrabajo_id') ? 'has-error' : ''}}>
	    		<label for="">D 35. Provisión de elementos de trabajo por parte del explotador:</label>
	    		<select class="form-control" name="elementotrabajo_id">
	    			<option value="">Daban elementos de trabajo?</option>
	    			@foreach ($datosElementoTrabajo as $elementoTrabajo)
	    				<option value="{{ $elementoTrabajo->getId() }}" {{ old('elementotrabajo_id') == $elementoTrabajo->getId() ? 'selected' : '' }}>{{ $elementoTrabajo->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('elementotrabajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<div class="form-group" {{ $errors->has('elementoseguridad_id') ? 'has-error' : ''}}>
	    		<label for="">D 36. Provisión de elementos de seguridad por parte del explotador:</label>
	    		<select class="form-control" name="elementoseguridad_id">
	    			<option value="">Daban elementos de seguridad?</option>
	    			@foreach ($datosElementoSeguridad as $elementoSeguridad)
	    				<option value="{{ $elementoSeguridad->getId() }}" {{ old('elementoseguridad_id') == $elementoSeguridad->getId() ? 'selected' : '' }}>{{ $elementoSeguridad->getNombre() }}</option>
	    			@endforeach
	    		</select>
	    		{!! $errors->first('elementoseguridad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	    	</div>

	    	<button type="submit" class="btn btn-primary col-xl" name="button">Guardar</button><br><br>
	    </form>
    </section>
			        
	<script src="/js/paises.js" type="text/javascript"></script>
	<script src="/js/paises2.js" type="text/javascript"></script>
    <script src="/js/formularioD.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>