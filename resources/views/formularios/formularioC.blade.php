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
        <li class="nav-item"> <a class="nav-link" href="A">Eje A: Datos institucionales</a> </li>
        <li class="nav-item"> <a class="nav-link" href="B">Eje B: Caracterización de la victima</a> </li>
        <li class="nav-item"> <a class="nav-link active" href="C">Eje C: Grupo Conviviente</a> </li>
        <li class="nav-item"> <a class="nav-link" href="D">Eje D: Datos de delito</a> </li>
        <li class="nav-item"> <a class="nav-link" href="E">Eje E: Datos del imputado</a> </li>
        <li class="nav-item"> <a class="nav-link" href="F">Eje F: Atención del caso</a> </li>
        <li class="nav-item"> <a class="nav-link" href="G">Eje G: Documentación</a> </li>
	</ul>
</header>
<body>
@auth 
	<h1 class="text-center" style="padding: 15px;">
    	Eje C: Grupo Conviviente
		<h5 style="text-align: center;">Estas trabajando sobre el número de carpeta {{ $numeroCarpeta }}</h5>
	</h1>
        <section class="container">
        <form class="ejeC" action="" method="post">
        	{{ csrf_field() }}
            <div class="form-group">
            	<label for="otraspersonas_id">C 1. ¿Se encontraba con otras personas en el lugar de explotación? </label>
	            <select class="form-control noPersonas" name="otraspersonas_id" {{ $errors->has('otraspersonas_id') ? 'has-error' : ''}}>
	            	<option value="">Otras personas en el lugar de explotación</option>
	                @foreach ($datosOtraspersonas as $otrasPersonas)
	                	<option value="{{ $otrasPersonas->getId() }}">{{ $otrasPersonas->getNombre() }}</option>
	                @endforeach
	            </select>
            	{!! $errors->first('otraspersonas_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="padre" id="padre">
                <div class="hijo" id="hijo" style="display: none;">
                    <h3>Datos del Conviviente:</h3>
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

            <button type="submit" class="btn btn-primary col-xl enviar" name="button">Enviar</button><br><br>

        </form>

        <button type="button" id="anadir" disabled="disabled" class="clickAnadir btn btn-outline-primary col-xl"> Agregar conviviente </button><br><br>
        <button id="borra" type="button" disabled="disabled" class="clickBorrar btn btn-outline-danger col-xl" onclick="borra()">Borrar conviviente</button>
        </section>

        <!-- este script lo que hace es agregar otro formulario de profesionales en el caso que intervenga mas de un profesional en el caso -->
        

        <script src="/js/formularioC.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
@else
    <script>window.location = "/login";</script>
@endauth
  </body>
</html>