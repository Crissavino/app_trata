<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Eje A: Datos institucionales</title>
</head>
<header>
    <ul class="nav nav-tabs">
      <li class="nav-item"> <a class="nav-link active" href="#">Eje A: Datos institucionales</a> </li>
      <li class="nav-item"> <a class="nav-link " href="B">Formulario B</a> </li>
      <li class="nav-item"> <a class="nav-link " href="#">Formulario C</a> </li>
      <li class="nav-item"> <a class="nav-link " href="#">Formulario D</a> </li>
      <li class="nav-item"> <a class="nav-link " href="#">Formulario E</a> </li>
      <li class="nav-item"> <a class="nav-link " href="#">Formulario F</a> </li>
      <li class="nav-item"> <a class="nav-link " href="#">Formulario G</a> </li>
    </ul>
</header>
<body>
    <section class="container">
            <form class="" action="" method="post">
            {{ csrf_field() }}

            <div class="form-group" {{ $errors->has('datos_nombre_referencia') ? 'has-error' : ''}}>
                <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                <input type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{old('datos_nombre_referencia')}}">
                {!! $errors->first('datos_nombre_referencia', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('datos_numero_carpeta') ? 'has-error' : ''}}>
                <label for="datos_numero_carpeta">A 2. Nro de carpeta:</label>
                <input type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{old('datos_numero_carpeta')}}">
                {!! $errors->first('datos_numero_carpeta', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('datos_fecha_ingreso') ? 'has-error' : ''}}>
                <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{old('datos_fecha_ingreso')}}">
                {!! $errors->first('datos_fecha_ingreso', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('modalidad_id') ? 'has-error' : ''}}>
                <label for="modalidad_id">A 4. Modalidad de Ingreso</label>
                <select class="form-control" name="modalidad_id">
                <option value="">Modalidad</option>
                @foreach ($datosModalidad as $modalidad)
                    <option value="{{ $modalidad->getId() }}">{{ $modalidad->getNombre() }}</option>
                @endforeach
                </select>
                {!! $errors->first('modalidad_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('estadocaso_id') ? 'has-error' : ''}}>
                <label for="estadocaso_id">A 5. Estado Actual del Caso:</label>
                <select class="form-control" name="estadocaso_id">
                <option value="">Estado Actual</option>
                @foreach ($datosEstadoCaso as $estadocaso)
                    <option value="{{ $estadocaso->getId() }}">{{ $estadocaso->getNombre() }}</option>
                @endforeach
                </select>
                {!! $errors->first('estadocaso_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('datos_ente_judicial') ? 'has-error' : ''}}>
                <label for="datos_ente_judicial">A 6. Fiscalia/Juzgado Interviniente:</label>
                <input type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{old('datos_ente_judicial')}}">
                {!! $errors->first('datos_ente_judicial', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('caratulacionjudial_id') ? 'has-error' : ''}}>
                <label for="caratulacionjudial_id">A 7. Caratulación Judicial:</label>
                <select class="form-control" name="caratulacionjudial_id">
                    <option value=""></option>
                    @foreach ($datosCaratulacion as $caratulacion)
                        <option value="{{ $caratulacion->getId() }}">{{ $caratulacion->getNombre() }}</option>
                    @endforeach
                </select>
                {!! $errors->first('caratulacionjudial_id', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div class="form-group" {{ $errors->has('datos_nro_causa') ? 'has-error' : ''}}>
                <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                <input type="text" class="form-control" name="datos_nro_causa" value="{{old('datos_nro_causa')}}">
                {!! $errors->first('datos_nro_causa', '<p class="help-block" style="color:red";>:message</p>') !!}
            </div>

            <div id="padre">
                <div id="hijo" name="profesionales">
                    <h3>A 9. Profesional Interviniente:</h3>
                    <div class="form-group" {{ $errors->has('profesional_id') ? 'has-error' : ''}}>
                        <select class="form-control" name="profesional_id[]">
                            <option value="">Profesional que interviene</option>
                            @foreach ($datosProfesional as $profesional)
                                <option value="{{ $profesional->getId() }}">{{ $profesional->getNombreCompletoyProfesion() }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('profesional_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div class="form-group" {{ $errors->has('datos_profesional_interviene_desde') ? 'has-error' : ''}}>
                        <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                        <input type="date" class="form-control" name="datos_profesional_interviene_desde[]" id="datos_profesional_interviene_desde" value="{{old('datos_profesional_interviene_desde')}}">
                        {!! $errors->first('datos_profesional_interviene_desde', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div class="form-group" {{ $errors->has('datos_profesional_interviene_hasta') ? 'has-error' : ''}}>
                        <label for="datos_profesional_interviene_hasta">A 9.4 Interviene hasta:</label>
                        <input type="date" class="form-control" name="datos_profesional_interviene_hasta[]" id="datos_profesional_interviene_desde" value="{{old('datos_profesional_interviene_hasta')}}">
                        {!! $errors->first('datos_profesional_interviene_hasta', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>

                    <div class="form-group" {{ $errors->has('profesionalactualmente_id') ? 'has-error' : ''}}>
                        <label for="profesionalactualmente_id">A 9.5 Actualmente Interviene:</label>
                        <select class="form-control" name="profesionalactualmente_id[]">
                            <option value=""> </option>
                            @foreach ($datosIntervieneActualmente as $profesionalInterviene)
                                <option value="{{ $profesionalInterviene->getId() }}">{{ $profesionalInterviene->getNombre() }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('profesionalactualmente_id', '<p class="help-block" style="color:red";>:message</p>') !!}
                    </div>
                </div>
            </div>

            

            <button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button><br><br>

        </form>

        <button id="anadir" class="btn btn-secondary col-sm" type="button"> Agregar profesional </button><br><br>
        <button id="borra" class="btn btn-secondary col-sm" type="button" onclick="borra()">Borrar profesional</button><br><br>
    </section>
        

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
            }
        </script>

</body>
</html>