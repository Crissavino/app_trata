<!DOCTYPE html>
<html lang="es">
<head>
	@include('partials.head')
	<title>Eje B: Caracterización de la victima</title>
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
        @foreach ($carpetas as $carpeta)
            @if ($numeroCarpeta == $carpeta->numeroCarpeta)
                <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/A/{{ $carpeta->id }}/{{ $carpeta->aformulario_id }}">Eje A: Datos institucionales</a> </li>
            @endif
        @endforeach
        <li class="nav-item"> <a class="nav-link active" href="#">Eje B: Caracterización de la víctima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/C/{{ $idCarpeta }}">Eje C: Referentes afectivos</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/D/{{ $idCarpeta }}">Eje D: Datos de delito</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li> --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        <li class="nav-item"> <a class="nav-link " href="/formularios/F/{{ $idCarpeta }}">Eje E: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
	</ul>
</header>
<body>
{{-- @auth  --}}
    @if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif


	<section class="container">	
        <form class="formulario" action="" method="post">
        	{{-- inicio esta proteccion contra datos maliciosso --}}
        	{{ csrf_field() }}
            <input type="text" name="numeroCarpeta" style="display: none;" value="{{ $numeroCarpeta }}">

            <h1 class="text-center" style="padding: 15px;">
                Eje B: Caracterización de la victima
                <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $numeroCarpeta }}</h5>
                {{-- <h5 style="text-align: center;" >Seleccioná la carpeta sobre la que deseas trabajar
                <select name="numeroCarpeta" class="select-sinborde">
                    @foreach ($todoFormA as $formA)
                        <option value="{{ $formA->datos_numero_carpeta }}">{{ $formA->datos_numero_carpeta }}</option>
                    @endforeach
                </select> --}}
                </h5>
            </h1>
        	
            <!-- PRIMERA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_nombre_y_apellido') ? 'has-error' : ''}}">
                    <label for="">B 1. Nombre y apellido:</label>
                    <input type="text" class="form-control" name="victima_nombre_y_apellido" id="victima_nombre_y_apellido" value="{{old('victima_nombre_y_apellido')}}">
                    {!! $errors->first('victima_nombre_y_apellido', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <!-- VER ESTA MANERA QUE ES MEJOR PARA BLOQUEAR UN CASILLERO CUANDO SE CLICKEA LA OPCION SE DESCONOCE -->
                    <label for="bloqueo1" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo1" value="Se desconoce" onchange="check1(this)">
                </div>
				{{-- funcion js para que cuando clickeo se desconoce vaya el valor Se Desconoce al input --}}
                <script>
                    function check1(checkbox)
                    {
                        if (checkbox.checked)
                            {
                                $('#victima_nombre_y_apellido').val('Se desconoce');
                                document.getElementById('victima_nombre_y_apellido').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#victima_nombre_y_apellido').val('');
                                    document.getElementById('victima_nombre_y_apellido').removeAttribute("readonly");   
                                }
                    }
                </script>
            <!-- FIN PRIMERA PREGUNTA -->

    		<!-- SEGUNDA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_apodo') ? 'has-error' : ''}}">
                    <label for="victima_apodo">B 2. Apodo:</label>
                    <input type="text" name="victima_apodo" class="form-control" id="victima_apodo" value="{{old('victima_apodo')}}">
                  	{!! $errors->first('victima_apodo', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label for="bloqueo2" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo2" value="Se desconoce" onchange="check2(this)">
                </div>
                {{-- funcion js para que cuando clickeo se desconoce vaya el valor Se Desconoce al input --}}
                <script>
                    function check2(checkbox)
                    {
                        if (checkbox.checked)
                        {
                            $('#victima_apodo').val('Se desconoce');
                            document.getElementById('victima_apodo').setAttribute("readonly", "readonly");
                        }else
                            { 
                                $('#victima_apodo').val('');
                                document.getElementById('victima_apodo').removeAttribute("readonly");  
                            }
                    }
                </script>
            <!-- FIN SEGUNDA PREGUNTA -->

			<!-- TERCERA PREGUNTA -->
                <div class="form-group {{ $errors->has('genero_id') ? 'has-error' : ''}}">
                    <label for="">B 3. Género:</label>
                    <select class="form-control" name="genero_id" onChange="selectOnChange1(this)">
                     <option value="">Elegí género</option>
                    @foreach ($datosGenero as $genero)
						<option value="{{$genero->getIdGenero()}}" {{ old('genero_id') == $genero->getIdGenero() ? 'selected' : '' }}>{{$genero->getNombreGenero()}}</option>
					@endforeach						
                    </select>
                  	{!! $errors->first('genero_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                <script>
                    function selectOnChange1(sel) {
                        if (sel.value=="2" || sel.value=="3"){
                            $('#embarazorelevamiento_id').val('2');
                            $('#embarazoprevio_id').val('2');
                            $('#hijosembarazo_id').val('2');
                        }else{
                            $('#embarazorelevamiento_id').val('');
                            $('#embarazoprevio_id').val('');
                            $('#hijosembarazo_id').val('');
                        }
                    }
                </script>
            <!-- FIN TERCERA PREGUNTA -->

            <!-- CUARTA PREGUNTA -->
                <div class="form-group {{ $errors->has('tienedoc_id') ? 'has-error' : ''}}">
                    <label for="">B 4. ¿Cuenta con alguna documentación que permita acreditar su identidad?:</label>
                    <select class="form-control" name="tienedoc_id" onChange="selectOnChange16(this)">
                        <option value="">Tiene documentación?</option>
                        @foreach ($datosDocumento as $documento)
							<option value="{{$documento->getIdDocumentacion()}}" {{ old('tienedoc_id') == $documento->getIdDocumentacion() ? 'selected' : '' }}>{{$documento->getNombreDocumentacion()}}</option>
                        @endforeach
                    </select>
                  	{!! $errors->first('tienedoc_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>

                <script>
                    function selectOnChange16(sel)
                    {
                        if (sel.value == "3"){
                            var divA = document.getElementById("tipodoc");
                            var divB = document.getElementById("nrodoc");
                            divA.style.display="none";
                            divB.style.display="none";
                            $('#tipodocumento_id').val('8');
                            $('#victima_documento').val('Se desconoce');
                        }else if(sel.value == "6"){
                            var divA = document.getElementById("tipodoc");
                            var divB = document.getElementById("nrodoc");
                            divA.style.display="none";
                            divB.style.display="none";
                            $('#tipodocumento_id').val('7');
                            $('#victima_documento').val('No posee');
                        }else{
                            $('#tipodocumento_id').val('');
                            $('#victima_documento').val('');
                            document.getElementById("tipodoc").style.display="";
                            document.getElementById("nrodoc").style.display="";

                        }
                    }
                </script>   
            <!-- FIN CUARTA PREGUNTA -->

            <!-- QUINTA PREGUNTA -->
                <div class="form-group {{ $errors->has('tipodocumento_id') ? 'has-error' : ''}}" id="tipodoc">
                    <label for="">B 5. Tipo de documentación:</label>
                    <select class="form-control" id="tipodocumento_id" name="tipodocumento_id">
                        <option value="">Tipo de documento?</option>
                        @foreach ($datosTipoDocumento as $tipoDocumento)
                        	<option value="{{$tipoDocumento->getIdTipoDocumento()}}" {{ old('tipodocumento_id') == $tipoDocumento->getIdTipoDocumento() ? 'selected' : '' }}>{{$tipoDocumento->getNombreTipoDocumento()}}</option>
                        @endforeach
                   </select>
                  	{!! $errors->first('tipodocumento_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div class="residenciaPrecaria" style="display: none">
                        <label for="">B 5.I Estado de la residencia precaria</label>
                        <select class="form-control" id="residenciaprecaria_id" name="residenciaprecaria_id" class="form-control">
                            <option value="">Estado?</option>
                            @foreach ($datosResidencia as $residenciaprecaria)
                                <option value="{{$residenciaprecaria->getId()}}">{{$residenciaprecaria->getNombre()}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="tipoDocumentoOtro" style="display: none">
                        <label for="">Cual?</label>
                        <input name="victima_tipo_documento_otro"  id="victima_tipo_documento_otro" class="form-control" type="text">
                    </div>
                </div>
				{{-- funcion js para el, otro --}}
                {{-- <script>
					function selectOnChange2(sel) {
                        if (sel.value=="6"){
                            divC = document.getElementById("cual_b14");
                            divC.style.display = "";
                        }else{
                            divC = document.getElementById("cual_b14");
                            $('#residenciaprecaria_id').val('');
                            divC.style.display="none";
                        }

						if (sel.value=="9"){
							divC = document.getElementById("cual_b2");
							divC.style.display = "";
						}else{
							divC = document.getElementById("cual_b2");
							$('#victima_tipo_documento_otro').val('');
							divC.style.display="none";
						}
					}
		        </script> --}}
            <!-- FIN QUINTA PREGUNTA -->

			<!-- SEXTA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_documento') ? 'has-error' : ''}}" id="nrodoc">
                    <label for="">B 6. Nro Documento:</label>
                    <input type="text" class="form-control" name="victima_documento" placeholder="" id="victima_documento" value="{{old('victima_documento')}}">
                  	{!! $errors->first('victima_documento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo3" value="Se desconoce" onchange="check3(this)">
                </div>
                <script>
                    function check3(checkbox)
                    {
                        if (checkbox.checked)
                        {
                            $('#victima_documento').val('Se desconoce');
                            document.getElementById('victima_documento').setAttribute("readonly", "readonly");
                        }else
                            { 
                                $('#victima_documento').val('');
                                document.getElementById('victima_documento').removeAttribute("readonly");  
                            }
                    }
                </script>
            <!-- FIN SEXTA PREGUNTA -->

            <div class="form-group">
                <!-- {{-- PAISES --}} -->
                {{-- ver como hacer para los casos en que se desconozca --}}
                    <div {{ $errors->has('paisNacimiento') ? 'has-error' : ''}}>
                        <label for="countryId">B 7. País de Nacimiento: </label>
                        <select name="paisNacimiento" class="countries order-alpha form-control" id="countryId">
                            <option value="">Seleccioná pais de nacimiento</option>
                        </select>

                        <label for="desconocePaisNacimiento">Se desconoce</label>
                        <input type="checkbox" name="" id="desconocePaisNacimiento" value="Se desconoce"><br>
                    </div>
                    {!! $errors->first('paisNacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div {{ $errors->has('provinciaNacimiento') ? 'has-error' : ''}}>
                        <label for="stateId">B 8. Provincia de nacimiento: </label>
                        <select name="provinciaNacimiento" class="states order-alpha form-control" id="stateId">
                            <option value="">Seleccioná provincia de nacimiento</option>
                        </select>

                        <label for="desconoceProvinciaNacimiento">Se desconoce</label>
                        <input type="checkbox" name="" id="desconoceProvinciaNacimiento" value="Se desconoce"><br>
                    </div>
                    {!! $errors->first('provinciaNacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div {{ $errors->has('ciudadNacimiento') ? 'has-error' : ''}}>
                        <label for="cityId">B 9. Localidad de nacimiento: </label>
                        <select name="ciudadNacimiento" class="cities order-alpha form-control" id="cityId">
                            <option value="">Seleccioná ciudad de nacimiento</option>
                        </select>

                        <label for="desconoceCiudadNacimiento">Se desconoce</label>
                        <input type="checkbox" name="" id="desconoceCiudadNacimiento" value="Se desconoce"><br>
                    </div>
                    {!! $errors->first('ciudadNacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}
                <!-- {{-- FIN PAISES --}} -->
            </div>

            <!-- DECIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_fecha_nacimiento') ? 'has-error' : ''}}">
                    <label for="">B 10. Fecha de nacimiento: </label>
                    <input type="date" class="form-control" id="victima_fecha_nacimiento" name="victima_fecha_nacimiento" value="{{old('victima_fecha_nacimiento')}}" >
                  	{!! $errors->first('victima_fecha_nacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label for="bloqueo4" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo4" value="Se desconoce" onchange="check4(this)">
                </div>

                <script>
                    function check4(checkbox)
                    {
                        if (checkbox.checked)
                        {
                            $('#victima_fecha_nacimiento').val('1900-01-01');
                            document.getElementById('victima_fecha_nacimiento').setAttribute("readonly", "readonly");
                        }else
                            { 
                                $('#victima_fecha_nacimiento').val('');
                                document.getElementById('victima_fecha_nacimiento').removeAttribute("readonly");  
                            }
                    }
                </script> 
            <!-- FIN DECIMA PREGUNTA -->

            <!-- UNDECIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_edad') ? 'has-error' : ''}}">
                    <label for="victima_edad">B 11. Edad:</label>
                    <input name="victima_edad" value="{{old('victima_edad')}}" id="victima_edad" class="form-control" type="text" onchange="mostrarValor(this.value);">
                  	{!! $errors->first('victima_edad', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label class="form-check-label" for="victima_edad_desconoce">Se desconoce</label>
                    <input value="Se desconoce" id="victima_edad_desconoce" placeholder="" type="checkbox" onchange="check(this)">
                </div>

	       		 <!-- si clickeo el check de se desconoce automaticamente en la franja etaria ingresa el valor se desconoce y se bloquea el input text para asignar la edad -->
				<script type="text/javascript">
		            function check(checkbox) {
    		           if (checkbox.checked)
                        {
                            $('#victima_edad').val('Se desconoce');
                            $('#franjaetaria_id').val('7');
                            document.getElementById('victima_edad').setAttribute("readonly", "readonly");
    		            }
    		            else{ 
                            $('#victima_edad').val('');
                            $('#franjaetaria_id').val('');
                            document.getElementById('victima_edad').removeAttribute("readonly"); 
    		            }}
		        </script>
            <!-- FIN UNDECIMA PREGUNTA -->

            <!-- DUODECIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('franjaetaria_id') ? 'has-error' : ''}}">
                    <label for="">B 12. Franja Etaria</label>
                    <select name="franjaetaria_id" id="franjaetaria_id" class="form-control" value="">
                        <option value="">Franja Etaria</option>
                        @foreach ($datosFranjaEtaria as $franjaEtaria)
                        	<option value="{{$franjaEtaria->getIdFranja()}}" {{ old('franjaetaria_id') == $franjaEtaria->getIdFranja() ? 'selected' : '' }}>{{$franjaEtaria->getNombreFranja()}}</option>
                        @endforeach
                        <!-- no hago un array en este caso porque toma los valores una funcion de javascript -->
                    </select>
                    {!! $errors->first('franjaetaria_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
                <!-- de acuerdo al valor que se seleccione le asigno una franja etaria  -->
		        <script type="text/javascript">
		            var mostrarValor = function(x){
		            if(x<12){
		                document.getElementById('franjaetaria_id').value=1;
		            }
		            if(x>11){if(x<19){
		            	document.getElementById('franjaetaria_id').value=2;}
		            }

		            if(x>18){if(x<31){
		            	document.getElementById('franjaetaria_id').value=3;}
		            }

		            if(x>30){if(x<51){
		            	document.getElementById('franjaetaria_id').value=4;}
		            }

		            if(x>50){if(x<66){
		            	document.getElementById('franjaetaria_id').value=5;}
		            }

		            if(x>65){
		            	document.getElementById('franjaetaria_id').value=6;}
		            }
		        </script>
            <!-- FIN DUODECIMA PREGUNTA -->

	        <!-- DECIMATERCERA PREGUNTA -->
                <div class="form-group {{ $errors->has('embarazorelevamiento_id') ? 'has-error' : ''}}">
                    <label for="">B 13. Embarazo al momento del relevamiento:</label>
                    <select class="form-control" id="embarazorelevamiento_id" name="embarazorelevamiento_id">
                        <option value="">Está embarazada?</option>
                        @foreach ($datosEmbarazadaRelevamiento as $estaEmbarazada)
                        	<option value="{{$estaEmbarazada->getId()}}" {{ old('embarazorelevamiento_id') == $estaEmbarazada->getId() ? 'selected' : '' }}>{{$estaEmbarazada->getEmbarazada()}}</option>
                        @endforeach
                    </select>
                  	{!! $errors->first('embarazorelevamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
	        <!-- FIN DECIMATERCERA PREGUNTA -->

            <!-- DECIMACUARTA PREGUNTA -->
                <div class="form-group {{ $errors->has('embarazoprevio_id') ? 'has-error' : ''}}">
                    <label for="">B 14. ¿Estuvo embarazada previamente?:</label>
                    <select class="form-control" id="embarazoprevio_id" name="embarazoprevio_id">
                        <option value="">Estuvo embarazada?</option>
                        @foreach ($datosEmbarazoPrevio as $estuvoEmbarazada)
                        	<option value="{{$estuvoEmbarazada->getId()}}" {{ old('embarazoprevio_id') == $estuvoEmbarazada->getId() ? 'selected' : '' }}>{{$estuvoEmbarazada->getEmbarazoPrevio()}}</option>
                        @endforeach
                    </select>
                  	{!! $errors->first('embarazoprevio_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            <!-- FIN DECIMACUARTA PREGUNTA -->
			
			<!-- DECIMAQUINTA PREGUNTA -->
                <div class="form-group {{ $errors->has('hijosembarazo_id') ? 'has-error' : ''}}">
                    <label for="">B 15. ¿Tiene hijos de embarazos anteriores?:</label>
                    <select class="form-control" id="hijosembarazo_id" name="hijosembarazo_id">
                        <option value="">Posee hijos?</option>
                        @foreach ($datosHijos as $hijos)
                        	<option value="{{$hijos->getId()}}" {{ old('hijosembarazo_id') == $hijos->getId() ? 'selected' : '' }}>{{$hijos->getHijos()}}</option>
                        @endforeach
                    </select>
                  	{!! $errors->first('hijosembarazo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            <!-- FIN DECIMAQUINTA PREGUNTA -->

            <!-- DECIMASEXTA PREGUNTA -->
                <div class="form-group {{ $errors->has('bajoefecto_id') ? 'has-error' : ''}}">
                    <label for="">B 16. ¿Se encuentra bajo los efectos de alcohol o estupefacientes al momento del relevamiento?:</label>
                    <select class="form-control" name="bajoefecto_id">
                        <option value="">Se encuentra bajo efectos?</option>
                        @foreach ($datosBajoEfecto as $efectos)
                        	<option value="{{$efectos->getId()}}" {{ old('bajoefecto_id') == $efectos->getId() ? 'selected' : '' }}>{{$efectos->getBajoEfecto()}}</option>
                        @endforeach
                    </select>
                  	{!! $errors->first('bajoefecto_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            <!-- FIN DECIMASEXTA PREGUNTA -->

            <!-- DECIMASEPTIMA PREGUNTA -->
            	<!-- ver como hacer un array que me guarde en todas las victima_discapacidad[] los valores para cada datos -->
                <div class="form-group {{ $errors->has('discapacidad_id') ? 'has-error' : ''}}">
                    <label for="">B 17. ¿Presenta algún tipo de discapacidad?</label><br>
                    <label for="">En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
                    <div class="">
                        @foreach ($datosDiscapacidad as $discapacidad)
                            @if ($discapacidad->getDiscapacidad() === "No")
                                <label for="{{ $discapacidad->getDiscapacidad() }}" style="margin-left: 15px;" class="form-check-label">{{$discapacidad->getDiscapacidad()}}</label>
                                <input type="checkbox" value="{{$discapacidad->getId()}}" class="form-check-inline" name="discapacidad_id[]" id="{{ $discapacidad->getDiscapacidad() }}" onchange="check5(this)">
                                @elseif ($discapacidad->getDiscapacidad() === "Se desconoce")
                                    <label for="{{ $discapacidad->getDiscapacidad() }}" style="margin-left: 15px;" class="form-check-label">{{$discapacidad->getDiscapacidad()}}</label>
                                    <input type="checkbox" value="{{$discapacidad->getId()}}" class="form-check-inline" name="discapacidad_id[]" id="{{ $discapacidad->getDiscapacidad() }}" onchange="check6(this)">
                                    @else
                                        <label for="{{ $discapacidad->getDiscapacidad() }}" class=" form-check-inline form-check-label"> </label>{{$discapacidad->getDiscapacidad()}}</label>
                                        <input type="checkbox" value="{{$discapacidad->getId()}}" class="form-check-inline" id="{{ $discapacidad->getDiscapacidad() }}" name="discapacidad_id[]">
                            @endif  
                        @endforeach
                    </div>
                </div>
                {!! $errors->first('discapacidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                <script>
                    function check5(checkbox)
                    {

                        if (checkbox.checked) 
                            {
                                document.getElementById("Físico/Motriz").disabled = true;
                                document.getElementById("Físico/Motriz").checked = false;
                                document.getElementById("Intelectual/Adaptativo").disabled = true;
                                document.getElementById("Intelectual/Adaptativo").checked = false;
                                document.getElementById("Psíquica").disabled = true;
                                document.getElementById("Psíquica").checked = false;
                                document.getElementById("Sensorial").disabled = true;
                                document.getElementById("Sensorial").checked = false;
                                document.getElementById("Se desconoce").disabled = true;
                                document.getElementById("Se desconoce").checked = false;
                            }
                                else{
                                    document.getElementById('Físico/Motriz').disabled=false;
                                    document.getElementById('Intelectual/Adaptativo').disabled=false;
                                    document.getElementById('Psíquica').disabled=false;
                                    document.getElementById('Sensorial').disabled=false;
                                    document.getElementById('Se desconoce').disabled=false;
                                }
                    }
                    function check6(checkbox)
                    {

                        if (checkbox.checked) 
                            {
                                document.getElementById("Físico/Motriz").disabled = true;
                                document.getElementById("Físico/Motriz").checked = false;
                                document.getElementById("Intelectual/Adaptativo").disabled = true;
                                document.getElementById("Intelectual/Adaptativo").checked = false;
                                document.getElementById("Psíquica").disabled = true;
                                document.getElementById("Psíquica").checked = false;
                                document.getElementById("Sensorial").disabled = true;
                                document.getElementById("Sensorial").checked = false;
                                document.getElementById("No").disabled = true;
                                document.getElementById("No").checked = false;
                            }
                                else{
                                    document.getElementById('Físico/Motriz').disabled=false;
                                    document.getElementById('Intelectual/Adaptativo').disabled=false;
                                    document.getElementById('Psíquica').disabled=false;
                                    document.getElementById('Sensorial').disabled=false;
                                    document.getElementById('No').disabled=false;
                                }

                    }
                </script>
            <!-- FIN DECIMASEPTIMA PREGUNTA -->

            <!-- DECIMAOCTAVA PREGUNTA -->
                <div class="form-group {{ $errors->has('tienelesion_id') ? 'has-error' : ''}}">
                    <label for="">B 18. ¿Presenta lesiones físicas visibles?</label>
                    <select class="form-control selectTieneLesion" id="tienelesion_id" name="tienelesion_id">
                        <option value="">Presenta lesiones?</option>
                        @foreach ($datosLesion as $lesion)
                        	<option value="{{$lesion->getId()}}" {{ old('tienelesion_id') == $lesion->getId() ? 'selected' : '' }}>{{$lesion->getLesion()}}</option>
                        @endforeach
                    </select>
               		{!! $errors->first('tienelesion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div id="victima_lesion_si" style="display: none">
                        <div>
                            <label class="">B 18I. Tipo de lesión:</label>
                            <div class="">
                                <input name="victima_lesion" placeholder="" class="form-control victimaLesionInput" type="text">
                            </div>

                            <label for="">B 18II. ¿Fue constatado en el momento por algún profesional de la salud? :</label>
                            <div class="">
                                <select class="form-control selectLesionConstatada" name="lesionconstatada_id">
                                    <option value="">Fue constatada?</option>
			                        @foreach ($datosLesionConstatada as $constatada)
			                        	<option value="{{$constatada->getId()}}">{{$constatada->getLesionConstatada()}}</option>
			                        @endforeach
                                </select>
                                <div id="victima_lesion_organismo" style="display: none">
                                    <label class="">B 18III. ¿A qué organismo pertenece el profesional de la salud?:</label>
                                    <div class="">
                                        <input name="victima_lesion_organismo" placeholder="" class="form-control victimaLesionOrganismoInput" type="text">
                                    </div>
                                    <label for="desconoce">Se deconoce</label>
                                    <input type="checkbox" class="form-check-inline desconoce18" id="desconoce" name="">

                                    <script>
                                        var desconoce = document.querySelector('.desconoce18');
                                        var victimaLesionOrganismoInput = document.querySelector('.victimaLesionOrganismoInput');

                                        desconoce.addEventListener('click', function(){
                                            if (desconoce.checked) {
                                                victimaLesionOrganismoInput.value = 'Se deconoce';
                                                victimaLesionOrganismoInput.setAttribute('readonly', 'readonly');
                                            }else{
                                                victimaLesionOrganismoInput.value = '';
                                                victimaLesionOrganismoInput.removeAttribute('readonly');
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <script>
                    function selectOnChange10(sel) {
                        if (sel.value=="1"){
                            divC = document.getElementById("victima_lesion_si");
                            divC.style.display = "";
                        }else{
                            divC = document.getElementById("victima_lesion_si");
                            $('#victima_lesion').val('');
                            divC.style.display="none";
                        }
                    }

                    function selectOnChange15(sel) {
                        if (sel.value=="1"){
                            divC = document.getElementById("victima_lesion_organismo");
                            divC.style.display = "";
                        }else{
                            divC = document.getElementById("victima_lesion_organismo");
                            $('#victima_lesion_organismo').val('');
                            divC.style.display="none";
                        }
                    }
		        </script> --}}
            <!-- FIN DECIMAOCTAVA PREGUNTA -->

            <!-- DECIMANOVENA PREGUNTA -->
                <div class="form-group {{ $errors->has('enfermedadcronica_id') ? 'has-error' : ''}}">
                    <label class="">B 19. ¿Tiene enfermedades crónicas?</label>
                    <select class="form-control" id="enfermedadcronica_id" name="enfermedadcronica_id">
                        <option value="">Posee enfermedades?</option>
                        @foreach ($datoEnfermedadCronica as $enfermedad)
                        	<option value="{{$enfermedad->getId()}}" {{ old('enfermedadcronica_id') == $enfermedad->getId() ? 'selected' : '' }}>{{$enfermedad->getEnfermedadCronica()}}</option>
                        @endforeach
                    </select>
               		{!! $errors->first('enfermedadcronica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div class="" id="victima_tipo_enfermedad_cronica" style="display: none;">
                        <label class="">B 19I. Tipo de enfermedad crónica:</label>
                            <div class="">
                                <input name="victima_tipo_enfermedad_cronica" placeholder="" class="form-control victima_tipo_enfermedad_cronica_input" type="text">
                            </div>
                    </div>
                </div>
                {{-- <script>
		         function selectOnChange11(sel) {
		           if (sel.value=="1"){
		                divC = document.getElementById("victima_tipo_enfermedad_cronica");
		                divC.style.display = "";


		           }else{

		                divC = document.getElementById("victima_tipo_enfermedad_cronica");
		                $('#victima_tipo_enfermedad').val('');
		                divC.style.display="none";


		           }

		         }
		        </script> --}}
            <!-- FIN DECIMANOVENA PREGUNTA -->

			<!-- VIGESIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('limitacion_id') ? 'has-error' : ''}}">
                    <label>B 20. ¿Presenta algún tipo de limitación para comunicarse? </label><br>
                    <label class="" >En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
                    <div>
                        @foreach ($datosLimitacion as $limitacion)
                            @if ($limitacion->getLimitacion() === "Otro")
                                <label for="" class="form-check-label" style="margin-left: 15px; padding-right: 0px; ">{{$limitacion->getLimitacion()}}</label>
                                <input type="checkbox" class="form-check-inline checkOtro" name="limitacion_id[]" value="{{$limitacion->getId()}}">
                            @elseif ($limitacion->getLimitacion() === "No") 
                                <label for=""  class="form-check-label" style="margin-left: 15px; padding-right: 0px; ">{{$limitacion->getLimitacion()}}</label>
                                <input type="checkbox" class="form-check-inline checkNo" value="{{$limitacion->getId()}}" name="limitacion_id[]">
                            @else
                                <label for="" class="form-check-inline form-check-label" style="margin-left: 15px; margin-right: 0px;">{{$limitacion->getLimitacion()}}</label>
                                <input type="checkbox" class="form-check-inline" value="{{$limitacion->getId()}}" id="{{ $limitacion->getLimitacion() }}" name="limitacion_id[]">
                            @endif
                        @endforeach
                    </div>
                        <!-- si checkeo el checkbox otro tomo el id checkeado y uso la funcion muestroCual -->
                        {{-- <input type="checkbox" class="form-check-label" id="checkeado"  onclick="muestroCual()" name="limitacion_id[]" value="Otro">
                        <label for="">Otro</label><br> --}}
                        <!-- mostrando lo que contiene el id cual -->
                        <div id="victimaLimitacionCual" style="display:none">
                            <label for="">Cual?</label>
                            <input type="text" class="form-control victimaLimitacionCualInput" name="victima_limitacion_otra" value="">
                        </div>
                </div>
               	{!! $errors->first('limitacion_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                <!-- VER ESTA MANERA TERMINA ACA -->
                <script>
		            // function muestroCual() {
		            //     var checkBox = document.getElementById("checkeado");
		            //     var text = document.getElementById("cual");
		            //     if (checkBox.checked == true){
		            //         text.style.display = "block";
		            //     } else {
		            //        text.style.display = "none";
		            //     }
		            // }

                    // function check7(checkbox)
                    // {

                    //     if (checkbox.checked) 
                    //         {
                    //             document.getElementById("Analfabetismo").disabled = true;
                    //             document.getElementById("Analfabetismo").checked = false;
                    //             document.getElementById("Discapacidad").disabled = true;                                
                    //             document.getElementById("Discapacidad").checked = false;                                
                    //             document.getElementById("Idioma").disabled = true;
                    //             document.getElementById("Idioma").checked = false;
                    //             document.getElementById("checkeado").disabled = true;
                    //             document.getElementById("checkeado").checked = false;
                    //         }
                    //         else{
                    //                 document.getElementById("Analfabetismo").disabled = false;
                    //                 document.getElementById("Discapacidad").disabled = false;
                    //                 document.getElementById("Idioma").disabled = false;
                    //                 document.getElementById("checkeado").disabled = false;
                    //         }

                    // }
		        </script>
            <!-- FIN VIGESIMA PREGUNTA -->

            <!-- VIGESIMAPRIMERA PREGUNTA -->
                <div class="form-group {{ $errors->has('niveleducativo_id') ? 'has-error' : ''}}">
                    <label for="">B 21. Máximo nivel educativo alcanzado:</label>
                    <select class="form-control" name="niveleducativo_id">
                        <option value="">Seleccioná el nivel de educación</option>
                        @foreach ($datosNivelEducativo as $educacion)
                        	<option value="{{$educacion->getId()}}" {{ old('niveleducativo_id') == $educacion->getId() ? 'selected' : '' }}>{{$educacion->getNivelEducativo()}}</option>
                        @endforeach
                    </select>
               		{!! $errors->first('niveleducativo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>
            <!-- FIN VIGESIMAPRIMERA PREGUNTA -->

            <!-- VIGESIMASEGUNDA PREGUNTA -->
                <div class="form-group {{ $errors->has('oficio_id') ? 'has-error' : ''}}">
                    <label for="">B 22. ¿Cuenta con algún oficio adquirido o de interés?: </label>
                    <select class="form-control oficio" name="oficio_id">
                        <option value="">Posee oficio?</option>
                        @foreach ($datosOficio as $oficio)
                        	<option value="{{$oficio->getId()}}" {{ old('oficio_id') == $oficio->getId() ? 'selected' : '' }}>{{$oficio->getOficio()}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('oficio_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div class="victimaOficioCual" style="display: none">
                        <label for="">Cual?</label>
                        <input name="victima_oficio_cual" placeholder="" class="form-control victimaOficioCualInput" type="text">
                    </div>
                </div>
		        <script>
		             // function selectOnChange13(sel) {
		             //   if (sel.value=="1"){
		             //        divC = document.getElementById("cual_b13");
		             //        divC.style.display = "";
		             //   }else{

		             //        divC = document.getElementById("cual_b13");
		             //        $('#cual').val('');
		             //        divC.style.display="none";
		             //   }
		             // }
		        </script>
            <!-- FIN VIGESIMASEGUNDA PREGUNTA -->

			<button type="submit" class="btn btn-primary col-xl btnEnviar" name="button">Guardar</button>

		</form>

	</section>
    <script src="/js/formularioB.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="/js/paises3.js" type="text/javascript" charset="utf-8" async defer></script>

    <script>
        //guardar lat y long funcionando
            var btnEnviar = document.querySelector('.btnEnviar');
            var formulario = document.querySelector('.formulario');

            console.log(formulario);

            // btnEnviar.addEventListener('submit', function(){
            formulario.addEventListener('submit', function(){
                // event.preventDefault()
                // var formulario = document.querySelector('.formulario');

                arrayForm = formulario.elements;

                // console.log(arrayForm.ciudadNacimiento.value);

                // var campos ={
                //  bformulario_id: arrayForm.bformulario_id.value = element.bformulario_id,
                //  lat: arrayForm.lat.value = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude,
                //  long: arrayForm.long.value = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude,
                // }
                // console.log(arrayForm.paisNacimiento.value !== 'Se desconoce');

                if ((arrayForm.paisNacimiento.value !== 'Se desconoce' && arrayForm.paisNacimiento.value !== null) || (arrayForm.provinciaNacimiento.value !== 'Se desconoce' && arrayForm.provinciaNacimiento.value !== null) || (arrayForm.ciudadNacimiento.value !== 'Se desconoce' && arrayForm.ciudadNacimiento.value !== null)) {
                    var paisNacimiento = arrayForm.paisNacimiento.value;
                    var provinciaNacimiento = arrayForm.provinciaNacimiento.value;
                    var ciudadNacimiento = arrayForm.ciudadNacimiento.value;
                    event.preventDefault()

                    console.log(ciudadNacimiento+', '+provinciaNacimiento+', '+paisNacimiento);
                    $.ajax({
                        url: 'https://geocoder.api.here.com/6.2/geocode.json',
                        type: 'GET',
                        dataType: 'jsonp',
                        // headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        jsonp: 'jsoncallback',
                        data: {
                            searchtext: ciudadNacimiento+', '+provinciaNacimiento+', '+paisNacimiento,
                            app_id: 'HkqpXchCOv6VUYhLEIEz',
                            app_code: 'zl9UxG6jltjRVgHk4SqEaA',
                            gen: '1'
                        },
                        success: function (data) {
                            // console.log(JSON.stringify(data));
                            
                            // individuales.lat = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
                            // individuales.long = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude;


                            var campos ={
                                lat: data.Response.View[0].Result[0].Location.DisplayPosition.Latitude,
                                long: data.Response.View[0].Result[0].Location.DisplayPosition.Longitude,
                                count: 1,
                                user_id: {{ $userId }}
                            }

                            console.log(JSON.stringify(campos));
                            var camposJSON = JSON.stringify(campos)

                            // var datosDelFormulario = new FormData();

                            // datosDelFormulario.append('datos', JSON.stringify(campos));
                            // console.log(datosDelFormulario);

                            fetch("/mapas", {
                                method: 'POST',
                                body: camposJSON,
                                // body: camposJSON,
                                headers:{
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            })

                            .then(function (response) {
                                return response.text();
                            })
                            .then(function (data) {
                                // var prueba = $(".prueba");
                                console.log(data);

                                // formulario.append('<div>'
                                //  + '<p>Latitud' + data.Response.View[0].Result[0].Location.DisplayPosition.Latitude + ' Longitud '+data.Response.View[0].Result[0].Location.DisplayPosition.Longitude+'</p>'
                                //  + '</div>'
                                // );
                            })
                            .catch(function (error) {
                                console.log("The error was: " + error);
                            })

                            // markers.push(individuales)
                            


                            // console.log(markers.length);
                        }
                    });
                }

                window.setTimeout(function(){formulario.submit()}, 2000)
            });

            // btnEnviar.addEventListener('click', function(){
                
            // });
        //fin
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