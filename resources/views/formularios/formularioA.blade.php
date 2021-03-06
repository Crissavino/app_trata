<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
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
        <li class="nav-item"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>

    <ul class="nav nav-tabs">
        <li class="nav-item active"> <a class="nav-link active" href="#">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link " href="A">Eje B: Caracterización de la víctima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="A">Eje C: Referentes afectivos</a> </li>
        <li class="nav-item"> <a class="nav-link " href="A">Eje D: Datos de delito</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="A">Eje E: Datos del imputado</a> </li> --}}
        <li class="nav-item"> <a class="nav-link " href="A">Eje E: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="A">Eje F: Detalle de intervención</a> </li>
    </ul>
</header>
<body>
    @if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1 class="text-center" style="padding: 15px;">
        Eje A: Datos institucionales
    </h1>
{{-- con el @auth veo si un usuario esta logueado, y si no esta, lo mando para el login
@auth  --}}     
    <section class="container">
            <form class="" action="" method="post" id="formularioA">
            {{ csrf_field() }}
            
            {{-- INICIO PRIMERA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}">
                    <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                    <input type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{old('datos_nombre_referencia')}}">
                    {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN PRIMERA PREGUNTA --}}

            {{-- INICIO SEGUNDA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}">
                    <label for="datos_numero_carpeta">A 2. Número de carpeta:</label>
                    <input type="text" class="form-control" placeholder="El ultimo nro es: {{ $ultimoNroCarpeta }}" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{old('datos_numero_carpeta')}}">
                    {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN SEGUNDA PREGUNTA --}}

            {{-- INICIO TERCERA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}">
                    <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                    <input type="date" class="form-control date" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{old('datos_fecha_ingreso')}}">
                    {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN TERCERA PREGUNTA --}}

            {{-- INICIO CUARTA PREGUNTA --}}
                {{-- TODAVIA NO SE COMO HACER PARA PERSISTIR LA OPCION ELEGIDA DE LOS SELECTS DINAMICOS --}}
                <div class="form-group {{ $errors->has('modalidad_id') ? 'has-error' : ''}}">
                    <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                    <select class="form-control modalidad" name="modalidad_id" id="modalidad_id">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach ($datosModalidad as $modalidad)
                            @php
                                $selected = ($modalidad->id == old('modalidad_id')) ? 'selected' : '';
                            @endphp
                            <option value="{{ $modalidad->getId() }}">{{ $modalidad->getNombre() }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div id="presentacion_espontanea_id" class="presentacion_espontanea" style="display: none;" {{ $errors->has('presentacion_espontanea_id') ? 'has-error' : ''}}><br>
                        <select class="form-control presentacion" name="presentacion_espontanea_id">
                            <option value="" disabled selected>Seleccione el Tipo</option>
                            @foreach ($datosPresentacion as $presentacion)
                                @php
                                    $selected = ($presentacion->id == old('presentacion_espontanea_id')) ? 'selected' : '';
                                @endphp
                                <option value="{{ $presentacion->getId() }}">{{ $presentacion->getNombre() }}</option>
                            @endforeach
                        </select>
                    {!! $errors->first('presentacion_espontanea_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div id="derivacion_otro_organismo_id" class="derivacion_otro_organismo" style="display: none;" {{ $errors->has('derivacion_otro_organismo_id') ? 'has-error' : ''}}><br>
                        <select class="form-control derivacion_otro_organismo_select" name="derivacion_otro_organismo_id" id="derivacion_otro_organismo_id">
                            <option value="">Seleccione el Organismo</option>
                            @foreach ($datosOrganismo as $organismo)
                                @php
                                    $selected = ($organismo->id == old('derivacion_otro_organismo_id')) ? 'selected' : '';
                                @endphp
                                <option value="{{ $organismo->getId() }}">{{ $organismo->getNombre() }}</option>
                            @endforeach
                        </select>
                    {!! $errors->first('derivacion_otro_organismo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div id="derivacion_otro_organismo_cual" class="derivacion_otro_organismo_cual" style="display: none;" {{ $errors->has('derivacion_otro_organismo_cual') ? 'has-error' : ''}}>
                        <br><label for="">Introduzca el Organismo</label>
                        <div class="">
                            <input class="form-control derivacion_otro_organismo_cual_input" name="derivacion_otro_organismo_cual" id="derivacion_otro_organismo_cual" type="text">
                        </div>
                    {!! $errors->first('derivacion_otro_organismo_cual', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>
                </div>

                {{-- <script>
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
                </script> --}}
            {{-- FIN CUARTA PREGUNTA --}}

            {{-- INICIO QUINTA PREGUNTA --}}
                <div class="form-group {{ $errors->has('estadocaso_id') ? 'has-error' : ''}}">
                    <label for="estadocaso_id">A 5. Estado Actual:</label>
                    <select class="form-control selectEstadoCaso" name="estadocaso_id" id="estadocaso_id">
                    <option value="" disabled selected>Estado Actual</option>
                    @foreach ($datosEstadoCaso as $estadocaso)
                        @php
                            $selected = ($estadocaso->id == old('estadocaso_id')) ? 'selected' : '';
                        @endphp
                        <option value="{{ $estadocaso->getId() }}">{{ $estadocaso->getNombre() }}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                <div class="form-group divMotivoCierre" style="display: none;" {{ $errors->has('motivocierre_id') ? 'has-error' : ''}}>
                    <label for="">A 5 I. Motivo de cierre</label>
                    <select class="form-control selectMotivoCierre" name="motivocierre_id" id="motivocierre_id">
                        <option value="" disabled selected>Seleccione el Motivo</option>
                        @foreach ($datosMotivoCierre as $motivoCierre)
                            <option value="{{ $motivoCierre->id }}">{{ $motivoCierre->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('motivocierre_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                <script>
                    // var selectEstadoCaso = document.querySelector('.selectEstadoCaso');
                    // var divMotivoCierre = document.querySelector('.divMotivoCierre');


                    // selectEstadoCaso.addEventListener('change', function(){
                    //     if (selectEstadoCaso.value == 3) {
                    //         divMotivoCierre.style.display = '';
                    //     }else{
                    //         divMotivoCierre.style.display = 'none';
                    //     }
                    // });
                </script>
            {{-- FIN QUINTA PREGUNTA --}}

            {{-- INICIO SEXTA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('ambito_id') ? 'has-error' : ''}}>
                    <label for="">A 6. Ámbito de competencia</label>
                    <select name="ambito_id" class="form-control selectAmbito" id="ambito_id">
                        <option value=""disabled selected>Seleccione</option>
                        @foreach ($datosAmbito as $ambito)
                            @php
                                $selected = ($ambito->id == old('ambito_id')) ? 'selected' : '';
                            @endphp
                            <option value="{{ $ambito->id }}">{{ $ambito->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('ambito_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                <div class="form-group divDepartamento" {{ $errors->has('departamento_id') ? 'has-error' : ''}} style="display: none;">
                    <select name="departamento_id" class="form-control selectDepartamento" id="departamento_id">
                        <option value="" disabled selected>Seleccione Departamento</option>
                        @foreach ($datosDepartamento as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>                    
                    {!! $errors->first('departamento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                 <div class="form-group divOtrasProv" {{ $errors->has('otrasprov_id') ? 'has-error' : ''}} style="display: none;">
                    <select name="otrasprov_id" class="form-control selectOtrasProv" id="otrasprov_id">
                        <option value="" disabled selected>Seleccione Provincia</option>
                        @foreach ($datosOtrasProv as $otrasProv)
                            <option value="{{ $otrasProv->id }}">{{ $otrasProv->nombre }}</option>
                        @endforeach
                    </select>                    
                    {!! $errors->first('otrasprov_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN SEXTA PREGUNTA --}}

            {{-- INICIO SEPTIMA PREGUNTA --}}
                <div class="form-group {{ $errors->has('fiscalia_juzgado') ? 'has-error' : ''}}">
                    <label for="fiscalia_juzgado">A 7. Fiscalía/Juzgado Interviniente:</label>
                    <input type="text" class="form-control" name="fiscalia_juzgado" id="fiscalia_juzgado" value="{{old('fiscalia_juzgado')}}">
                    {!! $errors->first('fiscalia_juzgado', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN SEPTIMA PREGUNTA --}}

            {{-- INICIO OCTAVA PREGUNTA --}}
                <div class="form-group {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}">
                    <label for="caratulacionjudicial_id">A 8. Caratulación Judicial:</label>
                    <select class="form-control caratulacionjudicial" name="caratulacionjudicial_id" id="caratulacionjudicial_id">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach ($datosCaratulacion as $caratulacion)
                            @php
                                $selected = ($caratulacion->id == old('caratulacionjudicial_id')) ? 'selected' : '';
                            @endphp
                            <option value="{{ $caratulacion->getId() }}">{{ $caratulacion->getNombre() }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div id="cual" class="caratulacionjudicial_cual" style="display: none;" {{ $errors->has('caratulacionjudicial_otro') ? 'has-error' : ''}}>
                        <br><label for="">Introduzca Tipo Caratulaci&oacute;n</label>
                        <input class="form-control caratulacionjudicial_otro" name="caratulacionjudicial_otro" id="caratulacionjudicial_otro" type="text">
                    {!! $errors->first('caratulacionjudicial_otro', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>
                </div>

            {{-- FIN OCTAVA PREGUNTA --}}

            {{-- INICIO NOVENA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}">
                    <label for="datos_nro_causa">A 9. N° Causa o Id Judicial:</label>
                    <input type="text" class="form-control" name="datos_nro_causa" id="datos_nro_causa" value="{{old('datos_nro_causa')}}">
                    {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN NOVENA PREGUNTA --}}

            {{-- INICIO DECIMA PREGUNTA --}}
                <div class="form-group" {{ $errors->has('tipovictima_id') ? 'has-error' : ''}}>
                    <label for="">A 10. Tipo de víctima:</label>
                    <select class="form-control" name="tipovictima_id">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach ($datosTipoVictima as $tipoVictima)
                            <option value="{{ $tipoVictima->getId() }}" {{ old('tipovictima_id') == $tipoVictima->getId() ? 'selected' : '' }}>{{ $tipoVictima->getNombre() }}</option>
                        @endforeach
                    </select>
                </div>
	    	    {!! $errors->first('tipovictima_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            {{-- FIN DECIMA PREGUNTA --}}

            {{-- INICIO AGREGAR PROFESIONAL PREGUNTA --}}
                <div class="padre"></div>
                
                <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
                <button id="borra" class="btn btn-outline-danger col-xl borrarProfesional" type="button">Borrar profesional</button><br><br>
            {{-- FIN AGREGAR PROFESIONAL PREGUNTA --}}

                <button type="submit" onclick="javascript:otraFuncion();" class="btn btn-primary col-xl" name="button">Guardar</button><br><br>
            
            </form>

    </section>
        
        {{-- SCRIPTS --}}
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"  type="text/javascript"></script>
            <script src="/js/formularioA.js" type="text/javascript" charset="utf-8" async defer></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            {{-- SCRIPT PARA AGREGAR Y BORRAR PROFESIONALES --}}

            <script>
                var btnAgregarProfesional = document.querySelector('.anadirProfesional');

                var clicks = 0;

                btnAgregarProfesional.addEventListener('click', function(){
                    clicks++

                    var divClickProfesional = '<div class="hijo" name="profesionalDinamico"><h3>A 10. Profesional Interviniente:</h3><div class="form-group" {{ $errors->has("profesional_id[]") ? "has-error" : ""}}><label for="profesional_id">A 10.1 Nombre/Equipo/Profesión: </label><select class="form-control profesional_id'+clicks+'" name="profesional_id[]" id="profesional_id"><option value="" disabled selected >Seleccione</option>@foreach ($datosProfesional as $profesional)<option value="{{ $profesional->getId() }}">{{ $profesional->getNombreCompletoyProfesion() }} - {{ $profesional->profesion }}</option>@endforeach</select>{!! $errors->first("profesional_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="mostrarInicio form-group" {{ $errors->has("datos_profesional_interviene_desde[]") ? "has-error" : ""}}><label for="datos_profesional_interviene_desde">A 10.2 Interviene desde:</label><input type="date" class="form-control desde'+clicks+'" name="datos_profesional_interviene_desde[]" id="datos_profesional_interviene_desde" value="">{!! $errors->first("datos_profesional_interviene_desde.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group" {{ $errors->has("profesionalactualmente_id[]") ? "has-error" : ""}}><label for="profesionalactualmente_id">A 10.3 Actualmente Interviene:</label><select class="form-control actualmente'+clicks+'" name="profesionalactualmente_id[]" id="profesionalactualmente_id"><option value="" disabled selected>Seleccione</option>@foreach ($datosIntervieneActualmente as $profesionalInterviene)<option value="{{ $profesionalInterviene->getId() }}">{{ $profesionalInterviene->getNombre() }}</option>@endforeach</select>{!! $errors->first("profesionalactualmente_id.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div><div style="display: none;" class="mostrarFinal'+clicks+' form-group" {{ $errors->has("datos_profesional_interviene_hasta[]") ? "has-error" : ""}}><label for="datos_profesional_interviene_hasta">A 10.4 Interviene hasta:</label><input type="date" class="form-control hasta'+clicks+'" name="datos_profesional_interviene_hasta[]" id="datos_profesional_interviene_hasta" value="">{!! $errors->first("datos_profesional_interviene_hasta.*", '<p class="help-block" style="color:red";>:message</p>') !!}</div></div>';

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

                $(document).ready(function(){
                    $("#anadir").click();
                })

                var nueva_entrada = $('.padre').html();

                $("#anadir").click(function(){
                    $(".padre").append(nueva_entrada);
                });

                // function borra() {
                //     $('.hijo').first().remove();
                //     swal('Se borro un profesional');
                // }
            </script>

            {{-- ALERTA PARA LLENAR PRIMERO EL FORMULARIO A --}}
            <script>
                var msg = '{{Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if(exist){
                  swal(msg);
                }
                function onlyText() {
                //elimina el copy paste
                $(':input').not('.date').bind('copy paste cut',function(e) {
                    e.preventDefault(); //disable cut,copy,paste.                    
                });
                //convierte las letras ingresadas en todos los input a mayuscula
                $(':input').not('.date').keyup(function(){
                    this.value = this.value.toUpperCase();
                });
                //solo se permite numeros y letras en todos los input
                $(':input').not('.date').keypress(function (e) {
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
            {{-- FIN SCRIPT --}}
{{-- @else
    <script>window.location = "/login";</script>
@endauth --}}




</body>
</html>

