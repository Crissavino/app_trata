<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>
    @include('partials.head')
    <style>
        .cerrarSesion{
            position: absolute;
            top: 0;
            right: 0;
        }

        .botones{
            display: inline-block;
            width: 25%;
            position: fixed;
            bottom: 40px;
        }

        .imprimir{
            display: block;
            z-index: 100 !important;
            /*width: 100%;*/
        }

        .descargar{
            display: block;
            /*width: 100%;*/
        }
    </style>
</head>
<header>
    <ul class="noimprimible nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
</header>
<body>
    <section id="imprimible" class="container">
        <img class="logo" style="width:160px;height:50px;display:none;" src="{{ URL::to('/')}}/img/logoprovincia.png">
        
        <h1 class="text-center m-3">Resumen</h1>

        <h3 class="text-left" style="padding: 15px;">Datos institucionales</h3>
        <div class="ml-3">
            <label for="">Nombre de referencia:</label>
            {{ $formA->datos_nombre_referencia }}<br>

            <label for="">Número de carpeta:</label>
            {{ $formA->datos_numero_carpeta }}<br>

            <label for="">Fecha de Ingreso:</label>
            {{ Carbon\Carbon::parse($formA->datos_fecha_ingreso)->format('d-m-Y')}}

            <div>
                <label for="">Modalidad de Ingreso:</label>
                @foreach ($arrayFormA['datosModalidad'] as $modalidad)
                    @if ($formA->modalidad_id == $modalidad->id)
                        {{ $modalidad->nombre }}<br>
                        @if ($modalidad->id == 3)
                            @foreach ($arrayFormA['datosPresentacion'] as $presentacion)
                                @if ($formA->presentacion_espontanea_id == $presentacion->id)
                                    <label for="">Presentación espontanea:</label>
                                    {{ $presentacion->nombre }}<br>
                                @endif
                            @endforeach
                        @endif

                        @if ($modalidad->id == 5)
                            @foreach ($arrayFormA['datosOrganismo'] as $organismo)
                                @if ($formA->derivacion_otro_organismo_id == $organismo->id)
                                    <label for="">Derivación de otro organismo:</label>
                                    {{ $organismo->nombre }}<br>
                                    @if ($organismo->id == 16)
                                        <label for="">Derivación de que otro organismo:</label>    
                                        {{ $formA->derivacion_otro_organismo_cual }}<br>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>
            
            <div>
                @foreach ($arrayFormA['datosEstadoCaso'] as $estadocaso)
                    @if ($formA->estadocaso_id == $estadocaso->id)
                        <label for="">Estado Actual:</label>
                        {{ $estadocaso->nombre }}<br>
                        @if ($estadocaso->id == 3)
                            @foreach ($arrayFormA['datosMotivoCierre'] as $motivoCierre)
                                @if ($formA->motivocierre_id == $motivoCierre->id)
                                    <label for="">Motivo de cierre:</label>
                                    {{ $motivoCierre->nombre }}<br>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>

            <div>
                @foreach ($arrayFormA['datosAmbito'] as $ambito)
                    @if ($formA->ambito_id == $ambito->id)
                        <label for="">Ámbito de competencia:</label>
                        {{ $ambito->nombre }}<br>
                        @if ($ambito->id == 2)
                            @foreach ($arrayFormA['datosDepartamento'] as $departamento)
                                @if ($formA->departamento_id == $departamento->id)
                                    <label for="">Departamento:</label>
                                    {{ $departamento->nombre }}<br>
                                @endif
                            @endforeach
                        @endif

                        @if ($ambito->id == 3)
                            @foreach ($arrayFormA['datosOtrasProv'] as $otrasProv)
                                @if ($formA->otrasprov_id == $otrasProv->id)
                                    <label for="">Otras provincias:</label>
                                    {{ $otrasProv->nombre }}<br>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>

            <label for="">Fiscalía/Juzgado Interviniente:</label>
            {{ $formA->fiscalia_juzgado }}<br>

            <div>
                @foreach ($arrayFormA['datosCaratulacion'] as $caratulacion)
                    @if ($formA->caratulacionjudicial_id == $caratulacion->id)
                        <label for="">Caratulación Judicial:</label>
                        {{ $caratulacion->nombre }}<br>
                        @if ($caratulacion->id == 7)
                            <label for="">Tipo de Caratulación Judicial:</label>
                            {{ $formA->caratulacionjudicial_otro }}<br>
                        @endif
                    @endif
                @endforeach
            </div>
            
            <label for="">N° Causa o Id Judicial:</label>
            {{ $formA->datos_nro_causa }}<br>

            <div>
                @foreach ($formA->profesionalintervinientes as $prof)
                    @foreach ($arrayFormA['datosProfesional'] as $profesional)
                    {{-- @dd($profesional) --}}
                        @if ($prof->profesional_id == $profesional->id)
                            <label for="">Nombre/Equipo/Profesión:</label>
                            {{ $profesional->nombre_apellido_equipo }}<br>
                        @endif
                    @endforeach

                    <label for="">Interviene desde:</label>
                    {{ Carbon\Carbon::parse($prof->datos_profesional_interviene_desde)->format('d-m-Y')}}<br>

                    @foreach ($arrayFormA['datosIntervieneActualmente'] as $profesionalInterviene)
                    {{-- @dd($profesional) --}}
                        @if ($prof->profesionalactualmente_id == $profesionalInterviene->id)
                            <label for="">Actualmente Interviene:</label>
                            {{ $profesionalInterviene->nombre }}<br>
                            @if ($profesionalInterviene->id == 2)
                                <label for="">Interviene hasta:</label>
                                {{ Carbon\Carbon::parse($prof->datos_profesional_interviene_hasta)->format('d-m-Y')}}
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>

        <h3 class="text-left" style="padding: 15px;">Caracterización de la victima</h3>
        @if ($formB !== null)
            <div class="ml-3">
                <!-- PRIMERA PREGUNTA -->
                    <label for="">Nombre y apellido:</label>
                    {{ $formB->victima_nombre_y_apellido }}<br>
                <!-- FIN PRIMERA PREGUNTA -->

                <!-- SEGUNDA PREGUNTA -->
                        <label for="victima_apodo">Apodo:</label>
                        {{ $formB->victima_apodo }}<br>
                <!-- FIN SEGUNDA PREGUNTA -->

                <!-- TERCERA PREGUNTA -->
                    <label for="">Género:</label>
                        @foreach ($arrayFormB['datosGenero'] as $genero)
                            @if ($genero->id == $formB->genero_id)
                                {{ $genero->nombre }}<br>
                            @endif
                        @endforeach
                <!-- FIN TERCERA PREGUNTA -->

                <!-- CUARTA PREGUNTA -->
                        <label for="">¿Cuenta con alguna documentación que permita acreditar su identidad?:</label>
                                @foreach ($arrayFormB['datosDocumento'] as $documento)
                                    @if ($documento->id == $formB->tienedoc_id)
                                        {{$documento->nombre}}<br>
                                    @endif
                                @endforeach
                <!-- FIN CUARTA PREGUNTA -->

                <!-- QUINTA PREGUNTA -->
                    <label for="">Tipo de documentación:</label>
                            @foreach ($arrayFormB['datosTipoDocumento'] as $tipoDocumento)
                                @if ($tipoDocumento->id == $formB->tipodocumento_id)
                                    {{$tipoDocumento->nombre}}<br>

                                    @if ($formB->tipodocumento_id == 6)
                                        <label for="">Estado de la residencia precaria:</label>
                                        @foreach ($arrayFormB['datosResidencia'] as $residenciaprecaria)
                                            @if ($residenciaprecaria->id == $formB->residenciaprecaria_id)
                                                {{$residenciaprecaria->nombre}}<br>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if ($formB->tipodocumento_id == 9)
                                        <label for="">Cual?</label>
                                        {{ $formB->victima_tipo_documento_otro }}<br>
                                    @endif
                                @endif
                            @endforeach
                <!-- FIN QUINTA PREGUNTA -->

                <!-- SEXTA PREGUNTA -->
                    <label for="">Nro Documento:</label>
                    {{ $formB->victima_documento }}<br>
                <!-- FIN SEXTA PREGUNTA -->

                {{-- PAIS DE NACIMIENTO --}}
                    <label for="">País de Nacimiento: </label>
                    {{ $formB->paisNacimiento }}<br>

                    <label for="">Provincia de nacimiento: </label>
                    {{ $formB->provinciaNacimiento }}<br>

                    <label for="">Localidad de nacimiento: </label>
                    {{ $formB->ciudadNacimiento }}<br>
                {{-- FIN PAIS --}}

                <!-- DECIMA PREGUNTA -->
                        <label for="">Fecha de nacimiento: </label>
                        {{ $formB->victima_fecha_nacimiento->format('d-m-Y')}}<br>
                <!-- FIN DECIMA PREGUNTA -->

                <!-- UNDECIMA PREGUNTA -->
                    <label for="">Edad:</label>
                    {{ $formB->victima_edad }}<br>
                <!-- FIN UNDECIMA PREGUNTA -->

                <!-- DUODECIMA PREGUNTA -->
                    <label for="">Franja Etaria</label>
                        @foreach ($arrayFormB['datosFranjaEtaria'] as $franjaEtaria)
                            @if ($franjaEtaria->id == $formB->franjaetaria_id)
                                {{$franjaEtaria->nombre}}<br>
                            @endif
                        @endforeach
                <!-- FIN DUODECIMA PREGUNTA -->

                <!-- DECIMATERCERA PREGUNTA -->
                    <label for="">Embarazo al momento del relevamiento:</label>
                        @foreach ($arrayFormB['datosEmbarazadaRelevamiento'] as $estaEmbarazada)
                            @if ($estaEmbarazada->id == $formB->embarazorelevamiento_id)
                                {{$estaEmbarazada->nombre}}<br>
                            @endif
                        @endforeach
                <!-- FIN DECIMATERCERA PREGUNTA -->

                <!-- DECIMACUARTA PREGUNTA -->
                    <label for="">¿Estuvo embarazada previamente?:</label>
                        @foreach ($arrayFormB['datosEmbarazoPrevio'] as $estuvoEmbarazada)
                            @if ($estuvoEmbarazada->id == $formB->embarazoprevio_id)
                                {{$estuvoEmbarazada->nombre}}<br>
                            @endif
                        @endforeach
                <!-- FIN DECIMACUARTA PREGUNTA -->

                <!-- DECIMAQUINTA PREGUNTA -->
                    <label for="">¿Tiene hijos de embarazos anteriores?:</label>
                        @foreach ($arrayFormB['datosHijos'] as $hijos)
                            @if ($hijos->id == $formB->hijosembarazo_id)
                                {{$hijos->nombre}}<br>
                            @endif
                        @endforeach
                <!-- FIN DECIMAQUINTA PREGUNTA -->

                <!-- DECIMASEXTA PREGUNTA -->
                        <label for="">¿Se encuentra bajo los efectos de alcohol o estupefacientes al momento del relevamiento?:</label>
                            @foreach ($arrayFormB['datosBajoEfecto'] as $efectos)
                                @if ($efectos->id == $formB->bajoefecto_id)
                                    {{$efectos->nombre}}<br>
                                @endif
                            @endforeach
                <!-- FIN DECIMASEXTA PREGUNTA -->

                <!-- DECIMASEPTIMA PREGUNTA -->
                        <label for="">¿Presenta algún tipo de discapacidad?</label>
                            @foreach ($formB->discapacidads as $discapacidad)
                                {{$discapacidad->nombre }}
                            @endforeach<br>
                <!-- FIN DECIMASEPTIMA PREGUNTA -->

                <!-- DECIMAOCTAVA PREGUNTA -->
                    <label for="">¿Presenta lesiones físicas visibles?</label>
                    @foreach ($arrayFormB['datosLesion'] as $lesion)
                        @if ($lesion->id == $formB->tienelesion_id)
                            {{$lesion->nombre}}<br>
                            @if ($formB->tienelesion_id == 1)
                                <label for="">Tipo de lesión:</label>
                                {{ $formB->victima_lesion }}<br>
                            @endif
                        @endif
                    @endforeach

                    @foreach ($arrayFormB['datosLesionConstatada'] as $constatada)
                        @if ($constatada->id == $formB->lesionconstatada_id)
                            <label class="">¿Fue constatado en el momento por algún profesional de la salud? :</label>
                            {{$constatada->nombre}}<br>
                            @if ($formB->lesionconstatada_id == 1)
                                <label class="">¿A qué organismo pertenece el profesional de la salud?:</label>
                                {{$formB->victima_lesion_organismo}}<br>
                            @endif
                        @endif
                    @endforeach
                <!-- FIN DECIMAOCTAVA PREGUNTA -->

                <!-- DECIMANOVENA PREGUNTA -->
                    <label for="">¿Tiene enfermedades crónicas?:</label>
                    @foreach ($arrayFormB['datoEnfermedadCronica'] as $enfermedad)
                        @if ($enfermedad->id == $formB->enfermedadcronica_id)
                            {{$enfermedad->nombre}}<br>
                            @if ($formB->enfermedadcronica_id == 1)
                                <label class="">Tipo de enfermedad crónica:</label>
                                {{ $formB->victima_tipo_enfermedad_cronica }}<br>
                            @endif
                        @endif
                    @endforeach
                <!-- FIN DECIMANOVENA PREGUNTA -->

                <!-- VIGESIMA PREGUNTA -->
                    <label>¿Presenta algún tipo de limitación para comunicarse? </label>
                    @foreach ($formB->limitacions as $limitacion)
                        {{$limitacion->nombre }}
                        @if ($limitacion->id == 5)
                            <br><label for="">Cual?</label>
                            {{$formB->victima_limitacion_otra}}
                        @endif
                    @endforeach
                <!-- FIN VIGESIMA PREGUNTA -->

                <!-- VIGESIMAPRIMERA PREGUNTA -->
                    <br><label for="">Máximo nivel educativo alcanzado:</label>
                    @foreach ($arrayFormB['datosNivelEducativo'] as $educacion)
                        @if ($educacion->id == $formB->niveleducativo_id)
                            {{$educacion->nombre}}<br>
                        @endif
                    @endforeach
                <!-- FIN VIGESIMAPRIMERA PREGUNTA -->

                <!-- VIGESIMASEGUNDA PREGUNTA -->
                    <label for="">¿Cuenta con algún oficio adquirido o de interés?: </label>
                    @foreach ($arrayFormB['datosOficio'] as $oficio)
                        @if ($oficio->id == $formB->oficio_id)
                            {{$oficio->nombre}}<br>
                            @if ($formB->oficio_id == 1)
                                <label for="">Cual?</label>
                                {{ $formB->victima_oficio_cual }}<br>
                            @endif
                        @endif
                    @endforeach
                <!-- FIN VIGESIMASEGUNDA PREGUNTA -->
            </div>
        @endif

        <h3 class="text-left" style="padding: 15px;">Referentes afectivos</h3>
        @if ($formC !== null)
            <div class="ml-3">
                <div class="form-group">
                    <label for="">¿Cuenta con alguna persona de referencia afectiva? </label>
                    @foreach ($arrayFormC['datosOtraspersonas'] as $otrasPersonas)
                        @if ($otrasPersonas->id == $formC->otraspersonas_id)
                            {{ $otrasPersonas->nombre }}<br>
                        @endif
                    @endforeach
                    @php $i = 1; @endphp
                    @foreach ($arrayFormC['referentes'] as $referente)
                        <div>
                            <h5><?php echo $i?>° Referente</h5>
                            <label for="">Referente - Nombre y apellido:</label>
                            {{ $referente->nombre_apellido }}<br>

                            <label for="">Referente - Edad:</label>
                            {{ $referente->edad }}<br>

                            <label for="">Referente - Tipo de vínculo con la víctima:</label>
                            @foreach ($arrayFormC['datosVinculos'] as $vinculo)
                                @if ($vinculo->id == $referente->vinculo_id)
                                    {{ $vinculo->nombre }}<br>
                                    @if ($vinculo->id == 6)
                                        <label for="">Cuál?</label>
                                        {{ $referente->vinculo_otro }}<br>
                                    @endif
                                @endif
                            @endforeach

                            <label for="">Contacto de referente:</label>
                            {{ $referente->referenteContacto }}<br>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        @endif
         
        <h3 class="text-left" style="padding: 15px;">Datos de delito</h3>
        @if ($formD !== null)
            <div class="ml-3">
                <label for="">Calificación general: </label>
                @foreach ($arrayFormD['datosCalificacionGeneral'] as $calificacionGeneral)
                    @if ( $calificacionGeneral->id == $formD->calificaciongeneral_id)
                        {{ $calificacionGeneral->nombre }}<br>
                        @if ($formD->calificaciongeneral_id == 8)
                            <label for="">Cuál?</label>
                            {{ $formD->calificaciongeneral_otra }}<br>
                        @endif
                    @endif
                @endforeach

                <label for="">Calificación específica: </label>
                @foreach ($arrayFormD['datosCalificacionEspecifica'] as $calificacionEspecifica)
                    @if ($formD->calificacionespecifica_id == $calificacionEspecifica->id)
                        {{ $calificacionEspecifica->nombre }}<br>
                    @endif
                @endforeach

                <label for="">Finalidad:</label>
                @foreach ($arrayFormD['datosFinalidad'] as $finalidad)
                    @if ($formD->finalidad_id == $finalidad->id)
                        {{$finalidad->nombre}}<br>
                        @if ($finalidad->id == 5)
                            <label for="">Cuál?</label>
                            {{$formD->finalidad_otra}}<br>
                        @endif
                    @endif
                @endforeach
                <label for="">Actividad: </label>
                @foreach ($arrayFormD['datosActividad'] as $actividad)
                    @if ($formD->actividad_id == $actividad->id)
                        {{$actividad->nombre}}<br>
                        @if ($actividad->id == 1 || $actividad->id == 2)
                            <label for="">Tipo de negocio de venta: </label>
                            @foreach ($formD->rurals as $rural)
                                {{$rural->nombre}}
                                @if ($rural->id == 6)
                                    <br><label for="">Cuál?</label>
                                    {{$formD->rural_otra}}<br>
                                @endif
                            @endforeach

                            <label for="">Domicilio del lugar de venta:</label>
                            {{$formD->domicilioVenta}}<br>
                        @endif

                        @if ($actividad->id == 3 || $actividad->id == 4)
                            <label for="">Lugar de ofrecimiento:</label>
                            @foreach ($formD->privados as $privado)
                                {{$privado->nombre}}
                                @if ($privado->id == 8)
                                    <br><label for="">Cuál?</label>
                                    {{ $formD->privado_otra }}
                                @endif
                            @endforeach
                        @endif

                        @if ($actividad->id == 5)
                            <label for="">Nombre de marca, sello, nombre registral o franquicia:</label>
                            {{ $formD->marcaTextil }}<br>

                            <label for="">Lugar de venta:</label>
                            @foreach ($formD->textils as $textil)
                                {{$textil->nombre}}
                                @if ($textil->id == 6)
                                    <br><label for="">Cuál?</label>
                                    {{ $formD->textil_otra }}
                                @endif
                            @endforeach
                        @endif

                        @if ($actividad->id == 6)
                            <label for="">Cuál?</label>
                            {{ $formD->actividad_otra }}<br>
                        @endif

                    @endif
                @endforeach

                <label for="">País de captación:</label>
                {{ $formD->paisCaptacion }}<br>

                <label for="">Provincia de captación:</label>
                {{ $formD->provinciaCaptacion }}<br>

                <label for="">Localidad de captación:</label>
                {{ $formD->ciudadCaptacion }}<br>

                
                @foreach ($arrayFormD['datosContactoExplotacion'] as $contactoExplotacion)
                    @if ($formD->contactoexplotacion_id == $contactoExplotacion->id)
                        <label for="">Modo de contacto con lugar de explotación:</label>
                        {{ $contactoExplotacion->nombre }}<br>
                        @if ($formD->contactoexplotacion_id == 6)
                            <label for="">Cuál?</label>
                            {{ $formD->contactoexplotacion_otro }}<br>
                        @endif
                    @endif
                @endforeach

                <label for="">Viajó:</label>
                @foreach ($arrayFormD['datosViajo'] as $viajo)
                    @if ($formD->viajo_id == $viajo->id)
                        {{ $viajo->nombre }}
                        @if ($viajo->id == 2)
                            <label for="">¿Por quién?:</label>
                            @foreach ($arrayFormD['datosAcompanado'] as $acompanado)
                                @if ($formD->acompanado_id == $acompanado->id)
                                    {{ $acompanado->nombre }}<br>
                                @endif
                            @endforeach
                            <label for="">Acompañante relacionado con la red:</label>
                            @foreach ($arrayFormD['datosAcompanadoRed'] as $acompanadoRed)
                                @if ($formD->acompanadored_id == $acompanadoRed->id)
                                    {{ $acompanadoRed->nombre }}<br>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach

                <label for="">País de explotación:</label>
                {{ $formD->paisExplotacion }}<br>

                <label for="">Provincia de explotación:</label>
                {{ $formD->provinciaExplotacion }}<br>

                <label for="">Localidad de explotación:</label>
                {{ $formD->ciudadExplotacion }}<br>

                <label for="">Domicilio de explotación:</label>
                {{ $formD->domicilio }}<br>

                <label for="">¿Pasó por otros lugares de explotación previamente?</label>
                @foreach ($arrayFormD['datosLugarExplotacion'] as $lugarExplotacion)
                    @if ($formD->otrolugarexplotacion_id == $lugarExplotacion->id)
                        {{ $lugarExplotacion->nombre }}<br>
                        @if ($lugarExplotacion->id == 1)
                            <label for="">Cuál/es?</label>
                            {{ $formD->lugarexplotacionCual }}<br>
                        @endif
                    @endif
                @endforeach

                <label for="">Reside en el lugar de explotación u otro espacio perteneciente a los tratantes?</label>
                @foreach ($arrayFormD['datosResideLugar'] as $resideLugar)
                    @if ($formD->residelugar_id == $resideLugar->id)
                        {{ $resideLugar->nombre }}<br>
                    @endif
                @endforeach

                <label for="">Engaño en actividad y/o condiciones:</label>
                @foreach ($arrayFormD['datosEngano'] as $engano)
                    @if ($formD->engano_id == $engano->id)
                        {{ $engano->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿Se encontraban otras personas en situación de explotación en el mismo espacio?</label>
                @foreach ($arrayFormD['datosHayPersona'] as $hayPersona)
                    @if ($formD->haypersona_id == $hayPersona->id)
                        {{$hayPersona->nombre}}<br>
                    @endif
                @endforeach

                <label for="">Tipo de víctima:</label>
                @foreach ($arrayFormD['datosTipoVictima'] as $tipoVictima)
                    @if ($formD->tipovictima_id == $tipoVictima->id)
                        {{ $tipoVictima->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿Qué tareas realiza?</label>
                {{ $formD->tarea }}<br>

                <label for="">Aproximado de horas diarias dedicadas a la actividad:</label>
                {{ $formD->horasTarea }}<br>

                <label for="">Frecuencia de pago:</label>
                @foreach ($arrayFormD['datosFrecuenciaPago'] as $frecuenciaPago)
                    @if ($formD->frecuenciapago_id == $frecuenciaPago->id)
                        {{ $frecuenciaPago->nombre }}<br>
                    @endif
                @endforeach

                <label for="">Modalidad de pago: </label>
                @foreach ($arrayFormD['datosModalidadPago'] as $modalidadPago)
                    @if ($formD->modalidadpagos_id == $modalidadPago->id)
                        {{ $modalidadPago->nombre }}
                        @if ($modalidadPago->id == 4)
                            <label for="">Tipo de especias en concepto de pago:</label>
                            @foreach ($formD->especiaconceptos as $especiaConcepto)
                                {{ $especiaConcepto->nombre }}
                                @if ($especiaConcepto->id == 5)
                                    <br><label for="">Cuál?</label>
                                    {{ $formD->especiaconceptos_otro }}
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach

                <br><label for="">Monto en Pesos: $</label>
                {{ $formD->montoPago }}<br>

                <label for="">Existencia de deuda:</label>
                @foreach ($arrayFormD['datosDeuda'] as $deuda)
                    @if ($formD->deuda_id == $deuda->id)
                        {{ $deuda->nombre }}<br>
                        @if ($deuda->id == 1)
                            <label for="">Motivo de la deuda: </label>
                            @foreach ($formD->motivodeudas as $motivoDeuda)
                                {{ $motivoDeuda->nombre }}
                                @if ($motivoDeuda->id == 5)
                                    <br><label for="">Cuál?</label>
                                    {{ $formD->motivodeuda_otro }}
                                @endif
                            @endforeach
                            <br><label for="">Lugar de deuda:</label>
                            @foreach ($arrayFormD['datosLugarDeuda'] as $lugarDeuda)
                                @if ($formD->lugardeuda_id == $lugarDeuda->getId())
                                    {{ $lugarDeuda->nombre }}<br>
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach

                <label for="">Tiempo de permanencia en situación de explotación:</label>
                @foreach ($arrayFormD['datosPermanencia'] as $permanencia)
                    @if ($formD->permanencia_id == $permanencia->id)
                        {{ $permanencia->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿Es testigo protegido?:</label>
                @foreach ($arrayFormD['datosTestigo'] as $testigo)
                    @if ($formD->testigo_id == $testigo->id)
                        {{ $testigo->nombre }}<br>
                        @if ($testigo->id == 1)
                            <label for="">Coordinador PNT a cargo:</label>
                            {{ $formD->coordinadorPTN }}<br>

                            <label for="">Otros datos:</label>
                            {{ $formD->coordinadorPTN_otro }}<br>
                        @endif
                    @endif
                @endforeach

                <label for="">¿El lugar de explotación cuenta con corriente eléctrica?:</label>
                @foreach ($arrayFormD['datosHayCorriente'] as $hayCorriente)
                    @if ($formD->haycorriente_id == $hayCorriente->id)
                        {{ $hayCorriente->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿El lugar de explotación cuenta con gas?:</label>
                @foreach ($arrayFormD['datosHayGas'] as $hayGas)
                    @if ($formD->haygas_id == $hayGas->id)
                        {{ $hayGas->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿Qué medidas de control posee el lugar?:</label>
                @foreach ($formD->haymedidas as $hayMedida)
                    {{ $hayMedida->nombre }}
                    @if ($hayMedida->id == 6)
                        <br><label for="">Cuál?</label>
                        {{ $formD->haymedidas_otro }}<br>
                    @endif
                @endforeach

                <label for="">¿Se presentan condiciones de hacinamiento en el lugar de explotación?:</label>
                @foreach ($arrayFormD['datosHayHacinamiento'] as $hayHacinamiento)
                    @if ($formD->hayhacinamiento_id == $hayHacinamiento->id)
                        {{ $hayHacinamiento->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿El lugar de explotación posee agua potable?:</label>
                @foreach ($arrayFormD['datosHayAgua'] as $hayAgua)
                    @if ($formD->hayagua_id == $hayAgua->id)
                        {{ $hayAgua->nombre }}<br>
                    @endif
                @endforeach

                <label for="">El lugar de explotación posee:</label>
                @foreach ($arrayFormD['datosHayBano'] as $hayBano)
                    @if ($formD->haybano_id == $hayBano->id)
                        {{ $hayBano->nombre }}<br>
                    @endif
                @endforeach

                <label for="">¿El lugar de explotación cuenta con una cantidad de baños suficientes?:</label>
                @foreach ($arrayFormD['datosCuantosBano'] as $cuantosBano)
                    @if ($formD->cuantosbano_id == $cuantosBano->id)
                        {{ $cuantosBano->nombre }}<br>
                    @endif
                @endforeach

                <label for="">Material de contrucción predominante en las paredes del lugar de explotación:</label>
                @foreach ($arrayFormD['datosMaterial'] as $material)
                    @if ($formD->material_id == $material->id)
                        {{ $material->nombre }}
                        @if ($material->id == 7)
                            <label for="">Cuál?</label>
                            {{ $formD->material_otro }}
                        @endif
                    @endif
                @endforeach

                <label for="">Provisión de elementos de trabajo por parte del explotador:</label>
                @foreach ($arrayFormD['datosElementoTrabajo'] as $elementoTrabajo)
                    @if ($formD->elementotrabajo_id == $elementoTrabajo->id)
                        {{ $elementoTrabajo->nombre }}
                    @endif
                @endforeach

                <label for="">Provisión de elementos de seguridad por parte del explotador:</label>
                @foreach ($arrayFormD['datosElementoSeguridad'] as $elementoSeguridad)
                    @if ($formD->elementoseguridad_id == $elementoSeguridad->id)
                        {{ $elementoSeguridad->nombre }}
                    @endif
                @endforeach
            </div>
        @endif

        <h3 class="text-left" style="padding: 15px;">Atención del caso</h3>
        @if ($formF !== null)
            <div class="ml-3">
                <label for="">Organismos que intervinieron previamente:</label>
                @foreach ($arrayFormF['datosIntervinieronOrganismos'] as $organismos)
                    @if ($organismos->id == $formF->intervinieronOrganismos_id)
                        {{ $organismos->nombre }}<br>
                        @foreach ($arrayFormF['aFormularios'] as $aFormulario)
                            @if ($aFormulario->datos_numero_carpeta == $formF->numeroCarpeta)
                                @if ($aFormulario->derivacion_otro_organismo_id !== 16)
                                    @foreach ($arrayFormF['derivacionOrganismo'] as $organismo)
                                        @if ($organismo->id == $aFormulario->derivacion_otro_organismo_id)
                                            {{ $organismo->nombre }}<br>
                                        @endif
                                    @endforeach
                                @endif
                                @if($aFormulario->derivacion_otro_organismo_id == 16)
                                    {{ $aFormulario->derivacion_otro_organismo_cual }}<br>
                                @endif
                                @if($aFormulario->derivacion_otro_organismo_id == null)
                                    {{-- <input type="text" name="" class="form-control ml-3" readonly="readonly" value="No intervino ningún organismo previamente"> --}}
                                @endif


                                @if ($aFormulario->derivacion_otro_organismo_id !== 16)
                                    @if ($formF->orgjudicials)
                                        <label for="">Organismos Judiciales:</label>
                                        @foreach ($formF->orgjudicials as $orgJudicial)
                                            {{ $orgJudicial->nombre }}
                                        @endforeach
                                    @endif

                                    @if (count($formF->orgprognacionals) !== 0)
                                        <br><label for="">Organismos/Programas Nacionales:</label>
                                        @foreach ($formF->orgprognacionals as $progNacionales)
                                            {{ $progNacionales->nombre }}
                                            @if ($progNacionales->id == 9)
                                                @foreach ($arrayFormF['orgProgNacionalOtro'] as $otroProgNacional)
                                                    @if ($otroProgNacional->fformulario_id == $formF->id)
                                                        <br><label for="">Otro programa nacional:</label>
                                                        {{ $otroProgNacional->nombreOrganismo }}
                                                    @endif
                                                @endforeach
                                            @endif  
                                        @endforeach
                                    @endif

                                    @if (count($arrayFormF['orgProgProvincial']) !== 0)
                                        @foreach ($arrayFormF['orgProgProvincial'] as $programaProv)
                                            @if ($programaProv->fformulario_id === $formF->id)
                                                <br><label for="">Organismos/Programas Provinciales</label>
                                                {{ $programaProv->nombreOrganismo }}
                                            @endif
                                        @endforeach
                                    @endif

                                    @if (count($arrayFormF['orgProgMunipal']) !== 0)
                                        @foreach ($arrayFormF['orgProgMunipal'] as $programaMuni)
                                            @if ($programaMuni->fformulario_id === $formF->id)
                                            <br><label for="">Organismos/Programas Municipales</label>
                                            {{ $programaMuni->nombreOrganismo  }}
                                            @endif
                                        @endforeach
                                    @endif

                                    @if (count($formF->policias) !== 0)
                                        <br><label for="">Policía:</label>
                                        @foreach ($formF->policias as $policia)
                                            {{ $policia->nombre }}
                                        @endforeach
                                    @endif

                                    @if (count($arrayFormF['orgSocCivil']) !== 0)
                                        @foreach ($arrayFormF['orgSocCivil'] as $organizacion)
                                            @if ($organizacion->fformulario_id === $formF->id)
                                                    <br><label for="">Organizaciones de la Sociedad Civil:</label>
                                                    {{ $organizacion->nombreOrganismo  }}
                                            @endif
                                        @endforeach
                                    @endif
                                @endif

                                @if (count($formF->asistencias) !== 0)
                                    <br><label for="">Tipo de asistencia requerida:</label>
                                    @foreach ($formF->asistencias as $asistencia)
                                        {{ $asistencia->nombre }}
                                        @if ($asistencia->id == 3)
                                            @foreach ($formF->socioeconomics as $socioeconomica)
                                                {{$socioeconomica->nombre}}
                                                @if ($socioeconomica->id == 8)
                                                    <br><label for="">Cual?</label>
                                                    {{ $formF->socioeconomicaCual }}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endforeach

                        <br><label for="">Se ha articulado con otros organismos en el transcurso de la asistencia?</label>
                            @foreach ($arrayFormF['datosIntervinieronOrganismosActualmente'] as $organismosActualmente)
                                @if ($organismosActualmente->id == $formF->intervinieronOrganismosActualmente_id)
                                    {{ $organismosActualmente->nombre }}
                                @endif
                            @endforeach
                        </select>

                        @if (count($formF->orgjudicialactualmentes) !== 0)
                            <br><label for="">Organismos Judiciales:</label>
                            @foreach ($formF->orgjudicialactualmentes as $orgJudicialesActualmente)
                                {{ $orgJudicialesActualmente->nombre }}
                            @endforeach
                        @endif
                        

                        @if (count($formF->orgprognacionalactualmentes) !== 0)
                            <br><label for="">Organismos/Programas Nacionales:</label>
                            @foreach ($formF->orgprognacionalactualmentes as $progNacionalesActualmente)
                                {{ $progNacionalesActualmente->nombre }}
                                @if ($progNacionalesActualmente->id == 9)
                                    @foreach ($arrayFormF['orgProgNacionalActualmenteOtro'] as $progNacionalOtro)
                                        <br><label for="">Otro programa nacional:</label>
                                        {{ $progNacionalOtro->nombreOrganismo }}
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                        
                        @if (count($arrayFormF['orgProgProvincialesAlactualmente']) !== 0)
                            @foreach ($arrayFormF['orgProgProvincialesAlactualmente'] as $programaProvActualmente)
                                @if ($programaProvActualmente->fformulario_id === $formF->id)
                                    <br><label for="">Organismos/Programas Provinciales</label>
                                    {{ $programaProvActualmente->nombreOrganismo }}
                                @endif
                            @endforeach
                        @endif

                        @if (count($arrayFormF['orgProgMunipalesActualmente']) !== 0)
                            @foreach ($arrayFormF['orgProgMunipalesActualmente'] as $programaMuniActualmente)
                                @if ($programaMuniActualmente->fformulario_id === $formF->id)
                                    <br><label for="">Organismos/Programas Municipales</label>
                                    {{ $programaMuniActualmente->nombreOrganismo  }}
                                @endif
                            @endforeach
                        @endif

                        @if (count($formF->policiaactualmentes) !== 0)
                            <br><label for="">Policía:</label>
                            @foreach ($formF->policiaactualmentes as $policia)
                                {{ $policia->nombre }}
                            @endforeach
                        @endif

                        @if (count($arrayFormF['orgSocCivilActualmente']) !== 0)
                            @foreach ($arrayFormF['orgSocCivilActualmente'] as $organizacionActualmente)
                                @if ($organizacionActualmente->fformulario_id === $formF->id)
                                        <br><label for="">Organizaciones de la Sociedad Civil:</label>
                                        {{ $organizacionActualmente->nombreOrganismo  }}
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>
        @endif

        <h3 class="text-left" style="padding: 15px;">Detalle de intervención</h3>
        @if ($formG !== null)
            <div class="ml-3">
                <label for="">Introducción:</label>
                {{ $formG->introduccion }}

                <div>
                    @php $i = 1; @endphp
                    @foreach ($arrayFormG['intervenciones'] as $intervencion)
                        <h5><?=$i?>° Intervención</h5>
                        <label for="">Fecha:</label>
                        {{ $intervencion->fechaIntervencion }}

                        <div>
                            <label for="">Tema:</label>
                            @foreach ($arrayFormG['temaIntervencion'] as $tema)
                                @if ($tema->id == $intervencion->temaIntervencion_id)
                                    {{ $tema->nombre }}
                                @endif
                            @endforeach<br>
                            @if ($intervencion->temaOtro)
                                    <label for="">Cual?</label>
                                    {{ $intervencion->temaOtro }}
                                    <br>
                            @endif
                        </div>
                            
                        <div>
                            <label for="">Nombre de contacto:</label>
                            {{ $intervencion->nombreContacto }}<br>
                            <label for="">Teléfono de contacto:</label>
                            {{ $intervencion->telefonoContacto }}<br>
                            <label for="">Descripción de la intervención:</label>
                            {{ $intervencion->descripcionIntervencion }}<br>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        @endif
    </section>
    
    <div class="noimprimible botones">
        <input type="button" id="imprimirbtn" name="imprimir" class="mb-3 btn btn-dark imprimir ml-4" style="width:100px" value="Imprimir">
        <a href="/resumenPDF/{{ $carpeta->id }}" id="descargarbtn" style="width:100px" name="descargar" class="btn btn-dark descargar ml-4">Descargar</a>
    </div>

    <script>
        $(".imprimir").click(function(){
            // var noprint=$("#noimprimir").html();
            $(".noimprimible").hide();
            $("#imprimible").show();
            $(".logo").show();
            window.print();
            $(".noimprimible").show();
            $(".logo").hide();
        });
    </script>
</body>
</html>