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
	  <li class="nav-item"> <a class="nav-link " href="A">Formulario A</a> </li>
	  <li class="nav-item"> <a class="nav-link active" href="#">Formulario B</a> </li>
	  <li class="nav-item"> <a class="nav-link " href="#">Formulario C</a> </li>
	  <li class="nav-item"> <a class="nav-link " href="#">Formulario D</a> </li>
	  <li class="nav-item"> <a class="nav-link " href="#">Formulario E</a> </li>
	  <li class="nav-item"> <a class="nav-link " href="#">Formulario F</a> </li>
	  <li class="nav-item"> <a class="nav-link " href="#">Formulario G</a> </li>
	</ul>
</header>
<body>

	<h1 class="text-center" style="padding: 15px;">Formulario B</h1>

	<section class="container">


		
		<h2>B) Caracterización de la víctima ESTE</h2>
				
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
	                    <input type="checkbox" id="bloqueo1" name="victima_nombre_y_apellido_desconoce" value="Se desconoce">
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
	                    <input type="text" name="victima_apodo" class="form-control" id="victima_apodo" value="{{old('victima_apodo')}}">
	                  	{!! $errors->first('victima_apodo', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <label for="bloqueo2" class="form-check-label">Se desconoce</label>
	                    <input type="checkbox" id="bloqueo2" name="victima_apodo_desconoce" value="Se desconoce">
	                </div>
					{{-- funcion jsX para el, se desconoce --}}
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
	                     <option value="">Elegí género</option>
	                     <!-- traigo la table genero_id de la base de datos, muestro su nombre y como value tome el id que se corresponde con el nombre -->
	                    @foreach ($datosGenero as $genero)
							<option value="{{$genero->getIdGenero()}}">{{$genero->getNombreGenero()}}</option>
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
	                        <option value="">Tiene decomunatación?</option>
	                        @foreach ($datosDocumento as $documento)
								<option value="{{$documento->getIdDocumentacion()}}">{{$documento->getNombreDocumentacion()}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('tienedoc_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN CUARTA PREGUNTA -->

                <!-- QUINTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('tipodocumento_id') ? 'has-error' : ''}}">
	                    <label for="">B 5. Tipo de documentación:</label>
	                    <select class="form-control" id="tipodocumento_id" name="tipodocumento_id" onChange="selectOnChange2(this)">
	                        <option value="">Seleccioná el tipo de documento</option>
	                        @foreach ($datosTipoDocumento as $tipoDocumento)
	                        	<option value="{{$tipoDocumento->getIdTipoDocumento()}}">{{$tipoDocumento->getNombreTipoDocumento()}}</option>
	                        @endforeach
	                   </select>
	                  	{!! $errors->first('tipodocumento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                    <div id="cual_b2" style="display: none">
	                        <label for="">Cual?</label>
	                        <div class="">
	                             <input name="victima_tipo_documento_otro"  id="victima_tipo_documento_otro" placeholder="" class="form-control" type="text" id="genero_otro" onclick="cual_b5()">
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
	                    <input type="text" class="form-control" name="victima_documento" id="victima_documento" value="{{old('victima_documento')}}">
	                  	{!! $errors->first('victima_documento', '<p class="help-block" style="color:red";>:message</p>') !!}

	                    <label for="bloqueo3" class="form-check-label">Se desconoce</label>
	                    <input type="checkbox" id="bloqueo3" name="victima_documento_se_desconoce" value="Se desconoce">
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
	                    <select id="pais_id" class="form-control" name="pais_id" onChange="selectOnChange3(this)">
							<option value="">Elegi País</option>
								@foreach ($datosPaises as $pais)
							<option value="{{$pais->getIdPais()}}">{{$pais->getNombrePais()}}</option>
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
	                       	<option value="">Elegi Provincia</option>
								@foreach ($datosArgProvincias as $provinciaARG)
	                       			<option value="{{$provinciaARG->getIdProvincia()}}">{{$provinciaARG->getNombreProvincia()}}</option>
	                       		@endforeach
	                    </select>
	                </div>
	                <div class="form-group" id="brestado_id" style="display: none">
	                    <label for="">B 8. Provincia de nacimiento: </label>
	                    <select class="form-control" name="brestado_id">
	                       	<option value="">Elegi Provincia</option>
	                       	@foreach ($datosBrEstados as $estadoBR)
	                       		<option value="{{$estadoBR->getIdEstado()}}">{{$estadoBR->getNombreEstado()}}</option>
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
	                    <input type="date" class="form-control" name="victima_fecha_nacimiento" value="{{old('victima_fecha_nacimiento')}}">
	                  	{!! $errors->first('victima_fecha_nacimiento', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
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
			           if (checkbox.checked){

			          $('#franjaetaria_id').val('7');
			          $('#victima_edad').val('');
			          var elCampo = document.getElementById('victima_edad');

			          elCampo.disabled = checkbox.checked;
			            }
			            else{ $('#franjaetaria_id').val('0');
			            document.getElementById('victima_edad').disabled=false;
			            }}
			        </script>
                <!-- FIN UNDECIMA PREGUNTA -->

                <!-- DUODECIMA PREGUNTA -->
	                <div class="form-group {{ $errors->has('franjaetaria_id') ? 'has-error' : ''}}">
	                    <label for="">B 12. Franja Etaria</label>
	                    <select name="franjaetaria_id" id="franjaetaria_id" class="form-control" value="" onclick="cual_b12()">
	                        <option value="">Franja Etaria</option>
	                        @foreach ($datosFranjaEtaria as $franjaEtaria)
	                        	<option value="{{$franjaEtaria->getIdFranja()}}">{{$franjaEtaria->getNombreFranja()}}</option>
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
	                    <select class="form-control" name="embarazorelevamiento_id">
	                        <option value="">Está embarazada?</option>
	                        @foreach ($datosEmbarazadaRelevamiento as $estaEmbarazada)
	                        	<option value="{{$estaEmbarazada->getId()}}">{{$estaEmbarazada->getEmbarazada()}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('embarazorelevamiento_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
		        <!-- FIN DECIMATERCERA PREGUNTA -->

                <!-- DECIMACUARTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('embarazoprevio_id') ? 'has-error' : ''}}">
	                    <label for="">B 14. ¿Estuvo embarazada previamente?:</label>
	                    <select class="form-control" name="embarazoprevio_id">
	                        <option value="">Estuvo embarazada?</option>
	                        @foreach ($datosEmbarazoPrevio as $estuvoEmbarazada)
	                        	<option value="{{$estuvoEmbarazada->getId()}}">{{$estuvoEmbarazada->getEmbarazoPrevio()}}</option>
	                        @endforeach
	                    </select>
	                  	{!! $errors->first('embarazoprevio_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                </div>
                <!-- FIN DECIMACUARTA PREGUNTA -->
				
				<!-- DECIMAQUINTA PREGUNTA -->
	                <div class="form-group {{ $errors->has('hijosembarazo_id') ? 'has-error' : ''}}">
	                    <label for="">B 15. ¿Tiene hijos de embarazos anteriores?:</label>
	                    <select class="form-control" name="hijosembarazo_id">
	                        <option value="">Posee hijos?</option>
	                        @foreach ($datosHijos as $hijos)
	                        	<option value="{{$hijos->getId()}}">{{$hijos->getHijos()}}</option>
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
	                        	<option value="{{$efectos->getId()}}">{{$efectos->getBajoEfecto()}}</option>
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
	                    @foreach ($datosDiscapacidad as $discapacidad)
                        	<input type="checkbox" value="{{$discapacidad->getId()}}" name="discapacidad_id[]">
	                    	<label for="">{{$discapacidad->getDiscapacidad()}}</label>
                        @endforeach
	                </div>
	                {!! $errors->first('discapacidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                <!-- FIN DECIMASEPTIMA PREGUNTA -->

                <!-- DECIMAOCTAVA PREGUNTA -->
	                <div class="form-group {{ $errors->has('tienelesion_id') ? 'has-error' : ''}}">
	                    <label for="">B 18. ¿Presenta lesiones físicas visibles?</label>
	                    <select class="form-control" id="tienelesion_id" name="tienelesion_id" onChange="selectOnChange10(this)">
	                        <option value="">Presenta lesiones?</option>
	                        @foreach ($datosLesion as $lesion)
	                        	<option value="{{$lesion->getId()}}">{{$lesion->getLesion()}}</option>
	                        @endforeach
	                    </select>
	               		{!! $errors->first('tienelesion_id', '<p class="help-block" style="color:red";>:message</p>') !!}
	                    <div id="victima_lesion_si" style="display: none">
	                        <div>
	                            <label class="">B 18I. Tipo de lesión:</label>
	                            <div class="">
	                                <input name="victima_lesion" placeholder="" class="form-control" type="text">
	                            </div>

	                            <label class="">B 18II. ¿Fue constatado en el momento por algún profesional de la salud? :</label>
	                            <div class="">
	                                <select class="form-control" name="lesionconstatada_id">
	                                    <option value="">Fue constatada?</option>
				                        @foreach ($datosLesionConstatada as $constatada)
				                        	<option value="{{$constatada->getId()}}">{{$constatada->getLesionConstatada()}}</option>
				                        @endforeach
	                                </select>
	                            </div>

	                            <label class="">B 18III. ¿A qué organismo pertenece el profesional de la salud?:</label>
	                            <div class="">
	                                <input name="victima_lesion_organismo" placeholder="" class="form-control" type="text">
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
	                    <select class="form-control" id="enfermedadcronica_id" name="enfermedadcronica_id" onChange="selectOnChange11(this)">
	                        <option value="">Posee enfermedades?</option>
	                        @foreach ($datoEnfermedadCronica as $enfermedad)
	                        	<option value="{{$enfermedad->getId()}}">{{$enfermedad->getEnfermedadCronica()}}</option>
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
	                    @foreach ($datosLimitacion as $limitacion)
	                    	<input type="checkbox" value="{{$limitacion->getId()}}" name="limitacion_id[]">
	                    	<label for="">{{$limitacion->getLimitacion()}}</label>
	                    @endforeach
	                        <!-- si checkeo el checkbox otro tomo el id checkeado y uso la funcion muestroCual -->
	                        <input type="checkbox" class="form-check-label" id="checkeado"  onclick="muestroCual()" name="limitacion_id[]" value="Otro">
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
	                        <option value="">Seleccioná el nivel de educación</option>
	                        @foreach ($datosNivelEducativo as $educacion)
	                        	<option value="{{$educacion->getId()}}">{{$educacion->getNivelEducativo()}}</option>
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
	                        	<option value="{{$oficio->getId()}}">{{$oficio->getOficio()}}</option>
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

						

				<button type="submit" class="btn btn-primary" name="button">Actualizar</button>

				


			</form>

	</section>
	
</body>
</html>