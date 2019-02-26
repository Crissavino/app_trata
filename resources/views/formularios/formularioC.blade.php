<!DOCTYPE html>
<html lang="es">
<head>
	@include('partials.head')
	<title>Eje C: Referentes afectivos</title>
    <style>
        .cerrarSesion{
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<header>
    {{-- @dump($numeroCarpeta) --}}
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
	<ul class="nav nav-tabs">

        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li> --}}
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/A/{{ $carpeta->id }}/{{ $carpeta->aformulario_id }}">Eje A: Datos institucionales</a> </li>
                @break
                {{-- @continue --}}
            @endif

            {{-- @if($numeroCarpeta !== $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
                @break
            @endif --}}
        @endforeach
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/B/{{ $carpeta->id }}/{{ $carpeta->bformulario_id }}">Eje B: Caracterización de la víctima</a> </li>
                @break
                {{-- @continue --}}
            @endif

            {{-- @if($numeroCarpeta !== $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
                @break
            @endif --}}
        @endforeach
        <li class="nav-item"> <a class="nav-link active" href="#">Eje C: Referentes afectivos</a> </li>
        <li class="nav-item"> <a class="nav-link" href="/formularios/D/{{ $idCarpeta }}">Eje D: Datos de delito</a> </li>
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        <li class="nav-item"> <a class="nav-link" href="/formularios/F/{{ $idCarpeta }}">Eje E: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link" href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
	</ul>
</header>
<body>
@auth 

    @if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <section class="container">
        <form class="ejeC" action="" method="post">
        	{{ csrf_field() }}
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $numeroCarpeta }}">

            <h1 class="text-center" style="padding: 15px;">
                Eje C: Referentes afectivos
                <h5 style="text-align: center;" >Estás trabajando sobre la carpeta n° {{ $numeroCarpeta }}</h5>
                {{-- <h5 style="text-align: center;" >Seleccioná la carpeta sobre la que deseas trabajar
                <select name="numeroCarpeta" class="select-sinborde">
                    @foreach ($todoFormA as $formA)
                        <option value="{{ $formA->datos_numero_carpeta }}">{{ $formA->datos_numero_carpeta }}</option>
                    @endforeach
                </select>
                </h5> --}}
            </h1>
            
            <div class="form-group">
            	<label for="otraspersonas_id">C 1. ¿Cuenta con alguna persona de referencia afectiva? </label>
	            <select class="form-control noPersonas" name="otraspersonas_id" required title="Este campo es obligatorio" {{ $errors->has('otraspersonas_id') ? 'has-error' : ''}}>
	            	<option value="" disabled selected>Seleccione</option>
	                @foreach ($datosOtraspersonas as $otrasPersonas)
	                	<option value="{{ $otrasPersonas->getId() }}">{{ $otrasPersonas->getNombre() }}</option>
	                @endforeach
	            </select>
            	{!! $errors->first('otraspersonas_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="referentes" id="referentes"></div>

            <div id="botones">
                <button type="button" id="anadir" disabled="disabled" class="clickAnadir btn btn-outline-primary col-xl"> Agregar referente </button><br><br>
                <button id="borra" type="button" disabled="disabled" class="clickBorrar btn btn-outline-danger col-xl">Borrar referente</button><br><br>
            </div>

            <button type="submit" class="btn btn-primary col-xl enviar" name="button">Guardar</button><br><br>

        </form>

        {{-- <button type="button" id="anadir" disabled="disabled" class="clickAnadir btn btn-outline-primary col-xl"> Agregar Referente </button><br><br>
        <button id="borra" type="button" disabled="disabled" class="clickBorrar btn btn-outline-danger col-xl" onclick="borra()">Borrar Referente</button> --}}
    </section>
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"  type="text/javascript"></script>-->
            
        <script src="/js/formularioC.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- este script lo que hace es agregar otro formulario de profesionales en el caso que intervenga mas de un profesional en el caso -->
        {{-- <script>
            $(document).ready(function(){
                var nueva_entrada ='';
                $(document).ready(function() {
                    nueva_entrada = $('#padre').html();
                });
                $("#anadir").click(function(){
                    $("#padre").append(nueva_entrada);
                });
            });
            // function borra() {
            //    var padre = document.getElementById("padre");
            //    var hijo = document.getElementById("hijo")
            //    padre.removeChild(hijo);
            //    swal('Se borro un profesional');
            // }
        </script> --}}

        <script>
            var btnAgregarReferente = document.querySelector('.clickAnadir');

            var clicks = 0;

            btnAgregarReferente.addEventListener('click', function(){
                clicks++
                
                var divClickReferente = '<div class="referente" id="referente" name="referentedinamico"><h3>Datos del Referente:</h3><div class="form-group" {{ $errors->has('nombre_apellido[]') ? 'has-error' : ''}}><label for="">C 2. Referente - Nombre y apellido</label><input type="text" class="form-control nombre_apellido'+clicks+'" name="nombre_apellido[]" value=""  required title="Este campo es obligatorio">{!! $errors->first('nombre_apellido.*', '<p class="help-block" style="color:red";>:message</p>') !!}<label for="" >Se desconoce</label><input type="checkbox" class="desconoceNA'+clicks+' ml-2" value=""></div><div class="form-group" {{ $errors->has('edad[]') ? 'has-error' : ''}}><label for="edad">C 3. Referente - Edad:</label><input type="text" class="form-control edad'+clicks+'" name="edad[]" value=""  required pattern="[0-9]{1,2}" title="Este campo es obligatorio">{!! $errors->first('edad.*', '<p class="help-block" style="color:red";>:message</p>') !!}<label for="">Se desconoce</label><input type="checkbox" class="desconoceE'+clicks+' ml-2" value=""></div><div class="form-group" {{ $errors->has('vinculo_id[]') ? 'has-error' : ''}}><label for="vinculo_id">C 4. Referente - Tipo de vínculo con la víctima</label><select id="vinculo_id" class="form-control vinculo'+clicks+'" name="vinculo_id[]"  required title="Este campo es obligatorio" ><option value="" disabled selected>Seleccione</option>@foreach ($datosVinculos as $vinculo)<option value="{{ $vinculo->getId() }}" {{ old('vinculo_id') == $vinculo->getId() ? 'selected' : '' }}>{{ $vinculo->getNombre() }}</option>@endforeach</select>{!! $errors->first('vinculo_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group otro_vinculo'+clicks+'" style="display: none"><label for="vinculo_otro">Cuál?</label><input type="text" class="form-control vinculo_otro'+clicks+'" name="vinculo_otro[]"></div><div class="form-group" {{ $errors->has('referenteContacto[]') ? 'has-error' : ''}}><label for="">C 5. Contacto de referente</label><input type="text" name="referenteContacto[]" class="form-control"  required title="Este campo es obligatorio">{!! $errors->first('referenteContacto.*', '<p class="help-block" style="color:red";>:message</p>') !!}</div></div>';

                var divReferentes = document.querySelector('.referentes');
                divReferentes.insertAdjacentHTML('beforeend', divClickReferente);

                //le agrego las funcionalidades para cada caso
                    var inputNomApTextN = document.querySelector('.nombre_apellido'+clicks);
                    var inputNomApCheckN = document.querySelector('.desconoceNA'+clicks);
                    // console.log(inputNomApTextN, inputNomApCheckN);

                    inputNomApCheckN.addEventListener('click', function () {
                        if (inputNomApCheckN.checked) {
                            // console.log('hola');
                            inputNomApTextN.value = 'Se desconoce'
                            inputNomApTextN.setAttribute("readonly", "readonly")
                        }else{
                            inputNomApTextN.value = ''
                            inputNomApTextN.removeAttribute('readonly')
                        }
                    });


                    var inputEdadCheckN = document.querySelector('.desconoceE'+clicks);
                    var inputEdadTextN = document.querySelector('.edad'+clicks);

                    inputEdadCheckN.addEventListener('click', function () {
                        if (inputEdadCheckN.checked) {
                            inputEdadTextN.value = 'Se desconoce'
                            inputEdadTextN.setAttribute("readonly", "readonly")
                        }else{
                            inputEdadTextN.value = ''
                            inputEdadTextN.removeAttribute('readonly')
                        }
                    });

                    var selectVinculoN = document.querySelector('.vinculo'+clicks)
                    var divOtroVinculoN = document.querySelector('.otro_vinculo'+clicks)
                    var inputOtroVinculoN = document.querySelector('.vinculo_otro'+clicks)

                    selectVinculoN.addEventListener('change', function () {
                        if (selectVinculoN.value == '6') {
                            divOtroVinculoN.style.display = ""
                            alert(inputOtroVinculoN.type )
                            //temaCual.getElementsByTagName("input")[0].setAttribute("required","true");
                        }else{
                            divOtroVinculoN.style.display = "none"
                            inputOtroVinculoN.value = '';
                        }
                    })
                //fin funcionalidades
            });
        </script>

        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
              swal(msg);
            }
        </script>
        {{-- FIN SCRIPT --}}
@else
    <script>window.location = "/login";</script>
@endauth
  </body>
</html>