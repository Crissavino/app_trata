<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Formulario A</title>
</head>
<header>
    <ul class="nav nav-tabs">
      <li class="nav-item"> <a class="nav-link active" href="#">Formulario A</a> </li>
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
        <form action="" class="" method="post" accept-charset="">
            @csrf
            <div class="form-group">
                <label for="datos_nombre_referencia">A 1. Nombre de referencia:</label>
                <input type="text" class="form-control" name="datos_nombre_referencia" id="datos_nombre_referencia" value="{{old('datos_nombre_referencia')}}"><br>
            </div>

            <div class="form-group">
                <label for="datos_numero_carpeta">A 2. Nro de carpeta:</label>
                <input type="text" class="form-control" name="datos_numero_carpeta" id="datos_numero_carpeta" value="{{old('datos_numero_carpeta')}}"><br><br>
            </div>

            <div class="form-group">
                <label for="datos_fecha_ingreso">A 3. Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="datos_fecha_ingreso" id="datos_fecha_ingreso" value="{{old('datos_fecha_ingreso')}}"><br>
            </div>

            <div class="form-group">
                <label for="modalidad">A 4. Modalidad de Ingreso</label>
                <select class="form-control" name="modalidad">
                <option value="0">Modalidad</option>
                @foreach ($datosModalidad as $modalidad)
                    <option value="{{ $modalidad->getId() }}">{{ $modalidad->getNombre() }}</option>
                @endforeach
                </select><br>
            </div>

            <div class="form-group">
                <label for="estadocaso">A 5. Estado Actual del Caso:</label>
                <select class="form-control" name="estadocaso">
                <option value="0">Estado Actual</option>
                @foreach ($datosEstadoCaso as $estadocaso)
                    <option value="{{ $estadocaso->getId() }}">{{ $estadocaso->getNombre() }}</option>
                @endforeach
                </select><br>
            </div>

            <div class="form-group">
                <label for="datos_ente_judicial">A 6. Fiscalia/Juzgado Interviniente:</label>
                <input type="text" class="form-control" name="datos_ente_judicial" id="datos_ente_judicial" value="{{old('datos_ente_judicial')}}"><br><br>
            </div>

            <div class="form-group">
                <label for="caratulacionjudial">A 7. Caratulación Judicial:</label>
                <select class="form-control" name="caratulacionjudial">
                    <option value="0"></option>
                    @foreach ($datosCaratulacion as $caratulacion)
                        <option value="{{ $caratulacion->getId() }}">{{ $caratulacion->getNombre() }}</option>
                    @endforeach
                </select><br><br>
            </div>

            <div class="form-group">
                <label for="datos_nro_causa">A 8. N° Causa o Id Judicial:</label>
                <input type="text" class="form-control" name="datos_nro_causa" value="{{old('datos_nro_causa')}}"><br><br>
            </div>

            <div class="" id="padre">
                <h3>A 9. Profesional Interviniente:</h3><br>
                <div id="hijo" name="prefesionales[]">
                    <div class="form-group">
                        <label for="datos_profesional_nom_y_ape">A.9.1 Nombre y apellido</label>
                        <input type="text" class="form-control" name="datos_profesional_nom_y_ape" id="datos_profesional_nom_y_ape" value="{{old('datos_profesional_nom_y_ape')}}"><br><br>
                    </div>

                    <div class="form-group">
                        <label for="profesionalprofesion">A 9.2 Profesión:</label>
                        <select class="form-control" name="profesionalprofesion">
                            <option value="0"> </option>
                            @foreach ($datosProfesion as $profesion)
                                <option value="{{ $profesion->getId() }}">{{ $profesion->getNombre() }}</option>
                            @endforeach
                        </select><br><br>
                    </div>

                    <div class="form-group">
                        <label for="datos_profesional_interviene_desde">A 9.3 Interviene desde:</label>
                        <input type="date" class="form-control" name="datos_profesional_interviene_desde" id="datos_profesional_interviene_desde" value="{{old('datos_profesional_interviene_desde')}}"><br><br>
                    </div>

                    <div class="form-group">
                        <label for="datos_profesional_interviene_hasta">A 9.4 Interviene hasta:</label>
                        <input type="date" class="form-control" name="datos_profesional_interviene_hasta" id="datos_profesional_interviene_desde" value="{{old('datos_profesional_interviene_desde')}}"><br><br>
                    </div>

                    <div class="form-group">
                        <label for="datos_profesional_actualmente">A 9.5 Actualmente Interviene:</label>
                        <select class="form-control" name="datos_profesional_actualmente">
                            <option value="0"> </option>
                            @foreach ($datosIntervieneActualmente as $profesionalInterviene)
                                <option value="{{ $profesionalInterviene->getId() }}">{{ $profesionalInterviene->getNombre() }}</option>
                            @endforeach
                        </select><br><br>
                    </div>
                </div>
            </div>

            

            <button type="submit" class="btn btn-primary col-xl" name="button">Enviar</button><br><br>

        </form>

        <button id="anadir" class="btn btn-secondary col-sm" type="button"> Agregar profesional </button><br><br>
        <button id="borra" class="btn btn-secondary col-sm" type="button" onclick="borra()">Borrar profesional</button><br><br>
    </section>
        

{{--         @php
            $profesionales = [];
            $i = 0;
        @endphp    
        <select name="i">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>

        @if ($i>0)
            @for ($i = 0; $i < 10 ; $i++)
                $profesionales[] = 10;
            @endfor
        @endif

        @php
            if ($_POST){
            dd($profesionales);

            }
        
            
        @endphp

 --}}

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