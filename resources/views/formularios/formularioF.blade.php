<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje E: Atención del caso</title>
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
        {{-- <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li> --}}
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/A/{{ $carpeta->id }}/{{ $carpeta->aformulario_id }}">Eje A: Datos institucionales</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/B/{{ $carpeta->id }}/{{ $carpeta->bformulario_id }}">Eje B: Caracterización de la víctima</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/C/{{ $carpeta->id }}/{{ $carpeta->cformulario_id }}">Eje C: Referentes afectivos</a> </li>
                @break
            @endif
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/D/{{ $carpeta->id }}/{{ $carpeta->dformulario_id }}">Eje D: Datos de delito</a> </li>
                @break
            @endif
        @endforeach
        {{-- @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/E/{{ $carpeta->eformulario_id }}">Eje E: Datos del imputado</a> </li>
                @break
            @endif
        @endforeach --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        <li class="nav-item"> <a class="nav-link active" href="#">Eje E: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
    </ul>
</header>
<body>
    @if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <section class="container">
        <h1 class="text-center" style="padding: 15px;">
            {{-- ele eje F paso a ser el eje E --}}
            Eje E: Atención del caso
            <h5 class="mb-5" style="text-align: center;">Estás trabajando sobre la carpeta n° {{ $numeroCarpeta }}</h5>
        </h1>
    	<form action="" id="formularioF" class="form-group" method="post">
	    	{{ csrf_field() }}
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $numeroCarpeta }}">
            <div class="form-group {{ $errors->has('intervinieronOrganismos') ? 'has-error' : ''}}">
                <label for="">E 1. Organismos que intervinieron previamente:</label>
                <select class="ml-3 mb-3 form-control intervinieronOrganismos_id" name="intervinieronOrganismos_id">
                    <option value="" disabled selected>Seleccione</option>
                    @foreach ($datosIntervinieronOrganismos as $organismos)
                        @php
                            $selected = ($organismos->id == old('intervinieronOrganismos_id')) ? 'selected' : '';
                        @endphp
                        <option value="{{ $organismos->id }}" {{ $selected }}>{{ $organismos->nombre }}</option>
                    @endforeach
                </select>
                {!! $errors->first('intervinieronOrganismos', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>
            <div class="form-group organismoDerivo" style="display: none;">
                @foreach ($aFormularios as $aFormulario)
                    @if ($aFormulario->datos_numero_carpeta === $numeroCarpeta)
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
            <div class="intervinieron" style="display: none;">
                <div class="form-group">
                    <label for="">E 1 I. Organismos Judiciales:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label><br>
                    @foreach ($datosOrgJudiciales as $orgJudicial)
                        <div class="ml-3">
                            <label for="{{ $orgJudicial->id }}">{{ $orgJudicial->nombre }}</label>
                            <input type="checkbox" id="{{ $orgJudicial->id }}" value="{{ $orgJudicial->id }}" name="orgjudicials_id[]">
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="">E 1 II. Organismos/Programas Nacionales:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label><br>
                    @foreach ($datosProgNacionales as $progNacionales)
                        <div class="ml-3">
                            @if ($progNacionales->nombre == 'Otro')
                                        <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                        <input type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]" class="orgProgNacionalOtro">
                            @else
                                <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                <input type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]">
                            @endif      
                        </div>      
                    @endforeach

                    <div id="orgProgNacionalCual" class="form-group orgProgNacionalCual" style="display: none;">
                        <label for="">Cual?</label>
                        <input type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro[]"><br>

                        <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalAgregarOtro" value="Agregar Otro" name="">
                        <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalBorrarOtro" value="Borrar Otro" name=""><br><br>
                    </div>
                </div>

                <div id="orgProgProvinciales" class="form-group">
                    <label for="">E 1 III. Organismos/Programas Provinciales:</label>
                    <input type="text" class="form-control ml-3" name="orgProgProvinciales[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesBorrarOtro" value="Borrar Otro" name=""><br><br>

                <div id="orgProgMunicipales" class="form-group">
                    <label for="">E 1 IV. Organismos/Programas Municipales:</label>
                    <input type="text" class="form-control ml-3" name="orgProgMunicipales[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesAgregarOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesBorrarOtro" value="Borrar Otro" name=""><br><br>

                <div class="form-group">
                    <label for="">E 1 V. Policía:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label>
                    @foreach ($datosPolicia as $policia)
                        <div class="ml-3">
                            <label for="{{ $policia->id }}">{{ $policia->nombre }}</label>
                            <input type="checkbox" id="{{ $policia->id }}" value="{{ $policia->id }}" name="policias_id[]">
                        </div>
                    @endforeach
                </div>

                <div id="orgSocCivil" class="form-group">
                    <label for="">E 1 VI. Organizaciones de la Sociedad Civil:</label>
                    <input type="text" class="ml-3 form-control" name="orgSocCivil[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilAgregarOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilBorrarOtro" value="Borrar Otro" name=""><br><br>
            </div>

            {{-- F 2 --}}
            <div class="form-group">
            	<label for="">E 2. Tipo de asistencia requerida:
            		<span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
            	</label>
            	@foreach ($datosAsistencia as $asistencia)
            		<div class="ml-3">
            			@if ($asistencia->id === 3)
            				<label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
	            			<input type="checkbox" class="socioEconomicaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
	            		@else
	            			<label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
	            			<input type="checkbox" class="asistenciaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
            			@endif
            		</div>
            	@endforeach
            	<div class="ml-3 socioEconomica" style="display: none;">
            		@foreach ($datosSocioeconomica as $socioeconomica)
            			<div class="ml-3">
                            <label for="{{ $socioeconomica->id }}">{{ $socioeconomica->nombre }}</label>
                            <input type="checkbox" class="deSocioEconomica{{ $socioeconomica->id }}" id="{{ $socioeconomica->id }}" value="{{ $socioeconomica->id }}" name="socioeconomic_id[]">                   
                        </div>   
            		@endforeach
            	</div>
            	<div class="ml-3 socioEconomicaCual" style="display: none;">
            		<label for="">Cual?</label>
            		<input type="text" class="form-control socioEconomicaCualInput" name="socioeconomicaCual">
            	</div>
            </div>

            {{-- F 3 --}}
            <div class="form-group {{ $errors->has('intervinieronOrganismosActualmente') ? 'has-error' : ''}}">
            	<label for="">E 3 Organismos con los que se articula actualmente:</label><br>
                <label for="">Se ha articulado con otros organismos en el transcurso de la asistencia?</label>
                <select name="intervinieronOrganismosActualmente_id" class="form-control intervinieronOrganismosActualmente_id">
                    <option value="" disabled selected>Seleccione</option>
                    @foreach ($datosIntervinieronOrganismosActualmente as $organismos)
                        @php
                            $selected = ($organismos->id == old('intervinieronOrganismosActualmente_id')) ? 'selected' : '';
                        @endphp
                        <option value="{{ $organismos->id }}" {{ $selected }}>{{ $organismos->nombre }}</option>
                    @endforeach
                </select>
                {!! $errors->first('intervinieronOrganismosActualmente', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="intervinieronActualmente" style="display: none;">
                <div class="form-group">
                    <label for="">E 3 I. Organismos Judiciales:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label><br>
                    @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                        <div class="ml-3">
                            <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                            <input type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="">E 3 II. Organismos/Programas Nacionales:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label><br>
                        @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                            <div class="ml-3">
                                @if ($progNacionalesActualmente->nombre == 'Otro')
                                    <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                    <input type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                @else
                                    <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                    <input type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                @endif  
                            </div>
                        @endforeach     

                    <div id="orgprognacionalActualmenteCual" class="form-group orgprognacionalActualmenteCual" style="display: none;">
                        <label for="">Cual?</label>
                        <input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput" name="orgprognacionalActualmenteOtro[]"><br>

                        <input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteAgregarOtro" value="Agregar Otro" name="">
                        <input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
                    </div>
                </div>


                <div id="orgProgProvincialesActualmente" class="form-group orgProgProvincialesActualmente">
                    <label for="">E 3 III. Organismos/Programas Provinciales:</label>
                    <input type="text" class="form-control ml-3" name="orgProgProvincialesActualmente[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteAgregarOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

                <div id="orgProgMunicipalesActualmente" class="form-group orgProgMunicipalesActualmente">
                    <label for="">E 3 IV. Organismos/Programas Municipales:</label>
                    <input type="text" class="form-control ml-3" name="orgProgMunicipalesActualmente[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteAgregarOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

                <div class="form-group">
                    <label for="">E 3 V. Policía:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label>
                    @foreach ($datosPoliciaActualmente as $policiaActualmente)
                        <div class="ml-3">
                            <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                            <input type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
                        </div>
                    @endforeach
                </div>

                <div id="orgSocCivilActualmente" class="form-group orgSocCivilActualmente">
                    <label for="">E 3 VI. Organizaciones de la Sociedad Civil:</label>
                    <input type="text" class="form-control ml-3" name="orgSocCivilActualmente[]">
                </div>
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteAgregarOtro" value="Agregar Otro" name="">
                <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
            </div>

	    	<button type="submit" class="btn btn-primary col-xl" name="button">Guardar</button><br><br>
	    </form>






    </section>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"  type="text/javascript"></script>
    <script src="/js/formularioF.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        {{-- ALERTA PARA LLENAR PRIMERO EL FORMULARIO F --}}
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