<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="/css/app.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Eje C: Grupo Conviviente</title>
</head>
<header>
	<ul class="nav nav-tabs">
        {{-- <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link" href="B">Eje B: Caracterización de la victima</a> </li> --}}
        <li class="nav-item"> <a class="nav-link active" href="C">Eje C: Grupo Conviviente</a> </li>
       {{--  <li class="nav-item"> <a class="nav-link" href="D">Eje D: Datos de delito</a> </li>
        <li class="nav-item"> <a class="nav-link" href="E">Eje E: Datos del imputado</a> </li>
        <li class="nav-item"> <a class="nav-link" href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link" href="G">Eje G: Documentación</a> </li> --}}
	</ul>
</header>
<body>
        <section class="container">
            <form class="" action="{{$cFormulario->id}}" method="post">
            	{{ csrf_field() }}
            	@method('PUT')

                <h1 class="text-center" style="padding: 15px;">
                    Eje C: Grupo Conviviente
                    <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $cFormulario->numeroCarpeta }}</h5>
                </h1>
                
                <div class="form-group">
                	<label for="otraspersonas_id">C 1. ¿Se encontraba con otras personas en el lugar de explotación? </label>
    	            <select class="form-control noPersonas" name="otraspersonas_id" {{ $errors->has('otraspersonas_id') ? 'has-error' : ''}}>
    	            	<option value="">Había otras personas?</option>
    	                @foreach ($datosOtraspersonas as $otrasPersonas)
    	                	@php
                                $selected = ($otrasPersonas->id == $cFormulario->otraspersonas_id) ? 'selected' : '';
                            @endphp
    	                	<option value="{{ $otrasPersonas->id }}" {{ $selected }}>{{ $otrasPersonas->nombre }}</option>
    	                @endforeach
    	            </select>
                	{!! $errors->first('otraspersonas_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                </div>	

                {{-- INICIO CONVIVIENTES CARGADOS ANTERIORMENTE --}}
                    <h3>Convivientes cargados anteriormente:</h3>
                    @foreach ($datosTodo as $todo)
                    	<div class="container">
                            <div class="form-group">
                                <label for="">C 2. Nombre y apellido</label>
                                <input type="text" readonly="readonly" class=" form-control" value="{{ $todo->nombre_apellido }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="edad">C 3. Edad:</label>
                                <input type="text" readonly="readonly" class=" form-control" id="edad" value="{{ $todo->edad }}">
                            </div>

                            <div class="form-group">
                                <label for="genero_id">C 4. Género</label>
                                <select disabled="true" class=" form-control" id="genero_id">
                                    @foreach ($datosGeneros as $genero)
                                        @php
                                            $selected = ($genero->id == $todo->genero_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $genero->id }}" {{ $selected }}>{{ $genero->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="vinculo_id">C 5. Vinculación con la víctima:</label>
                                <select id="vinculo_id" disabled="true" class=" form-control">
                                    @foreach ($datosVinculos as $vinculo)
                                        @php
                                            $selected = ($vinculo->id == $todo->vinculo_id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $vinculo->id }}" {{ $selected }}>{{ $vinculo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group divVinculoOtro" style="display: none;">
                                <label for="vinculo_otro">Cuál?</label>
                                <input id="" type="text" name="vinculo_otro" value="{{ $todo->vinculo_otro }}" readonly="readonly" class=" form-control vinculo_otro">
                            </div>


                            <script>
                                var vinculo = document.querySelector('#vinculo_id');
                                var divVinculoOtro = document.querySelector('.divVinculoOtro');

                                if (vinculo.value == 6) {
                                    divVinculoOtro.style.display = '';
                                }else {
                                    divVinculoOtro.style.display = 'none';
                                }
                            </script>
                        </div>  
                    @endforeach
                {{-- FIN CONVIVIENTES CARGADOS ANTERIORMENTE --}}

                <div class="padre" id="padre">
                    <div class="hijo" id="hijo" style="display: none;">
                        <h3>Datos del Nuevo Conviviente a cargar:</h3>
                        <div class="form-group" {{ $errors->has('nombre_apellido[]') ? 'has-error' : ''}}>
                            <label for="">C 2. Nombre y apellido</label>
                            <input type="text" class="form-control nombre_apellido" value="">
                            {!! $errors->first('nombre_apellido.*', '<p class="help-block" style="color:red";>:message</p>') !!}

                            <label for="" >Se desconoce</label>
                            <input type="checkbox" class="desconoceNA" name="" value="">
                        </div>
                        
                        <div class="form-group" {{ $errors->has('edad[]') ? 'has-error' : ''}}>
                            <label for="edad">C 3. Edad:</label>
                            <input type="text" class="form-control edad" id="edad" value="">
                            {!! $errors->first('edad.*', '<p class="help-block" style="color:red";>:message</p>') !!}

                            <label for="">Se desconoce</label>
                            <input type="checkbox" class="desconoceE" name="" value="">
                        </div>


                        <div class="form-group" {{ $errors->has('genero_id[]') ? 'has-error' : ''}}>
                            <label for="genero_id">C 4. Género</label>
                            <select class="form-control genero" id="genero_id">
                                <option value="">Género?</option>
                                @foreach ($datosGeneros as $genero)
                                    <option value="{{ $genero->getIdGenero() }}" {{ old('genero_id') == $genero->getIdGenero() ? 'selected' : '' }}>{{ $genero->getNombreGenero() }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('genero_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>
                        
                        <div class="form-group" {{ $errors->has('vinculo_id[]') ? 'has-error' : ''}}>
                            <label for="vinculo_id">C 5. Vinculación con la víctima:</label>
                            <select id="vinculo_id" class="form-control vinculo">
                                <option value="">Vínculo?</option>
                                @foreach ($datosVinculos as $vinculo)
                                    <option value="{{ $vinculo->getId() }}" {{ old('vinculo_id') == $vinculo->getId() ? 'selected' : '' }}>{{ $vinculo->getNombre() }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('vinculo_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}
                        </div>
                        
                        <div class="form-group otro_vinculo" style="display: none">
                            <label for="vinculo_otro">Cuál?</label>
                            <input type="text" class="form-control vinculo_otro">
                        </div>
                   </div>
                </div>

                <button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br>
            </form>

            <button type="button" id="anadir" class="clickAnadir btn btn-outline-primary col-xl"> Agregar conviviente </button><br><br>
            <button id="borra" type="button" class="btn btn-outline-danger col-xl" onclick="borra()">Borrar conviviente</button>
        </section>

        <!-- este script lo que hace es agregar otro formulario de profesionales en el caso que intervenga mas de un profesional en el caso -->
        

        {{-- <script src="/js/app.js" type="text/javascript" charset="utf-8" async defer></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            var agregar = document.querySelector('.clickAnadir');

            agregar.addEventListener('click', funcionalidadCheck);

            var clicks = 0;

            function funcionalidadCheck() {
                
                //agarro a la clase hijo que esta oculta y la muestro
                var hijo = document.querySelectorAll('.hijo');

                hijo[clicks].style.display = "";

                clicks += 1;

                
                //agarro el input text nombre_apellido
                var inputNomApText = document.querySelector('.nombre_apellido');
                //le saco la clase nombre_apellido
                inputNomApText.classList.remove('nombre_apellido')
                //le agrego la clase nombre_apellido + la cantidad de clicks nombre_apellido1, nombre_apellido2, etc...
                inputNomApText.classList.add('nombre_apellido'+clicks)
                //agarro el nuevo input
                var inputNomApTextN = document.querySelector('.nombre_apellido'+clicks)
                
                inputNomApTextN.setAttribute('name', 'nombre_apellido[]')

                //agarro el input check nombre_apellido
                var inputNomApCheck = document.querySelector('.desconoceNA')
                //le saco la clase desconoceNA
                inputNomApCheck.classList.remove('desconoceNA')
                //le agrego la clase desconoceNA + la cantidad de clicks desconoceNA1, desconoceNA2, etc...
                inputNomApCheck.classList.add('desconoceNA'+clicks)
                //agarro le nuevo check
                var inputNomApCheckN = document.querySelector('.desconoceNA'+clicks)

                inputNomApCheck.addEventListener('click', function () {
                        if (inputNomApCheckN.checked) {
                        inputNomApTextN.value = 'Se desconoce'
                        inputNomApTextN.setAttribute("readonly", "readonly")
                    }else{
                        inputNomApTextN.value = ''
                        inputNomApTextN.removeAttribute('readonly')
                    }
                })


                //agarro el input text edad
                var inputEdadText = document.querySelector('.edad');
                //le saco la clase edad
                inputEdadText.classList.remove('edad')
                //le agrego la clase edad + la cantidad de clicks edad1, edad2, etc...
                inputEdadText.classList.add('edad'+clicks)
                //agarro el nuevo input
                var inputEdadTextN = document.querySelector('.edad'+clicks)

                inputEdadTextN.setAttribute('name', 'edad[]')

                //agarro el input check edad
                var inputEdadCheck = document.querySelector('.desconoceE')
                //le saco la clase desconoceE
                inputEdadCheck.classList.remove('desconoceE')
                //le agrego la clase desconoceE + la cantidad de clicks desconoceE1, desconoceE2, etc...
                inputEdadCheck.classList.add('desconoceE'+clicks)
                //agarro le nuevo check
                var inputEdadCheckN = document.querySelector('.desconoceE'+clicks)

                inputEdadCheckN.addEventListener('click', function () {
                        if (inputEdadCheckN.checked) {
                            inputEdadTextN.value = 'Se desconoce'
                            inputEdadTextN.setAttribute("readonly", "readonly")
                        }else{
                            inputEdadTextN.value = ''
                            inputEdadTextN.removeAttribute('readonly')
                        }
                })

                var selectGenero = document.querySelector('.genero');
                //le saco la clase vinculo
                selectGenero.classList.remove('genero')
                //le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
                selectGenero.classList.add('genero'+clicks)
                //agarro el nuevo input
                var selectGeneroN = document.querySelector('.genero'+clicks)

                selectGeneroN.setAttribute('name', 'genero_id[]')

                //esto es para que aparezca el compo cual en la vinculacion con la victima
                //agarro el select vinculo
                var selectVinculo = document.querySelector('.vinculo');
                //le saco la clase vinculo
                selectVinculo.classList.remove('vinculo')
                //le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
                selectVinculo.classList.add('vinculo'+clicks)
                //agarro el nuevo input
                var selectVinculoN = document.querySelector('.vinculo'+clicks)

                selectVinculoN.setAttribute('name', 'vinculo_id[]')

                //agarro el input otro_vinculo
                var inputOtroVinculo = document.querySelector('.otro_vinculo')
                //le saco la clase otro_vinculo
                inputOtroVinculo.classList.remove('otro_vinculo')
                //le agrego la clase otro_vinculo + la cantidad de clicks otro_vinculo1, otro_vinculo2, etc...
                inputOtroVinculo.classList.add('otro_vinculo'+clicks)
                //agarro le nuevo input
                var inputOtroVinculoN = document.querySelector('.otro_vinculo'+clicks)

                selectVinculo.addEventListener('change', function () {
                    if (selectVinculo.value == '6') {
                        inputOtroVinculo.style.display = ""
                    }else{
                        inputOtroVinculo.style.display = "none"
                    }
                })

                var otroVinculo = document.querySelector('.vinculo_otro');
                //le saco la clase vinculo
                otroVinculo.classList.remove('vinculo_otro')
                //le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
                otroVinculo.classList.add('vinculo_otro'+clicks)
                //agarro el nuevo input
                var otroVinculoN = document.querySelector('.vinculo_otro'+clicks)

                otroVinculoN.setAttribute('name', 'vinculo_otro[]')
            };
        </script>
        <script>
            $(document).ready(function(){
                var nueva_entrada ='';
                $(document).ready(function() {
                    nueva_entrada = $('#padre').html();
                });
                $("#anadir").click(function(){
                    $("#padre").append(nueva_entrada);
                });
            });
            function borra() {
               var padre = document.getElementById("padre");
               var hijo = document.getElementById("hijo")
               padre.removeChild(hijo);
               swal('Se borro un profesional');
            }
        </script>
  </body>
</html>