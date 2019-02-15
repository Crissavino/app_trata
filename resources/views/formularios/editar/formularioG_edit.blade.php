<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje F: Detalle de intervención</title>
    <style>
        .cerrarSesion{
            position: absolute;
            top: 0;
            right: 0;
        }

        .botones{
            display: inline-block;
            width: 100%;
            position: fixed;
            bottom: 40px;
        }

        .imprimir{
            display: block;
            z-index: 100 !important;
            /*width: 100%;*/
        }

        .descargar{
            display: block;
            /*width: 100%;*/
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
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C/{{ $idFormC }}">Eje C: Referentes afectivos</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/C">Eje C: Referentes afectivos</a> </li>
        @endif
        @if ($idFormD)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/D">Eje D: Datos de delito</a> </li>
        @endif
        {{-- @if ($idFormE)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        @if ($idFormF)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F/{{ $idFormF }}">Eje E: Atención del caso</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/F">Eje E: Atención del caso</a> </li>
        @endif
        @if ($idFormG)
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/G/{{ $idFormG }}">Eje F: Detalle de intervención</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/G">Eje F: Detalle de intervención</a> </li>
        @endif
         {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C">Eje C: Referentes afectivos</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D">Eje D: Datos de delito</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E">Eje E: Datos del imputado</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F">Eje F: Atención del caso</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G">Eje G: Documentación</a> </li> --}}
    </ul>
</header>
<body>
    <section class="container">
        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
            <h1 class="text-center" style="padding: 15px;">
                Eje F: Detalle de intervención
                <h5 class=" mb-5" style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $formularioG->numeroCarpeta }}</h5>
            </h1>
            <form action="" id="form" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
                {{ csrf_field() }}
                @method('PUT')
                <input type="text" name="numeroCarpeta" value="{{ $formularioG->numeroCarpeta }}" style="display: none;">

                <label for="" class="">Documentación interna guardada anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($docInterna->count() !== 0)
                             @foreach($docInterna as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>
                <div class="form-group custom-file mb-3" {{ $errors->has('docInterna[]') ? 'has-error' : ''}}>
                    {{-- ver formularioG.js para ver como deben funcionar la subida de archivos con bootstrap --}}
                    <label for="" class="custom-file-label docInterna">Click para agregar documentación</label>
                    <input class="custom-file-input docInterna-input" type="file" lang="es" name="docInterna[]" multiple>
                    {!! $errors->first('docInterna.*', '<p class="help-block" style="color:red;padding-top:10px";>:message</p>') !!}
                </div>

                <label for="" class="">Documentación externa guardada anteriormente</label>
                    <ul class="container mt-0 mb-3"> 
                        @if ($docExterna->count() !== 0)
                            @foreach($docExterna as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>
                <div class="form-group custom-file mb-3" {{ $errors->has('docExterna[]') ? 'has-error' : ''}}>
                    {{-- ver formularioG.js para ver como deben funcionar la subida de archivos con bootstrap --}}
                    <label for="" class="custom-file-label docExterna">Click para agregar documentación</label>
                    <input class="custom-file-input docExterna-input" type="file" lang="es" name="docExterna[]" multiple>
                    {!! $errors->first('docExterna.*', '<p class="help-block" style="color:red;padding-top:10px";>:message</p>') !!}
                </div>

                <label for="" class="">Fondo rotativo guardado anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($infoSocioambiental->count() !== 0)
                            @foreach($infoSocioambiental as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>
                <div class="form-group custom-file mb-3" {{ $errors->has('notRelacionadas[]') ? 'has-error' : ''}}>
                    {{-- ver formularioG.js para ver como deben funcionar la subida de archivos con bootstrap --}}
                    <label for="" class="custom-file-label notRelacionadas">Click para agregar documentación</label>
                    <input class="custom-file-input notRelacionadas-input" type="file" lang="es" name="notRelacionadas[]" multiple>
                    {!! $errors->first('notRelacionadas.*', '<p class="help-block" style="color:red;padding-top:10px";>:message</p>') !!}
                </div>

                <label for="" class="">Plan de Intervención - Estrategias de abordaje  guardada anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($intervencionEstrategias->count() !== 0)
                            @foreach($intervencionEstrategias as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>
                <div class="form-group custom-file mb-3" {{ $errors->has('intervencionEstrategias[]') ? 'has-error' : ''}}>
                    {{-- ver formularioG.js para ver como deben funcionar la subida de archivos con bootstrap --}}
                    <label for="" class="custom-file-label intervencionEstrategias">Click para agregar documentación</label>
                    <input class="custom-file-input intervencionEstrategias-input" type="file" lang="es" name="intervencionEstrategias[]" multiple>
                    {!! $errors->first('intervencionEstrategias.*', '<p class="help-block" style="color:red;padding-top:10px";>:message</p>') !!}
                </div>

                <label for="" class="">Informe Socioambiental guardado anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($infoSocioambiental->count() !== 0)
                            @foreach($infoSocioambiental as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>
                <div class="form-group custom-file mb-3" {{ $errors->has('infoSocioambiental[]') ? 'has-error' : ''}}>
                    {{-- ver formularioG.js para ver como deben funcionar la subida de archivos con bootstrap --}}
                    <label for="" class="custom-file-label infoSocioambiental">Click para agregar documentación</label>
                    <input class="custom-file-input infoSocioambiental-input" type="file" lang="es" name="infoSocioambiental[]" multiple>
                    {!! $errors->first('infoSocioambiental.*', '<p class="help-block" style="color:red;padding-top:10px";>:message</p>') !!}
                </div>

                {{-- Datos del formulario A --}}
                    @foreach ($aFormularios as $formA)
                        @if ($formA->datos_numero_carpeta === $formularioG->numeroCarpeta)
                        <section class="">
                            <h2 class="text-center m-5">Encabezado</h2>
                            {{-- INICIO PRIMERA PREGUNTA --}}
                                <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}" >
                                    <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                                    <input disabled type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $formA->datos_nombre_referencia }}">
                                    {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN PRIMERA PREGUNTA --}}

                            {{-- INICIO SEGUNDA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                                    <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                                    <input disabled type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $formA->datos_numero_carpeta }}">
                                    {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN SEGUNDA PREGUNTA --}}

                            {{-- INICIO TERCERA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                                    <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                                    <input disabled type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $formA->datos_fecha_ingreso->format('Y-m-d')}}">
                                    {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN TERCERA PREGUNTA --}}

                            {{-- INICIO CUARTA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                                    <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                                    <select disabled class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                                        <option value="">Modalidad</option>
                                        @foreach ($datosModalidad as $modalidad)
                                            @php
                                                $selected = ($modalidad->id == $formA->modalidad_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                                    <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                                        <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                            <option value="">De que tipo?</option>
                                            @foreach ($datosPresentacion as $presentacion)
                                                @php
                                                    $selected = ($presentacion->id == $formA->presentacion_espontanea_id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    </div>

                                    <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                                        <select disabled class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                            <option value="">Que Organismo?</option>
                                            @foreach ($datosOrganismo as $organismo)
                                                @php
                                                    $selected = ($organismo->id == $formA->derivacion_otro_organismo_id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    </div>

                                    <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                                        <br><label for="">Cuál?</label>
                                        <input disabled class="form-control derivacion_otro_organismo_cual_input" value="{{ $formA->derivacion_otro_organismo_cual }}" name="derivacion_otro_organismo_cual" type="text">
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

                                        if (sel.value=="4") {
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
                                    <label for="estadocaso_id">A 5. Estado Actual del Caso:</label>
                                    <select disabled class="form-control" name="estadocaso_id">
                                    <option value="">Estado Actual</option>
                                    @foreach ($datosEstadoCaso as $estadocaso)
                                        @php
                                            $selected = ($estadocaso->id == $formA->estadocaso_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                                    @endforeach
                                    </select>
                                    {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN QUINTA PREGUNTA --}}

                            {{-- INICIO SEXTA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_ente_judicial') ? 'has-error' : ''}}>
                                    <label for="datos_ente_judicial">A 6. Fiscalía/Juzgado Interviniente:</label>
                                    <input disabled type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{ $formA->datos_ente_judicial }}">
                                    {!! $errors->first('datos_ente_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN SEXTA PREGUNTA --}}

                            {{-- INICIO SEPTIMA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                                    <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                                    <select disabled class="form-control caratulacionjudicial" name="caratulacionjudicial_id" onChange="selectOnChange(this)">
                                        <option value="">Caratulación</option>
                                        @foreach ($datosCaratulacion as $caratulacion)
                                            @php
                                                $selected = ($caratulacion->id == $formA->caratulacionjudicial_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                                        <br><label for="">Cuál?</label>
                                        <input disabled class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $formA->caratulacionjudicial_otro }}" id="caratulacionjudicial_otro" type="text" onclick="cual()">
                                    </div>
                                    {!! $errors->first('caratulacionjudicial_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                 <script>
                                     function selectOnChange(sel) {
                                       if (sel.value=="25"){
                                            divC = document.getElementById("cual");
                                            divC.style.display = "";
                                       }else{

                                            divC = document.getElementById("cual");
                                            $('#caratulacionjudicial_otro').val('');
                                            divC.style.display="none";
                                       }
                                     }
                                </script>
                            {{-- FIN SEPTIMA PREGUNTA --}}

                            {{-- INICIO OCTAVA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                                    <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                                    <input disabled type="text" class="form-control" name="datos_nro_causa" value="{{ $formA->datos_nro_causa }}">
                                    {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN OCTAVA PREGUNTA --}}

                            {{-- INICIO PROFESIONALES CARGADOS --}}
                                {{-- @dd($formA->profesionalintervinientes()) --}}
                                @foreach ($formA->profesionalintervinientes as $profesionales)
                                    <h3>Profesionales cargados anteriormente:</h3>
                                        <div class="form-group">
                                            <label for="profesional_id">Profesional que interviene</label>
                                            <select disabled class="form-control">
                                                @foreach ($datosProfesional as $datos)
                                                    <option value="{{ $profesionales->profesional_id }}" {{ $profesionales->profesional_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre_apellido_equipo }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                                            <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_desde)->format('Y-m-d')}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="profesionalactualmente_id">A 9.5 Actualmente Interviene:</label>
                                            <select disabled class="form-control">
                                                    <option value="{{ $profesionales->profesionalactualmente_id }}">{{ $profesionales->nombre }}</option>
                                                    @foreach ($datosIntervieneActualmente as $datos)
                                                        <option value="{{ $profesionales->profesionalactualmente_id }}" {{ $profesionales->profesionalactualmente_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        @if (!($profesionales->datos_profesional_interviene_hasta === null))
                                            <div class="form-group">
                                                <label for="datos_profesional_interviene_hasta">A 9.4 Intervino hasta:</label>
                                                <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_hasta)->format('Y-m-d') }}">
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
                        <textarea class="form-control" name="introduccion">{{ $formularioG->introduccion }}</textarea>
                    </div>
                {{-- Fin introduccion --}}

                {{-- Articulación con organismos --}}
                    @foreach ($formulariosF as $formF)
                        @if ($formF->numeroCarpeta === $formularioG->numeroCarpeta)
                            <h2 class="text-center m-5">Articulación con organismos</h2>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">E 3 Organismos con los que se articula actualmente:</label>
                                </div>

                                <div class="form-group">
                                    <label for="">E 3 I. Organismos Judiciales:
                                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                    </label><br>
                                    @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                                        @php
                                            $orgJudicialesActualmenteIds = $formF->orgjudicialactualmentes->pluck('id')->toArray();
                                            $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                                        @endphp
                                        <div class="ml-3">
                                            <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                                            <input disabled {{ $checked }} type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="">E 3 II. Organismos/Programas Nacionales:
                                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                    </label><br>
                                        @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                                            @php
                                                $progNacionalesActualmenteIds = $formF->orgprognacionalactualmentes->pluck('id')->toArray();
                                                $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                                            @endphp
                                            <div class="ml-3">
                                                @if ($progNacionalesActualmente->nombre == 'Otro')
                                                    <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                    <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                                @else
                                                    <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                    <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                                @endif  
                                            </div>
                                        @endforeach     

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
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $provActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-group orgProgMunicipalesActualmente">
                                    @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                                        @if ($muniActualmente->fformulario_id === $formF->id)
                                            <label for="">E 3 IV. Organismos/Programas Municipales Cargados Anteriormente:</label>
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $muniActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="">E 3 V. Policía:
                                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                    </label>
                                    @foreach ($datosPoliciaActualmente as $policiaActualmente)
                                        @php
                                            $policiaActualmenteIds = $formF->policiaactualmentes->pluck('id')->toArray();
                                            $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                                        @endphp
                                        <div class="ml-3">
                                            <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                                            <input disabled {{ $checked }} type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group orgSocCivilActualmente">
                                    @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                                        @if ($socCivilActualmente->fformulario_id === $formF->id)
                                            <label for="">E 3 VI. Organizaciones de la Sociedad Civil Cargadas Anteriormente:</label>
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                {{-- Fin Articulación con organismos --}}

                {{-- AGREGAR INTERVENCIÓN --}}
                    <input type="button" class="btn btn-outline-success agregarIntervencion col-xl" value="Agregar Intervención" name=""><br><br>
                    {{-- <input type="button" class=" btn btn-outline-danger borrarIntervencion" value="Borrar Intervención" name=""><br><br> --}}

                    <div class="intervenciones-anteriores form-group">
                        @php $i = 1; @endphp
                        @foreach ($intervenciones as $intervencion)
                            <h3><?=$i?>° Intervención</h3></h3>
                            <div class="form-group">
                                <label for="" class="">Fecha</label>
                                <input type="date" class="form-control fechaInput" name="fechaIntervencion[]" value="{{ $intervencion->fechaIntervencion }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Tema</label>
                                <select class="form-control temaSelect" name="temaIntervencion_id[]">
                                    {{-- <option value="">Seleccioná un tema</option> --}}
                                    @foreach ($temaIntervencion as $tema)
                                        <option value="{{ $tema->id }}" {{ $tema->id == $intervencion->temaIntervencion_id ? 'selected' : '' }}>{{ $tema->nombre }}</option>
                                    @endforeach
                                </select><br>
                                @if ($intervencion->temaOtro)
                                    <div class="temaCual">
                                        <label for="">Cual?</label>
                                        <input type="text" class="form-control  temaCualInput" name="temaOtro[]" value="{{ $intervencion->temaOtro }}">
                                        <br></div>
                                    </div>
                                @endif
                                
                            <div class="form-group datosIntervencion">
                                <div class="form-group">
                                    <label for="">Nombre de contacto:</label>
                                    <input type="text" class="form-control" name="nombreContacto[]" value="{{ $intervencion->nombreContacto }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono de contacto:</label>
                                    <input type="text" class="form-control" name="telefonoContacto[]" value="{{ $intervencion->telefonoContacto }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descripción de la intervención:</label><input type="text" class="form-control" name="descripcionIntervencion[]" value="{{ $intervencion->descripcionIntervencion }}">
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>

                    <div id="intervenciones" class="form-group">
                    </div>
                {{-- Fin AGREGAR INTERVENCIÓN --}}
        


                <div class="text-center">
                    <button type="submit" class="btn btn-primary col-5 mr-4 btnEnviarForm">Actualizar</button>
                    {{-- <a href="/formularios" class="btn btn-primary col-5" title="">Volver</a> --}}
                </div>
            </form>
        @else
            <h1 class="text-center" style="padding: 15px;">
                Eje G: Detalle de intervención
                <h5 class=" mb-5" style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $formularioG->numeroCarpeta }}</h5>
            </h1>
            <form action="" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
                {{ csrf_field() }}
                @method('PUT')
                <input type="text" name="numeroCarpeta" value="{{ $formularioG->numeroCarpeta }}" style="display: none;">

                <label for="" class="">Documentación interna guardada anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($docInterna->count() !== 0)
                             @foreach($docInterna as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>

                <label for="" class="">Documentación externa guardada anteriormente</label>
                    <ul class="container mt-0 mb-3"> 
                        @if ($docExterna->count() !== 0)
                            @foreach($docExterna as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>

                <label for="" class="">Noticias realacionadas guardadas anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($infoSocioambiental->count() !== 0)
                            @foreach($infoSocioambiental as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>

                <label for="" class="">Plan de Intervención/Estrategias de abordaje  guardada anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($intervencionEstrategias->count() !== 0)
                            @foreach($intervencionEstrategias as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>

                <label for="" class="">Informe Socioambiental  guardado anteriormente</label>
                    <ul class="container mt-0 mb-3">
                        @if ($infoSocioambiental->count() !== 0)
                            @foreach($infoSocioambiental as $doc)
                                <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                    <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                                </li>
                            @endforeach
                        @else
                            No se cargó ningun archivo anteriormente
                        @endif
                    </ul>

                {{-- Datos del formulario A --}}
                    @foreach ($aFormularios as $formA)
                        @if ($formA->datos_numero_carpeta === $formularioG->numeroCarpeta)
                        <section class="">
                            <h2 class="text-center m-5">Encabezado</h2>
                            {{-- INICIO PRIMERA PREGUNTA --}}
                                <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}" >
                                    <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                                    <input disabled type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $formA->datos_nombre_referencia }}">
                                    {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN PRIMERA PREGUNTA --}}

                            {{-- INICIO SEGUNDA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                                    <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                                    <input disabled type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $formA->datos_numero_carpeta }}">
                                    {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN SEGUNDA PREGUNTA --}}

                            {{-- INICIO TERCERA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                                    <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                                    <input disabled type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $formA->datos_fecha_ingreso->format('Y-m-d')}}">
                                    {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN TERCERA PREGUNTA --}}

                            {{-- INICIO CUARTA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                                    <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                                    <select disabled class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                                        <option value="">Modalidad</option>
                                        @foreach ($datosModalidad as $modalidad)
                                            @php
                                                $selected = ($modalidad->id == $formA->modalidad_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                                    <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                                        <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                            <option value="">De que tipo?</option>
                                            @foreach ($datosPresentacion as $presentacion)
                                                @php
                                                    $selected = ($presentacion->id == $formA->presentacion_espontanea_id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    </div>

                                    <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                                        <select disabled class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                            <option value="">Que Organismo?</option>
                                            @foreach ($datosOrganismo as $organismo)
                                                @php
                                                    $selected = ($organismo->id == $formA->derivacion_otro_organismo_id) ? 'selected' : '';
                                                @endphp
                                                <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    </div>

                                    <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                                        <br><label for="">Cuál?</label>
                                        <input disabled class="form-control derivacion_otro_organismo_cual_input" value="{{ $formA->derivacion_otro_organismo_cual }}" name="derivacion_otro_organismo_cual" type="text">
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

                                        if (sel.value=="4") {
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
                                    <label for="estadocaso_id">A 5. Estado Actual del Caso:</label>
                                    <select disabled class="form-control" name="estadocaso_id">
                                    <option value="">Estado Actual</option>
                                    @foreach ($datosEstadoCaso as $estadocaso)
                                        @php
                                            $selected = ($estadocaso->id == $formA->estadocaso_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                                    @endforeach
                                    </select>
                                    {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN QUINTA PREGUNTA --}}

                            {{-- INICIO SEXTA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_ente_judicial') ? 'has-error' : ''}}>
                                    <label for="datos_ente_judicial">A 6. Fiscalía/Juzgado Interviniente:</label>
                                    <input disabled type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{ $formA->datos_ente_judicial }}">
                                    {!! $errors->first('datos_ente_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN SEXTA PREGUNTA --}}

                            {{-- INICIO SEPTIMA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                                    <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                                    <select disabled class="form-control caratulacionjudicial" name="caratulacionjudicial_id" onChange="selectOnChange(this)">
                                        <option value="">Caratulación</option>
                                        @foreach ($datosCaratulacion as $caratulacion)
                                            @php
                                                $selected = ($caratulacion->id == $formA->caratulacionjudicial_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                    <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                                        <br><label for="">Cuál?</label>
                                        <input disabled class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $formA->caratulacionjudicial_otro }}" id="caratulacionjudicial_otro" type="text" onclick="cual()">
                                    </div>
                                    {!! $errors->first('caratulacionjudicial_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                 <script>
                                     function selectOnChange(sel) {
                                       if (sel.value=="25"){
                                            divC = document.getElementById("cual");
                                            divC.style.display = "";
                                       }else{

                                            divC = document.getElementById("cual");
                                            $('#caratulacionjudicial_otro').val('');
                                            divC.style.display="none";
                                       }
                                     }
                                </script>
                            {{-- FIN SEPTIMA PREGUNTA --}}

                            {{-- INICIO OCTAVA PREGUNTA --}}
                                <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                                    <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                                    <input disabled type="text" class="form-control" name="datos_nro_causa" value="{{ $formA->datos_nro_causa }}">
                                    {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>
                            {{-- FIN OCTAVA PREGUNTA --}}

                            {{-- INICIO PROFESIONALES CARGADOS --}}
                                {{-- @dd($formA->profesionalintervinientes()) --}}
                                @foreach ($formA->profesionalintervinientes as $profesionales)
                                    <h3>Profesionales cargados anteriormente:</h3>
                                        <div class="form-group">
                                            <label for="profesional_id">Profesional que interviene</label>
                                            <select disabled class="form-control">
                                                @foreach ($datosProfesional as $datos)
                                                    <option value="{{ $profesionales->profesional_id }}" {{ $profesionales->profesional_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre_apellido_equipo }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                                            <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_desde)->format('Y-m-d')}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="profesionalactualmente_id">A 9.5 Actualmente Interviene:</label>
                                            <select disabled class="form-control">
                                                    <option value="{{ $profesionales->profesionalactualmente_id }}">{{ $profesionales->nombre }}</option>
                                                    @foreach ($datosIntervieneActualmente as $datos)
                                                        <option value="{{ $profesionales->profesionalactualmente_id }}" {{ $profesionales->profesionalactualmente_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        @if (!($profesionales->datos_profesional_interviene_hasta === null))
                                            <div class="form-group">
                                                <label for="datos_profesional_interviene_hasta">A 9.4 Intervino hasta:</label>
                                                <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_hasta)->format('Y-m-d') }}">
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
                        <textarea readonly class="form-control" name="introduccion">{{ $formularioG->introduccion }}</textarea>
                    </div>
                {{-- Fin introduccion --}}

                {{-- Articulación con organismos --}}
                    @foreach ($formulariosF as $formF)
                        @if ($formF->numeroCarpeta === $formularioG->numeroCarpeta)
                            <h2 class="text-center m-5">Articulación con organismos</h2>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">E 3 Organismos con los que se articula actualmente:</label>
                                </div>

                                <div class="form-group">
                                    <label for="">E 3 I. Organismos Judiciales:
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
                                    <label for="">E 3 II. Organismos/Programas Nacionales:
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
                                    </div>
                                </div>

                                <div class="form-group orgProgProvincialesActualmente">
                                    @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                                        @if ($provActualmente->fformulario_id === $formularioF->id)
                                            <label for="">E 3 III. Organismos/Programas Provinciales Cargados Anteriormente:</label>
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $provActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-group orgProgMunicipalesActualmente">
                                    @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                                        @if ($muniActualmente->fformulario_id === $formularioF->id)
                                            <label for="">E 3 IV. Organismos/Programas Municipales Cargados Anteriormente:</label>
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $muniActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="">E 3 V. Policía:
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
                                            <label for="">E 3 VI. Organizaciones de la Sociedad Civil Cargadas Anteriormente:</label>
                                            <input type="text" class="form-control ml-3 mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}" readonly="readonly">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                {{-- Fin Articulación con organismos --}}

                {{-- AGREGAR INTERVENCIÓN --}}
                    {{-- <input type="button" class="btn btn-outline-success agregarIntervencion col-xl" value="Agregar Intervención" name=""><br><br> --}}
                    {{-- <input type="button" class=" btn btn-outline-danger borrarIntervencion" value="Borrar Intervención" name=""><br><br> --}}

                    <div class="intervenciones-anteriores form-group">
                        @php $i = 1; @endphp
                        @foreach ($intervenciones as $intervencion)
                            <h3><?=$i?>° Intervención</h3></h3>
                            <div class="form-group">
                                <label for="" class="">Fecha</label>
                                <input readonly type="date" class="form-control fechaInput" name="fechaIntervencion[]" value="{{ $intervencion->fechaIntervencion }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="">Tema</label>
                                <select disabled class="form-control temaSelect" name="temaIntervencion_id[]">
                                    {{-- <option value="">Seleccioná un tema</option> --}}
                                    @foreach ($temaIntervencion as $tema)
                                        <option value="{{ $tema->id }}" {{ $tema->id == $intervencion->temaIntervencion_id ? 'selected' : '' }}>{{ $tema->nombre }}</option>
                                    @endforeach
                                </select><br>
                                @if ($intervencion->temaOtro)
                                    <div class="temaCual">
                                        <label for="">Cual?</label>
                                        <input readonly type="text" class="form-control  temaCualInput" name="temaOtro[]" value="{{ $intervencion->temaOtro }}">
                                        <br></div>
                                    </div>
                                @endif
                                
                            <div class="form-group datosIntervencion">
                                <div class="form-group">
                                    <label for="">Nombre de contacto:</label>
                                    <input readonly type="text" class="form-control" name="nombreContacto[]" value="{{ $intervencion->nombreContacto }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono de contacto:</label>
                                    <input readonly type="text" class="form-control" name="telefonoContacto[]" value="{{ $intervencion->telefonoContacto }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descripción de la intervención:</label>
                                    <input readonly type="text" class="form-control" name="descripcionIntervencion[]" value="{{ $intervencion->descripcionIntervencion }}">
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>

                    {{-- <div id="intervenciones" class="form-group">
                    </div> --}}
                {{-- Fin AGREGAR INTERVENCIÓN --}}
        


                {{-- <div class="text-center">
                    <button type="submit" class="btn btn-primary col-5 mr-4 btnEnviarForm">Actualizar</button>
                    <a href="/formularios" class="btn btn-primary col-5" title="">Volver</a>
                </div> --}}
            </form>
        @endif
    </section>

    <div id="imprimible" style="display: none;">
        <h1 class="text-center" style="padding: 15px;">
            Eje G: Detalle de intervención
            <h5 class=" mb-5" style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $formularioG->numeroCarpeta }}</h5>
        </h1>
        <form action="" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
            {{ csrf_field() }}
            @method('PUT')
            <input type="text" name="numeroCarpeta" value="{{ $formularioG->numeroCarpeta }}" style="display: none;">

            <label for="" class="">Documentación interna guardada anteriormente</label>
                <ul class="container mt-0 mb-3">
                    @if ($docInterna->count() !== 0)
                         @foreach($docInterna as $doc)
                            <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                            </li>
                        @endforeach
                    @else
                        No se cargó ningun archivo anteriormente
                    @endif
                </ul>

            <label for="" class="">Documentación externa guardada anteriormente</label>
                <ul class="container mt-0 mb-3"> 
                    @if ($docExterna->count() !== 0)
                        @foreach($docExterna as $doc)
                            <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                            </li>
                        @endforeach
                    @else
                        No se cargó ningun archivo anteriormente
                    @endif
                </ul>

            <label for="" class="">Noticias realacionadas guardadas anteriormente</label>
                <ul class="container mt-0 mb-3">
                    @if ($infoSocioambiental->count() !== 0)
                        @foreach($infoSocioambiental as $doc)
                            <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                            </li>
                        @endforeach
                    @else
                        No se cargó ningun archivo anteriormente
                    @endif
                </ul>

            <label for="" class="">Plan de Intervención/Estrategias de abordaje  guardada anteriormente</label>
                <ul class="container mt-0 mb-3">
                    @if ($intervencionEstrategias->count() !== 0)
                        @foreach($intervencionEstrategias as $doc)
                            <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                            </li>
                        @endforeach
                    @else
                        No se cargó ningun archivo anteriormente
                    @endif
                </ul>

            <label for="" class="">Informe Socioambiental  guardado anteriormente</label>
                <ul class="container mt-0 mb-3">
                    @if ($infoSocioambiental->count() !== 0)
                        @foreach($infoSocioambiental as $doc)
                            <li class="list-group-item text-center"><label for="">{{$doc->nombreArchivo}}</label>
                                <a href="{{ asset($doc->path) }}" download="{{$doc->nombreArchivo}}" class="btn btn-success ml-5"><i class="far fa-arrow-alt-circle-down"></i> Descargar</a>
                            </li>
                        @endforeach
                    @else
                        No se cargó ningun archivo anteriormente
                    @endif
                </ul>

            {{-- Datos del formulario A --}}
                @foreach ($aFormularios as $formA)
                    @if ($formA->datos_numero_carpeta === $formularioG->numeroCarpeta)
                    <section class="">
                        <h2 class="text-center m-5">Encabezado</h2>
                        {{-- INICIO PRIMERA PREGUNTA --}}
                            <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}" >
                                <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                                <input disabled type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $formA->datos_nombre_referencia }}">
                                {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN PRIMERA PREGUNTA --}}

                        {{-- INICIO SEGUNDA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                                <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                                <input disabled type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $formA->datos_numero_carpeta }}">
                                {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN SEGUNDA PREGUNTA --}}

                        {{-- INICIO TERCERA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                                <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                                <input disabled type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $formA->datos_fecha_ingreso->format('Y-m-d')}}">
                                {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN TERCERA PREGUNTA --}}

                        {{-- INICIO CUARTA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                                <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                                <select disabled class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                                    <option value="">Modalidad</option>
                                    @foreach ($datosModalidad as $modalidad)
                                        @php
                                            $selected = ($modalidad->id == $formA->modalidad_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                                <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                                    <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                        <option value="">De que tipo?</option>
                                        @foreach ($datosPresentacion as $presentacion)
                                            @php
                                                $selected = ($presentacion->id == $formA->presentacion_espontanea_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                                    <select disabled class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                        <option value="">Que Organismo?</option>
                                        @foreach ($datosOrganismo as $organismo)
                                            @php
                                                $selected = ($organismo->id == $formA->derivacion_otro_organismo_id) ? 'selected' : '';
                                            @endphp
                                            <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                        @endforeach
                                    </select>
                                {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                </div>

                                <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                                    <br><label for="">Cuál?</label>
                                    <input disabled class="form-control derivacion_otro_organismo_cual_input" value="{{ $formA->derivacion_otro_organismo_cual }}" name="derivacion_otro_organismo_cual" type="text">
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

                                    if (sel.value=="4") {
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
                                <label for="estadocaso_id">A 5. Estado Actual del Caso:</label>
                                <select disabled class="form-control" name="estadocaso_id">
                                <option value="">Estado Actual</option>
                                @foreach ($datosEstadoCaso as $estadocaso)
                                    @php
                                        $selected = ($estadocaso->id == $formA->estadocaso_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN QUINTA PREGUNTA --}}

                        {{-- INICIO SEXTA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_ente_judicial') ? 'has-error' : ''}}>
                                <label for="datos_ente_judicial">A 6. Fiscalía/Juzgado Interviniente:</label>
                                <input disabled type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{ $formA->datos_ente_judicial }}">
                                {!! $errors->first('datos_ente_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN SEXTA PREGUNTA --}}

                        {{-- INICIO SEPTIMA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                                <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                                <select disabled class="form-control caratulacionjudicial" name="caratulacionjudicial_id" onChange="selectOnChange(this)">
                                    <option value="">Caratulación</option>
                                    @foreach ($datosCaratulacion as $caratulacion)
                                        @php
                                            $selected = ($caratulacion->id == $formA->caratulacionjudicial_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                                <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                                    <br><label for="">Cuál?</label>
                                    <input disabled class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $formA->caratulacionjudicial_otro }}" id="caratulacionjudicial_otro" type="text" onclick="cual()">
                                </div>
                                {!! $errors->first('caratulacionjudicial_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>

                             <script>
                                 function selectOnChange(sel) {
                                   if (sel.value=="25"){
                                        divC = document.getElementById("cual");
                                        divC.style.display = "";
                                   }else{

                                        divC = document.getElementById("cual");
                                        $('#caratulacionjudicial_otro').val('');
                                        divC.style.display="none";
                                   }
                                 }
                            </script>
                        {{-- FIN SEPTIMA PREGUNTA --}}

                        {{-- INICIO OCTAVA PREGUNTA --}}
                            <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                                <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                                <input disabled type="text" class="form-control" name="datos_nro_causa" value="{{ $formA->datos_nro_causa }}">
                                {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                            </div>
                        {{-- FIN OCTAVA PREGUNTA --}}

                        {{-- INICIO PROFESIONALES CARGADOS --}}
                            {{-- @dd($formA->profesionalintervinientes()) --}}
                            @foreach ($formA->profesionalintervinientes as $profesionales)
                                <h3>Profesionales cargados anteriormente:</h3>
                                    <div class="form-group">
                                        <label for="profesional_id">Profesional que interviene</label>
                                        <select disabled class="form-control">
                                            @foreach ($datosProfesional as $datos)
                                                <option value="{{ $profesionales->profesional_id }}" {{ $profesionales->profesional_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre_apellido_equipo }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                                        <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_desde)->format('Y-m-d')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="profesionalactualmente_id">A 9.5 Actualmente Interviene:</label>
                                        <select disabled class="form-control">
                                                <option value="{{ $profesionales->profesionalactualmente_id }}">{{ $profesionales->nombre }}</option>
                                                @foreach ($datosIntervieneActualmente as $datos)
                                                    <option value="{{ $profesionales->profesionalactualmente_id }}" {{ $profesionales->profesionalactualmente_id == $datos->id ? 'selected' : '' }}>{{ $datos->nombre }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    @if (!($profesionales->datos_profesional_interviene_hasta === null))
                                        <div class="form-group">
                                            <label for="datos_profesional_interviene_hasta">A 9.4 Intervino hasta:</label>
                                            <input disabled type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesionales->datos_profesional_interviene_hasta)->format('Y-m-d') }}">
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
                    <textarea readonly class="form-control" name="introduccion">{{ $formularioG->introduccion }}</textarea>
                </div>
            {{-- Fin introduccion --}}

            {{-- Articulación con organismos --}}
                @foreach ($formulariosF as $formF)
                    @if ($formF->numeroCarpeta === $formularioG->numeroCarpeta)
                        <h2 class="text-center m-5">Articulación con organismos</h2>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">F 3 Organismos con los que se articula actualmente:</label>
                            </div>

                            <div class="form-group">
                                <label for="">F 3 I. Organismos Judiciales:
                                    <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                </label><br>
                                @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                                    @php
                                        $orgJudicialesActualmenteIds = $formF->orgjudicialactualmentes->pluck('id')->toArray();
                                        $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                                    @endphp
                                    <div class="">
                                        <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                                        <input {{ $checked }} disabled type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="">F 3 II. Organismos/Programas Nacionales:
                                    <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                </label><br>
                                    @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                                        @php
                                            $progNacionalesActualmenteIds = $formF->orgprognacionalactualmentes->pluck('id')->toArray();
                                            $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                                        @endphp
                                        <div class="">
                                            @if ($progNacionalesActualmente->nombre == 'Otro')
                                                <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                <input {{ $checked }} disabled type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                            @else
                                                <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                                <input {{ $checked }} disabled type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                            @endif  
                                        </div>
                                    @endforeach     

                                <div class="form-group orgprognacionalActualmenteCual" style="display: none;">
                                    @foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                                        @if ($progNacionalOtro->fformulario_id === $formF->id)
                                            <label for="">Cual?(Cargado Anteriormente)</label>
                                            <input type="text" class="form-control " value="{{ $progNacionalOtro->nombreOrganismo }}" readonly="readonly"><br>
                                        @endif
                                    @endforeach
                                </div>

                                <script>
                                    var orgProgNacionalActualmenteOtro = document.querySelector('.orgProgNacionalActualmenteOtro');
                                    var orgprognacionalActualmenteCual = document.querySelector('.orgprognacionalActualmenteCual');

                                    if (orgProgNacionalActualmenteOtro.checked) {
                                        orgprognacionalActualmenteCual.style.display = '';
                                    }else{
                                        orgprognacionalActualmenteCual.style.display = 'none';
                                    }
                                </script>
                            </div>


                            <div class="form-group orgProgProvincialesActualmente">
                                @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                                    @if ($provActualmente->fformulario_id === $formF->id)
                                        <label for="">F 3 III. Organismos/Programas Provinciales:</label>
                                        <input type="text" class="form-control  mb-3" value="{{ $provActualmente->nombreOrganismo }}" readonly="readonly">
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-group orgProgMunicipalesActualmente">
                                @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                                    @if ($muniActualmente->fformulario_id === $formF->id)
                                        <label for="">F 3 IV. Organismos/Programas Municipales:</label>
                                        <input type="text" class="form-control  mb-3" value="{{ $muniActualmente->nombreOrganismo }}" readonly="readonly">
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="">F 3 V. Policía:
                                    <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                                </label>
                                @foreach ($datosPoliciaActualmente as $policiaActualmente)
                                    @php
                                        $policiaActualmenteIds = $formF->policiaactualmentes->pluck('id')->toArray();
                                        $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                                    @endphp
                                    <div class="">
                                        <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                                        <input {{ $checked }} disabled type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]" >
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group orgSocCivilActualmente">
                                @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                                    @if ($socCivilActualmente->fformulario_id === $formF->id)
                                        <label for="">F 3 VI. Organizaciones de la Sociedad Civil:</label>
                                        <input type="text" class="form-control  mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}" readonly="readonly">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            {{-- Fin Articulación con organismos --}}

                <div class="intervenciones-anteriores form-group">
                    @php $i = 1; @endphp
                    @foreach ($intervenciones as $intervencion)
                        <h3><?=$i?>° Intervención</h3></h3>
                        <div class="form-group">
                            <label for="" class="">Fecha</label>
                            <input readonly type="date" class="form-control fechaInput" name="fechaIntervencion[]" value="{{ $intervencion->fechaIntervencion }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="">Tema</label>
                            <select disabled class="form-control temaSelect" name="temaIntervencion_id[]">
                                {{-- <option value="">Seleccioná un tema</option> --}}
                                @foreach ($temaIntervencion as $tema)
                                    <option value="{{ $tema->id }}" {{ $tema->id == $intervencion->temaIntervencion_id ? 'selected' : '' }}>{{ $tema->nombre }}</option>
                                @endforeach
                            </select><br>
                            @if ($intervencion->temaOtro)
                                <div class="temaCual">
                                    <label for="">Cual?</label>
                                    <input readonly type="text" class="form-control  temaCualInput" name="temaOtro[]" value="{{ $intervencion->temaOtro }}">
                                    <br>
                                </div>
                            @endif
                        </div>
                            
                        <div class="form-group datosIntervencion">
                            <div class="form-group">
                                <label for="">Nombre de contacto:</label>
                                <input readonly type="text" class="form-control" name="nombreContacto[]" value="{{ $intervencion->nombreContacto }}">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono de contacto:</label>
                                <input readonly type="text" class="form-control" name="telefonoContacto[]" value="{{ $intervencion->telefonoContacto }}">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción de la intervención:</label>
                                <input readonly type="text" class="form-control" name="descripcionIntervencion[]" value="{{ $intervencion->descripcionIntervencion }}">
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
        </form>
    </div>

    <div class="botones">
        {{-- <a href="/pdf/{{ $formularioG->id }}" title=""><input type="button" name="descargar" id="descargar" class="btn btn-dark descargar ml-4 mb-2" value="Descargar"></a> --}}
        <input type="button" name="imprimir" class="btn btn-dark imprimir ml-4" value="Imprimir">
    </div>

    <script>
        //para poder usar blade lo tuve que agregar en esta pagina
        //agregar intervencion
            var btnAgregarIntervencion = document.querySelector('.agregarIntervencion');
            var divIntervencion = document.querySelector('.intervencion');

            var click = 0;

            btnAgregarIntervencion.addEventListener('click', function(){
                click++
                // divIntervencion.style.display = ''
                console.log(click);
                // var divClick = '<div id="orgProgNacionalCual'+click+'" class="form-group orgProgNacionalCual'+click+'">';

                var divClickIntervencion = '<h3>Nueva intervención</h3></h3><div id="intervencion'+click+'" class="form-group intervencion'+click+'""><div class="form-group"><label for="" class="">Fecha</label><input type="date" class="form-control fechaInput'+click+'" name="fechaIntervencion[]"></div><div class="form-group"><label for="" class="">Tema</label><select class="form-control temaSelect'+click+'" name="temaIntervencion_id[]"><option value="">Seleccioná un tema</option>@foreach ($temaIntervencion as $tema)<option value="{{ $tema->id }}">{{ $tema->nombre }}</option>@endforeach</select><div class="temaCual'+click+'" style="display: none;"><label for="">Cual?</label><input type="text" class="form-control  temaCualInput'+click+'" name="temaOtro[]"><br></div></div><div class="form-group datosIntervencion'+click+'" style="display: none;"><div class="form-group"><label for="">Nombre de contacto:</label><input type="text" class="form-control" name="nombreContacto[]"></div><div class="form-group"><label for="">Teléfono de contacto:</label><input type="text" class="form-control" name="telefonoContacto[]"></div><div class="form-group"><label for="">Descripción de la intervención:</label><textarea class="form-control" name="descripcionIntervencion[]"></textarea></div></div></div>';

                var divIntervenciones = document.getElementById('intervenciones');
                divIntervenciones.insertAdjacentHTML('beforeend', divClickIntervencion);

                //le agrego las funcionalidades para cada caso
                    var fechaInput = document.querySelector('.fechaInput'+click);
                    var temaSelect = document.querySelector('.temaSelect'+click);
                    var temaCual = document.querySelector('.temaCual'+click);
                    var temaCualInput = document.querySelector('.temaCualInput'+click);
                    var datosIntervencion = document.querySelector('.datosIntervencion'+click);
                    // console.log(fechaInput, temaSelect, datosIntervencion);

                    fechaInput.addEventListener('change', function(){
                        if (temaSelect.value !== '') {
                            datosIntervencion.style.display = '';
                        }else{
                            datosIntervencion.style.display = 'none';
                        }
                        temaSelect.addEventListener('change', function(){
                            if (temaSelect.value !== '') {
                                datosIntervencion.style.display = '';
                            }else{
                                datosIntervencion.style.display = 'none';
                            }
                        });
                    });

                    temaSelect.addEventListener('change', function(){
                        if (fechaInput.value !== '') {
                            datosIntervencion.style.display = '';
                        }else{
                            datosIntervencion.style.display = 'none';
                        }
                        fechaInput.addEventListener('change', function(){
                            if (fechaInput.value !== '') {
                                datosIntervencion.style.display = '';
                            }else{
                                datosIntervencion.style.display = 'none';
                            }
                        });
                        if (temaSelect.value === '9') {
                            temaCual.style.display = '';
                        }else{
                            temaCual.style.display = 'none';
                            temaCualInput.value = '';
                        }
                    });
                //fin funcionalidades
            });
        //fin agregar intervencion
    </script>
			
    <script src="/js/formularioG.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>