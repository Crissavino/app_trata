<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Formulario B</title>
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

	<h1 class="text-center" style="padding: 15px;">Formulario B</h1>

	<section class="container">
		
		<h2>B) Caracterización de la víctima ESTE</h2>
				
            <form class="" action="{{$Bformulario->id}}" method="post">
            	{{-- inicio esta proteccion contra datos maliciosso --}}
            	{{ csrf_field() }}
            	@method('PUT')
                <!-- PRIMERA PREGUNTA -->
                
	                <div class="form-group {{ $errors->has('victima_nombre_y_apellido') ? 'has-error' : ''}}">
	                    <label for="">B 1. Nombre y apellido:</label>
	                    <input type="text" class="form-control" name="victima_nombre_y_apellido" id="victima_nombre_y_apellido" value="{{ $Bformulario->victima_nombre_y_apellido }}">
	                    {!! $errors->first('victima_nombre_y_apellido', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <!-- VER ESTA MANERA QUE ES MEJOR PARA BLOQUEAR UN CASILLERO CUANDO SE CLICKEA LA OPCION SE DESCONOCE -->
	                    <label for="bloqueo1" class="form-check-label">Se desconoce</label>
	                    {{-- tengo que ver como persistir los checkbox, como hace para que aparezcan checkeados --}}
	                    <input type="checkbox" id="bloqueo1" name="victima_nombre_y_apellido_desconoce" value="{{ $Bformulario->victima_nombre_y_apellido_desconoce }}">
	                </div>
					{{-- funcion js para el, se desconoce --}}
					<script>
	            		document.getElementById('bloqueo1').onchange = function() {
	                	document.getElementById('victima_nombre_y_apellido').disabled = this.checked;
	           			 };
	        		</script>
                <!-- FIN PRIMERA PREGUNTA -->

        		<!-- SEGUNDA PREGUNTA -->
	                <div class="form-group {{ $errors->has('victima_apodo') ? 'has-error' : ''}}">
	                    <label for="victima_apodo">B 2. Apodo:</label>
	                    <input type="text" name="victima_apodo" class="form-control" id="victima_apodo" value="{{ $Bformulario->victima_apodo }}">
	                  	{!! $errors->first('victima_apodo', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <label for="bloqueo2" class="form-check-label">Se desconoce</label>
	                    <input type="checkbox" id="bloqueo2" name="victima_apodo_desconoce" value="{{ $Bformulario->victima_apodo_desconoce}}">
	                </div>
					{{-- funcion js para el, se desconoce --}}
	                <script>
					    document.getElementById('bloqueo2').onchange = function() {
					    document.getElementById('victima_apodo').disabled = this.checked;
						};
					</script>
                <!-- FIN SEGUNDA PREGUNTA -->

				<!-- TERCERA PREGUNTA -->
	                <div class="form-group {{ $errors->has('genero_id') ? 'has-error' : ''}}">
	                    <label for="">B 3. Género:</label>
	                    <select class="form-control" name="genero_id" onChange="selectOnChange1(this)">
	                     <!-- traigo la table genero de la base de datos, muestro su nombre y como value tomo el id que se corresponde con el nombre -->
	                    @foreach ($datosGenero as $genero)
	                    	@php
								$selected = ($genero->id == $Bformulario->genero_id) ? 'selected' : '';
							@endphp
							<option value=" {{$genero->id}}" {{ $selected }}>{{$genero->nombre}}</option>
						@endforeach
	                    </select>
	                    
	                  	{!! $errors->first('genero_id', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <!-- cuando se seleccione la opcion Otro se muestre esto -> Cual? -->
	                    <div id="cual_b3" style="display: none;">
	                        <label for="">Cuál?</label>
	                        <div class="">
	                            <input class="form-control" name="victima_genero_otro" id="victima_genero_otro" placeholder="" class="" type="text" onclick="cual_b3()">
	                        </div>
	                    </div>
	                </div>
					{{-- funcion js para el, otro --}}
	                <script>
			             function selectOnChange1(sel) {
			               if (sel.value=="5"){
			                    divC = document.getElementById("cual_b3");
			                    divC.style.display = "";


			               }else{

			                    divC = document.getElementById("cual_b3");
			                    $('#victima_genero_otro').val('');
			                    divC.style.display="none";


			               }

			             }
			        </script>
                <!-- FIN TERCERA PREGUNTA -->

                <!-- CUARTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('tienedoc_id') ? 'has-error' : ''}}">
	                    <label for="">B 4. ¿Cuenta con alguna documentación que permita acreditar su identidad?:</label>
	                    <select class="form-control" name="tienedoc_id">
	                        @foreach ($datosDocumento as $documento)
	                        @php
								$selected = ($documento->id == $Bformulario->tienedoc_id) ? 'selected' : '';
							@endphp
								<option value=" {{$documento->id}} ">{{$documento->nombre}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('tienedoc_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN CUARTA PREGUNTA -->

                <!-- QUINTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('tipodocumento_id') ? 'has-error' : ''}}">
	                    <label for="">B 5. Tipo de documentación:</label>
	                    <select class="form-control" id="tipodocumento_id" name="tipodocumento_id" onChange="selectOnChange2(this)">
	                        @foreach ($datosTipoDocumento as $tipoDocumento)
	                        @php
								$selected = ($tipoDocumento->id == $Bformulario->tipodocumento_id) ? 'selected' : '';
							@endphp
	                        	<option value="{{$tipoDocumento->id}}" {{ $selected }}>{{$tipoDocumento->nombre}}</option>
	                        @endforeach
	                   </select>
	                  	{!! $errors->first('tipodocumento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                    <div id="cual_b2" style="display: none">
	                        <label for="">Cual?</label>
	                        <div class="">
	                             <input name="victima_tipo_documento_otro"  id="victima_tipo_documento_otro" placeholder="" class="form-control" type="text" id="genero_otro"  onclick="cual_b5()">
	                        </div>
	                    </div>
	                </div>
					{{-- funcion js para el, otro --}}
	                <script>
						function selectOnChange2(sel) {
							if (sel.value=="7"){
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
	                <div class="form-group {{ $errors->has('victima_documento') ? 'has-error' : ''}}">
	                    <label for="">B 6. Nro Documento:</label>
	                    <input type="text" class="form-control" name="victima_documento" id="victima_documento" value="{{ $Bformulario->victima_documento }}">
	                  	{!! $errors->first('victima_documento', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
	                    <input type="checkbox" id="bloqueo3" name="victima_documento_se_desconoce" value="">
	                </div>
	                <script>
			             document.getElementById('bloqueo3').onchange = function() {
			                 document.getElementById('victima_documento').disabled = this.checked;
			             	};
			        </script>
                <!-- FIN SEXTA PREGUNTA -->

                <!-- SEPTIMA PREGUNTA -->
					<div class="form-group {{ $errors->has('pais_id') ? 'has-error' : ''}}">
	                    <label for="">B 7. Pais de Nacimiento: </label>
	                    <select id="pais" class="form-control" name="pais_id" onChange="selectOnChange3(this)">
								@foreach ($datosPaises as $pais)
								@php
									$selected = ($pais->id == $Bformulario->pais_id) ? 'selected' : '';
								@endphp
									<option value="{{$pais->id}}" {{ $selected }}>{{$pais->nombre}}</option>
								@endforeach
	                    </select>
	                  	{!! $errors->first('pais_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
	                {{-- funcion js para cuando se seleccione Pais->aparezcan las Provincias --}}
			        <script>
						function selectOnChange3(sel) {
							if (sel.value=="13"){
							    divC = document.getElementById("argprovincia_id");
							    divC.style.display = "";
							}else{
							    divC = document.getElementById("argprovincia_id");
							    $('#victima_provincia').val('');
							    divC.style.display="none";
							}
							if (sel.value=="33") {
							   divC = document.getElementById("brestado_id");
							   divC.style.display = "";
							}else{
							    divC = document.getElementById("brestado_id");
							    $('#victima_provincia').val('');
							    divC.style.display="none";
							}
						}
			        </script>
	                <!-- si selecciono Argentina aparece un select para todas las provincias de argentina -->
                <!-- FIN SEPTIMA PREGUNTA -->

                <!-- OCTAVA PREGUNTA -->
	                <div class="form-group" id="argprovincia_id" style="display: none">
	                    <label for="">B 8. Provincia de nacimiento: </label>
	                    <select class="form-control" name="argprovincia_id">
								@foreach ($datosArgProvincias as $provinciaARG)
								@php
									$selected = ($provinciaARG->id == $Bformulario->argprovincia_id) ? 'selected' : '';
								@endphp
	                       			<option value="{{$provinciaARG->id}}" {{ $selected }}>{{$provinciaARG->nombre}}</option>
	                       		@endforeach
	                    </select>
	                </div>
	                <div class="form-group" id="brestado_id" style="display: none">
	                    <label for="">B 8. Provincia de nacimiento: </label>
	                    <select class="form-control" name="brestado_id">
	                       	<option value="">Elegi Provincia</option>
	                       	@foreach ($datosBrEstados as $estadoBR)
	                       		@php
									$selected = ($estadoBR->id == $Bformulario->brestado_id) ? 'selected' : '';
								@endphp
	                       		<option value="{{$estadoBR->id}}" {{ $selected }}>{{$estadoBR->nombre}}</option>
	                       	@endforeach
	                    </select>
	                </div>
	                <!-- seguir cargando el array de las provincias de chile, uruguay, peru, paraguay y bolivia -->
                <!-- FIN OCTAVA PREGUNTA -->

                <!-- de acuerdo a la provincia que seleccione me deberian aparecer las localidades de las mismas -->
                <!-- deberian de cargarse a mano con un input text las localidades, en caso de no gustar hacer un array de las localidades de cada provincia, es la mejor manera pero llevaria mucho tiempo -->
                <!-- NOVENA PREGUNTA -->
	                <div class="form-group">
	                    <div class="" id="localidad" style="display: none">
	                        <label for="">B 8. Localidad de nacimiento: </label>
	                        <select class="form-control" name="victima_localidad">
	                           <option value="">Elegi la localidad</option>
	                       </select>
	                    </div>
	                </div>
                <!-- FIN NOVENA PREGUNTA -->

                <!-- DECIMA PREGUNTA -->
	                <div class="form-group {{ $errors->has('victima_fecha_nacimiento') ? 'has-error' : ''}}">
	                    <label for="">B 10. Fecha de nacimiento: </label>
	                    <input type="date" class="form-control" name="victima_fecha_nacimiento" value="{{ $Bformulario->victima_fecha_nacimiento->format('Y-m-d')}}">
	                  	{!! $errors->first('victima_fecha_nacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}

	                 <label for="bloqueo4" class="form-check-label">Se desconoce</label>
                    <input type="checkbox" id="bloqueo4" name="victima_fecha_nacimiento_desconoce" value="Se desconoce">
               		</div>

	                <script>
	                     document.getElementById('bloqueo4').onchange = function() {
	                         document.getElementById('victima_fecha_nacimiento').disabled = this.checked;
	                        };
	                </script>
                <!-- FIN DECIMA PREGUNTA -->

                <!-- UNDECIMA PREGUNTA -->
{{--                 aca pasa algo por como cambia el campo cuando se setea la franja etaria, ver mas adelante
 --}}	                <div class="form-group {{ $errors->has('victima_edad') ? 'has-error' : ''}}">
	                    <label for="victima_edad">B 11. Edad:</label>
	                    <input name="victima_edad" id="victima_edad" class="form-control" type="text" value="{{ $Bformulario->victima_edad }}" onchange="mostrarValor(this.value);">
	                  	{!! $errors->first('victima_edad', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <label class="form-check-label" for="victima_edad_desconoce">Se desconoce</label>
	                    <input name="victima_edad_desconoce" value="{{ $Bformulario->victima_edad_desconoce }}" id="victima_edad_desconoce" placeholder="" type="checkbox" onchange="check(this)">
	                </div>

		       		 <!-- si clickeo el check de se desconoce automaticamente en la franja etaria ingresa el valor se desconoce y se bloquea el input text para asignar la edad -->
					<script type="text/javascript">
			            function check(checkbox) {
			           if (checkbox.checked){

			          $('#franjaetaria').val('7');
			          $('#victima_edad').val('');
			          var elCampo = document.getElementById('victima_edad');

			          elCampo.disabled = checkbox.checked;
			            }
			            else{ $('#franjaetaria').val('0');
			            document.getElementById('victima_edad').disabled=false;
			            }}
			        </script>
                <!-- FIN UNDECIMA PREGUNTA -->

                <!-- DUODECIMA PREGUNTA -->
	                <div class="form-group {{ $errors->has('franjaetaria_id') ? 'has-error' : ''}}">
	                    <label for="franjaetaria_id">B 12. Franja Etaria</label>
	                    <select name="franjaetaria_id" id="franjaetaria_id" class="form-control" value="" onclick="cual_b12()">
	                        @foreach ($datosFranjaEtaria as $franjaEtaria)
	                        	@php
									$selected = ($franjaEtaria->id == $Bformulario->franjaetaria_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$franjaEtaria->id}}" {{ $selected }}>{{$franjaEtaria->nombre}}</option>
	                        @endforeach
	                  	{!! $errors->first('franjaetaria_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                        <!-- no hago un array en este caso porque toma los valores una funcion de javascript -->
	                    </select>
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
	                    <select class="form-control" name="embarazorelevamiento_id">
	                        @foreach ($datosEmbarazadaRelevamiento as $estaEmbarazada)
	                        	@php
									$selected = ($estaEmbarazada->id == $Bformulario->embarazorelevamiento_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$estaEmbarazada->id}}" {{ $selected }}>{{$estaEmbarazada->nombre}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('embarazorelevamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
		        <!-- FIN DECIMATERCERA PREGUNTA -->

                <!-- DECIMACUARTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('embarazoprevio_id') ? 'has-error' : ''}}">
	                    <label for="">B 14. ¿Estuvo embarazada previamente?:</label>
	                    <select class="form-control" name="embarazoprevio_id">
	                        @foreach ($datosEmbarazoPrevio as $estuvoEmbarazada)
	                        	@php
									$selected = ($estuvoEmbarazada->id == $Bformulario->embarazoprevio_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$estuvoEmbarazada->id}}" {{ $selected }}>{{$estuvoEmbarazada->nombre}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('embarazoprevio_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN DECIMACUARTA PREGUNTA -->
				
				<!-- DECIMAQUINTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('hijosembarazo_id') ? 'has-error' : ''}}">
	                    <label for="">B 15. ¿Tiene hijos de embarazos anteriores?:</label>
	                    <select class="form-control" name="hijosembarazo_id">
	                        @foreach ($datosHijos as $hijos)
	                        	@php
									$selected = ($hijos->id == $Bformulario->hijosembarazo_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$hijos->id}}" {{ $selected }}>{{$hijos->nombre}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('hijosembarazo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN DECIMAQUINTA PREGUNTA -->

                <!-- DECIMASEXTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('bajoefecto_id') ? 'has-error' : ''}}">
	                    <label for="">B 16. ¿Se encuentra bajo los efectos de alcohol o estupefacientes al momento del relevamiento?:</label>
	                    <select class="form-control" name="bajoefecto_id">
	                        @foreach ($datosBajoEfecto as $efectos)
	                        	@php
									$selected = ($efectos->id == $Bformulario->bajoefecto_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$efectos->id}}" {{ $selected }}>{{$efectos->nombre}}</option>
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
	                    <!-- ver la manera de hacer un foreach de estos valores, es decir, incluirlos en un array -->
	                    <input type="checkbox" name="discapacidad_id[]" value="1">
	                    <label for="" class="form-check-label">Físico/Motriz</label>
	                    <input type="checkbox" name="discapacidad_id[]" value="2">
	                    <label for="" class="form-check-label">Intelectual/Adaptativo</label>
	                    <input type="checkbox" name="discapacidad_id[]" value="3">
	                    <label for="">Psíquica</label>
	                    <input type="checkbox" name="discapacidad_id[]" value="4">
	                    <label for="">Sensorial</label>
	                    <input type="checkbox" name="discapacidad_id[]" value="5">
	                    <label for="">No</label>
	                    <input type="checkbox" name="discapacidad_id[]" value="6">
	                    <label for="">Se Desconoce</label><br>
	                </div>
	                {!! $errors->first('discapacidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                <!-- FIN DECIMASEPTIMA PREGUNTA -->

                <!-- DECIMAOCTAVA PREGUNTA -->
	                <div class="form-group {{ $errors->has('tienelesion_id') ? 'has-error' : ''}}">
	                    <label for="">B 18. ¿Presenta lesiones físicas visibles?</label>
	                    <select class="form-control" id="tienelesion" name="tienelesion_id" onChange="selectOnChange10(this)">
	                        @foreach ($datosLesion as $lesion)
	                        	@php
									$selected = ($lesion->id == $Bformulario->tienelesion_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$lesion->id}}" {{ $selected }}>{{$lesion->nombre}}</option>
	                        @endforeach
	                    </select>
	               		{!! $errors->first('tienelesion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                    <div id="victima_lesion_si" style="display: none">
	                        <div>
	                            <label class="">B 18I. Tipo de lesión:</label>
	                            <div class="">
	                                <input name="victima_lesion" placeholder="" value="{{ $Bformulario->victima_lesion }}" class="form-control" type="text">
	                            </div>

	                            <label class="">B 18II. ¿Fue constatado en el momento por algún profesional de la salud? :</label>
	                            <div class="">
	                                <select class="form-control" name="lesionconstatada">
	                                    <option value="">Fue constatada?</option>
				                        @foreach ($datosLesionConstatada as $constatada)
				                        	<option value="{{$constatada->id}}">{{$constatada->nombre}}</option>
				                        @endforeach
	                                </select>
	                            </div>

	                            <label class="">B 18III. ¿A qué organismo pertenece el profesional de la salud?:</label>
	                            <div class="">
	                                <input name="victima_lesion_organismo" placeholder="" value="{{ $Bformulario->victima_lesion_organismo }}" class="form-control" type="text">
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
			        </script>
                <!-- FIN DECIMAOCTAVA PREGUNTA -->

                <!-- DECIMANOVENA PREGUNTA -->
	                <div class="form-group {{ $errors->has('enfermedadcronica_id') ? 'has-error' : ''}}">
	                    <label class="">B 19. ¿Tiene enfermedades crónicas?</label>
	                    <select class="form-control" id="enfermedadcronica" name="enfermedadcronica_id" onChange="selectOnChange11(this)">
	                        @foreach ($datoEnfermedadCronica as $enfermedad)
	                        	@php
									$selected = ($enfermedad->id == $Bformulario->enfermedadcronica_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$enfermedad->id}}" {{ $selected }}>{{$enfermedad->nombre}}</option>
	                        @endforeach
	                    </select>
	               		{!! $errors->first('enfermedadcronica_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                    <div class="" id="victima_tipo_enfermedad_cronica" style="display: none;">
	                        <label class="">B 19I. Tipo de enfermedad crónica:</label>
	                            <div class="">
	                                <input name="victima_tipo_enfermedad_cronica" placeholder="" value="{{ $Bformulario->victima_tipo_enfermedad_cronica }}" class="form-control" type="text">
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
	                        <input type="checkbox" class="form-check-label" name="limitacion_id[]" value="1">
	                        <label for="">Analfabetismo</label>
	                        <input type="checkbox" class="form-check-label" name="limitacion_id[]" value="2">
	                        <label for="">Discapacidad</label>
	                        <input type="checkbox" class="form-check-label" name="limitacion_id[]" value="3">
	                        <label for="">Idioma</label>
	                        <input type="checkbox" class="form-check-label" name="limitacion_id[]" value="4">
	                        <label for="">No</label>
	                        <!-- si checkeo el checkbox otro tomo el id checkeado y uso la funcion muestroCual -->
	                        <input type="checkbox" class="form-check-label" id="checkeado"  onclick="muestroCual()" name="limitacion_id[]" value="5">
	                        <label for="">Otro</label><br>
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
			        </script>
                <!-- FIN VIGESIMA PREGUNTA -->

                <!-- VIGESIMAPRIMERA PREGUNTA -->
	                <div class="form-group {{ $errors->has('niveleducativo_id') ? 'has-error' : ''}}">
	                    <label for="">B 21. Máximo nivel educativo alcanzado:</label>
	                    <select class="form-control" name="niveleducativo_id">
	                        @foreach ($datosNivelEducativo as $educacion)
	                        	@php
									$selected = ($educacion->id == $Bformulario->niveleducativo_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$educacion->id}}" {{ $selected }}>{{$educacion->nombre}}</option>
	                        @endforeach
	                    </select>
	               		{!! $errors->first('niveleducativo_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN VIGESIMAPRIMERA PREGUNTA -->

                <!-- VIGESIMASEGUNDA PREGUNTA -->
	                <div class="form-group {{ $errors->has('oficio_id') ? 'has-error' : ''}}">
	                    <label for="">B 22. ¿Cuenta con algún oficio adquirido o de interés?: </label>
	                    <select class="form-control" id="oficio" name="oficio_id" onChange="selectOnChange13(this)">
	                        @foreach ($datosOficio as $oficio)
	                        	@php
									$selected = ($oficio->id == $Bformulario->oficio_id) ? 'selected' : '';
								@endphp
	                        	<option value="{{$oficio->id}}" {{ $selected }}>{{$oficio->nombre}}</option>
	                        @endforeach
	                    </select>
	                    {!! $errors->first('oficio', '<p class="help-block" style="color:red";>:message</p>') !!}


	                    <div id="cual_b13" style="display: none">
	                        <label for="">Cual?</label>
	                        <div class="">
	                             <input name="victima_oficio_cual" value="{{ $Bformulario->victima_oficio_cual }}" id="" placeholder="" class="form-control" type="text" onclick="cual_b5()">
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

						

				<button type="submit" class="btn btn-primary" name="button">Actualizar</button>

				{{-- Aca iria un boton que diga borrar formulario --}}
				{{-- <a class="btn btn-secondary" href="/formularios/edicion/B/{{$Bformulario->id}}"> Borrar Formulario </a> --}} 

			</form>

	</section>
	
</body>
</html>