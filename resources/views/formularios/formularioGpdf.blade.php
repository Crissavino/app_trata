<!DOCTYPE html>
<html>

<head>
<title>Carpeta </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style>
    body{
        font-family: 'DejaVu Sans', sans-serif;
    }
</style>
</head>
<body>
<div id="imprimible" >
<div class="row">

<img style="width:160px;height:50px" src="{{ public_path('/img/logoprovincia.png') }}">

</div>
        <h1 class="text-center" style="padding-top: 15px;">
            Informe de seguimiento
        </h1>
        <form action="" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
            {{ csrf_field() }}
            @method('PUT')
            <input type="text" name="numeroCarpeta" value="{{ $formularioG->numeroCarpeta }}" style="display: none;">

            {{-- Datos del formulario A --}}
                    @foreach ($aFormularios as $formA)
                        @if ($formA->datos_numero_carpeta === $formularioG->numeroCarpeta)
                        <section class="">
                            <h2 class="text-center m-5">Encabezado</h2>
                            {{-- INICIO PRIMERA PREGUNTA --}}
                            <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}" >
                                <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                                {{ $formA->datos_nombre_referencia }}
                                {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}

                            </div>
                        {{-- FIN PRIMERA PREGUNTA --}}

                        {{-- INICIO SEGUNDA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                                <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                                {{ $formA->datos_numero_carpeta }}
                            </div>
                        {{-- FIN SEGUNDA PREGUNTA --}}

                        {{-- INICIO TERCERA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                                <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                                {{ $formA->datos_fecha_ingreso->format('d/m/Y')}}
                                {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN TERCERA PREGUNTA --}}

                        {{-- INICIO CUARTA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                                <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                               
                                    @php 
                                    $modalidadSeleccionada="";
                                    @endphp
                                    @foreach ($datosModalidad as $modalidad)
                                        @php
                                            $selected = ($modalidad->id == $formA->modalidad_id) ? 'selected' : '';
                                        @endphp
                                        @php
                                        if($selected=="selected"){
                                            $modalidadSeleccionada=$modalidad->nombre;
                                        }
                                        @endphp
                                    @endforeach
                                {{$modalidadSeleccionada}}
                                
                                {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                                <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                                    <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                        <option value="">De que tipo?</option>
                                        @php $presentacionSeleccionado="" @endphp
                                        @foreach ($datosPresentacion as $presentacion)
                                            @php
                                                $selected = ($presentacion->id == $formA->presentacion_espontanea_id) ? 'selected' : '';
                                                if($selected=="selected"){
                                                    $presentacionSeleccionado=$presentacion->nombre;
                                                }
                                            @endphp
                                        @endforeach
                                        {{$presentacionSeleccionado}}
                                    </select>
                                {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                                @php $organismoSeleccionado="" @endphp
                                        @foreach ($datosOrganismo as $organismo)
                                            @php
                                                $selected = ($organismo->id == $formA->derivacion_otro_organismo_id) ? 'selected' : '';
                                                if($selected=="selected"){
                                                    $organismoSeleccionado=$organismo->nombre;
                                                }
                                            @endphp
                                            
                                        @endforeach
                                    {{$organismoSeleccionado}}
                                {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                                    <br><label for="">Cuál?</label>
                                    {{ $formA->derivacion_otro_organismo_cual }}
                                </div>
                                {!! $errors->first('derivacion_otro_organismo_cual', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                            <script>
                                function selectOnChange3(sel) {
                                    if (sel.value=="16"){
                                        divC = document.getElementById("derivacion_otro_organismo_cual");
                                        divC.style.display = "";
                                    }else{
                                        divC = document.getElementById("derivacion_otro_organismo_cual");
                                        $('#derivacion_otro_organismo_cual').val('');
                                        divC.style.display="none";
                                    }
                                }
                            </script>

                            <script>
                                function selectOnChange2(sel) {
                                    if (sel.value=="3"){
                                        divC = document.getElementById("presentacion_espontanea_id");
                                        divC.style.display = "";
                                    }else{
                                        divC = document.getElementById("presentacion_espontanea_id");
                                        $('#presentacion_espontanea_id').val('');
                                        divC.style.display="none";
                                    }

                                    if (sel.value=="5") {
                                        divC = document.getElementById("derivacion_otro_organismo_id");
                                        divC.style.display = "";
                                    }else{
                                        divC = document.getElementById("derivacion_otro_organismo_id");
                                        $('#derivacion_otro_organismo_id').val('');
                                        divC.style.display="none";
                                    }
                                }
                            </script>
                        {{-- FIN CUARTA PREGUNTA --}}

                        {{-- INICIO QUINTA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('estadocaso_id') ? 'has-error' : ''}}>
                                <label for="estadocaso_id">A 5. Estado Actual:</label>
                                    @php 
                                    $estadocasoSeleccionado="";
                                    @endphp
                                    @foreach ($datosEstadoCaso as $estadocaso)
                                        @php
                                            $selected = ($estadocaso->id == $formA->estadocaso_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $estadocasoSeleccionado=$estadocaso->nombre;
                                            }
                                        
                                        @endphp
                                        
                                    @endforeach
                                    {{$estadocasoSeleccionado}}
                              
                                {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                            <div class="form-group divMotivoCierre" style="display: none;">
                                <label for="">A 5 I. Motivo de cierre</label>
                                @php 
                                    $motivoSeleccionado="";
                                @endphp

                                    @foreach ($datosMotivoCierre as $motivoCierre)
                                        @php
                                            $selected = ($motivoCierre->id == $formA->motivocierre_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $motivoSeleccionado=$motivoCierre->nombre;
                                            }
                                        @endphp
                                    @endforeach
                                    {{$motivoSeleccionado}}
                            </div>
                        {{-- FIN QUINTA PREGUNTA --}}

                        {{-- INICIO SEXTA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                                <label for="">A 6. Ámbito de competencia</label>
                                @php 
                                    $ambitoSeleccionado="";
                                @endphp
                                @foreach ($datosAmbito as $ambito)
                                        @php
                                            $selected = ($ambito->id == $formA->ambito_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $ambitoSeleccionado=$ambito->nombre;
                                            }
                                        @endphp
                                        
                                    @endforeach
                                    {{ $ambitoSeleccionado}}
                                {!! $errors->first('ambito_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                            <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                                @php 
                                    $departamentoSeleccionado="";
                                @endphp
                                    @foreach ($datosDepartamento as $departamento)
                                        @php
                                            $selected = ($departamento->id == $formA->departamento_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $departamentoSeleccionado=$departamento->nombre;
                                            }
                                        @endphp
                                    @endforeach
                                    {{$departamentoSeleccionado}}
                                    
                                {!! $errors->first('departamento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                             <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                                @php 
                                    $otrasProvSeleccionado="";
                                @endphp
                                    @foreach ($datosOtrasProv as $otrasProv)
                                        @php
                                            $selected = ($otrasProv->id == $formA->otrasprov_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $otrasProvSeleccionado=$otrasProv->nombre;
                                            }
                                        @endphp
                                    @endforeach
                                    {{$otrasProvSeleccionado}}
                                {!! $errors->first('otrasprov_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN SEXTA PREGUNTA --}}

                        {{-- INICIO SEPTIMA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                                <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                                @php 
                                    $caratulacionSeleccionado="";
                                @endphp
                                    @foreach ($datosCaratulacion as $caratulacion)
                                        @php
                                            $selected = ($caratulacion->id == $formA->caratulacionjudicial_id) ? 'selected' : '';
                                            if($selected=="selected"){
                                                $caratulacionSeleccionado=$caratulacion->nombre;
                                            }
                                        @endphp
                                    @endforeach
                                    {{$caratulacionSeleccionado}}
                                {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                                    <br><label for="">Cuál?</label>
                                    {{ $formA->caratulacionjudicial_otro }}
                                </div>
                                {!! $errors->first('caratulacionjudicial_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                             {{-- <script>
                                 function selectOnChange(sel) {
                                   if (sel.value=="6"){
                                        divC = document.getElementById("cual");
                                        divC.style.display = "";
                                   }else{

                                        divC = document.getElementById("cual");
                                        $('#caratulacionjudicial_otro').val('');
                                        divC.style.display="none";
                                   }
                                 }
                            </script> --}}
                        {{-- FIN SEPTIMA PREGUNTA --}}

                        {{-- INICIO OCTAVA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                                <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                                {{ $formA->datos_nro_causa }}
                                {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN OCTAVA PREGUNTA --}}

                        {{-- INICIO PROFESIONALES CARGADOS --}}
                            <h3>Profesionales cargados anteriormente:</h3>
                            @foreach ($formA->profesionalintervinientes as $profesionales)
                                    <div class="form-group">
                                        <label for="profesional_id">Profesional que interviene: </label>
                                            @php $profesionalSeleccionado=""; @endphp
                                            @foreach ($datosProfesional as $datos)
                                                
                                                @php
                                               
                                                $selected = ($profesionales->profesional_id  == $datos->id) ? "selected" : " ";
                                                if($selected=="selected"){
                                                    $profesionalSeleccionado=$datos->nombre_apellido_equipo;
                                                }
                                                @endphp
                                            @endforeach
                                            {{ $profesionalSeleccionado }}
                                    </div>

                                    <div class="form-group">
                                        <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                                        {{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_desde)->format('d/m/Y')}}
                                    </div>

                                    <div class="form-group">
                                        <label for="profesionalactualmente_id">A 9.5 Actualmente Interviene:</label>
                                        
                                        @php 
                                        if( $profesionales->profesionalactualmente_id==1 )
                                            echo "SI";
                                        else{
                                            echo "NO";
                                        }
                                        @endphp
                                    </div>

                                    @if (!($profesionales->datos_profesional_interviene_hasta === null))
                                        <div class="form-group">
                                            <label for="datos_profesional_interviene_hasta">A 9.4 Intervino hasta:</label>
                                            {{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_hasta)->format('d/m/Y') }}
                                        </div>
                                    @endif
                            @endforeach
                            {{-- FIN PROFESIONALES CARGADOS --}}
                        </section>
                        @endif
                    @endforeach
                {{-- Fin Datos del formulario A --}}

            {{-- Introduccion --}}
                <h2 class="text-center m-5">Introducción</h2>
                <div class="form-group">
                {{ $formularioG->introduccion }}
                </div>
            {{-- Fin introduccion --}}

            {{-- Articulación con organismos --}}
                    @foreach ($formulariosF as $formF)
                    @if ($formF->intervinieronOrganismosActualmente_id==1)
                        @if ($formF->numeroCarpeta === $formularioG->numeroCarpeta)
                            
                                <h2 class="text-center m-5">Articulación con organismos</h2>
                           
                            <div class="form-group">
                               
                                    <div class="form-group">
                                    
                                        <label for="">E 3 Organismos con los que se articula actualmente:</label>
                                    </div>
                                    @if($formF->orgjudicialactualmentes->count()>0)
                                        <div class="form-group">
                                            <label for="">E 3 I. Organismos Judiciales:
                                            
                                            </label><br>
                                            @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                                                @php
                                                    $orgJudicialesActualmenteIds = $formF->orgjudicialactualmentes->pluck('id')->toArray();
                                                    $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                                                @endphp
                                                @if($checked=='checked')
                                                <div class="ml-3">
                                                    <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                                                    <input disabled {{ $checked }} type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                
                                

                                @if($formF->orgprognacionalactualmentes->count()>0)
                                    <div class="form-group">
                                        <label for="">E 3 II. Organismos/Programas Nacionales:
                                        </label><br>
                                            @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                                                @php
                                                    $progNacionalesActualmenteIds = $formF->orgprognacionalactualmentes->pluck('id')->toArray();
                                                    $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                                                @endphp
                                                @if($checked=='checked')
                                                <div class="ml-3">
                                                    @if ($progNacionalesActualmente->nombre == 'Otro')
                                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                        <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                                    @else
                                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                        <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                                    @endif  
                                                </div>
                                                @endif
                                            @endforeach   
                                    @endif  

                                    <div class="form-group orgprognacionalActualmenteCual" style="display: none;">
                                        @foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                                            @if ($progNacionalOtro->fformulario_id === $formF->id)
                                                <label for="">Cual?(Cargado Anteriormente)</label>
                                                <input type="text" class="form-control ml-3" value="{{ $progNacionalOtro->nombreOrganismo }}" readonly="readonly"><br>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                
                                
                                <div class="form-group orgProgProvincialesActualmente">
                                    @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                                        @if ($provActualmente->fformulario_id === $formF->id)
                                            <label for="">E 3 III. Organismos/Programas Provinciales Cargados Anteriormente:</label>
                                            {{ $provActualmente->nombreOrganismo }}
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-group orgProgMunicipalesActualmente">
                                    @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                                        @if ($muniActualmente->fformulario_id === $formF->id)
                                            <label for="">E 3 IV. Organismos/Programas Municipales Cargados Anteriormente:</label>
                                            {{ $muniActualmente->nombreOrganismo }}
                                        @endif
                                    @endforeach
                                </div>

                                @if($formF->policiaactualmentes->count()>0)
                                <div class="form-group">
                                    <label for="">E 3 V. Polic&iacute;a:
                                    </label>
                   
                                    @foreach ($datosPoliciaActualmente as $policiaActualmente)
                                        @php
                                        
                                            $policiaActualmenteIds = $formF->policiaactualmentes->pluck('id')->toArray();
                                            
                                            $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                                        @endphp
                                        @if($checked=='checked')
                                        <div class="ml-3">
                                            <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                                            <input disabled {{ $checked }} type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                                
                                
                                <div class="form-group orgSocCivilActualmente">
                                    @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                                        @if ($socCivilActualmente->fformulario_id === $formF->id)
                                            <label for="">E 3 VI. Organizaciones de la Sociedad Civil Cargadas Anteriormente:</label>
                                            {{ $socCivilActualmente->nombreOrganismo }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @endif
                    @endforeach
                {{-- Fin Articulación con organismos --}}

                <div class="intervenciones-anteriores form-group">
                    @php $i = 1; @endphp
                    @foreach ($intervenciones as $intervencion)
                        <h3><?=$i?>° Intervenci&oacute;n</h3></h3>
                        <div class="form-group">
                            <label for="" class="">Fecha: </label>
                            {{ $intervencion->fechaIntervencion }}
                        </div>
                        <div class="form-group">
                            <label for="" class="">Tema: </label>
                            @php 
                             $intervencionSeleccionado="";
                            @endphp
                                @foreach ($temaIntervencion as $tema)
                                    @php
                                    ($tema->id == $intervencion->temaIntervencion_id) ? 'selected' : '';
                                    if($selected=="selected"){
                                        $intervencionSeleccionado=$tema->nombre;
                                    }
                                    @endphp
                                @endforeach
                            {{$intervencionSeleccionado}}
                            @if ($intervencion->temaOtro)
                                <div class="temaCual">
                                    <label for="">Cual?</label>
                                    {{ $intervencion->temaOtro }}
                                    <br>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                                
                                    <label for="contactoDirecto_id">¿Esta intervención incluye el contacto directo con la víctima? </label>
                               
                                    
                                        @php $datosContactoDirectoActual=""; @endphp
                                        @foreach($intervenciones as $intervencion)
                                        @foreach ($datosContactoDirecto as $contactoDirecto)
                                        
                                            @php
                                                $selected = ($contactoDirecto->id == $intervencion->contactoDirecto_id) ? 'selected' : '';
                                                if($selected=="selected"){
                                                    $datosContactoDirectoActual=$contactoDirecto->nombre;
                                                }
                                            @endphp
                                            
                                        @endforeach
                                        @endforeach

                                        {{$datosContactoDirectoActual}}
                                    
                                   
                                </div>  
                            
                        <div class="form-group datosIntervencion">
                            <div class="form-group">
                                <label for="">Nombre de contacto:</label>
                                {{ $intervencion->nombreContacto }}
                            </div>
                            <div class="form-group">
                                <label for="">Tele&eacute;fono de contacto:</label>
                                {{ $intervencion->telefonoContacto }}
                            </div>
                            <div class="form-group">
                                <label for="">Descripcio&oacute;n de la intervenci&oacute;n:</label>
                                {{ $intervencion->descripcionIntervencion }}
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
        </form>
    </div>
</body>

</html>