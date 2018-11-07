<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Eje A: Datos institucionales</title>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item active"> <a class="nav-link active" href="#">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link " href="B">Eje B: Caracterización de la victima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li>
        <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li>
        <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li>
        <li class="nav-item"> <a class="nav-link " href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="G">Eje G: Documentación</a> </li>
    </ul>
</header>
<body>
{{-- con el @auth veo si un usuario esta logueado, y si no esta, lo mando para el login
@auth  --}}     
    <section class="container">
            <form class="" action="" method="post">
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
                    <input type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{old('datos_fecha_ingreso')}}">
                    {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN TERCERA PREGUNTA --}}

            {{-- INICIO CUARTA PREGUNTA --}}
                {{-- TODAVIA NO SE COMO HACER PARA PERSISTIR LA OPCION ELEGIDA DE LOS SELECTS DINAMICOS --}}
                <div class="form-group {{ $errors->has('modalidad_id') ? 'has-error' : ''}}">
                    <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                    <select class="form-control" name="modalidad_id" onChange="selectOnChange2(this)" >
                        <option value="">Modalidad</option>
                        @foreach ($datosModalidad as $modalidad)
                            @php
                                $selected = ($modalidad->id == old('modalidad_id')) ? 'selected' : '';
                            @endphp
                            <option value="{{ $modalidad->getId() }}" {{ $selected }}>{{ $modalidad->getNombre() }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div id="presentacion_espontanea_id" style="display: none;"><br>
                        <select class="form-control" name="presentacion_espontanea_id">
                            <option value="">De que tipo?</option>
                            @foreach ($datosPresentacion as $presentacion)
                                @php
                                    $selected = ($presentacion->id == old('presentacion_espontanea_id')) ? 'selected' : '';
                                @endphp
                                <option value="{{ $presentacion->getId() }} {{ $selected }}">{{ $presentacion->getNombre() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="derivacion_otro_organismo_id" style="display: none;"><br>
                        <select class="form-control" onChange="selectOnChange3(this)" name="derivacion_otro_organismo_id">
                            <option value="">Que Organismo?</option>
                            @foreach ($datosOrganismo as $organismo)
                                @php
                                    $selected = ($organismo->id == old('derivacion_otro_organismo_id')) ? 'selected' : '';
                                @endphp
                                <option value="{{ $organismo->getId() }}" {{ $selected }}>{{ $organismo->getNombre() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="derivacion_otro_organismo_cual" style="display: none;">
                        <br><label for="">Cuál?</label>
                        <div class="">
                            <input class="form-control" name="derivacion_otro_organismo_cual" type="text" onclick="derivacion_otro_organismo_cual()">
                        </div>
                    </div>
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
                <div class="form-group {{ $errors->has('estadocaso_id') ? 'has-error' : ''}}">
                    <label for="estadocaso_id">A 5. Estado Actual del Caso:</label>
                    <select class="form-control" name="estadocaso_id">
                    <option value="">Estado Actual</option>
                    @foreach ($datosEstadoCaso as $estadocaso)
                        @php
                            $selected = ($estadocaso->id == old('estadocaso_id')) ? 'selected' : '';
                        @endphp
                        <option value="{{ $estadocaso->getId() }}" {{ $selected }}>{{ $estadocaso->getNombre() }}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN QUINTA PREGUNTA --}}

            {{-- INICIO SEXTA PREGUNTA --}}
                <div class="form-group {{ $errors->has('datos_ente_judicial') ? 'has-error' : ''}}">
                    <label for="datos_ente_judicial">A 6. Fiscalía/Juzgado Interviniente:</label>
                    <input type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{old('datos_ente_judicial')}}">
                    {!! $errors->first('datos_ente_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN SEXTA PREGUNTA --}}

            {{-- INICIO SEPTIMA PREGUNTA --}}
                <div class="form-group {{ $errors->has('caratulacionjudicial_id') ? 'has-error' : ''}}">
                    <label for="caratulacionjudicial_id">A 7. Caratulación Judicial:</label>
                    <select class="form-control" name="caratulacionjudicial_id" onChange="selectOnChange(this)">
                        <option value="">Caratulación</option>
                        @foreach ($datosCaratulacion as $caratulacion)
                            @php
                                $selected = ($caratulacion->id == old('caratulacionjudicial_id')) ? 'selected' : '';
                            @endphp
                            <option value="{{ $caratulacion->getId() }}" {{ $selected }}>{{ $caratulacion->getNombre() }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('caratulacionjudicial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div id="cual" style="display: none;">
                        <br><label for="">Cuál?</label>
                        <div class="">
                            <input class="form-control" name="caratulacionjudicial_otro" id="caratulacionjudicial_otro" type="text" onclick="cual()">
                        </div>
                    </div>
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
                <div class="form-group {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}">
                    <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                    <input type="text" class="form-control" name="datos_nro_causa" value="{{old('datos_nro_causa')}}">
                    {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            {{-- FIN OCTAVA PREGUNTA --}}

            {{-- INICIO AGREGAR PROFESIONAL PREGUNTA --}}
                <div class="padre">
                    <div class="hijo" style="display: none;">
                        <h3>A 9. Profesional Interviniente:</h3>
                        <div class="form-group {{ $errors->has('profesional_id[]') ? 'has-error' : ''}}">
                            <label for="profesional_id">Profesional que interviene</label>
                            <select class="form-control profesional_id">
                                <option value="">Seleccioná profesional</option>
                                @foreach ($datosProfesional as $profesional)
                                    <option value="{{ $profesional->getId() }}">{{ $profesional->getNombreCompletoyProfesion() }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('profesional_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('profesionalactualmente_id[]') ? 'has-error' : ''}}">
                            <label for="profesionalactualmente_id">A 9.3 Actualmente Interviene:</label>
                            <select class="form-control actualmente" >
                                <option value="">Actualmente interviene?</option>
                                @foreach ($datosIntervieneActualmente as $profesionalInterviene)
                                    <option value="{{ $profesionalInterviene->getId() }}">{{ $profesionalInterviene->getNombre() }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('profesionalactualmente_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>

                        <div style="display: none;" class="mostrarInicio form-group {{ $errors->has('datos_profesional_interviene_desde[]') ? 'has-error' : ''}}">
                            <label for="datos_profesional_interviene_desde">A 9.4 Interviene desde:</label>
                            <input type="date" class="form-control desde" id="datos_profesional_interviene_desde" value="">
                            {!! $errors->first('datos_profesional_interviene_desde.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>

                        <div style="display: none;" class="mostrarFinal form-group {{ $errors->has('datos_profesional_interviene_hasta[]') ? 'has-error' : ''}}">
                            <label for="datos_profesional_interviene_hasta">A 9.5 Interviene hasta:</label>
                            <input type="date" class="form-control hasta" id="datos_profesional_interviene_hasta" value="">
                            {!! $errors->first('datos_profesional_interviene_hasta.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>
                    </div>
                </div>
            {{-- FIN AGREGAR PROFESIONAL PREGUNTA --}}

                <button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button><br><br>
            
            </form>

        <button id="anadir" class="btn btn-outline-primary col-xl anadirProfesional" type="button"> Agregar profesional </button><br><br>
        <button id="borra" class="btn btn-outline-danger col-xl" type="button" onclick="borra()">Borrar profesional</button><br><br>

    </section>
        
        {{-- SCRIPTS --}}
            <script src="/js/formularioA.js" type="text/javascript" charset="utf-8" async defer></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            {{-- SCRIPT PARA AGREGAR Y BORRAR PROFESIONALES --}}
            <script>
                    var nueva_entrada = $('.padre').html();

                    $("#anadir").click(function(){
                        $(".padre").append(nueva_entrada);
                    });

                function borra() {
                    $('.hijo').last().remove();
                    swal('Se borro un profesional');
                }
            </script>

            {{-- ALERTA PARA LLENAR PRIMERO EL FORMULARIO A --}}
            <script>
                var msg = '{{Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if(exist){
                  swal(msg);
                }
            </script>
        {{-- FIN SCRIPT --}}
{{-- @else
    <script>window.location = "/login";</script>
@endauth --}}
</body>
</html>

