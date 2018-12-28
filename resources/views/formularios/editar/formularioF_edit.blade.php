<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje F: Atención del caso</title>
</head>
<header>
    <ul class="nav nav-tabs">
        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link " href="B">Eje B: Caracterización de la victima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li>
        <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li>
        <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li> --}}
        <li class="nav-item"> <a class="nav-link active" href="#">Eje F: Atención del caso</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="G">Eje G: Documentación</a> </li> --}}
    </ul>
</header>
<body>
	<h1 class="text-center" style="padding: 15px;">
        Eje F: Atención del caso
        <h5 style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $formularioF->numeroCarpeta }}</h5>
    </h1>

    <section class="container">
    	<form action="" class="form-group" method="post">
	    	{{ csrf_field() }}
            @method('PUT')
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $formularioF->numeroCarpeta }}">

            <div class="form-group">
            	<label for="">F 1. Organismos que intervinieron previamente:</label>
            	@foreach ($aFormularios as $aFormulario)
            		@if ($aFormulario->datos_numero_carpeta === $formularioF->numeroCarpeta)
            			@if ($aFormulario->derivacion_otro_organismo_id !== 16)
            				@foreach ($derivacionOrganismo as $organismo)
	            				@if ($organismo->id === $aFormulario->derivacion_otro_organismo_id)
	            					<input type="text" name="" class="form-control ml-3" readonly="readonly" 
		            				value="{{ $organismo->nombre }}">
	            				@endif
            				@endforeach
            			@elseif($aFormulario->derivacion_otro_organismo_id == 16)
            				<input type="text" name="" class="form-control ml-3" readonly="readonly" 
	            				value="{{ $aFormulario->derivacion_otro_organismo_cual }}">
            			@endif
	            	@endif
            	@endforeach
            </div>

            <div class="form-group">
            	<label for="">F 1 I. Organismos Judiciales:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label><br>
            	@foreach ($datosOrgJudiciales as $orgJudicial)
                    @php
                        $orgJudicialIds = $formularioF->orgjudicials->pluck('id')->toArray();
                        $checked = (in_array($orgJudicial->id, $orgJudicialIds)) ? 'checked' : ''
                    @endphp
            		<div class="ml-3">
            			<label for="{{ $orgJudicial->id }}">{{ $orgJudicial->nombre }}</label>
            			<input {{ $checked }} type="checkbox" id="{{ $orgJudicial->id }}" value="{{ $orgJudicial->id }}" name="orgjudicials_id[]">
            		</div>
            	@endforeach
            </div>

            <div class="form-group">
            	<label for="">F 1 II. Organismos/Programas Nacionales:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label><br>
            	@foreach ($datosProgNacionales as $progNacionales)
                    @php
                        $progNacionalesIds = $formularioF->orgprognacionals->pluck('id')->toArray();
                        $checked = (in_array($progNacionales->id, $progNacionalesIds)) ? 'checked' : ''
                    @endphp
					<div class="ml-3">
						@if ($progNacionales->nombre == 'Otro')
									<label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
            						<input {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]" class="orgProgNacionalOtro">
						@else
							<label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
            				<input type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]">
						@endif		
					</div>		
            	@endforeach

            	<div id="orgProgNacionalCual" class="form-group orgProgNacionalCual" style="display: none;">
                    @foreach ($orgProgNacionalOtro as $otroProgNacional)
                        @if ($otroProgNacional->fformulario_id === $formularioF->id)
                            <label for="">Cual?</label>
                            <input type="text" class="form-control ml-3 orgProgNacionalCualInput" value="{{ $otroProgNacional->nombreOrganismo }}" name="orgprognacionalOtro[]"><br>
                        @endif
                    @endforeach
	            	

	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalAgregarOtro" value="Agregar Otro" name="">
	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalBorrarOtro" value="Borrar Otro" name=""><br><br>
	            </div>
            </div>

            <div id="orgProgProvinciales" class="form-group">
                @foreach ($orgProgProvincial as $programaProv)
                    @if ($programaProv->fformulario_id === $formularioF->id)
                        <label for="">F 1 III. Organismos/Programas Provinciales:</label>
                        <input type="text" class="form-control ml-3" value="{{ $programaProv->nombreOrganismo }}" name="orgProgProvinciales[]">
                    @endif
                @endforeach
            	
            </div>
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div id="orgProgMunicipales" class="form-group">
                @foreach ($orgProgMunipal as $programaMuni)
                    @if ($programaMuni->fformulario_id === $formularioF->id)
                        <label for="">F 1 IV. Organismos/Programas Municipales:</label>
                        <input type="text" class="form-control ml-3" value="{{ $programaMuni->nombreOrganismo  }}" name="orgProgMunicipales[]">
                    @endif
                @endforeach
            	
            </div>
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div class="form-group">
            	<label for="">F 1 V. Policía:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label>
            	@foreach ($datosPolicia as $policia)
                    @php
                        $policiaIds = $formularioF->policias->pluck('id')->toArray();
                        $checked = (in_array($policia->id, $policiaIds)) ? 'checked' : ''
                    @endphp
            		<div class="ml-3">
            			<label for="{{ $policia->id }}">{{ $policia->nombre }}</label>
	            		<input {{ $checked }} type="checkbox" id="{{ $policia->id }}" value="{{ $policia->id }}" name="policias_id[]">
            		</div>
            	@endforeach
            </div>

            <div id="orgSocCivil" class="form-group">
                @foreach ($orgSocCivil as $organizacion)
                    @if ($organizacion->fformulario_id === $formularioF->id)
                        <label for="">F 1 VI. Organizaciones de la Sociedad Civil:</label>
                        <input type="text" class="ml-3 form-control" value="{{ $organizacion->nombreOrganismo  }}" name="orgSocCivil[]">
                    @endif
                @endforeach
            	
            </div>
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div class="form-group">
            	<label for="">F 2. Tipo de asistencia requerida:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label>
            	@foreach ($datosAsistencia as $asistencia)
                    @php
                        $asistenciaIds = $formularioF->asistencias->pluck('id')->toArray();
                        $checked = (in_array($asistencia->id, $asistenciaIds)) ? 'checked' : ''
                    @endphp
            		<div class="ml-3">
            			@if ($asistencia->id === 3)
            				<label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
	            			<input {{ $checked }} type="checkbox" class="socioEconomicaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
	            		@else
	            			<label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
	            			<input {{ $checked }} type="checkbox" class="asistenciaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
            			@endif
            		</div>
            	@endforeach
            	<div class="ml-3 socioEconomica" style="display: none;">
            		@foreach ($datosSocioeconomica as $socioeconomica)
                        @php
                            $socioeconomicaIds = $formularioF->socioeconomics->pluck('id')->toArray();
                            $checked = (in_array($socioeconomica->id, $socioeconomicaIds)) ? 'checked' : ''
                        @endphp
            			<div class="ml-3">
                            <label for="{{ $socioeconomica->id }}">{{ $socioeconomica->nombre }}</label>
                            <input {{ $checked }} type="checkbox" class="deSocioEconomica{{ $socioeconomica->id }}" id="{{ $socioeconomica->id }}" value="{{ $socioeconomica->id }}" name="socioeconomic_id[]">
                        </div>
            		@endforeach
            	</div>
            	<div class="ml-3 socioEconomicaCual" style="display: none;">
            		<label for="">Cual?</label>
            		<input type="text" class="form-control socioEconomicaCualInput" value="{{ $formularioF->socioeconomicaCual }}" name="socioeconomicaCual">
            	</div>
            </div>

            <div class="form-group">
            	<label for="">F 3 Organismos con los que se articula actualmente:</label>
            </div>

            <div class="form-group">
            	<label for="">F 3 I. Organismos Judiciales:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label><br>
            	@foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                    @php
                        $orgJudicialesActualmenteIds = $formularioF->orgjudicialactualmentes->pluck('id')->toArray();
                        $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                    @endphp
            		<div class="ml-3">
            			<label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
            			<input {{ $checked }} type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
            		</div>
            	@endforeach
            </div>

            <div class="form-group">
            	<label for="">F 3 II. Organismos/Programas Nacionales:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label><br>
            		@foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                        @php
                            $progNacionalesActualmenteIds = $formularioF->orgprognacionalactualmentes->pluck('id')->toArray();
                            $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                        @endphp
            			<div class="ml-3">
							@if ($progNacionalesActualmente->nombre == 'Otro')
								<label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
								<input {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
							@else
								<label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
		        				<input {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
							@endif	
						</div>
	            	@endforeach		

            	<div id="orgprognacionalActualmenteCual" class="form-group orgprognacionalActualmenteCual" style="display: none;">
	            	@foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                        @if ($progNacionalOtro->fformulario_id === $formularioF->id)
                            <label for="">Cual?</label>
                            <input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput" value="{{ $progNacionalOtro->nombreOrganismo }}" name="orgprognacionalActualmenteOtro[]"><br>
                        @endif
                    @endforeach
                    
	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteAgregarOtro" value="Agregar Otro" name="">
            		<input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
	            </div>
            </div>


            <div id="orgProgProvincialesActualmente" class="form-group orgProgProvincialesActualmente">
                @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                    @if ($provActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 III. Organismos/Programas Provinciales:</label>
                        <input type="text" class="form-control ml-3" value="{{ $provActualmente->nombreOrganismo }}" name="orgProgProvincialesActualmente[]">
                    @endif
                @endforeach
            </div>

            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div id="orgProgMunicipalesActualmente" class="form-group orgProgMunicipalesActualmente">
                @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                    @if ($muniActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 IV. Organismos/Programas Municipales:</label>
                        <input type="text" class="form-control ml-3" value="{{ $muniActualmente->nombreOrganismo }}" name="orgProgMunicipalesActualmente[]">
                    @endif
                @endforeach
            </div>

            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div class="form-group">
            	<label for="">F 3 V. Policía:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label>
            	@foreach ($datosPoliciaActualmente as $policiaActualmente)
                    @php
                        $policiaActualmenteIds = $formularioF->policiaactualmentes->pluck('id')->toArray();
                        $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                    @endphp
            		<div class="ml-3">
            			<label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
	            		<input {{ $checked }} type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
            		</div>
            	@endforeach
            </div>

            <div id="orgSocCivilActualmente" class="form-group orgSocCivilActualmente">
                @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                    @if ($socCivilActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 VI. Organizaciones de la Sociedad Civil:</label>
                        <input type="text" class="form-control ml-3" value="{{ $socCivilActualmente->nombreOrganismo }}" name="orgSocCivilActualmente[]">
                    @endif
                @endforeach
            </div>

            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

	    	<button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button><br><br>
	    </form>






    </section>
			        
    <script src="/js/formularioF.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>