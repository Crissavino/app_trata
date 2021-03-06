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
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        @if ($idFormA)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/A/{{ $idCarpeta }}/{{ $idFormA }}">Eje A: Datos institucionales</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif
        @if ($idFormB)
            <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/B/{{ $idCarpeta }}/{{ $idFormB }}">Eje B: Caracterización de la víctima</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/B/{{ $idCarpeta }}">Eje B: Caracterización de la víctima</a> </li>
        @endif
        @if ($idFormC)
            <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/C/{{ $idCarpeta }}/{{ $idFormC }}">Eje C: Referentes afectivos</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/C/{{ $idCarpeta }}">Eje C: Referentes afectivos</a> </li>
        @endif
        @if ($idFormD)
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/D/{{ $idCarpeta }}/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/D/{{ $idCarpeta }}">Eje D: Datos de delito</a> </li>
        @endif
        {{-- @if ($idFormE)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        @if ($idFormF)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F/{{ $idCarpeta }}/{{ $idFormF }}">Eje E: Atención del caso</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/F/{{ $idCarpeta }}">Eje E: Atención del caso</a> </li>
        @endif
        @if ($idFormG)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idCarpeta }}/{{ $idFormG }}">Eje F: Detalle de intervención</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
        @endif
    </ul>
</header>
<body>
	

    <section class="container">
    	@if (auth()->user()->isAdmin !== 2)
    		<form action="" id="formularioD" class="form-group formDedit" method="POST">
		    	{{ csrf_field() }}
		    	@method('PUT')

		    	<h1 class="text-center" style="padding: 15px;">
	                Eje D: Datos de delito
	                <h5 style="text-align: center;" >Estás trabajando sobre la carpeta n°:{{ $dFormulario->numeroCarpeta }}</h5>
	            </h1>
                <input type="text" name="numeroCarpeta" value="{{ $dFormulario->numeroCarpeta }}" style="display: none;">
		    	
		    	<div class="form-group">
		    		<label for="">D 1. Calificación general: </label>
		    		<select class="form-control calificacionGeneral" name="calificaciongeneral_id" {{ $errors->has('calificaciongeneral_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCalificacionGeneral as $calificacionGeneral)
		    				<option value="{{ $calificacionGeneral->getId() }}" {{ $calificacionGeneral->id == $dFormulario->calificaciongeneral_id ? 'selected' : '' }}>{{ $calificacionGeneral->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('calificaciongeneral_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="calificacionGeneralCual" {{ $errors->has('calificaciongeneral_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control calificacionGeneralOtraInput" name="calificaciongeneral_otra" value="{{ $dFormulario->calificaciongeneral_otra }}">
		    	 	</div>
		    		{!! $errors->first('calificaciongeneral_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 2. Calificación específica: </label>
		    		<select class="form-control" name="calificacionespecifica_id" {{ $errors->has('calificacionespecifica_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCalificacionEspecifica as $calificacionEspecifica)
		    				<option value="{{ $calificacionEspecifica->getId() }}" {{ $dFormulario->calificacionespecifica_id == $calificacionEspecifica->id ? 'selected' : '' }}>{{ $calificacionEspecifica->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('calificacionespecifica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 3. Finalidad:</label>
		    		<select class="form-control finalidad" name="finalidad_id" {{ $errors->has('finalidad_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosFinalidad as $finalidad)
		    				<option value="{{ $finalidad->getId() }}" {{ $dFormulario->finalidad_id == $finalidad->getId() ? 'selected' : '' }}>{{ $finalidad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('finalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="finalidadCual" {{ $errors->has('finalidad_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control finalidadOtraInput" name="finalidad_otra" value="{{ $dFormulario->finalidad_otra }}">
		    	 	</div>
		    		{!! $errors->first('finalidad_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 4. Actividad: </label>
		    		<select class="form-control actividad" name="actividad_id" {{ $errors->has('actividad_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosActividad as $actividad)
		    				<option value="{{ $actividad->getId() }}" {{ $dFormulario->actividad_id == $actividad->getId() ? 'selected' : '' }}>{{ $actividad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('actividad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="actividadCual" {{ $errors->has('actividad_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control actividadOtraInput" name="actividad_otra" value="{{ $dFormulario->actividad_otra }}">
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
			    	 				@php
										$privadoIds = $dFormulario->privados->pluck('id')->toArray();
										$checked = (in_array($privado->id, $privadoIds)) ? 'checked' : ''
									@endphp
			    	 				@if ($privado->getNombre() == 'Otro')
			    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
			    	 					<input {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoOtro" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@elseif($privado->getNombre() == 'Se desconoce')
			    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
				    	 				<input {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoDesconoce" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@else
				    	 				<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
				    	 				<input {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@endif
				    			@endforeach
		    					{!! $errors->first('privado_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 			</div>

		    	 			<div style="display: none;" class="privadoCual" {{ $errors->has('privado_otra') ? 'has-error' : ''}}>
				    	 		<label for="">Cuál?</label>
				    	 		<input type="text" class="form-control privadoOtraInput" name="privado_otra" value="{{ $dFormulario->privado_otra }}">
				    	 	</div>
		    				{!! $errors->first('privado_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 		</div>
		    	 	</div>

		    	 	<div style="display: none;" class="textil">
		    	 		<label for="">D 5 III.</label>
		    	 		<div {{ $errors->has('marcaTextil') ? 'has-error' : ''}}>
		    	 			<label for="">a) Nombre de marca, sello, nombre registral o franquicia:</label>
		    	 			<input type="text" class="form-control marcaTextil" name="marcaTextil" value="{{ $dFormulario->marcaTextil }}">
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
		    	 				@php
									$textilIds = $dFormulario->textils->pluck('id')->toArray();
									$checked = (in_array($textil->id, $textilIds)) ? 'checked' : ''
								@endphp
		    	 				@if ($textil->getNombre() == 'Otro')
		    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilOtro" value="{{ $textil->getId() }}" name="textil_id[]">
	    	 					@elseif ($textil->getNombre() == 'Se desconoce')
	    	 						<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
	    	 						<input {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilDesconoce" value="{{ $textil->getId() }}" name="textil_id[]">
		    	 				@else
		    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextil" value="{{ $textil->getId() }}" name="textil_id[]">
		    	 				@endif
			    			@endforeach
		    				{!! $errors->first('textil_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 		</div>

		    	 		<div style="display: none;" class="textilCual" {{ $errors->has('textil_otra') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input type="text" class="form-control textilOtraInput" name="textil_otra" value="{{ $dFormulario->textil_otra }}">
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
		    	 				@php
									$ruralIds = $dFormulario->rurals->pluck('id')->toArray();
									$checked = (in_array($rural->id, $ruralIds)) ? 'checked' : ''
								@endphp
		    	 				@if ($rural->getNombre() == 'Otro')
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralOtro" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@elseif ($rural->getNombre() == 'Se desconoce')
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralDesconoce" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@else
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@endif
			    			@endforeach
		    				{!! $errors->first('rural_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 			<div style="display: none;" class="ruralCual" {{ $errors->has('rural_otra') ? 'has-error' : ''}}>
				    	 		<label for="">Cuál?</label>
				    	 		<input type="text" class="form-control ruralOtraInput" name="rural_otra" value="{{ $dFormulario->rural_otra }}">
				    	 	</div>
		    	 		</div>
		    			{!! $errors->first('rural_otra', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('domicilioVenta') ? 'has-error' : ''}}>
		    	 			<label for="">b) Domicilio del lugar de venta:</label>
			    	 		<input type="text" class="form-control ruralCualDomicilio" name="domicilioVenta" value="{{ $dFormulario->domicilioVenta }}">
			    	 		
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
			 			<input readonly type="text" value="{{ $dFormulario->paisCaptacion }}" class="form-control mb-2 paisCaptacion_viejo" style="display: none;" name="">
				        <select name="paisCaptacion" class="countries order-alpha form-control" id="countryId" required title="Este campo es obligatorio" >
						    <option value="" disabled selected>Seleccione</option>
						</select>

						<label for="desconocePaisCaptacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconocePaisCaptacion" value="Se desconoce"><br>

						<label for="stateId">D 7. Provincia de captación:</label>
						<input readonly type="text" value="{{ $dFormulario->provinciaCaptacion }}" class="form-control mb-2 provinciaCaptacion_viejo" style="display: none;"  name="" >
				        <select name="provinciaCaptacion" class="states order-alpha form-control" id="stateId" required title="Este campo es obligatorio">
				            <option value="" disabled selected>Seleccione</option>
				        </select>

				        <label for="desconoceProvinciaCaptacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconoceProvinciaCaptacion" value="Se desconoce"><br>

				        <label for="cityId">D 8. Localidad de captación:</label>
				        <input readonly type="text" value="{{ $dFormulario->ciudadCaptacion }}" class="form-control mb-2 ciudadCaptacion_viejo" style="display: none;" name="">
				        <select name="ciudadCaptacion" class="cities order-alpha form-control" id="cityId" required title="Este campo es obligatorio">
				            <option value="" disabled selected>Seleccione</option>
				        </select>
						{{-- @dd($dFormulario->ciudadCaptacion); --}}
				        <label for="desconoceCiudadCaptacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconoceCiudadCaptacion" value="Se desconoce"><br>
				    <!-- {{-- FIN PAISES --}} -->
			 	</div>

			 	<div class="form-group" {{ $errors->has('contactoexplotacion_id') ? 'has-error' : ''}}>
		    		<label for="">D 9. Modo de contacto con lugar de explotación:</label>
		    		<select class="form-control contactoExplotacion" name="contactoexplotacion_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosContactoExplotacion as $contactoExplotacion)
		    				<option value="{{ $contactoExplotacion->getId() }}" {{ $dFormulario->contactoexplotacion_id == $contactoExplotacion->getId() ? 'selected' : '' }}>{{ $contactoExplotacion->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('contactoexplotacion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="contactoExplotacionCual" {{ $errors->has('contactoexplotacion_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control contactoexplotacion_otro" name="contactoexplotacion_otro" value="{{ $dFormulario->contactoexplotacion_otro }}">
		    	 	</div>
		    		{!! $errors->first('contactoexplotacion_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('viajo_id') ? 'has-error' : ''}}>
		    		<label for="">D 10 Viajó:</label>
		    		<select class="form-control viajo" name="viajo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosViajo as $viajo)
		    				<option value="{{ $viajo->getId() }}" {{ $dFormulario->viajo_id == $viajo->getId() ? 'selected' : '' }}>{{ $viajo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('viajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="viajoAcompanado">
		    	 		<div {{ $errors->has('acompanado_id') ? 'has-error' : ''}}>
		    	 			<label for="">D 10 I. ¿Fue acompañado/a por alguien?:</label>
				    		<select class="form-control acompanado" name="acompanado_id">
				    			<option value="" disabled selected>Seleccione</option>
				    			@foreach ($datosAcompanado as $acompanado)
				    				<option value="{{ $acompanado->getId() }}" {{ $dFormulario->acompanado_id == $acompanado->getId() ? 'selected' : '' }}>{{ $acompanado->getNombre() }}</option>
				    			@endforeach
				    		</select>
		    	 		</div>
		    			{!! $errors->first('acompanado_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('acompanadored_id') ? 'has-error' : ''}}>
		    	 			<label for="">D 10 II. Acompañante relacionado con la red:</label>
				    		<select class="form-control acompanadored" name="acompanadored_id">
				    			<option value="">Estaba relacionado?</option>
				    			@foreach ($datosAcompanadoRed as $acompanadoRed)
				    				<option value="{{ $acompanadoRed->getId() }}" {{ $dFormulario->acompanadored_id == $acompanadoRed->getId() ? 'selected' : '' }}>{{ $acompanadoRed->getNombre() }}</option>
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
			 			<input readonly type="text" value="{{ $dFormulario->paisExplotacion }}" class="form-control mb-2 paisExplotacion_viejo" style="display: none;" name="">
				        <select name="paisExplotacion" class="countries2 order-alpha form-control" id="countryId2" required title="Este campo es obligatorio">
				            <option value="" disabled selected>Seleccione</option>
				        </select>

				        <label for="desconocePaisExplotacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconocePaisExplotacion" value="Se desconoce"><br>

				        <label for="stateId2">D 12. Provincia de explotación:</label>
				        <input readonly type="text" value="{{ $dFormulario->provinciaExplotacion }}" class="form-control mb-2 provinciaExplotacion_viejo" style="display: none;" name="">
				        <select name="provinciaExplotacion" class="states2 order-alpha form-control" id="stateId2" required title="Este campo es obligatorio">
				            <option value="" disabled selected>Seleccione</option>
				        </select>

				        <label for="desconoceProvinciaExplotacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconoceProvinciaExplotacion" value="Se desconoce"><br>

				        <label for="cityId2">D 13. Localidad de explotación:</label>
				        <input readonly type="text" value="{{ $dFormulario->ciudadExplotacion }}" class="form-control mb-2 ciudadExplotacion_viejo" style="display: none;" name="">
				        <select name="ciudadExplotacion" class="cities2 order-alpha form-control" id="cityId2" required title="Este campo es obligatorio">
				            <option value="" disabled selected>Seleccione</option>
				        </select>

				        <label for="desconoceCiudadExplotacion">Se desconoce</label>
						<input type="checkbox" name="" id="desconoceCiudadExplotacion" value="Se desconoce"><br>

				    <!-- {{-- FIN PAISES --}} -->
			 	</div>

			 	<div class="form-group">
			 		<div {{ $errors->has('domicilio') ? 'has-error' : ''}}>
			 			<label for="">D 14. Domicilio de explotación:</label>
			 			<input type="text" class="form-control domicilio" name="domicilio" value="{{ $dFormulario->domicilio }}">
			 		</div>
		    		{!! $errors->first('domicilio', '<p class="help-block" style="color:red";>:message</p>') !!}

			 		<label for="">Se desconoce</label>
			 		<input {{ $dFormulario->domicilio == 'Se desconoce' ? 'checked' : '' }} type="checkbox" class="domicilioDesconoce" name="">
				</div>

				<div class="form-group">
					<div {{ $errors->has('otrolugarexplotacion') ? 'has-error' : ''}}>
						<label for="">D 14 I. ¿Pasó por otros lugares de explotación previamente?</label>
						<select class="form-control otroLugarExplotacionSelect" name="otrolugarexplotacion_id">
							<option value="" disabled selected>Seleccione</option>
							@foreach ($datosLugarExplotacion as $lugarExplotacion)
								<option value="{{ $lugarExplotacion->id }}" {{ $dFormulario->otrolugarexplotacion_id == $lugarExplotacion->id ? 'selected' : '' }}>{{ $lugarExplotacion->nombre }}</option>
							@endforeach
						</select>
					</div>
					{!! $errors->first('otrolugarexplotacion', '<p class="help-block" style="color:red";>:message</p>') !!}

					<div class="form-group lugarexplotacionCual" style="display: none;">
						<label for="">Cuál/es?</label>
						<input type="text" class="form-control lugarexplotacionCualInput" name="lugarexplotacionCual" value="{{ $dFormulario->lugarexplotacionCual }}">
					</div>
				</div>

			 	<div class="form-group" {{ $errors->has('residelugar_id') ? 'has-error' : ''}}>
		    		<label for="">D 15. Reside en el lugar de explotación u otro espacio perteneciente a los tratantes?</label>
		    		<select class="form-control" name="residelugar_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosResideLugar as $resideLugar)
		    				<option value="{{ $resideLugar->getId() }}" {{ $dFormulario->residelugar_id == $resideLugar->getId() ? 'selected' : '' }}>{{ $resideLugar->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('residelugar_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('engano_id') ? 'has-error' : ''}}>
		    		<label for="">D 16. Engaño en actividad y/o condiciones:</label>
		    		<select class="form-control" name="engano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosEngano as $engano)
		    				<option value="{{ $engano->getId() }}" {{ $dFormulario->engano_id == $engano->getId() ? 'selected' : '' }}>{{ $engano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('engano_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('haypersona_id') ? 'has-error' : ''}}>
		    		<label for="">D 17. ¿Hay personas retenidas en el lugar de explotación?</label>
		    		<select class="form-control" name="haypersona_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayPersona as $hayPersona)
		    				<option value="{{ $hayPersona->getId() }}" {{ $dFormulario->haypersona_id == $hayPersona->getId() ? 'selected' : '' }}>{{ $hayPersona->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('haypersona_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('tipovictima_id') ? 'has-error' : ''}}>
		    		<label for="">D18. Tipo de víctima:</label>
		    		<select class="form-control" name="tipovictima_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosTipoVictima as $tipoVictima)
		    				<option value="{{ $tipoVictima->getId() }}" {{ $dFormulario->tipovictima_id == $tipoVictima->getId() ? 'selected' : '' }}>{{ $tipoVictima->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('tipovictima_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('tarea') ? 'has-error' : ''}}>
			 		<label for="">D 19. ¿Qué tareas realiza?</label>
			 		<input type="text" class="form-control" name="tarea" value="{{ $dFormulario->tarea }}">
			 	</div>
		    	{!! $errors->first('tarea', '<p class="help-block" style="color:red";>:message</p>') !!}

			 	<div class="form-group">
			 		<div {{ $errors->has('horasTarea') ? 'has-error' : ''}}>
			 			<label for="">D 20. Aproximado de horas diarias dedicadas a la actividad:</label>
			 			<input type="text" class="form-control horasTarea" name="horasTarea" value="{{ $dFormulario->horasTarea }}">
			 		</div>
		    		{!! $errors->first('horasTarea', '<p class="help-block" style="color:red";>:message</p>') !!}
			 		
			 		<label for="">Se desconoce</label>
			 		<input {{ $dFormulario->horasTarea == 'Se desconoce' ? 'checked' : '' }} type="checkbox" class="horasTareaDesconoce" name="">
			 	</div>

			 	<div class="form-group" {{ $errors->has('frecuenciapago_id') ? 'has-error' : ''}}>
		    		<label for="">D 21. Frecuencia de pago:</label>
		    		<select class="form-control selectFrecuenciaPago" name="frecuenciapago_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosFrecuenciaPago as $frecuenciaPago)
		    				<option value="{{ $frecuenciaPago->getId() }}" {{ $dFormulario->frecuenciapago_id == $frecuenciaPago->getId() ? 'selected' : '' }}>{{ $frecuenciaPago->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('frecuenciapago_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group">
		    		<div {{ $errors->has('modalidadpagos_id') ? 'has-error' : ''}}>
		    			<label for="">D 22. Modalidad de pago: </label>
			    		<select class="form-control modalidadPagos" name="modalidadpagos_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosModalidadPago as $modalidadPago)
			    				<option value="{{ $modalidadPago->getId() }}" {{ $dFormulario->modalidadpagos_id == $modalidadPago->getId() ? 'selected' : '' }}>{{ $modalidadPago->getNombre() }}</option>
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
				 				@php
									$especiaConceptoIds = $dFormulario->especiaconceptos->pluck('id')->toArray();
									$checked = (in_array($especiaConcepto->id, $especiaConceptoIds)) ? 'checked' : ''
								@endphp
				 				@if ($especiaConcepto->getNombre() == 'Otro')
				 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" class="especiasOtro" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
				 				@else
				 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
		    	 					<input {{ $checked }} type="checkbox" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
				 				@endif
			    			@endforeach
			    		</div>
		    			{!! $errors->first('especiaconcepto_id', '<p class="help-block" style="color:red";>:message</p>') !!}

			 			<div style="display: none;" class="especiasCual" {{ $errors->has('especiaconceptos_otro') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input type="text" class="form-control especiasCualInput" name="especiaconceptos_otro" value="{{ $dFormulario->especiaconceptos_otro }}">
			    	 	</div>
		    			{!! $errors->first('especiaconceptos_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
				 	</div>
		    	</div>

		    	<div class="form-group">
			 		<div {{ $errors->has('montoPago') ? 'has-error' : ''}}>
			 			<label for="">D 23. Monto en Pesos: $</label>
			 			<input type="text" class="form-control montoPago" name="montoPago" id="montoPago" value="{{ $dFormulario->montoPago }}">
			 		</div>
		    		{!! $errors->first('montoPago', '<p class="help-block" style="color:red";>:message</p>') !!}

			 		<label for="">Se desconoce</label>
			 		<input {{ $dFormulario->montoPago == 'Se desconoce' ? 'checked' : '' }} type="checkbox" class="montoPagoDesconoce" name="">
			 	</div>

			 	<div class="form-group">
		    		<div {{ $errors->has('deuda_id') ? 'has-error' : ''}}>
		    			<label for="">D 24. Existencia de deuda:</label>
			    		<select class="form-control deuda" name="deuda_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosDeuda as $deuda)
								<option value="{{ $deuda->getId() }}" {{ $dFormulario->deuda_id == $deuda->getId() ? 'selected' : '' }}>{{ $deuda->getNombre() }}</option>
								@if ($dFormulario->deuda_id == $deuda->getId())
									@php
										$actual_id_deuda = $dFormulario->deuda_id;
									@endphp
								@endif
			    			@endforeach
			    		</select>
		    			{!! $errors->first('deuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    		</div>
					@if ($actual_id_deuda == 1)
					<div style="display: none;" class="deudaSi">
							<label for="">D 24 I. Motivo de la deuda: </label>
							 {{-- ver como ponerlo como subtitulo --}}
							 <label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
							 <div class="" {{ $errors->has('motivodeuda_id[]') ? 'has-error' : ''}}>
								 <div>
									 @foreach ($datosMotivoDeuda as $motivoDeuda)
										 @php
											$motivoDeudaIds = $dFormulario->motivodeudas->pluck('id')->toArray();
											$checked = (in_array($motivoDeuda->id, $motivoDeudaIds)) ? 'checked' : ''
										@endphp
										 @if ($motivoDeuda->getNombre() == 'Otro')
											 <label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
											 <input {{ $checked }} type="checkbox" class="deudaOtro" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
										 @else
											<label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
											 <input {{ $checked }} type="checkbox" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
										 @endif
									@endforeach
									{!! $errors->first('motivodeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
								</div>
	
								 <div style="display: none;" class="deudaCual" {{ $errors->has('motivodeuda_otro') ? 'has-error' : ''}}>
									 <label for="">Cuál?</label>
									 <input type="text" class="form-control deudaCualInput" name="motivodeuda_otro" value="{{ $dFormulario->motivodeuda_otro }}">
								 </div>
								{!! $errors->first('motivodeuda_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
							 </div>
	
							 <div {{ $errors->has('lugardeuda_id') ? 'has-error' : ''}}>
								 <label for="">D 24 II. Lugar de deuda</label>
								<select class="form-control lugardeuda_id" name="lugardeuda_id">
									<option value="" disabled selected>Seleccione</option>
									@foreach ($datosLugarDeuda as $lugarDeuda)
										<option value="{{ $lugarDeuda->getId() }}" {{ $dFormulario->lugardeuda_id == $lugarDeuda->getId() ? 'selected' : '' }}>{{ $lugarDeuda->getNombre() }}</option>
									@endforeach
								</select>
								{!! $errors->first('lugardeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
							 </div>
						 </div>
					@else
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
									 <input type="text" class="form-control deudaCualInput" name="motivodeuda_otro" value="{{ old('motivodeuda_otro') }}">
								 </div>
								{!! $errors->first('motivodeuda_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
							 </div>
		
							 <div {{ $errors->has('lugardeuda_id') ? 'has-error' : ''}}>
								 <label for="">D 24 II. Lugar de deuda</label>
								<select class="form-control lugardeuda_id" name="lugardeuda_id">
									<option value="" disabled selected>Seleccione</option>
									@foreach ($datosLugarDeuda as $lugarDeuda)
										<option value="{{ $lugarDeuda->getId() }}" {{ old('lugardeuda_id') == $lugarDeuda->getId() ? 'selected' : '' }}>{{ $lugarDeuda->getNombre() }}</option>
									@endforeach
								</select>
								{!! $errors->first('lugardeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
							 </div>
						 </div>
					@endif
		    		
		    	</div>

		    	<div class="form-group" {{ $errors->has('permanencia_id') ? 'has-error' : ''}}>
		    		<label for="">D 25. Tiempo de permanencia en situación de explotación:</label>
		    		<select class="form-control" name="permanencia_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosPermanencia as $permanencia)
		    				<option value="{{ $permanencia->getId() }}" {{ $dFormulario->permanencia_id == $permanencia->getId() ? 'selected' : '' }}>{{ $permanencia->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('permanencia_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('testigo_id') ? 'has-error' : ''}}>
		    		<label for="">D 26. ¿Es testigo protegido?:</label>
		    		<select class="form-control testigo" name="testigo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosTestigo as $testigo)
		    				<option value="{{ $testigo->getId() }}" {{ $dFormulario->testigo_id == $testigo->getId() ? 'selected' : '' }}>{{ $testigo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('testigo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="testigoSi">
		    	 		<div {{ $errors->has('coordinadorPTN') ? 'has-error' : ''}}>
		    	 			<label for=""> D 26 I. Coordinador PNT a cargo:</label>
				    		<input type="text" class="form-control coordinadorPTN" name="coordinadorPTN" value="{{ $dFormulario->coordinadorPTN }}">
		    	 		</div>
		    		{!! $errors->first('coordinadorPTN', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('coordinadorPTN_otro') ? 'has-error' : ''}}>
		    	 			<label for="">D 26 II. Otros datos:</label>
				    		<input type="text" class="form-control coordinadorPTN_otro" name="coordinadorPTN_otro" value="{{ $dFormulario->coordinadorPTN_otro }}">
		    	 		</div>
		    	 	</div>
		    		{!! $errors->first('coordinadorPTN_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haycorriente_id') ? 'has-error' : ''}}>
		    		<label for="">D 27. ¿El lugar de explotación cuenta con corriente eléctrica?:</label>
		    		<select class="form-control" name="haycorriente_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayCorriente as $hayCorriente)
		    				<option value="{{ $hayCorriente->getId() }}" {{ $dFormulario->haycorriente_id == $hayCorriente->getId() ? 'selected' : '' }}>{{ $hayCorriente->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('haycorriente_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haygas_id') ? 'has-error' : ''}}>
		    		<label for="">D 28. ¿El lugar de explotación cuenta con gas?:</label>
		    		<select class="form-control" name="haygas_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayGas as $hayGas)
		    				<option value="{{ $hayGas->getId() }}" {{ $dFormulario->haygas_id == $hayGas->getId() ? 'selected' : '' }}>{{ $hayGas->getNombre() }}</option>
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
			 				@php
								$hayMedidaIds = $dFormulario->haymedidas->pluck('id')->toArray();
								$checked = (in_array($hayMedida->id, $hayMedidaIds)) ? 'checked' : ''
							@endphp
			 				@if ($hayMedida->getNombre() == 'Otro')
			 					<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
	    	 					<input {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaOtro" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
	    	 				@elseif($hayMedida->getNombre() == 'Se desconoce')
			    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaDesconoce" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
		    	 			@elseif($hayMedida->getNombre() == 'No posee')
		    	 				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaNoPosee" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
		    	 			@else
			    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
			 				@endif
		    			@endforeach
		    		</div>
		    		{!! $errors->first('haymedida_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		 			<div style="display: none;" class="hayMedidaCual" {{ $errors->has('haymedidas_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control haymedidas_otro" name="haymedidas_otro" value="{{ $dFormulario->haymedidas_otro }}">
		    	 	</div>
		    		{!! $errors->first('haymedidas_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>

			 	<div class="form-group" {{ $errors->has('hayhacinamiento_id') ? 'has-error' : ''}}>
		    		<label for="">D 30. ¿Se presentan condiciones de hacinamiento en el lugar de explotación?:</label>
		    		<select class="form-control" name="hayhacinamiento_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayHacinamiento as $hayHacinamiento)
		    				<option value="{{ $hayHacinamiento->getId() }}" {{ $dFormulario->hayhacinamiento_id == $hayHacinamiento->getId() ? 'selected' : '' }}>{{ $hayHacinamiento->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('hayhacinamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('hayagua_id') ? 'has-error' : ''}}>
		    		<label for="">D 31. ¿El lugar de explotación posee agua potable?:</label>
		    		<select class="form-control" name="hayagua_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayAgua as $hayAgua)
		    				<option value="{{ $hayAgua->getId() }}" {{ $dFormulario->hayagua_id == $hayAgua->getId() ? 'selected' : '' }}>{{ $hayAgua->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('hayagua_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haybano_id') ? 'has-error' : ''}}>
		    		<label for="">D 32. El lugar de explotación posee:</label>
		    		<select class="form-control" name="haybano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayBano as $hayBano)
		    				<option value="{{ $hayBano->getId() }}" {{ $dFormulario->haybano_id == $hayBano->getId() ? 'selected' : '' }}>{{ $hayBano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('haybano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('cuantosbano_id') ? 'has-error' : ''}}>
		    		<label for="">D 33. ¿El lugar de explotación cuenta con una cantidad de baños suficientes?:</label>
		    		<select class="form-control" name="cuantosbano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCuantosBano as $cuantosBano)
		    				<option value="{{ $cuantosBano->getId() }}" {{ $dFormulario->cuantosbano_id == $cuantosBano->getId() ? 'selected' : '' }}>{{ $cuantosBano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('cuantosbano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<div {{ $errors->has('material_id') ? 'has-error' : ''}}>
		    			<label for="">D 34. Material de contrucción predominante en las paredes del lugar de explotación:</label>
			    		<select class="form-control material" name="material_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosMaterial as $material)
			    				<option value="{{ $material->getId() }}" {{ $dFormulario->material_id == $material->getId() ? 'selected' : '' }}>{{ $material->getNombre() }}</option>
			    			@endforeach
			    		</select>
		    			{!! $errors->first('material_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    		</div>
		    	 	
		    	 	<div style="display: none;" class="materialCual" {{ $errors->has('material_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input type="text" class="form-control material_otro" name="material_otro" value="{{ $dFormulario->material_otro }}">
		    	 	</div>
		    		{!! $errors->first('material_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('elementotrabajo_id') ? 'has-error' : ''}}>
		    		<label for="">D 35. Provisión de elementos de trabajo por parte del explotador:</label>
		    		<select class="form-control" name="elementotrabajo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosElementoTrabajo as $elementoTrabajo)
		    				<option value="{{ $elementoTrabajo->getId() }}" {{ $dFormulario->elementotrabajo_id == $elementoTrabajo->getId() ? 'selected' : '' }}>{{ $elementoTrabajo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('elementotrabajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('elementoseguridad_id') ? 'has-error' : ''}}>
		    		<label for="">D 36. Provisión de elementos de seguridad por parte del explotador:</label>
		    		<select class="form-control" name="elementoseguridad_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosElementoSeguridad as $elementoSeguridad)
		    				<option value="{{ $elementoSeguridad->getId() }}" {{ $dFormulario->elementoseguridad_id == $elementoSeguridad->getId() ? 'selected' : '' }}>{{ $elementoSeguridad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('elementoseguridad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br>
		    </form>
    	@else
    		<form action="" id="formularioD" class="form-group formDedit" method="POST">
		    	{{ csrf_field() }}
		    	@method('PUT')

		    	<h1 class="text-center" style="padding: 15px;">
	                Eje D: Datos de delito
	                <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $dFormulario->numeroCarpeta }}</h5>
	            </h1>
		    	
		    	<div class="form-group">
		    		<label for="">D 1. Calificación general: </label>
		    		<select disabled class="form-control calificacionGeneral" name="calificaciongeneral_id" {{ $errors->has('calificaciongeneral_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCalificacionGeneral as $calificacionGeneral)
		    				<option value="{{ $calificacionGeneral->getId() }}" {{ $calificacionGeneral->id == $dFormulario->calificaciongeneral_id ? 'selected' : '' }}>{{ $calificacionGeneral->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('calificaciongeneral_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="calificacionGeneralCual" {{ $errors->has('calificaciongeneral_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control calificacionGeneralOtraInput" name="calificaciongeneral_otra" value="{{ $dFormulario->calificaciongeneral_otra }}">
		    	 	</div>
		    		{!! $errors->first('calificaciongeneral_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 2. Calificación específica: </label>
		    		<select disabled class="form-control" name="calificacionespecifica_id" {{ $errors->has('calificacionespecifica_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCalificacionEspecifica as $calificacionEspecifica)
		    				<option value="{{ $calificacionEspecifica->getId() }}" {{ $dFormulario->calificacionespecifica_id == $calificacionEspecifica->id ? 'selected' : '' }}>{{ $calificacionEspecifica->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('calificacionespecifica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 3. Finalidad:</label>
		    		<select disabled class="form-control finalidad" name="finalidad_id" {{ $errors->has('finalidad_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosFinalidad as $finalidad)
		    				<option value="{{ $finalidad->getId() }}" {{ $dFormulario->finalidad_id == $finalidad->getId() ? 'selected' : '' }}>{{ $finalidad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('finalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="finalidadCual" {{ $errors->has('finalidad_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control finalidadOtraInput" name="finalidad_otra" value="{{ $dFormulario->finalidad_otra }}">
		    	 	</div>
		    		{!! $errors->first('finalidad_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<label for="">D 4. Actividad: </label>
		    		<select disabled class="form-control actividad" name="actividad_id" {{ $errors->has('actividad_id') ? 'has-error' : ''}}>
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosActividad as $actividad)
		    				<option value="{{ $actividad->getId() }}" {{ $dFormulario->actividad_id == $actividad->getId() ? 'selected' : '' }}>{{ $actividad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('actividad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="actividadCual" {{ $errors->has('actividad_otra') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control actividadOtraInput" name="actividad_otra" value="{{ $dFormulario->actividad_otra }}">
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
			    	 				@php
										$privadoIds = $dFormulario->privados->pluck('id')->toArray();
										$checked = (in_array($privado->id, $privadoIds)) ? 'checked' : ''
									@endphp
			    	 				@if ($privado->getNombre() == 'Otro')
			    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
			    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoOtro" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@elseif($privado->getNombre() == 'Se desconoce')
			    	 					<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
				    	 				<input disabled {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" class="checkPrivadoDesconoce" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@else
				    	 				<label for="{{ $privado->getNombre().'Privado' }}" style="margin-left: 15px;" >{{ $privado->getNombre() }}</label>
				    	 				<input disabled {{ $checked }} type="checkbox" id="{{ $privado->getNombre().'Privado' }}" value="{{ $privado->getId() }}" name="privado_id[]">
			    	 				@endif
				    			@endforeach
		    					{!! $errors->first('privado_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 			</div>

		    	 			<div style="display: none;" class="privadoCual" {{ $errors->has('privado_otra') ? 'has-error' : ''}}>
				    	 		<label for="">Cuál?</label>
				    	 		<input readonly type="text" class="form-control privadoOtraInput" name="privado_otra" value="{{ $dFormulario->privado_otra }}">
				    	 	</div>
		    				{!! $errors->first('privado_otra', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 		</div>
		    	 	</div>

		    	 	<div style="display: none;" class="textil">
		    	 		<label for="">D 5 III.</label>
		    	 		<div {{ $errors->has('marcaTextil') ? 'has-error' : ''}}>
		    	 			<label for="">a) Nombre de marca, sello, nombre registral o franquicia:</label>
		    	 			<input readonly type="text" class="form-control marcaTextil" name="marcaTextil" value="{{ $dFormulario->marcaTextil }}">
		    	 		</div>
		    			{!! $errors->first('marcaTextil', '<p class="help-block" style="color:red";>:message</p>') !!}
		    			<div class="form-group">
		    				<label for="">Se desconoce</label>
		    				<input readonly type="checkbox" class="marcaDesconoce" name="">
		    			</div>	

		    			<label for="">b) Lugar de venta:</label>
		    	 		{{-- ver como ponerlo como subtitulo --}}
		    	 		<label for="">(En caso de requerir, tildar todas las opciones que considere correspondientes)</label>
		    	 		<div {{ $errors->has('textil_id[]') ? 'has-error' : ''}}>
		    	 			@foreach ($datosTextil as $textil)
		    	 				@php
									$textilIds = $dFormulario->textils->pluck('id')->toArray();
									$checked = (in_array($textil->id, $textilIds)) ? 'checked' : ''
								@endphp
		    	 				@if ($textil->getNombre() == 'Otro')
		    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilOtro" value="{{ $textil->getId() }}" name="textil_id[]">
	    	 					@elseif ($textil->getNombre() == 'Se desconoce')
	    	 						<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
	    	 						<input disabled {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextilDesconoce" value="{{ $textil->getId() }}" name="textil_id[]">
		    	 				@else
		    	 					<label for="{{ $textil->getNombre().'Textil' }}" style="margin-left: 15px;">{{ $textil->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $textil->getNombre().'Textil' }}" class="checkTextil" value="{{ $textil->getId() }}" name="textil_id[]">
		    	 				@endif
			    			@endforeach
		    				{!! $errors->first('textil_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 		</div>

		    	 		<div style="display: none;" class="textilCual" {{ $errors->has('textil_otra') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input readonly type="text" class="form-control textilOtraInput" name="textil_otra" value="{{ $dFormulario->textil_otra }}">
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
		    	 				@php
									$ruralIds = $dFormulario->rurals->pluck('id')->toArray();
									$checked = (in_array($rural->id, $ruralIds)) ? 'checked' : ''
								@endphp
		    	 				@if ($rural->getNombre() == 'Otro')
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralOtro" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@elseif ($rural->getNombre() == 'Se desconoce')
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" class="checkRuralDesconoce" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@else
		    	 					<label for="{{ $rural->getNombre().'Rural' }}" style="margin-left: 15px;">{{ $rural->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $rural->getNombre().'Rural' }}" value="{{ $rural->getId() }}" name="rural_id[]">
		    	 				@endif
			    			@endforeach
		    				{!! $errors->first('rural_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 			<div style="display: none;" class="ruralCual" {{ $errors->has('rural_otra') ? 'has-error' : ''}}>
				    	 		<label for="">Cuál?</label>
				    	 		<input readonly type="text" class="form-control ruralOtraInput" name="rural_otra" value="{{ $dFormulario->rural_otra }}">
				    	 	</div>
		    	 		</div>
		    			{!! $errors->first('rural_otra', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('domicilioVenta') ? 'has-error' : ''}}>
		    	 			<label for="">b) Domicilio del lugar de venta:</label>
			    	 		<input readonly type="text" class="form-control ruralCualDomicilio" name="domicilioVenta" value="{{ $dFormulario->domicilioVenta }}">
		    	 		</div>
		    			{!! $errors->first('domicilioVenta', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	</div>
		    	</div>
		    	<div class="form-group">
			 		<!-- {{-- PAISES --}} -->
			 		{{-- ver como hacer para los casos en que se desconozca --}}
			 			<label for="countryId">D 6. País de captación:</label>
                        <input readonly type="text" value="{{ $dFormulario->paisCaptacion }}" class="form-control mb-2" name="">

						<label for="stateId">D 7. Provincia de captación:</label>
                        <input readonly type="text" value="{{ $dFormulario->provinciaCaptacion }}" class="form-control mb-2" name="">

				        <label for="cityId">D 8. Localidad de captación:</label>
                        <input readonly type="text" value="{{ $dFormulario->ciudadCaptacion }}" class="form-control mb-2" name="">
				
				    <!-- {{-- FIN PAISES --}} -->
			 	</div>

			 	<div class="form-group" {{ $errors->has('contactoexplotacion_id') ? 'has-error' : ''}}>
		    		<label for="">D 9. Modo de contacto con lugar de explotación:</label>
		    		<select disabled class="form-control contactoExplotacion" name="contactoexplotacion_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosContactoExplotacion as $contactoExplotacion)
		    				<option value="{{ $contactoExplotacion->getId() }}" {{ $dFormulario->contactoexplotacion_id == $contactoExplotacion->getId() ? 'selected' : '' }}>{{ $contactoExplotacion->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('contactoexplotacion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 	
		    	 	<div style="display: none;" class="contactoExplotacionCual" {{ $errors->has('contactoexplotacion_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control contactoexplotacion_otro" name="contactoexplotacion_otro" value="{{ $dFormulario->contactoexplotacion_otro }}">
		    	 	</div>
		    		{!! $errors->first('contactoexplotacion_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('viajo_id') ? 'has-error' : ''}}>
		    		<label for="">D 10 Viajó:</label>
		    		<select disabled class="form-control viajo" name="viajo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosViajo as $viajo)
		    				<option value="{{ $viajo->getId() }}" {{ $dFormulario->viajo_id == $viajo->getId() ? 'selected' : '' }}>{{ $viajo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('viajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="viajoAcompanado">
		    	 		<div {{ $errors->has('acompanado_id') ? 'has-error' : ''}}>
		    	 			<label for="">D 10 I. ¿Por quién?:</label>
				    		<select disabled class="form-control acompanado" name="acompanado_id">
				    			<option value="" disabled selected>Seleccione</option>
				    			@foreach ($datosAcompanado as $acompanado)
				    				<option value="{{ $acompanado->getId() }}" {{ $dFormulario->acompanado_id == $acompanado->getId() ? 'selected' : '' }}>{{ $acompanado->getNombre() }}</option>
				    			@endforeach
				    		</select>
		    	 		</div>
		    			{!! $errors->first('acompanado_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('acompanadored_id') ? 'has-error' : ''}}>
		    	 			<label for="">D 10 II. Acompañante relacionado con la red:</label>
				    		<select disabled class="form-control acompanadored" name="acompanadored_id">
				    			<option value="" disabled selected>Seleccione</option>
				    			@foreach ($datosAcompanadoRed as $acompanadoRed)
				    				<option value="{{ $acompanadoRed->getId() }}" {{ $dFormulario->acompanadored_id == $acompanadoRed->getId() ? 'selected' : '' }}>{{ $acompanadoRed->getNombre() }}</option>
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
			 			<input readonly type="text" value="{{ $dFormulario->paisExplotacion }}" class="form-control mb-2" name="">

				        <label for="stateId2">D 12. Provincia de explotación:</label>
				        <input readonly type="text" value="{{ $dFormulario->provinciaExplotacion }}" class="form-control mb-2" name="">

				        <label for="cityId2">D 13. Localidad de explotación:</label>
				        <input readonly type="text" value="{{ $dFormulario->ciudadExplotacion }}" class="form-control mb-2" name="">

				    <!-- {{-- FIN PAISES --}} -->
			 	</div>

			 	<div class="form-group">
			 		<div {{ $errors->has('domicilio') ? 'has-error' : ''}}>
			 			<label for="">D 14. Domicilio de explotación:</label>
			 			<input readonly type="text" class="form-control domicilio" name="domicilio" value="{{ $dFormulario->domicilio }}">
			 		</div>
		    		{!! $errors->first('domicilio', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>

			 	<div class="form-group" {{ $errors->has('residelugar_id') ? 'has-error' : ''}}>
		    		<label for="">D 15. Reside en el lugar de explotación u otro espacio perteneciente a los tratantes?</label>
		    		<select disabled class="form-control" name="residelugar_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosResideLugar as $resideLugar)
		    				<option value="{{ $resideLugar->getId() }}" {{ $dFormulario->residelugar_id == $resideLugar->getId() ? 'selected' : '' }}>{{ $resideLugar->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('residelugar_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('engano_id') ? 'has-error' : ''}}>
		    		<label for="">D 16. Engaño en actividad y/o condiciones:</label>
		    		<select disabled class="form-control" name="engano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosEngano as $engano)
		    				<option value="{{ $engano->getId() }}" {{ $dFormulario->engano_id == $engano->getId() ? 'selected' : '' }}>{{ $engano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('engano_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('haypersona_id') ? 'has-error' : ''}}>
		    		<label for="">D 17. ¿se encontraban otras personas en situación de explotación en el mismo espacio?</label>
		    		<select disabled class="form-control" name="haypersona_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayPersona as $hayPersona)
		    				<option value="{{ $hayPersona->getId() }}" {{ $dFormulario->haypersona_id == $hayPersona->getId() ? 'selected' : '' }}>{{ $hayPersona->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('haypersona_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('tipovictima_id') ? 'has-error' : ''}}>
		    		<label for="">D18. Tipo de víctima:</label>
		    		<select disabled class="form-control" name="tipovictima_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosTipoVictima as $tipoVictima)
		    				<option value="{{ $tipoVictima->getId() }}" {{ $dFormulario->tipovictima_id == $tipoVictima->getId() ? 'selected' : '' }}>{{ $tipoVictima->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('tipovictima_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group" {{ $errors->has('tarea') ? 'has-error' : ''}}>
			 		<label for="">D 19. ¿Qué tareas realiza?</label>
			 		<input readonly type="text" class="form-control" name="tarea" value="{{ $dFormulario->tarea }}">
			 	</div>
		    	{!! $errors->first('tarea', '<p class="help-block" style="color:red";>:message</p>') !!}

			 	<div class="form-group">
			 		<div {{ $errors->has('horasTarea') ? 'has-error' : ''}}>
			 			<label for="">D 20. Aproximado de horas diarias dedicadas a la actividad:</label>
			 			<input readonly type="text" class="form-control horasTarea" name="horasTarea" value="{{ $dFormulario->horasTarea }}">
			 		</div>
		    		{!! $errors->first('horasTarea', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>

			 	<div class="form-group" {{ $errors->has('frecuenciapago_id') ? 'has-error' : ''}}>
		    		<label for="">D 21. Frecuencia de pago:</label>
		    		<select disabled class="form-control selectFrecuenciaPago" name="frecuenciapago_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosFrecuenciaPago as $frecuenciaPago)
		    				<option value="{{ $frecuenciaPago->getId() }}" {{ $dFormulario->frecuenciapago_id == $frecuenciaPago->getId() ? 'selected' : '' }}>{{ $frecuenciaPago->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('frecuenciapago_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	<div class="form-group">
		    		<div {{ $errors->has('modalidadpagos_id') ? 'has-error' : ''}}>
		    			<label for="">D 22. Modalidad de pago: </label>
			    		<select disabled class="form-control modalidadPagos" name="modalidadpagos_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosModalidadPago as $modalidadPago)
			    				<option value="{{ $modalidadPago->getId() }}" {{ $dFormulario->modalidadpagos_id == $modalidadPago->getId() ? 'selected' : '' }}>{{ $modalidadPago->getNombre() }}</option>
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
				 				@php
									$especiaConceptoIds = $dFormulario->especiaconceptos->pluck('id')->toArray();
									$checked = (in_array($especiaConcepto->id, $especiaConceptoIds)) ? 'checked' : ''
								@endphp
				 				@if ($especiaConcepto->getNombre() == 'Otro')
				 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" class="especiasOtro" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
				 				@else
				 					<label for="" style="margin-left: 15px;">{{ $especiaConcepto->getNombre() }}</label>
		    	 					<input disabled {{ $checked }} type="checkbox" value="{{ $especiaConcepto->getId() }}" name="especiaconcepto_id[]">
				 				@endif
			    			@endforeach
			    		</div>
		    			{!! $errors->first('especiaconcepto_id', '<p class="help-block" style="color:red";>:message</p>') !!}

			 			<div style="display: none;" class="especiasCual" {{ $errors->has('especiaconceptos_otro') ? 'has-error' : ''}}>
			    	 		<label for="">Cuál?</label>
			    	 		<input readonly type="text" class="form-control especiasCualInput" name="especiaconceptos_otro" value="{{ $dFormulario->especiaconceptos_otro }}">
			    	 	</div>
		    			{!! $errors->first('especiaconceptos_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
				 	</div>
		    	</div>

		    	<div class="form-group">
			 		<div {{ $errors->has('montoPago') ? 'has-error' : ''}}>
			 			<label for="">D 23. Monto en Pesos: $</label>
			 			<input readonly type="text" class="form-control montoPago" name="montoPago" value="{{ $dFormulario->montoPago }}">
			 		</div>
		    		{!! $errors->first('montoPago', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>

			 	<div class="form-group">
		    		<div {{ $errors->has('deuda_id') ? 'has-error' : ''}}>
		    			<label for="">D 24. Existencia de deuda:</label>
			    		<select disabled class="form-control deuda" name="deuda_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosDeuda as $deuda)
			    				<option value="{{ $deuda->getId() }}" {{ $dFormulario->deuda_id == $deuda->getId() ? 'selected' : '' }}>{{ $deuda->getNombre() }}</option>
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
					 				@php
										$motivoDeudaIds = $dFormulario->motivodeudas->pluck('id')->toArray();
										$checked = (in_array($motivoDeuda->id, $motivoDeudaIds)) ? 'checked' : ''
									@endphp
					 				@if ($motivoDeuda->getNombre() == 'Otro')
					 					<label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
			    	 					<input disabled {{ $checked }} type="checkbox" class="deudaOtro" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
			    	 				@else
					    				<label for="" style="margin-left: 15px;">{{ $motivoDeuda->getNombre() }}</label>
				    	 				<input disabled {{ $checked }} type="checkbox" value="{{ $motivoDeuda->getId() }}" name="motivodeuda_id[]">
					 				@endif
				    			@endforeach
		    					{!! $errors->first('motivodeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    				</div>

				 			<div style="display: none;" class="deudaCual" {{ $errors->has('motivodeuda_otro') ? 'has-error' : ''}}>
				    	 		<label for="">Cuál?</label>
				    	 		<input readonly type="text" class="form-control deudaCualInput" name="motivodeuda_otro" value="{{ $dFormulario->motivodeuda_otro }}">
				    	 	</div>
		    				{!! $errors->first('motivodeuda_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
					 	</div>

		    	 		<div {{ $errors->has('lugardeuda_id') ? 'has-error' : ''}}>
		    	 			<label for="">D 24 II. Lugar de deuda</label>
				    		<select disabled class="form-control lugardeuda_id" name="lugardeuda_id">
				    			<option value="" disabled selected>Seleccione</option>
				    			@foreach ($datosLugarDeuda as $lugarDeuda)
				    				<option value="{{ $lugarDeuda->getId() }}" {{ $dFormulario->lugardeuda_id == $lugarDeuda->getId() ? 'selected' : '' }}>{{ $lugarDeuda->getNombre() }}</option>
				    			@endforeach
				    		</select>
		    				{!! $errors->first('lugardeuda_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	 		</div>
		    	 	</div>
		    	</div>

		    	<div class="form-group" {{ $errors->has('permanencia_id') ? 'has-error' : ''}}>
		    		<label for="">D 25. Tiempo de permanencia en situación de explotación:</label>
		    		<select disabled class="form-control" name="permanencia_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosPermanencia as $permanencia)
		    				<option value="{{ $permanencia->getId() }}" {{ $dFormulario->permanencia_id == $permanencia->getId() ? 'selected' : '' }}>{{ $permanencia->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('permanencia_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('testigo_id') ? 'has-error' : ''}}>
		    		<label for="">D 26. ¿Es testigo protegido?:</label>
		    		<select disabled class="form-control testigo" name="testigo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosTestigo as $testigo)
		    				<option value="{{ $testigo->getId() }}" {{ $dFormulario->testigo_id == $testigo->getId() ? 'selected' : '' }}>{{ $testigo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('testigo_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		    		<div style="display: none;" class="testigoSi">
		    	 		<div {{ $errors->has('coordinadorPTN') ? 'has-error' : ''}}>
		    	 			<label for=""> D 26 I. Coordinador PNT a cargo:</label>
				    		<input readonly type="text" class="form-control coordinadorPTN" name="coordinadorPTN" value="{{ $dFormulario->coordinadorPTN }}">
		    	 		</div>
		    		{!! $errors->first('coordinadorPTN', '<p class="help-block" style="color:red";>:message</p>') !!}

		    	 		<div {{ $errors->has('coordinadorPTN_otro') ? 'has-error' : ''}}>
		    	 			<label for="">D 26 II. Otros datos:</label>
				    		<input readonly type="text" class="form-control coordinadorPTNOtro" name="coordinadorPTN_otro" value="{{ $dFormulario->coordinadorPTN_otro }}">
		    	 		</div>
		    	 	</div>
		    		{!! $errors->first('coordinadorPTN_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haycorriente_id') ? 'has-error' : ''}}>
		    		<label for="">D 27. ¿El lugar de explotación cuenta con corriente eléctrica?:</label>
		    		<select disabled class="form-control" name="haycorriente_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayCorriente as $hayCorriente)
		    				<option value="{{ $hayCorriente->getId() }}" {{ $dFormulario->haycorriente_id == $hayCorriente->getId() ? 'selected' : '' }}>{{ $hayCorriente->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('haycorriente_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haygas_id') ? 'has-error' : ''}}>
		    		<label for="">D 28. ¿El lugar de explotación cuenta con gas?:</label>
		    		<select disabled class="form-control" name="haygas_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayGas as $hayGas)
		    				<option value="{{ $hayGas->getId() }}" {{ $dFormulario->haygas_id == $hayGas->getId() ? 'selected' : '' }}>{{ $hayGas->getNombre() }}</option>
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
			 				@php
								$hayMedidaIds = $dFormulario->haymedidas->pluck('id')->toArray();
								$checked = (in_array($hayMedida->id, $hayMedidaIds)) ? 'checked' : ''
							@endphp
			 				@if ($hayMedida->getNombre() == 'Otro')
			 					<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
	    	 					<input disabled {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaOtro" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
	    	 				@elseif($hayMedida->getNombre() == 'Se desconoce')
			    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaDesconoce" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
		    	 			@elseif($hayMedida->getNombre() == 'No posee')
		    	 				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input disabled {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" class="hayMedidaNoPosee" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
		    	 			@else
			    				<label for="{{ $hayMedida->getNombre() }}" style="margin-left: 15px;">{{ $hayMedida->getNombre() }}</label>
		    	 				<input disabled {{ $checked }} type="checkbox" id="{{ $hayMedida->getNombre() }}" value="{{ $hayMedida->getId() }}" name="haymedida_id[]">
			 				@endif
		    			@endforeach
		    		</div>
		    		{!! $errors->first('haymedida_id', '<p class="help-block" style="color:red";>:message</p>') !!}

		 			<div style="display: none;" class="hayMedidaCual" {{ $errors->has('haymedidas_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control haymedidas_otro" name="haymedidas_otro" value="{{ $dFormulario->haymedidas_otro }}">
		    	 	</div>
		    		{!! $errors->first('haymedidas_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
			 	</div>

			 	<div class="form-group" {{ $errors->has('hayhacinamiento_id') ? 'has-error' : ''}}>
		    		<label for="">D 30. ¿Se presentan condiciones de hacinamiento en el lugar de explotación?:</label>
		    		<select disabled class="form-control" name="hayhacinamiento_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayHacinamiento as $hayHacinamiento)
		    				<option value="{{ $hayHacinamiento->getId() }}" {{ $dFormulario->hayhacinamiento_id == $hayHacinamiento->getId() ? 'selected' : '' }}>{{ $hayHacinamiento->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('hayhacinamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('hayagua_id') ? 'has-error' : ''}}>
		    		<label for="">D 31. ¿El lugar de explotación posee agua potable?:</label>
		    		<select disabled class="form-control" name="hayagua_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayAgua as $hayAgua)
		    				<option value="{{ $hayAgua->getId() }}" {{ $dFormulario->hayagua_id == $hayAgua->getId() ? 'selected' : '' }}>{{ $hayAgua->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('hayagua_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('haybano_id') ? 'has-error' : ''}}>
		    		<label for="">D 32. El lugar de explotación posee:</label>
		    		<select disabled class="form-control" name="haybano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosHayBano as $hayBano)
		    				<option value="{{ $hayBano->getId() }}" {{ $dFormulario->haybano_id == $hayBano->getId() ? 'selected' : '' }}>{{ $hayBano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('haybano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('cuantosbano_id') ? 'has-error' : ''}}>
		    		<label for="">D 33. ¿El lugar de explotación cuenta con una cantidad de baños suficientes?:</label>
		    		<select disabled class="form-control" name="cuantosbano_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosCuantosBano as $cuantosBano)
		    				<option value="{{ $cuantosBano->getId() }}" {{ $dFormulario->cuantosbano_id == $cuantosBano->getId() ? 'selected' : '' }}>{{ $cuantosBano->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('cuantosbano_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group">
		    		<div {{ $errors->has('material_id') ? 'has-error' : ''}}>
		    			<label for="">D 34. Material de contrucción predominante en las paredes del lugar de explotación:</label>
			    		<select disabled class="form-control material" name="material_id">
			    			<option value="" disabled selected>Seleccione</option>
			    			@foreach ($datosMaterial as $material)
			    				<option value="{{ $material->getId() }}" {{ $dFormulario->material_id == $material->getId() ? 'selected' : '' }}>{{ $material->getNombre() }}</option>
			    			@endforeach
			    		</select>
		    			{!! $errors->first('material_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    		</div>
		    	 	
		    	 	<div style="display: none;" class="materialCual" {{ $errors->has('material_otro') ? 'has-error' : ''}}>
		    	 		<label for="">Cuál?</label>
		    	 		<input readonly type="text" class="form-control material_otro" name="material_otro" value="{{ $dFormulario->material_otro }}">
		    	 	</div>
		    		{!! $errors->first('material_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('elementotrabajo_id') ? 'has-error' : ''}}>
		    		<label for="">D 35. Provisión de elementos de trabajo por parte del explotador:</label>
		    		<select disabled class="form-control" name="elementotrabajo_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosElementoTrabajo as $elementoTrabajo)
		    				<option value="{{ $elementoTrabajo->getId() }}" {{ $dFormulario->elementotrabajo_id == $elementoTrabajo->getId() ? 'selected' : '' }}>{{ $elementoTrabajo->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('elementotrabajo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	<div class="form-group" {{ $errors->has('elementoseguridad_id') ? 'has-error' : ''}}>
		    		<label for="">D 36. Provisión de elementos de seguridad por parte del explotador:</label>
		    		<select disabled class="form-control" name="elementoseguridad_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosElementoSeguridad as $elementoSeguridad)
		    				<option value="{{ $elementoSeguridad->getId() }}" {{ $dFormulario->elementoseguridad_id == $elementoSeguridad->getId() ? 'selected' : '' }}>{{ $elementoSeguridad->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    		{!! $errors->first('elementoseguridad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
		    	</div>

		    	{{-- <button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br> --}}
		    </form>
    	@endif
    	
    </section>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"  type="text/javascript"></script>
    <script src="/js/paises.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="/js/paises2.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/formularioD.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
	    function onlyText() {
            //elimina el copy paste
            $(':input').bind('copy paste cut',function(e) {
                e.preventDefault(); //disable cut,copy,paste.                    
            });
            //convierte las letras ingresadas en todos los input a mayuscula
            $(':input').keyup(function(){
                this.value = this.value.toUpperCase();
            });
            //solo se permite numeros y letras en todos los input
            $(':input').keypress(function (e) {
                var theEvent = e || window.event;
                var key = theEvent.keyCode || theEvent.which;
                if (key === 8) { return; }
                key = String.fromCharCode(key);
                var regex = /^[0-9a-zñA-ZÑ\s]*$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault) theEvent.preventDefault();
                }
            });
        }
        onlyText();
	// var seDesconoce = document.createElement("option");
	// seDesconoce.text = "se desconoce"; 
	// seDesconoce.value = "Se desconoce";
	// var divProfesionales = document.querySelector('.padre'); divProfesionales.insertAdjacentHTML('beforeend', divClickProfesional);
		// $(function() { 
		// 	// console.log(document.getElementById('cityId').value);
		// 	// alert(document.querySelector('#stateId').va())
		// 	// var seDesconoce = document.createElement("option"); seDesconoce.text = "se desconoce"; seDesconoce.value = "Se desconoce";
		// 		$('#desconocePaisCaptacion').change(function(){ 				
		// 			if($("#desconocePaisCaptacion").is(':checked')) {

		// 			$('#desconocePaisCaptacion').attr('checked', true);
		// 			$('input[id="desconocePaisCaptacion"]').attr('checked','checked');
		// 			$('#countryId').attr("disabled", true); 
		// 			$('#countryId').attr('readonly',	true);
		// 			// $('input[name="inputPaisCaptacion"][value='{{ $dFormulario->paisCaptacion }}']').attr('checked','checked');
		// 			//  $('#'{{ $dFormulario->paisCaptacion }}'').attr('checked',true);

		// 			$('#desconoceProvinciaCaptacion').attr("checked", true);
		// 			$('input[id="desconoceProvinciaCaptacion"]').attr('checked','checked');

		// 			$('#stateId').attr("disabled", true);
		// 			$('#stateId').attr('readonly', true);
		// 			$('#stateId ').append("<option value='' selected>Se desconoce</option>");	

		// 			// $("#stateId option[value='Se desconoce']").prop('selected', true);
		// 			$('#desconoceCiudadCaptacion').attr("checked", true);
		// 			$('input[id="desconoceCiudadCaptacion"]').attr('checked','checked');
		// 			$('#cityId').attr("disabled", true);
		// 			$('#cityId').attr('readonly', true);
		// 			$('#cityId').append("<option value='' selected>Se desconoce</option>");											
		// 			// $("#cityId option[value='Se desconoce']").prop('selected', true);
		// 			// console.log(document.getElementById('cityId').value);
		// 			}else{
		// 			$('#desconocePaisCaptacion').attr("checked", false);
		// 			$('#countryId').attr("disabled", false); 
		// 			$('#countryId').attr('readonly', false);
		// 			$('#desconoceProvinciaCaptacion').attr("checked", false);
		// 			$('#stateId').attr("disabled", false);
		// 			$('#stateId').attr('readonly', false);					
		// 			$('#desconoceCiudadCaptacion').attr("checked", false);	
		// 			$('#cityId').attr("disabled", false);
		// 			$('#cityId').attr('readonly', false);				

		// 			}
		// 		}); 
		// 		$('#desconocePaisExplotacion').change(function(){ 
		// 			if($("#desconocePaisExplotacion").is(':checked')) {
		// 			$('#desconocePaisExplotacion').attr("checked", true);
		// 			$('#countryId2').attr("disabled", true); 
		// 			$('#countryId2').attr('readonly', true);
		// 			$('#desconoceProvinciaExplotacion').attr("checked", true);
		// 			$('#stateId2').attr("disabled", true); 
		// 			$('#stateId2').attr('readonly', true);
		// 			$('#stateId2').append("<option value='Se desconoce' selected>Se desconoce</option>");		
		// 			$('#desconoceCiudadExplotacion').attr("checked", true);
		// 			$('#cityId2').attr("disabled", true); 
		// 			$('#cityId2').attr('readonly', true);
		// 			$('#cityId2 ').append("<option value='Se desconoce' selected>Se desconoce</option>");					
		// 			// console.log(document.getElementById('cityId').value);
		// 			}else{
		// 			$('#desconocePaisExplotacion').attr("checked", false);
		// 			$('#countryId2').attr("disabled", false); 
		// 			$('#countryId2').attr('readonly', false);
		// 			$('#desconoceProvinciaExplotacion').attr("checked", false);
		// 			$('#stateId2').attr("disabled", false); 
		// 			$('#stateId2').attr('readonly', false);
		// 			$('#desconoceCiudadExplotacion').attr("checked", false);
		// 			$('#cityId2').attr("disabled", false); 
		// 			$('#cityId2').attr('readonly', false);
		// 			}
		// 		}); 
		// 	});
	</script>
</body>
</html>