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
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
    </ul>
	<ul class="nav nav-tabs">
        @if ($idFormA)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/A/{{ $idFormA }}">Eje A: Datos institucionales</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif
        @if ($idFormB)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/B/{{ $idFormB }}">Eje B: Caracterización de la víctima</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/B">Eje B: Caracterización de la víctima</a> </li>
        @endif
        @if ($idFormC)
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/C/{{ $idFormC }}">Eje C: Grupo Conviviente</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/C">Eje C: Grupo Conviviente</a> </li>
        @endif
        @if ($idFormD)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/D">Eje D: Datos de delito</a> </li>
        @endif
        {{-- @if ($idFormE)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        @if ($idFormF)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F/{{ $idFormF }}">Eje E: Atención del caso</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/F">Eje E: Atención del caso</a> </li>
        @endif
        @if ($idFormG)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idFormG }}">Eje F: Documentación</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/G">Eje F: Documentación</a> </li>
        @endif
         {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/C">Eje C: Grupo Conviviente</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/D">Eje D: Datos de delito</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E">Eje E: Datos del imputado</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/F">Eje F: Atención del caso</a> </li> --}}
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G">Eje G: Documentación</a> </li> --}}
    </ul>
</header>
<body>
        <section class="container">
            @if (auth()->user()->isAdmin !== 2)
                <form class="" action="{{$cFormulario->id}}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')

                    <h1 class="text-center" style="padding: 15px;">
                        Eje C: Grupo Conviviente
                        <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $cFormulario->numeroCarpeta }}</h5>
                    </h1>
                    <input type="text" name="numeroCarpeta" value="{{ $cFormulario->numeroCarpeta }}" style="display: none;">
                    
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

                    <div class="padre" id="padre"></div>
                    
                    <button type="button" id="anadir" class="clickAnadir btn btn-outline-primary col-xl"> Agregar conviviente </button><br><br>
                    <button id="borra" type="button" class="mb-4 clickBorrar btn btn-outline-danger col-xl">Borrar conviviente</button>

                    <button type="submit" class="btn btn-primary col-xl" name="button">Actualizar</button><br><br>
                </form>
            @else
                <form class="" action="{{$cFormulario->id}}" method="post">
                    {{ csrf_field() }}
                    @method('PUT')

                    <h1 class="text-center" style="padding: 15px;">
                        Eje C: Grupo Conviviente
                        <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $cFormulario->numeroCarpeta }}</h5>
                    </h1>
                    
                    <div class="form-group">
                        <label for="otraspersonas_id">C 1. ¿Se encontraba con otras personas en el lugar de explotación? </label>
                        <select disabled class="form-control noPersonas" name="otraspersonas_id" {{ $errors->has('otraspersonas_id') ? 'has-error' : ''}}>
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
                </form>
            @endif
            

            {{-- <button type="button" id="anadir" class="clickAnadir btn btn-outline-primary col-xl"> Agregar conviviente </button><br><br>
            <button id="borra" type="button" class="btn btn-outline-danger col-xl" onclick="borra()">Borrar conviviente</button> --}}
        </section>

        <!-- este script lo que hace es agregar otro formulario de profesionales en el caso que intervenga mas de un profesional en el caso -->
        

        {{-- <script src="/js/app.js" type="text/javascript" charset="utf-8" async defer></script> --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            var btnAgregarConviviente = document.querySelector('.clickAnadir');

            var clicks = 0;

            btnAgregarConviviente.addEventListener('click', function(){
                clicks++
                
                var divClickConviviente = '<div class="hijo" id="hijo"><h3>Datos del Conviviente:</h3><div class="form-group" {{ $errors->has('nombre_apellido[]') ? 'has-error' : ''}}><label for="">C 2. Nombre y apellido</label><input type="text" class="form-control nombre_apellido'+clicks+'" name="nombre_apellido[]" value="">{!! $errors->first('nombre_apellido.*', '<p class="help-block" style="color:red";>:message</p>') !!}<label for="" >Se desconoce</label><input type="checkbox" class="desconoceNA'+clicks+' ml-2" value=""></div><div class="form-group" {{ $errors->has('edad[]') ? 'has-error' : ''}}><label for="edad">C 3. Edad:</label><input type="text" class="form-control edad'+clicks+'" id="edad" name="edad[]" value="">{!! $errors->first('edad.*', '<p class="help-block" style="color:red";>:message</p>') !!}<label for="">Se desconoce</label><input type="checkbox" class="desconoceE'+clicks+' ml-2" value=""></div><div class="form-group" {{ $errors->has('genero_id[]') ? 'has-error' : ''}}><label for="genero_id">C 4. Género</label><select class="form-control genero'+clicks+'" id="genero_id" name="genero_id[]"><option value="">Género?</option>@foreach ($datosGeneros as $genero)<option value="{{ $genero->getIdGenero() }}" {{ old('genero_id') == $genero->getIdGenero() ? 'selected' : '' }}>{{ $genero->getNombreGenero() }}</option>@endforeach</select>{!! $errors->first('genero_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group" {{ $errors->has('vinculo_id[]') ? 'has-error' : ''}}><label for="vinculo_id">C 5. Vinculación con la víctima:</label><select id="vinculo_id" class="form-control vinculo'+clicks+'" name="vinculo_id[]"><option value="">Vínculo?</option>@foreach ($datosVinculos as $vinculo)<option value="{{ $vinculo->getId() }}" {{ old('vinculo_id') == $vinculo->getId() ? 'selected' : '' }}>{{ $vinculo->getNombre() }}</option>@endforeach</select>{!! $errors->first('vinculo_id.*', '<p class="help-block" style="color:red";>:message</p>') !!}</div><div class="form-group otro_vinculo'+clicks+'" style="display: none"><label for="vinculo_otro">Cuál?</label><input type="text" class="form-control vinculo_otro" name="vinculo_otro[]"></div></div>';

                var divConvivientes = document.querySelector('.padre');
                divConvivientes.insertAdjacentHTML('beforeend', divClickConviviente);

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
                    var inputOtroVinculoN = document.querySelector('.otro_vinculo'+clicks)

                    selectVinculoN.addEventListener('change', function () {
                        if (selectVinculoN.value == '6') {
                            inputOtroVinculoN.style.display = ""
                        }else{
                            inputOtroVinculoN.style.display = "none"
                        }
                    })
                //fin funcionalidades
            });

            var borrarConviviente = document.querySelector('.clickBorrar');

            console.log(borrarConviviente);

            borrarConviviente.addEventListener('click', function(){
                var divConvivientes = document.querySelector('.padre');
                divConvivientes.removeChild(divConvivientes.lastChild)
                swal('Se borro un profesional')
            });
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