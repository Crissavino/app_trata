<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Eje B: Caracterización de la victima</title>
</head>
<header>
	<ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link active" href="B">Eje B: Caracterización de la victima</a> </li>
        <li class="nav-item"> <a class="nav-link " href="C">Eje C: Grupo Conviviente</a> </li>
        <li class="nav-item"> <a class="nav-link " href="D">Eje D: Datos de delito</a> </li>
        <li class="nav-item"> <a class="nav-link " href="E">Eje E: Datos del imputado</a> </li>
        <li class="nav-item"> <a class="nav-link " href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link " href="G">Eje G: Documentación</a> </li>
	</ul>
</header>
<body>

	<h1 class="text-center" style="padding: 15px;">Eje B: Caracterización de la victima</h1>

	<section class="container">	

        <form class="" action="" method="post">
        	{{-- inicio esta proteccion contra datos maliciosso --}}
        	{{ csrf_field() }}
        	
            <!-- PRIMERA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_nombre_y_apellido') ? 'has-error' : ''}}">
                    <label for="">B 1. Nombre y apellido:</label>
                    <input type="text" class="form-control" name="victima_nombre_y_apellido" id="victima_nombre_y_apellido" value="{{old('victima_nombre_y_apellido')}}">
                    {!! $errors->first('victima_nombre_y_apellido', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <!-- VER ESTA MANERA QUE ES MEJOR PARA BLOQUEAR UN CASILLERO CUANDO SE CLICKEA LA OPCION SE DESCONOCE -->
                    <label for="bloqueo1" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo1" name="victima_nombre_y_apellido_desconoce" value="Se desconoce" onchange="check1(this)">
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
                    <input type="checkbox" id="bloqueo2" name="victima_apodo_desconoce" value="Se desconoce" onchange="check2(this)">
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
                        if (sel.value == "3" || sel.value == "6"){
                            divA = document.getElementById("tipodoc");
                            divB = document.getElementById("nrodoc");
                            divA.style.display="none";
                            divB.style.display="none";
                            $('#tipodocumento_id').val('7');
                            $('#victima_documento').val('No posee / Se desconoce');
                        }else{
                            $('#tipodocumento_id').val('');
                            $('#victima_documento').val('');
                            divA.style.display="";
                            divB.style.display="";

                        }
                    }
                </script>   
            <!-- FIN CUARTA PREGUNTA -->

            <!-- QUINTA PREGUNTA -->
                <div class="form-group {{ $errors->has('tipodocumento_id') ? 'has-error' : ''}}" id="tipodoc">
                    <label for="">B 5. Tipo de documentación:</label>
                    <select class="form-control" id="tipodocumento_id" name="tipodocumento_id" onChange="selectOnChange2(this)">
                        <option value="">Seleccioná el tipo de documento</option>
                        @foreach ($datosTipoDocumento as $tipoDocumento)
                        	<option value="{{$tipoDocumento->getIdTipoDocumento()}}" {{ old('tipodocumento_id') == $tipoDocumento->getIdTipoDocumento() ? 'selected' : '' }}>{{$tipoDocumento->getNombreTipoDocumento()}}</option>
                        @endforeach
                   </select>
                  	{!! $errors->first('tipodocumento_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <div id="cual_b14" style="display: none">
                        <label for="">B 5.I Estado de la residencia precaria</label>
                        <select class="form-control" id="residenciaprecaria_id" name="residenciaprecaria_id" class="form-control">
                            <option value="">Estado?</option>
                            @foreach ($datosResidencia as $residenciaprecaria)
                                <option value="{{$residenciaprecaria->getId()}}">{{$residenciaprecaria->getNombre()}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="cual_b2" style="display: none">
                        <label for="">Cual?</label>
                        <div class="">
                             <input name="victima_tipo_documento_otro"  id="victima_tipo_documento_otro" class="form-control" type="text" onclick="cual_b5()">
                        </div>
                    </div>
                </div>
				{{-- funcion js para el, otro --}}
                <script>
					function selectOnChange2(sel) {
                        if (sel.value=="6"){
                            divC = document.getElementById("cual_b14");
                            divC.style.display = "";
                        }else{
                            divC = document.getElementById("cual_b14");
                            $('#residenciaprecaria_id').val('');
                            divC.style.display="none";
                        }

						if (sel.value=="8"){
							divC = document.getElementById("cual_b2");
							divC.style.display = "";
						}else{
							divC = document.getElementById("cual_b2");
							$('#victima_tipo_documento_otro').val('');
							divC.style.display="none";
						}
					}
		        </script>
            <!-- FIN QUINTA PREGUNTA -->

			<!-- SEXTA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_documento') ? 'has-error' : ''}}" id="nrodoc">
                    <label for="">B 6. Nro Documento:</label>
                    <input type="text" class="form-control" name="victima_documento" placeholder="" id="victima_documento" value="{{old('victima_documento')}}">
                  	{!! $errors->first('victima_documento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo3" name="victima_documento_se_desconoce" value="Se desconoce" onchange="check3(this)">
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

            <!-- SEPTIMA PREGUNTA -->
				<div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
                    <label for="">B 7. País de Nacimiento: </label>
                    <select id="pais_id" class="form-control" name="pais_id" onChange="selectOnChange3(this)">
						<option value="">Elegí País</option>
							@foreach ($datosPaises as $pais)
    						  <option value="{{$pais->getIdPais()}}" {{ old('pais_id') == $pais->getIdPais() ? 'selected' : '' }}>{{$pais->getNombrePais()}}</option>
    						@endforeach
                    </select>
                  	{!! $errors->first('pais_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <label for="bloqueo8" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo8" name="pais_desconoce" value="Se desconoce" onchange="check8(this)">
                </div>

                {{-- funcion js para cuando se seleccione Pais->aparezcan las Provincias --}}
		        <script>
					function selectOnChange3(sel) {
						if (sel.value=="7"){
                            divC = document.getElementById("provinciasARG");
						    divB = document.getElementById("localidadAR");
                            divC.style.display = "";
						    divB.style.display = "";
						}else{
                            divC = document.getElementById("provinciasARG");
						    divB = document.getElementById("provinciasARG");
						    $('#victima_provincia').val('');
                            divB.style.display = "none";
						    divC.style.display="none";
						}

                        if (sel.value=="185"){
                            divC = document.getElementById("provinciasUR");
                            divC.style.display = "";
                        }else{
                            divC = document.getElementById("provinciasUR");
                            $('#victima_provincia').val('');
                            divC.style.display="none";
                        }

						if (sel.value=="24") {
						   divC = document.getElementById("provinciasBR");
						   divC.style.display = "";
						}else{
						    divC = document.getElementById("provinciasBR");
						    $('#victima_provincia').val('');
						    divC.style.display="none";
						}

                        if (sel.value=="35") {
                           divC = document.getElementById("provinciasCH");
                           divC.style.display = "";
                        }else{
                            divC = document.getElementById("provinciasCH");
                            $('#victima_provincia').val('');
                            divC.style.display="none";
                        }
					}
                    function check8(checkbox)
                    {
                        if (checkbox.checked)
                        {
                            $('#pais_id').val('194');
                            document.getElementById('pais_id').setAttribute("readonly", "readonly");
                        }else
                            { 
                                $('#pais_id').val('');
                                document.getElementById('pais_id').removeAttribute("readonly");  
                            }
                    }
		        </script>
                <!-- si selecciono Argentina aparece un select para todas las provincias de argentina -->
            <!-- FIN SEPTIMA PREGUNTA -->


            <!-- OCTAVA PREGUNTA -->
                {{-- PROVINCIAS DE ARGENTINA --}}
                    <div class="form-group" id="provinciasARG">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" id="argprovincia_id" name="argprovincia_id">
                           	<option value="">Elegí Provincia</option>
    							@foreach ($datosArgProvincias as $provinciaARG)
                           			<option value="{{$provinciaARG->getIdProvincia()}}" {{ old('argprovincia_id') == $provinciaARG->getIdProvincia() ? 'selected' : '' }}>{{$provinciaARG->getNombreProvincia()}}</option>
                           		@endforeach
                        </select>
                        <label for="bloqueo9" class="form-check-label">Se desconoce</label>
                        <input type="checkbox" id="bloqueo9" name="provinciasARG_desconoce" value="Se desconoce" onchange="check9(this)">
                    </div>
                    <script>
                        function check9(checkbox)
                        {
                            if (checkbox.checked)
                            {
                                $('#argprovincia_id').val('26');
                                document.getElementById('argprovincia_id').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#argprovincia_id').val('');
                                    document.getElementById('argprovincia_id').removeAttribute("readonly");  
                                }
                        }
                    </script>
                {{-- PROVINCIAS DE BRASIL --}}
                    <div class="form-group" id="provinciasBR" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" id="brestado_id" name="brestado_id">
                           	<option value="">Elegí Provincia</option>
                           	@foreach ($datosBrEstados as $estadoBR)
                           		<option value="{{$estadoBR->getIdEstado()}}" {{ old('brestado_id') == $estadoBR->getIdEstado() ? 'selected' : '' }}>{{$estadoBR->getNombreEstado()}}</option>
                           	@endforeach
                        </select>
                        <label for="bloqueo10" class="form-check-label">Se desconoce</label>
                        <input type="checkbox" id="bloqueo10" name="provinciasBR_desconoce" value="Se desconoce" onchange="check10(this)">
                    </div>
                    <script>
                        function check10(checkbox)
                        {
                            if (checkbox.checked)
                            {
                                $('#brestado_id').val('28');
                                document.getElementById('brestado_id').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#brestado_id').val('');
                                    document.getElementById('brestado_id').removeAttribute("readonly");  
                                }
                        }
                    </script>
                {{-- PROVINCIAS URUGUAY --}}
                    <div class="form-group" id="provinciasUR" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" id="urprovincia_id" name="urprovincia_id">
                            <option value="">Elegí Provincia</option>
                                @foreach ($datosUrProvincias as $provinciaUR)
                                    <option value="{{$provinciaUR->getIdProvincia()}}" {{ old('urprovincia_id') == $provinciaUR->getIdProvincia() ? 'selected' : '' }}>{{$provinciaUR->getNombreProvincia()}}</option>
                                @endforeach
                        </select>
                        <label for="bloqueo11" class="form-check-label">Se desconoce</label>
                        <input type="checkbox" id="bloqueo11" name="provinciasUR_desconoce" value="Se desconoce" onchange="check11(this)">
                    </div>
                    <script>
                        function check11(checkbox)
                        {
                            if (checkbox.checked)
                            {
                                $('#urprovincia_id').val('20');
                                document.getElementById('urprovincia_id').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#urprovincia_id').val('');
                                    document.getElementById('urprovincia_id').removeAttribute("readonly");  
                                }
                        }
                    </script>
                {{-- PROVINCIAS CHILE --}}
                    <div class="form-group" id="provinciasCH" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" id="chprovincia_id" name="chprovincia_id">
                            <option value="">Elegí Provincia</option>
                                @foreach ($datosChProvincias as $provinciasCH)
                                    <option value="{{$provinciasCH->getIdProvincia()}}" {{ old('chprovincia_id') == $provinciasCH->getIdProvincia() ? 'selected' : '' }}>{{$provinciasCH->getNombreProvincia()}}</option>
                                @endforeach
                        </select>
                        <label for="bloqueo12" class="form-check-label">Se desconoce</label>
                        <input type="checkbox" id="bloqueo12" name="provinciasCH_desconoce" value="Se desconoce" onchange="check12(this)">
                    </div>
                    <script>
                        function check12(checkbox)
                        {
                            if (checkbox.checked)
                            {
                                $('#chprovincia_id').val('55');
                                document.getElementById('chprovincia_id').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#chprovincia_id').val('');
                                    document.getElementById('chprovincia_id').removeAttribute("readonly");  
                                }
                        }
                    </script>
                {{-- PROVINCIAS PERU --}}
                    {{-- <div class="form-group" id="brestado_id" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" name="brestado_id">
                            <option value="">Elegí Provincia</option>
                            @foreach ($datosBrEstados as $estadoBR)
                                <option value="{{$estadoBR->getIdEstado()}}" {{ old('brestado_id') == $estadoBR->getIdEstado() ? 'selected' : '' }}>{{$estadoBR->getNombreEstado()}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                {{-- PROVINCIAS PARAGUAY --}}
                    {{-- <div class="form-group" id="brestado_id" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" name="brestado_id">
                            <option value="">Elegí Provincia</option>
                            @foreach ($datosBrEstados as $estadoBR)
                                <option value="{{$estadoBR->getIdEstado()}}" {{ old('brestado_id') == $estadoBR->getIdEstado() ? 'selected' : '' }}>{{$estadoBR->getNombreEstado()}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                {{-- PROVINCIAS BOLIVIA --}}
                    {{-- <div class="form-group" id="brestado_id" style="display: none">
                        <label for="">B 8. Provincia de nacimiento: </label>
                        <select class="form-control" name="brestado_id">
                            <option value="">Elegí Provincia</option>
                            @foreach ($datosBrEstados as $estadoBR)
                                <option value="{{$estadoBR->getIdEstado()}}" {{ old('brestado_id') == $estadoBR->getIdEstado() ? 'selected' : '' }}>{{$estadoBR->getNombreEstado()}}</option>
                            @endforeach
                        </select>
                    </div> --}}
            <!-- FIN OCTAVA PREGUNTA -->

            <!-- de acuerdo a la provincia que seleccione me deberian aparecer las localidades de las mismas -->
            <!-- deberian de cargarse a mano con un input text las localidades, en caso de no gustar hacer un array de las localidades de cada provincia, es la mejor manera pero llevaria mucho tiempo -->
            <!-- NOVENA PREGUNTA -->
                {{-- LOCALIDADES ARG --}}
                    <div class="form-group" id="localidadAR" style="display: none">
                        <label for="">B 9. Localidad de nacimiento: </label>
                        <select class="form-control" name="localidadAR_id" id="localidadAR_id">
                            <option value="">Elegí localidad</option>
                            @foreach ($datosArgCiudades as $ciudadesAR)
                                <option value="{{$ciudadesAR->getIdCiudad()}}" {{ old('localidadAR_id') == $ciudadesAR->getIdCiudad() ? 'selected' : '' }}>{{$ciudadesAR->getNombreCiudad()}}</option>
                            @endforeach
                        </select>
                        <label for="bloqueo16" class="form-check-label">Se desconoce</label>
                        <input type="checkbox" id="bloqueo16" name="localidadAR_desconoce" value="Se desconoce" onchange="check16(this)">
                    </div>
                    <script>
                        function check16(checkbox)
                        {
                            if (checkbox.checked)
                            {
                                $('#localidadAR_id').val('2382');
                                document.getElementById('localidadAR_id').setAttribute("readonly", "readonly");
                            }else
                                { 
                                    $('#localidadAR_id').val('');
                                    document.getElementById('localidadAR_id').removeAttribute("readonly");  
                                }
                        }
                    </script>
            <!-- FIN NOVENA PREGUNTA -->

            <!-- DECIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('victima_fecha_nacimiento') ? 'has-error' : ''}}">
                    <label for="">B 10. Fecha de nacimiento: </label>
                    <input type="date" class="form-control" id="victima_fecha_nacimiento" name="victima_fecha_nacimiento" value="{{old('victima_fecha_nacimiento')}}" >
                  	{!! $errors->first('victima_fecha_nacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}

                    <label for="bloqueo4" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo4" name="victima_fecha_nacimiento_desconoce" value="Se desconoce" onchange="check4(this)">
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
                    <input name="victima_edad_desconoce" value="Se desconoce" id="victima_edad_desconoce" placeholder="" type="checkbox" onchange="check(this)">
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
                                document.getElementById("Intelectual/Adaptativo").disabled = true;
                                document.getElementById("Psíquica").disabled = true;
                                document.getElementById("Sensorial").disabled = true;
                                document.getElementById("Se desconoce").disabled = true;
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
                                document.getElementById("Intelectual/Adaptativo").disabled = true;
                                document.getElementById("Psíquica").disabled = true;
                                document.getElementById("Sensorial").disabled = true;
                                document.getElementById("No").disabled = true;
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
                    <select class="form-control" id="tienelesion_id" name="tienelesion_id" onChange="selectOnChange10(this)">
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
                                <input name="victima_lesion" placeholder="" class="form-control" type="text">
                            </div>

                            <label for="">B 18II. ¿Fue constatado en el momento por algún profesional de la salud? :</label>
                            <div class="">
                                <select class="form-control" name="lesionconstatada_id" onChange="selectOnChange15(this)">
                                    <option value="">Fue constatada?</option>
			                        @foreach ($datosLesionConstatada as $constatada)
			                        	<option value="{{$constatada->getId()}}">{{$constatada->getLesionConstatada()}}</option>
			                        @endforeach
                                </select>
                                <div id="victima_lesion_organismo" style="display: none">
                                    <label class="">B 18III. ¿A qué organismo pertenece el profesional de la salud?:</label>
                                    <div class="">
                                        <input name="victima_lesion_organismo" placeholder="" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
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
		        </script>
            <!-- FIN DECIMAOCTAVA PREGUNTA -->

            <!-- DECIMANOVENA PREGUNTA -->
                <div class="form-group {{ $errors->has('enfermedadcronica_id') ? 'has-error' : ''}}">
                    <label class="">B 19. ¿Tiene enfermedades crónicas?</label>
                    <select class="form-control" id="enfermedadcronica_id" name="enfermedadcronica_id" onChange="selectOnChange11(this)">
                        <option value="">Posee enfermedades?</option>
                        @foreach ($datoEnfermedadCronica as $enfermedad)
                        	<option value="{{$enfermedad->getId()}}" {{ old('enfermedadcronica_id') == $enfermedad->getId() ? 'selected' : '' }}>{{$enfermedad->getEnfermedadCronica()}}</option>
                        @endforeach
                    </select>
               		{!! $errors->first('enfermedadcronica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    <div class="" id="victima_tipo_enfermedad_cronica" style="display: none;">
                        <label class="">B 19I. Tipo de enfermedad crónica:</label>
                            <div class="">
                                <input name="victima_tipo_enfermedad_cronica" placeholder="" class="form-control" type="text">
                            </div>
                    </div>
                </div>
                <script>
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
		        </script>
            <!-- FIN DECIMANOVENA PREGUNTA -->

			<!-- VIGESIMA PREGUNTA -->
                <div class="form-group {{ $errors->has('limitacion_id') ? 'has-error' : ''}}">
                    <label>B 20. ¿Presenta algún tipo de limitación para comunicarse? </label><br>
                    <label class="" >En caso de requerir, tildar todas las opciones que considere correspondientes.</label><br>
                    <div>
                        @foreach ($datosLimitacion as $limitacion)
                            @if ($limitacion->getLimitacion() === "Otro")
                                <label for="" class="form-check-label" style="margin-left: 15px; padding-right: 0px; ">{{$limitacion->getLimitacion()}}</label>
                                <input type="checkbox" class="form-check-inline" id="checkeado"  onclick="muestroCual()" name="limitacion_id[]" value="{{$limitacion->getId()}}">
                                @elseif ($limitacion->getLimitacion() === "No") 
                                    <label for=""  class="form-check-label" style="margin-left: 15px; padding-right: 0px; ">{{$limitacion->getLimitacion()}}</label>
                                    <input type="checkbox" class="form-check-inline" value="{{$limitacion->getId()}}" name="limitacion_id[]" onchange="check7(this)">
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
                        <div id="cual" style="display:none">
                            <label for="">Cual?</label>
                            <input type="text" class="form-control" name="victima_limitacion_otra" value="">
                        </div>
                </div>
               	{!! $errors->first('limitacion_id', '<p class="help-block" style="color:red";>:message</p>') !!}

                <!-- VER ESTA MANERA TERMINA ACA -->
                <script>
		            function muestroCual() {
		                var checkBox = document.getElementById("checkeado");
		                var text = document.getElementById("cual");
		                if (checkBox.checked == true){
		                    text.style.display = "block";
		                } else {
		                   text.style.display = "none";
		                }
		            }

                    function check7(checkbox)
                    {

                        if (checkbox.checked) 
                            {
                                document.getElementById("Analfabetismo").disabled = true;
                                document.getElementById("Discapacidad").disabled = true;                                
                                document.getElementById("Idioma").disabled = true;
                                document.getElementById("checkeado").disabled = true;
                            }
                            else{
                                    document.getElementById("Analfabetismo").disabled = false;
                                    document.getElementById("Discapacidad").disabled = false;
                                    document.getElementById("Idioma").disabled = false;
                                    document.getElementById("checkeado").disabled = false;
                            }

                    }
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
                    <select class="form-control" id="oficio_id" name="oficio_id" onChange="selectOnChange13(this)">
                        <option value="">Posee oficio?</option>
                        @foreach ($datosOficio as $oficio)
                        	<option value="{{$oficio->getId()}}" {{ old('oficio_id') == $oficio->getId() ? 'selected' : '' }}>{{$oficio->getOficio()}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('oficio_id', '<p class="help-block" style="color:red";>:message</p>') !!}


                    <div id="cual_b13" style="display: none">
                        <label for="">Cual?</label>
                        <div class="">
                             <input name="victima_oficio_cual"  id="" placeholder="" class="form-control" type="text" onclick="cual_b5()">
                        </div>
                    </div>
                </div>
		        <script>
		             function selectOnChange13(sel) {
		               if (sel.value=="1"){
		                    divC = document.getElementById("cual_b13");
		                    divC.style.display = "";
		               }else{

		                    divC = document.getElementById("cual_b13");
		                    $('#cual').val('');
		                    divC.style.display="none";
		               }
		             }
		        </script>
            <!-- FIN VIGESIMASEGUNDA PREGUNTA -->

			<button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button>

		</form>

	</section>
	
</body>
</html>