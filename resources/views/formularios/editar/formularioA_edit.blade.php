<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Eje A: Datos institucionales</title>
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
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/A/{{ $idCarpeta }}/{{ $idFormA }}">Eje A: Datos institucionales</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif
        @if ($idFormB)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/B/{{ $idCarpeta }}/{{ $idFormB }}">Eje B: Caracterización de la víctima</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/B/{{ $idCarpeta }}">Eje B: Caracterización de la víctima</a> </li>
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
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idFormG }}">Eje F: Documentación</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/G">Eje F: Detalle de intervención</a> </li>
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
            <form class="" action="{{$aFormulario->id}}" method="post">
            {{ csrf_field() }}
            @method('PUT')

            <h1 class="text-center" style="padding: 15px;">
                Eje A: Datos institucionales
                <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $aFormulario->datos_numero_carpeta }}</h5>
            </h1>
            {{-- <input type="text" name="numeroCarpeta" value="{{ $aFormulario->numeroCarpeta }}" style="display: none;"> --}}

            {{-- INICIO PRIMERA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}" >
                    <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <input type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $aFormulario->datos_nombre_referencia }}">
                    @else
                        <input type="text" class="form-control" readonly name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $aFormulario->datos_nombre_referencia }}">
                    @endif
                    {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}

                </div>
            {{-- FIN PRIMERA PREGUNTA --}}

            {{-- INICIO SEGUNDA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                    <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <input type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $aFormulario->datos_numero_carpeta }}">
                    @else
                        <input readonly type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $aFormulario->datos_numero_carpeta }}">
                    @endif
                    {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN SEGUNDA PREGUNTA --}}

            {{-- INICIO TERCERA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                    <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <input type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $aFormulario->datos_fecha_ingreso->format('Y-m-d')}}">
                    @else
                        <input readonly type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $aFormulario->datos_fecha_ingreso->format('Y-m-d')}}">
                    @endif
                    {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN TERCERA PREGUNTA --}}

            {{-- INICIO CUARTA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                    <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <select class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                            <option value="">Modalidad</option>
                            @foreach ($datosModalidad as $modalidad)
                                @php
                                    $selected = ($modalidad->id == $aFormulario->modalidad_id) ? 'selected' : '';
                                @endphp
                                <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                            @endforeach
                        </select>
                    @else
                        <select disabled class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                            <option value="">Modalidad</option>
                            @foreach ($datosModalidad as $modalidad)
                                @php
                                    $selected = ($modalidad->id == $aFormulario->modalidad_id) ? 'selected' : '';
                                @endphp
                                <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                            @endforeach
                        </select>
                    @endif
                    
                    {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                            <select class="form-control presentacion" name="presentacion_espontanea_id">
                                <option value="">De que tipo?</option>
                                @foreach ($datosPresentacion as $presentacion)
                                    @php
                                        $selected = ($presentacion->id == $aFormulario->presentacion_espontanea_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                @endforeach
                            </select>
                        @else
                            <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                <option value="">De que tipo?</option>
                                @foreach ($datosPresentacion as $presentacion)
                                    @php
                                        $selected = ($presentacion->id == $aFormulario->presentacion_espontanea_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                @endforeach
                            </select>
                        @endif
                        
                    {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                            <select class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                <option value="">Que Organismo?</option>
                                @foreach ($datosOrganismo as $organismo)
                                    @php
                                        $selected = ($organismo->id == $aFormulario->derivacion_otro_organismo_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                @endforeach
                            </select>
                        @else
                            <select disabled class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                <option value="">Que Organismo?</option>
                                @foreach ($datosOrganismo as $organismo)
                                    @php
                                        $selected = ($organismo->id == $aFormulario->derivacion_otro_organismo_id) ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                @endforeach
                            </select>
                        @endif
                    {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                        <br><label for="">Cuál?</label>
                        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                            <input class="form-control derivacion_otro_organismo_cual_input" value="{{ $aFormulario->derivacion_otro_organismo_cual }}" name="derivacion_otro_organismo_cual" type="text">
                        @else
                            <input readonly class="form-control derivacion_otro_organismo_cual_input" value="{{ $aFormulario->derivacion_otro_organismo_cual }}" name="derivacion_otro_organismo_cual" type="text">
                        @endif
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
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <select class="form-control selectEstadoCaso" name="estadocaso_id">
                            <option value="">Estado Actual</option>
                            @foreach ($datosEstadoCaso as $estadocaso)
                                @php
                                    $selected = ($estadocaso->id == $aFormulario->estadocaso_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                            @endforeach
                        </select>
                    @else
                        <select disabled class="form-control selectEstadoCaso" name="estadocaso_id">
                            <option value="">Estado Actual</option>
                            @foreach ($datosEstadoCaso as $estadocaso)
                                @php
                                    $selected = ($estadocaso->id == $aFormulario->estadocaso_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                            @endforeach
                        </select>
                    @endif
                    {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                    <div class="form-group divMotivoCierre" style="display: none;">
                        <label for="">A 5 I. Motivo de cierre</label>
                        <select class="form-control selectMotivoCierre" name="motivocierre_id">
                            @foreach ($datosMotivoCierre as $motivoCierre)
                                @php
                                    $selected = ($motivoCierre->id == $aFormulario->motivocierre_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $motivoCierre->id }}" {{ $selected }}>{{$motivoCierre->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group divMotivoCierre" style="display: none;">
                        <label for="">A 5 I. Motivo de cierre</label>
                        <select disabled class="form-control selectMotivoCierre" name="motivocierre_id">
                            @foreach ($datosMotivoCierre as $motivoCierre)
                                @php
                                    $selected = ($motivoCierre->id == $aFormulario->motivocierre_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $motivoCierre->id }}" {{ $selected }}>{{$motivoCierre->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            {{-- FIN QUINTA PREGUNTA --}}

            {{-- INICIO SEXTA PREGUNTA --}}
                @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                    <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                        <label for="">A 6. Ámbito de competencia</label>
                        <select name="ambito_id" class="form-control selectAmbito">
                            <option value="">Seleccioná el ámbito de competencia</option>
                            @foreach ($datosAmbito as $ambito)
                                @php
                                    $selected = ($ambito->id == $aFormulario->ambito_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $ambito->id }}" {{ $selected }}>{{$ambito->nombre}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('ambito_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                        <select name="departamento_id" class="form-control selectDepartamento">
                            <option value="">Seleccioná el departamento</option>
                            @foreach ($datosDepartamento as $departamento)
                                @php
                                    $selected = ($departamento->id == $aFormulario->departamento_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $departamento->id }}" {{ $selected }}>{{$departamento->nombre}}</option>
                            @endforeach
                        </select>                    
                        {!! $errors->first('departamento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                     <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                        <select name="otrasprov_id" class="form-control selectOtrasProv">
                            <option value="">Seleccioná la provincia</option>
                            @foreach ($datosOtrasProv as $otrasProv)
                                @php
                                    $selected = ($otrasProv->id == $aFormulario->otrasprov_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $otrasProv->id }}" {{ $selected }}>{{$otrasProv->nombre}}</option>
                            @endforeach
                        </select>                    
                        {!! $errors->first('otrasprov_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>
                @else
                    <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                        <label for="">A 6. Ámbito de competencia</label>
                        <select disabled name="ambito_id" class="form-control selectAmbito">
                            <option value="">Seleccioná el ámbito de competencia</option>
                            @foreach ($datosAmbito as $ambito)
                                @php
                                    $selected = ($ambito->id == $aFormulario->ambito_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $ambito->id }}" {{ $selected }}>{{$ambito->nombre}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('ambito_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                        <select disabled name="departamento_id" class="form-control selectDepartamento">
                            <option value="">Seleccioná el departamento</option>
                            @foreach ($datosDepartamento as $departamento)
                                @php
                                    $selected = ($departamento->id == $aFormulario->departamento_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $departamento->id }}" {{ $selected }}>{{$departamento->nombre}}</option>
                            @endforeach
                        </select>                    
                        {!! $errors->first('departamento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                     <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                        <select disabled name="otrasprov_id" class="form-control selectOtrasProv">
                            <option value="">Seleccioná la provincia</option>
                            @foreach ($datosOtrasProv as $otrasProv)
                                @php
                                    $selected = ($otrasProv->id == $aFormulario->otrasprov_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $otrasProv->id }}" {{ $selected }}>{{$otrasProv->nombre}}</option>
                            @endforeach
                        </select>                    
                        {!! $errors->first('otrasprov_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>
                @endif
            {{-- FIN SEXTA PREGUNTA --}}

            {{-- INICIO SEPTIMA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                    <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <select class="form-control caratulacionjudicial" name="caratulacionjudicial_id">
                            <option value="">Caratulación</option>
                            @foreach ($datosCaratulacion as $caratulacion)
                                @php
                                    $selected = ($caratulacion->id == $aFormulario->caratulacionjudicial_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <select disabled class="form-control caratulacionjudicial" name="caratulacionjudicial_id">
                            <option value="">Caratulación</option>
                            @foreach ($datosCaratulacion as $caratulacion)
                                @php
                                    $selected = ($caratulacion->id == $aFormulario->caratulacionjudicial_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                            @endforeach
                        </select>
                    @endif
                    {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                        <br><label for="">Cuál?</label>
                        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                            <input class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $aFormulario->caratulacionjudicial_otro }}" id="caratulacionjudicial_otro" type="text">
                        @else
                            <input readonly class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $aFormulario->caratulacionjudicial_otro }}" id="caratulacionjudicial_otro" type="text">
                        @endif
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
                    @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <input type="text" class="form-control" name="datos_nro_causa" value="{{ $aFormulario->datos_nro_causa }}">
                    @else
                        <input readonly type="text" class="form-control" name="datos_nro_causa" value="{{ $aFormulario->datos_nro_causa }}">
                    @endif
                    {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN OCTAVA PREGUNTA --}}

            {{-- INICIO PROFESIONALES CARGADOS --}}
                <h3>Profesionales cargados anteriormente:</h3>
                @foreach ($todo as $todosLosDatos)
                    {{-- @dd($todo) --}}
                    <div class="form-group">
                        <label for="profesional_id">A 9.1 Nombre/Equipo/Profesión:</label>
                        <select disabled class="form-control">
                            <option value="{{ $todosLosDatos->profesional_id }}">{{ $todosLosDatos->nombre_apellido_equipo }} - {{ $todosLosDatos->profesion }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="datos_profesional_interviene_desde">A 9.2 Interviene desde:</label>
                        <input type="date" class="form-control" value="{{ Carbon\Carbon::parse($todosLosDatos->datos_profesional_interviene_desde)->format('Y-m-d')}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="profesionalactualmente_id">A 9.3 Actualmente Interviene:</label>
                        <select disabled class="form-control">
                                <option value="{{ $todosLosDatos->profesionalactualmente_id }}">{{ $todosLosDatos->nombre }}</option>
                        </select>
                    </div>

                    @if ($todosLosDatos->datos_profesional_interviene_hasta)
                        <div class="form-group">
                            <label for="datos_profesional_interviene_hasta">A 9.4 Interviene hasta:</label>
                            <input type="date" class="form-control" value="{{ Carbon\Carbon::parse($todosLosDatos->datos_profesional_interviene_hasta)->format('Y-m-d') }}" readonly>
                        </div>
                    @endif
                @endforeach
            {{-- FIN PROFESIONALES CARGADOS --}}

            {{-- INICIO AGREGAR PROFESIONAL PREGUNTA --}}
                <div class="padre"></div>

                @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
                        <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
                        <button id="borra" class="btn btn-outline-danger col-xl borrarProfesional" type="button">Borrar profesional</button><br><br>
                    {{-- FIN AGREGAR PROFESIONAL PREGUNTA --}}

                    <button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br>
                @endif
        </form>

        {{-- <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
        <button id="borra" class="btn btn-outline-danger col-xl" type="button" onclick="borra()">Borrar profesional</button><br><br> --}}
    </section>
        
        {{-- SCRIPT PARA AGREGAR OTRO PROFESIONAL --}}
        <script src="/js/formularioA.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script>
                var btnAgregarProfesional = document.querySelector('.anadirProfesional');

                var clicks = 0;

                btnAgregarProfesional.addEventListener('click', function(){
                    clicks++

                    var divClickProfesional = '<div class="hijo"><h3>A 9. Profesional Interviniente:</h3><div class="form-group" {{ $errors->has("profesional_id[]") ? "has-error" : ""}}><label for="profesional_id">A 9.1 Nombre/Equipo/Profesión: </label><select class="form-control profesional_id'+clicks+'" name="profesional_id[]"><option value="">Seleccioná profesional</option>@foreach ($datosProfesional as $profesional)<option value="{{ $profesional->getId() }}">{{ $profesional->getNombreCompletoyProfesion() }} - {{ $profesional->profesion }}</option>@endforeach</select>{!! $errors->first("profesional_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="mostrarInicio form-group" {{ $errors->has("datos_profesional_interviene_desde[]") ? "has-error" : ""}}><label for="datos_profesional_interviene_desde">A 9.2 Interviene desde:</label><input type="date" class="form-control desde'+clicks+'" name="datos_profesional_interviene_desde[]" id="datos_profesional_interviene_desde" value="">{!! $errors->first("datos_profesional_interviene_desde.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group" {{ $errors->has("profesionalactualmente_id[]") ? "has-error" : ""}}><label for="profesionalactualmente_id">A 9.3 Actualmente Interviene:</label><select class="form-control actualmente'+clicks+'" name="profesionalactualmente_id[]"><option value="">Actualmente interviene?</option>@foreach ($datosIntervieneActualmente as $profesionalInterviene)<option value="{{ $profesionalInterviene->getId() }}">{{ $profesionalInterviene->getNombre() }}</option>@endforeach</select>{!! $errors->first("profesionalactualmente_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div style="display: none;" class="mostrarFinal'+clicks+' form-group" {{ $errors->has("datos_profesional_interviene_hasta[]") ? "has-error" : ""}}><label for="datos_profesional_interviene_hasta">A 9.4 Interviene hasta:</label><input type="date" class="form-control hasta'+clicks+'" name="datos_profesional_interviene_hasta[]" id="datos_profesional_interviene_hasta" value="">{!! $errors->first("datos_profesional_interviene_hasta.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div></div>';

                    var divProfesionales = document.querySelector('.padre');
                    divProfesionales.insertAdjacentHTML('beforeend', divClickProfesional);

                    //le agrego las funcionalidades para cada caso
                        var actualmenteN = document.querySelector('.actualmente'+clicks);
                        var finalN = document.querySelector('.mostrarFinal'+clicks);

                        actualmenteN.addEventListener('change', function(){
                            if (this.value == "1") {
                                finalN.style.display = 'none';
                            }else if(this.value == "2"){
                                finalN.style.display = '';
                            }else{
                                finalN.style.display = 'none';
                            }
                        })
                    //fin funcionalidades
                });
            </script>

        <script>
                var nueva_entrada = $('.padre').html();

                $("#anadir").click(function(){
                    $(".padre").append(nueva_entrada);
                });

            // function borra() {
            //     $('.hijo').first().remove();
            //     swal('Se borro un profesional');
            // }
        </script>



</body>
</html>