<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    @include('partials.head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Eje A: Datos institucionales</title>
    <style>
        .cerrarSesion {
            position: absolute;
            top: 0;
            right: 0;
        }

        .hr {
            height: 1px;
            border-color: grey;
        }
    </style>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{--
        <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}} {{--
        <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        @if ($idFormA)
        <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/A/{{ $idCarpeta }}/{{ $idFormA }}">Eje A: Datos institucionales</a>            </li>
        @else
        <li class="nav-item"> <a class="nav-link active" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif @if ($idFormB)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/B/{{ $idCarpeta }}/{{ $idFormB }}">Eje B: Caracterización de la víctima</a>            </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/B/{{ $idCarpeta }}">Eje B: Caracterización de la víctima</a> </li>
        @endif @if ($idFormC)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C/{{ $idCarpeta }}/{{ $idFormC }}">Eje C: Referentes afectivos</a>            </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/C/{{ $idCarpeta }}">Eje C: Referentes afectivos</a> </li>
        @endif @if ($idFormD)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D/{{ $idCarpeta }}/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/D/{{ $idCarpeta }}">Eje D: Datos de delito</a> </li>
        @endif {{-- @if ($idFormE)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif --}} {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}} @if ($idFormF)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F/{{ $idCarpeta }}/{{ $idFormF }}">Eje E: Atención del caso</a> </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/F/{{ $idCarpeta }}">Eje E: Atención del caso</a> </li>
        @endif @if ($idFormG)
        <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idCarpeta }}/{{ $idFormG }}">Eje F: Documentación</a> </li>
        @else
        <li class="nav-item"> <a class="nav-link " href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
        @endif
    </ul>
</header>

<body>
    <section class="container">
        <form class="" id="formularioA" action="{{$aFormulario->id}}" method="post">
            {{ csrf_field() }} @method('PUT')

            <h1 class="text-center" style="padding: 15px;">
                Eje A: Datos institucionales
                <h5 style="text-align: center;">Estás trabajando sobre la carpeta n° {{ $aFormulario->datos_numero_carpeta }}</h5>
            </h1>
            {{-- <input type="text" name="numeroCarpeta" value="{{ $aFormulario->numeroCarpeta }}" style="display: none;">            --}} {{-- INICIO PRIMERA PREGUNTA --}}
            <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}">
                <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label> @if (auth()->user()->isAdmin !==
                2)
                <input type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $aFormulario->datos_nombre_referencia }}">                @else
                <input type="text" class="form-control" readonly name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{ $aFormulario->datos_nombre_referencia }}">                @endif {!! $errors->first('datos_nombre_referencia', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}

            </div>
            {{-- FIN PRIMERA PREGUNTA --}} {{-- INICIO SEGUNDA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                <label for="datos_numero_carpeta">A 2. Número de carpeta:</label> @if (auth()->user()->isAdmin !== 2)
                <input type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $aFormulario->datos_numero_carpeta }}">                @else
                <input readonly type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{ $aFormulario->datos_numero_carpeta }}">                @endif {!! $errors->first('datos_numero_carpeta', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            {{-- FIN SEGUNDA PREGUNTA --}} {{-- INICIO TERCERA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label> @if (auth()->user()->isAdmin !== 2)
                <input type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $aFormulario->datos_fecha_ingreso->format('Y-m-d')}}">                @else
                <input readonly type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{ $aFormulario->datos_fecha_ingreso->format('Y-m-d')}}">                @endif {!! $errors->first('datos_fecha_ingreso', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            {{-- FIN TERCERA PREGUNTA --}} {{-- INICIO CUARTA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                <label for="modalidad_id">A 4. Modalidad de Ingreso</label> @if (auth()->user()->isAdmin !== 2)
                <select class="form-control modalidad" name="modalidad_id" id="modalidad_id" onChange="selectOnChange2(this)">                      
                            @foreach ($datosModalidad as $modalidad)
                                @php
                                    $selected = ($modalidad->id == $aFormulario->modalidad_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                            @endforeach
                        </select> @else
                <select disabled class="form-control modalidad" name="modalidad_id" onChange="selectOnChange2(this)">
                            <option value="">Modalidad</option>
                            @foreach ($datosModalidad as $modalidad)
                                @php
                                    $selected = ($modalidad->id == $aFormulario->modalidad_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{$modalidad->id}}" {{ $selected }}>{{$modalidad->nombre}}</option>
                            @endforeach
                        </select> @endif {!! $errors->first('modalidad_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}

                <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br> @if (auth()->user()->isAdmin !== 2)
                    <select class="form-control presentacion" name="presentacion_espontanea_id" id="presentacion_espontanea_id">
                                <option value="">De que tipo?</option>
                                @foreach ($datosPresentacion as $presentacion)
                                    @php
                                        $selected = ($presentacion->id == $aFormulario->presentacion_espontanea_id) ? 'selected' : '';
                                    


@endphp
                                    <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                @endforeach
                            </select> @else
                    <select disabled class="form-control presentacion" name="presentacion_espontanea_id">
                                <option value="">De que tipo?</option>
                                @foreach ($datosPresentacion as $presentacion)
                                    @php
                                        $selected = ($presentacion->id == $aFormulario->presentacion_espontanea_id) ? 'selected' : '';
                                    


@endphp
                                    <option value="{{ $presentacion->id }}" {{ $selected }}>{{ $presentacion->nombre }}</option>
                                @endforeach
                            </select> @endif {!! $errors->first('presentacion_espontanea_id', '
                    <p class="help-block" style="color:red" ;>:message</p>') !!}
                </div>

                <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br> @if (auth()->user()->isAdmin !== 2)
                    <select class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id"
                        id="derivacion_otro_organismo_id">
                                @foreach ($datosOrganismo as $organismo)
                                    @php
                                        $selected = ($organismo->id == $aFormulario->derivacion_otro_organismo_id) ? 'selected' : '';
                                    


@endphp
                                    <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                @endforeach
                            </select> @else
                    <select disabled class="form-control derivacion_otro_organismo_select" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                                <option value="">Que Organismo?</option>
                                @foreach ($datosOrganismo as $organismo)
                                    @php
                                        $selected = ($organismo->id == $aFormulario->derivacion_otro_organismo_id) ? 'selected' : '';
                                    


@endphp
                                    <option value="{{ $organismo->id }}" {{ $selected }}>{{ $organismo->nombre }}</option>
                                @endforeach
                            </select> @endif {!! $errors->first('derivacion_otro_organismo_id', '
                    <p class="help-block" style="color:red" ;>:message</p>') !!}
                </div>

                <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                    <br><label for="">Cuál?</label> @if (auth()->user()->isAdmin !== 2)
                    <input class="form-control derivacion_otro_organismo_cual_input" value="{{ $aFormulario->derivacion_otro_organismo_cual }}"
                        name="derivacion_otro_organismo_cual" type="text"> @else
                    <input readonly class="form-control derivacion_otro_organismo_cual_input" value="{{ $aFormulario->derivacion_otro_organismo_cual }}"
                        name="derivacion_otro_organismo_cual" type="text"> @endif
                </div>
                {!! $errors->first('derivacion_otro_organismo_cual', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
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
            {{-- FIN CUARTA PREGUNTA --}} {{-- INICIO QUINTA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('estadocaso_id') ? 'has-error' : ''}}>
                <label for="estadocaso_id">A 5. Estado Actual:</label> @if (auth()->user()->isAdmin !== 2)
                <select class="form-control selectEstadoCaso" name="estadocaso_id" id="estadocaso_id">                            
                            @foreach ($datosEstadoCaso as $estadocaso)
                                @php
                                    $selected = ($estadocaso->id == $aFormulario->estadocaso_id) ? 'selected' : '';
                                    if ($estadocaso->id == $aFormulario->estadocaso_id) {
                                        $estado_actual_id_original = $estadocaso->id;
                                    }
                                    


@endphp
                                <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                            @endforeach
                        </select> @else
                <select disabled class="form-control selectEstadoCaso" name="estadocaso_id">
                            <option value="">Estado Actual</option>
                            @foreach ($datosEstadoCaso as $estadocaso)
                                @php
                                    $selected = ($estadocaso->id == $aFormulario->estadocaso_id) ? 'selected' : '';
                                    if ($estadocaso->id == $aFormulario->estadocaso_id) {
                                        $estado_actual_id_original = $estadocaso->id;
                                    }


@endphp
                                <option value="{{ $estadocaso->id }}" {{ $selected }}>{{$estadocaso->nombre}}</option>
                            @endforeach
                        </select> @endif {!! $errors->first('estadocaso_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            @if ($estado_actual_id_original == 3) @if (auth()->user()->isAdmin !== 2)
            <div class="form-group divMotivoCierre" style="display: none;">
                <label for="">A 5 I. Motivo de cierre</label>
                <select class="form-control selectMotivoCierre" name="motivocierre_id" id="motivocierre_id">
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
            @endif @else
            <div class="form-group divMotivoCierre" style="display: none;" {{ $errors->has('motivocierre_id') ? 'has-error' : ''}}>
                <label for="">A 5 I. Motivo de cierre</label>
                <select class="form-control selectMotivoCierre" name="motivocierre_id" id="motivocierre_id">
                        <option value="" disabled selected>Seleccione el Motivo</option>
                        @foreach ($datosMotivoCierre as $motivoCierre)
                            <option value="{{ $motivoCierre->id }}">{{ $motivoCierre->nombre }}</option>
                        @endforeach
                    </select> {!! $errors->first('motivocierre_id', '
                <p class="help-block" style="color:red"
                    ;>:message</p>') !!}
            </div>
            @endif {{-- FIN QUINTA PREGUNTA --}} {{-- INICIO SEXTA PREGUNTA --}} @if (auth()->user()->isAdmin !== 2)
            <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                <label for="">A 6. Ámbito de competencia</label>
                <select name="ambito_id" id="ambito_id" class="form-control selectAmbito">
                            @foreach ($datosAmbito as $ambito)
                                @php
                                    $selected = ($ambito->id == $aFormulario->ambito_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $ambito->id }}" {{ $selected }}>{{$ambito->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('ambito_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>

            <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                <select name="departamento_id" id="departamento_id" class="form-control selectDepartamento">
                            @foreach ($datosDepartamento as $departamento)
                                @php
                                    $selected = ($departamento->id == $aFormulario->departamento_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $departamento->id }}" {{ $selected }}>{{$departamento->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('departamento_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>

            <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                <select name="otrasprov_id" id="otrasprov_id" class="form-control selectOtrasProv">
                            <option value="">Seleccioná la provincia</option>
                            @foreach ($datosOtrasProv as $otrasProv)
                                @php
                                    $selected = ($otrasProv->id == $aFormulario->otrasprov_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $otrasProv->id }}" {{ $selected }}>{{$otrasProv->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('otrasprov_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            @else
            <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                <label for="">A 6. Ámbito de competencia</label>
                <select disabled name="ambito_id" class="form-control selectAmbito">
                            @foreach ($datosAmbito as $ambito)
                                @php
                                    $selected = ($ambito->id == $aFormulario->ambito_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $ambito->id }}" {{ $selected }}>{{$ambito->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('ambito_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>

            <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                <select disabled name="departamento_id" class="form-control selectDepartamento">
                            @foreach ($datosDepartamento as $departamento)
                                @php
                                    $selected = ($departamento->id == $aFormulario->departamento_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $departamento->id }}" {{ $selected }}>{{$departamento->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('departamento_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>

            <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                <select disabled name="otrasprov_id" class="form-control selectOtrasProv">
                            @foreach ($datosOtrasProv as $otrasProv)
                                @php
                                    $selected = ($otrasProv->id == $aFormulario->otrasprov_id) ? 'selected' : '';
                                


@endphp
                                <option value="{{ $otrasProv->id }}" {{ $selected }}>{{$otrasProv->nombre}}</option>
                            @endforeach
                        </select> {!! $errors->first('otrasprov_id', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            @endif 
            {{-- FIN SEXTA PREGUNTA --}}

            {{-- INICIO SEPTIMA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('fiscalia_juzgado') ? 'has-error' : ''}}>
                    <label for="fiscalia_juzgado">A 7. Fiscalía/Juzgado Interviniente:</label> 
                    @if (auth()->user()->isAdmin !== 2)
                        <input type="text" class="form-control" name="fiscalia_juzgado" id="fiscalia_juzgado" value="{{ $aFormulario->fiscalia_juzgado }}">                
                    @else
                        <input readonly type="text" class="form-control" name="fiscalia_juzgado" id="fiscalia_juzgado" value="{{ $aFormulario->fiscalia_juzgado }}">                
                    @endif 
                    {!! $errors->first('fiscalia_juzgado', '<p class="help-block" style="color:red" ;>:message</p>') !!}
                </div>
            {{-- FIN SEPTIMA PREGUNTA --}}

            {{-- INICIO OCTAVA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}>
                <label for="caratulacionjudicial_id">A 8. Caratulación Judicial:</label> @if (auth()->user()->isAdmin !==
                2)
                <select class="form-control caratulacionjudicial" name="caratulacionjudicial_id" id="caratulacionjudicial_id">
                            @foreach ($datosCaratulacion as $caratulacion)
                                @php
                                    $selected = ($caratulacion->id == $aFormulario->caratulacionjudicial_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                            @endforeach
                        </select> @else
                <select disabled class="form-control caratulacionjudicial" name="caratulacionjudicial_id">
                            @foreach ($datosCaratulacion as $caratulacion)
                                @php
                                    $selected = ($caratulacion->id == $aFormulario->caratulacionjudicial_id) ? 'selected' : '';
                                @endphp
                                <option value="{{ $caratulacion->id }}" {{ $selected }}>{{ $caratulacion->nombre }}</option>
                            @endforeach
                        </select> @endif {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red" ;>:message</p>') !!}
                <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                    <br><label for="">Cuál?</label> @if (auth()->user()->isAdmin !== 2)
                    <input class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" id="caratulacionjudicial_otro" value="{{ $aFormulario->caratulacionjudicial_otro }}"
                        id="caratulacionjudicial_otro" type="text"> @else
                    <input readonly class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" value="{{ $aFormulario->caratulacionjudicial_otro }}"
                        id="caratulacionjudicial_otro" type="text"> @endif
                </div>
                {!! $errors->first('caratulacionjudicial_otro', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>

            {{--
            <script>
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
            {{-- FIN OCTAVA PREGUNTA --}} 

            {{-- INICIO NOVENA PREGUNTA --}}
            <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                <label for="datos_nro_causa">A 9. N° Causa o Id Judicial:</label> @if (auth()->user()->isAdmin !== 2)
                <input type="text" class="form-control" name="datos_nro_causa" id="datos_nro_causa" value="{{ $aFormulario->datos_nro_causa }}">                @else
                <input readonly type="text" class="form-control" name="datos_nro_causa" id="datos_nro_causa" value="{{ $aFormulario->datos_nro_causa }}">                @endif {!! $errors->first('datos_nro_causa', '
                <p class="help-block" style="color:red" ;>:message</p>') !!}
            </div>
            {{-- FIN NOVENA PREGUNTA --}}

            {{-- INICIO DECIMA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('tipovictima_id') ? 'has-error' : ''}}>
		    		<label for="">D 18. Tipo de víctima:</label>
		    		<select class="form-control" name="tipovictima_id">
		    			<option value="" disabled selected>Seleccione</option>
		    			@foreach ($datosTipoVictima as $tipoVictima)
		    				<option value="{{ $tipoVictima->getId() }}" {{ $aFormulario->tipovictima_id == $tipoVictima->getId() ? 'selected' : '' }}>{{ $tipoVictima->getNombre() }}</option>
		    			@endforeach
		    		</select>
		    	</div>
		    	{!! $errors->first('tipovictima_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            {{-- FIN DECIMA PREGUNTA --}}

            {{-- INICIO PROFESIONALES CARGADOS --}}

            <div class="profesionalesAnteriores" name="profesionalesAnteriores">
                @php $i = 1; 
@endphp
                <input type="text" name="idsEliminados" id="idsEliminados" value="" style="display: none;"> @foreach($profesionalIntervinientes
                as $profesional)
                <div class="profesional{{ $profesional->id }}">
                    <h5>
                        <?php echo $i?>° Profesional cargado
                        <br>

                        @if (auth()->user()->isAdmin !== 2)
                        <a onclick="borrarProfesional({{ $profesional->id }})" class="btn float-right" class="borrarProfesional"><i class="far fa-trash-alt fa-2x" style="color: red;"></i></a></h5>
                        @else
                        <br>
                        @endif
                        <div class="form-group">
                        <label for="profesional_id">A 10.1 Nombre/Equipo/Profesión:</label> @if (auth()->user()->isAdmin !==
                        2)
                        <select class="form-control profesional_id'+clicks+'" name="profesional_id_viejo[]" id="profesional_id">
                            @foreach ($datosProfesional as $profesionalTabla)
                                @php
                                    $selected = ($profesionalTabla->id == $profesional->profesional_id) ? 'selected' : '';
                                
@endphp
                                <option value="{{ $profesionalTabla->getId() }}"{{$selected}}>{{ $profesionalTabla->getNombreCompletoyProfesion() }} - {{ $profesionalTabla->profesion }}</option>
                            @endforeach
                                </select>{!! $errors->first("profesional_id.*", '
                        <p class="help-block"
                            style="color:red" ;>:message</p>') !!} @else

                        <select disabled class="form-control profesional_id'+clicks+'" name="profesional_id_viejo[]" id="profesional_id">
                            @foreach ($datosProfesional as $profesionalTabla)
                                @php
                                    $selected = ($profesionalTabla->id == $profesional->profesional_id) ? 'selected' : '';                                
                            
@endphp
                                <option value="{{ $profesionalTabla->getId() }}"{{$selected}}>{{ $profesionalTabla->getNombreCompletoyProfesion() }} - {{ $profesionalTabla->profesion }}</option>
                            @endforeach
                                </select>{!! $errors->first("profesional_id.*", '
                        <p class="help-block"
                            style="color:red" ;>:message</p>') !!} @endif {!! $errors->first('profesional_id','
                        <p class="help-block" style="color:red"
                            ;>:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <label for="datos_profesional_interviene_desde">A 10.2 Interviene desde:</label> @if (auth()->user()->isAdmin
                        !== 2)
                        <input type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesional->datos_profesional_interviene_desde)->format('Y-m-d')}}"
                            name="datos_profesional_interviene_desde_viejo[]"> @else
                        <input readonly type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesional->datos_profesional_interviene_desde)->format('Y-m-d')}}">                        @endif {!! $errors->first('datos_profesional_interviene_desde','
                        <p class="help-block" style="color:red"
                            ;>:message</p>') !!}
                    </div>

                    <div class="form-group">
                        <label for="profesionalactualmente_id">A 10.3 Actualmente Interviene:</label> @if (auth()->user()->isAdmin
                        !== 2)
                        <select class="form-control actualmente<?=$i?>" name="profesionalactualmente_id_viejo[]" id="profesionalactualmente_id[]"
                            onChange="changeVal(<?=$i?>)">
                                    <option value="{{ $profesional->profesionalactualmente_id }}">{{ $profesional->nombre }}</option>
                                    @foreach ($datosIntervieneActualmente as $profesionalInterviene)
                                        @php
                                            $selected = ($profesionalInterviene->id == $profesional->profesionalactualmente_id) ? 'selected' : '';
                                        
@endphp
                                        <option value="{{ $profesionalInterviene->getId() }}"{{$selected}}>{{ $profesionalInterviene->getNombre() }}</option>
                                    @endforeach
                                </select> 
                        @else
                            <select disabled class="form-control actualmente<?=$i?>" name="profesionalactualmente_id_viejo[]" id="profesionalactualmente_id[]" onChange="changeVal(<?=$i?>)">
                                <option value="{{ $profesional->profesionalactualmente_id }}">{{ $profesional->nombre }}</option>
                                @foreach ($datosIntervieneActualmente as $profesionalInterviene)
                                @php
                                $selected = ($profesionalInterviene->id == $profesional->profesionalactualmente_id) ? 'selected' : '';                                                                            
                                @endphp
                                        <option value="{{ $profesionalInterviene->getId() }}"{{$selected}}>{{ $profesionalInterviene->getNombre() }}</option>
                                @endforeach
                            </select>
                         @endif {!!$errors->first("profesionalactualmente_id.*",'<p class="help-block" style="color:red" ;>:message</p>') !!}
                    </div>

                    @if($profesional->profesionalactualmente_id == 2)
                    <div style="display: block;" class="form-group mostrarFinal<?=$i?>" name="intervieneHasta">
                        @elseif($profesional->profesionalactualmente_id == 1)
                        <div style="display: none;" class="form-group mostrarFinal<?=$i?>" name="intervieneHasta">
                            @endif
                            <label for="datos_profesional_interviene_hasta">A 10.4 Interviene hasta:</label> @if (auth()->user()->isAdmin
                            !== 2)
                            <input type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesional->datos_profesional_interviene_hasta)->format('Y-m-d') }}"
                                name="datos_profesional_interviene_hasta_viejo[]"> @else
                            <input readonly type="date" class="form-control" value="{{ Carbon\Carbon::parse($profesional->datos_profesional_interviene_hasta)->format('Y-m-d') }}">                            @endif {!! $errors->first('profesionalactualmente_id','
                            <p class="help-block" style="color:red"
                                ;>:message</p>') !!}
                        </div>
                        @php $i = $i + 1; 
@endphp
                    </div>
                    @endforeach {{-- FIN PROFESIONALES CARGADOS --}} {{-- INICIO AGREGAR PROFESIONAL PREGUNTA --}}
                    <div class="padre"></div>
                    @if (auth()->user()->isAdmin !== 2)
                    <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
                    <button id="borra" class="btn btn-outline-danger col-xl borrarProfesional" type="button">Borrar profesional</button><br><br>                    {{-- FIN AGREGAR PROFESIONAL PREGUNTA --}}
                    <button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br> @endif
        </form>

        {{-- <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
        <button id="borra" class="btn btn-outline-danger col-xl" type="button" onclick="borra()">Borrar profesional</button><br><br>        --}}
    </section>

    {{-- SCRIPT PARA AGREGAR OTRO PROFESIONAL --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/js/formularioA.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var btnAgregarProfesional = document.querySelector('.anadirProfesional');

                var clicks = 0;

        btnAgregarProfesional.addEventListener('click', function(){
                    clicks++

            var divClickProfesional = 
                    '<div class="hijo" name="profesionalDinamico"><h3>A 10. Profesional Interviniente:</h3><div class="form-group" {{ $errors->has("profesional_id[]") ? "has-error" : ""}}><label for="profesional_id">A 10.1 Nombre/Equipo/Profesión: </label><select class="form-control profesional_id'+clicks+'" name="profesional_id[]" id="profesional_id" required><option value="" disabled selected>Seleccione</option>@foreach ($datosProfesional as $profesional)<option value="{{ $profesional->getId() }}">{{ $profesional->getNombreCompletoyProfesion() }} - {{ $profesional->profesion }}</option>@endforeach</select>{!! $errors->first("profesional_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="mostrarInicio form-group" {{ $errors->has("datos_profesional_interviene_desde[]") ? "has-error" : ""}}><label for="datos_profesional_interviene_desde">A 10.2 Interviene desde:</label><input type="date" class="form-control desde'+clicks+'" name="datos_profesional_interviene_desde[]" id="datos_profesional_interviene_desde" value="" required date>{!! $errors->first("datos_profesional_interviene_desde.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group" {{ $errors->has("profesionalactualmente_id[]") ? "has-error" : ""}} style="display:none"><label for="profesionalactualmente_id">A 10.3 Actualmente Interviene:</label><select class="form-control actualmente'+clicks+'" name="profesionalactualmente_id[]" id="profesionalactualmente_id[]" ><option value="1" selected="selected">Si</option></select>{!! $errors->first("profesionalactualmente_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div>';

            var divProfesionales = document.querySelector('.padre');
            divProfesionales.insertAdjacentHTML('beforeend', divClickProfesional);

                    //le agrego las funcionalidades para cada caso
                    
                        var actualmenteN = document.querySelector('.actualmente');
                        var finalN = document.querySelector('.mostrarFinal');                          
     
                        actualmenteN.addEventListener('change', function(){
                            if (actualmenteN.value == "1") {                        
                                finalN.style.display = 'none';
                            }else if(actualmenteN.value == "2"){                   
                                finalN.style.display = 'block';
                            }else{
                                finalN.style.display = 'none';
                            }
                        })
                        $("#formularioA").valid();

                    //fin funcionalidades
                });


        var nueva_entrada = $('.padre').html();

                $("#anadir").click(function(){
                    $(".padre").append(nueva_entrada);
                });

             function borra() {
                 $('.mostrarFinal<?=$i?>').remove();
                 swal('Se borro un profesional');
             }
             //le agrego las funcionalidades para cada caso

            function changeVal(a){
            var actualmenteN = document.querySelector('.actualmente'+a);
            var finalN = document.querySelector('.mostrarFinal'+a);
                    if (actualmenteN.value == "1") {
                        finalN.style.display = 'none';
                    }else if(actualmenteN.value == "2"){
                        finalN.style.display = 'block';                        
                    }else{
                        finalN.style.display = 'none';
                    }
            }
            function ocultar(e){
                var divOculto = document.querySelector('.' + e); 
                divOculto.style.display = 'none';
            }

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
            
    </script>
</body>

</html>