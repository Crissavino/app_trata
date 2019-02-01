<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje F: Atención del caso</title>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        @if ($idFormA)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/A/{{ $idFormA }}">Eje A: Datos institucionales</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif
        @if ($idFormB)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/B/{{ $idFormB }}">Eje B: Caracterización de la víctima</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/B">Eje B: Caracterización de la víctima</a> </li>
        @endif
        @if ($idFormC)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C/{{ $idFormC }}">Eje C: Grupo Conviviente</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/C">Eje C: Grupo Conviviente</a> </li>
        @endif
        @if ($idFormD)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/D">Eje D: Datos de delito</a> </li>
        @endif
        @if ($idFormE)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif
        @if ($idFormF)
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/F/{{ $idFormF }}">Eje F: Atención del caso</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/F">Eje F: Atención del caso</a> </li>
        @endif
        @if ($idFormG)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idFormG }}">Eje G: Documentación</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/G">Eje G: Documentación</a> </li>
        @endif
         {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C">Eje C: Grupo Conviviente</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D">Eje D: Datos de delito</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E">Eje E: Datos del imputado</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F">Eje F: Atención del caso</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G">Eje G: Documentación</a> </li> --}}
    </ul>
</header>
<body>
    <section class="container">
    	<form action="" class="form-group" method="post">
	    	{{ csrf_field() }}
            @method('PUT')

            <h1 class="text-center" style="padding: 15px;">
                Eje F: Atención del caso
                <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $formularioF->numeroCarpeta }}</h5>
            </h1>

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
                        @endif
                        @if($aFormulario->derivacion_otro_organismo_id == 16)
                            <input type="text" name="" class="form-control ml-3" readonly="readonly" 
                                value="{{ $aFormulario->derivacion_otro_organismo_cual }}">
                        @endif
                        @if($aFormulario->derivacion_otro_organismo_id === null)
                            {{-- <input type="text" name="" class="form-control ml-3" readonly="readonly" value="No intervino ningún organismo previamente"> --}}
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
                        $checked = (in_array($progNacionales->id, $progNacionalesIds)) ? 'checked' : '';
                    @endphp
					<div class="ml-3">
						@if ($progNacionales->nombre == 'Otro')
									<label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
            						<input {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]" class="orgProgNacionalOtro">
						@else
							<label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
            				<input {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]">
						@endif		
					</div>		
            	@endforeach

            	<div class="form-group orgProgNacionalCual" style="display: none;">
                    @foreach ($orgProgNacionalOtro as $otroProgNacional)
                        @if ($otroProgNacional->fformulario_id === $formularioF->id)
                            <label for="">Cual?(Cargados Anteriormente)</label>
                            <input type="text" class="form-control ml-3 orgProgNacionalCualInput" value="{{ $otroProgNacional->nombreOrganismo }}" readonly="readonly"><br>
                        @endif
                    @endforeach
                    <div id="orgProgNacionalCual">
                        <label for="">Cual?</label>
                        <input type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro[]"><br>
                    </div>
	            	

	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalAgregarOtro" value="Agregar Otro" name="">
	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalBorrarOtro" value="Borrar Otro" name=""><br><br>
	            </div>
            </div>

            <div class="form-group">
                @foreach ($orgProgProvincial as $programaProv)
                    @if ($programaProv->fformulario_id === $formularioF->id)
                        <label for="">F 1 III. Organismos/Programas Provinciales Cargados Anteriormente:</label>
                        <input type="text" class="form-control ml-3 mb-3" value="{{ $programaProv->nombreOrganismo }}" readonly="readonly">
                    @endif
                @endforeach
                <div id="orgProgProvinciales">
                    <label for="">F 1 III. Organismos/Programas Provinciales:</label>
                    <input type="text" class="form-control ml-3" value="" name="orgProgProvinciales[]">
                </div>
            	
            </div>
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div class="form-group">
                @foreach ($orgProgMunipal as $programaMuni)
                    @if ($programaMuni->fformulario_id === $formularioF->id)
                        <label for="">F 1 IV. Organismos/Programas Municipales Cargado Anteriormente:</label>
                        <input type="text" class="form-control ml-3" value="{{ $programaMuni->nombreOrganismo  }}" readonly="readonly">
                    @endif
                @endforeach
                <div id="orgProgMunicipales">
                    <label for="">F 1 IV. Organismos/Programas Municipales:</label>
                    <input type="text" class="form-control ml-3" name="orgProgMunicipales[]">
                </div>
            	
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

            <div class="form-group">
                @foreach ($orgSocCivil as $organizacion)
                    @if ($organizacion->fformulario_id === $formularioF->id)
                        <label for="">F 1 VI. Organizaciones de la Sociedad Civil Cargadas Anteriormete:</label>
                        <input type="text" class="ml-3 form-control" value="{{ $organizacion->nombreOrganismo  }}" readonly="readonly">
                    @endif
                @endforeach
                <div id="orgSocCivil">
                    <label for="">F 1 VI. Organizaciones de la Sociedad Civil:</label>
                    <input type="text" class="ml-3 form-control" name="orgSocCivil[]">
                </div>
               
            	
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

            	<div class="form-group orgprognacionalActualmenteCual" style="display: none;">
	            	@foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                        @if ($progNacionalOtro->fformulario_id === $formularioF->id)
                            <label for="">Cual?(Cargado Anteriormente)</label>
                            <input type="text" class="form-control ml-3" value="{{ $progNacionalOtro->nombreOrganismo }}" readonly="readonly"><br>
                        @endif
                    @endforeach

                    <div id="orgprognacionalActualmenteCual">
                        <label for="">Cual?</label>
                        <input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput" name="orgprognacionalActualmenteOtro[]"><br>
                    </div>
                    
	            	<input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteAgregarOtro" value="Agregar Otro" name="">
            		<input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
	            </div>
            </div>


            <div class="form-group orgProgProvincialesActualmente">
                @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                    @if ($provActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 III. Organismos/Programas Provinciales Cargados Anteriormente:</label>
                        <input type="text" class="form-control ml-3 mb-3" value="{{ $provActualmente->nombreOrganismo }}" readonly="readonly">
                    @endif
                @endforeach
            </div>
            <div id="orgProgProvincialesActualmente">
                <label for="">F 3 III. Organismos/Programas Provinciales:</label>
                <input type="text" class="form-control ml-3 mb-3" name="orgProgProvincialesActualmente[]">
            </div>

            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

            <div class="form-group orgProgMunicipalesActualmente">
                @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                    @if ($muniActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 IV. Organismos/Programas Municipales Cargados Anteriormente:</label>
                        <input type="text" class="form-control ml-3 mb-3" value="{{ $muniActualmente->nombreOrganismo }}" readonly="readonly">
                    @endif
                @endforeach
            </div>
            <div id="orgProgMunicipalesActualmente">
                <label for="">F 3 IV. Organismos/Programas Municipales:</label>
                <input type="text" class="form-control ml-3 mb-3" name="orgProgMunicipalesActualmente[]">
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

            <div class="form-group orgSocCivilActualmente">
                @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                    @if ($socCivilActualmente->fformulario_id === $formularioF->id)
                        <label for="">F 3 VI. Organizaciones de la Sociedad Civil Cargadas Anteriormente:</label>
                        <input type="text" class="form-control ml-3 mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}" readonly="readonly">
                    @endif
                @endforeach
            </div>
            <div id="orgSocCivilActualmente">
                <label for="">F 3 VI. Organizaciones de la Sociedad Civil:</label>
                <input type="text" class="form-control ml-3 mb-3" name="orgSocCivilActualmente[]">
            </div>
            
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteAgregarOtro" value="Agregar Otro" name="">
            <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

	    	<br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mr-5 col-5" name="button">Actualizar</button>
                {{-- <a href="/formularios" class="btn btn-primary col-5" title="">Volver</a> --}}
            </div>
	    </form>






    </section>
			        
    <script src="/js/formularioF.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>