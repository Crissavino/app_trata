<!DOCTYPE html>
<html>
<head>
	@include('partials.head')
	<title>Eje E: Atención del caso</title>
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
        <li class="nav-item active"> <a class="nav-link " href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
    <ul class="nav nav-tabs">
        @if ($idFormA)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/A/{{ $idCarpeta }}/{{ $idFormA }}">Eje A: Datos institucionales</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/A">Eje A: Datos institucionales</a> </li>
        @endif
        @if ($idFormB)
            <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/B/{{ $idCarpeta }}/{{ $idFormB }}">Eje B: Caracterización de la víctima</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/B/{{ $idCarpeta }}">Eje B: Caracterización de la víctima</a> </li>
        @endif
        @if ($idFormC)
            <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/C/{{ $idCarpeta }}/{{ $idFormC }}">Eje C: Referentes afectivos</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/C/{{ $idCarpeta }}">Eje C: Referentes afectivos</a> </li>
        @endif
        @if ($idFormD)
            <li class="nav-item"> <a class="nav-link" href="/formularios/edicion/D/{{ $idCarpeta }}/{{ $idFormD }}">Eje D: Datos de delito</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link" href="/formularios/D/{{ $idCarpeta }}">Eje D: Datos de delito</a> </li>
        @endif
        {{-- @if ($idFormE)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/E/{{ $idFormE }}">Eje E: Datos del imputado</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/E">Eje E: Datos del imputado</a> </li>
        @endif --}}
        {{-- el eje F paso a ser el eje E y el eje G paso a ser el eje F --}}
        @if ($idFormF)
            <li class="nav-item"> <a class="nav-link active" href="/formularios/edicion/F/{{ $idCarpeta }}/{{ $idFormF }}">Eje E: Atención del caso</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link active" href="/formularios/F/{{ $idCarpeta }}">Eje E: Atención del caso</a> </li>
        @endif
        @if ($idFormG)
            <li class="nav-item"> <a class="nav-link " href="/formularios/edicion/G/{{ $idCarpeta }}/{{ $idFormG }}">Eje F: Detalle de intervención</a> </li>
        @else
            <li class="nav-item"> <a class="nav-link " href="/formularios/G/{{ $idCarpeta }}">Eje F: Detalle de intervención</a> </li>
        @endif
    </ul>
</header>
<body>
    <section class="container">
        @if (auth()->user()->isAdmin !== 2 && $usuarioCarpeta == auth()->user()->id)
            <form action="" id="formularioF" class="form-group" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <h1 class="text-center" style="padding: 15px;">
                    {{-- ele eje F paso a ser el eje E --}}
                    Eje E: Atención del caso
                    <h5 style="text-align: center;" >Estás trabajando sobre la carpeta n° {{ $formularioF->numeroCarpeta }}</h5>
                </h1>
                <label for="">E 1. Organismos que intervinieron previamente:</label>
                <select class="ml-3 mb-3 form-control intervinieronOrganismos_id" name="intervinieronOrganismos_id">
                    @foreach ($datosIntervinieronOrganismos as $organismos)
                        @php
                            $selected = ($organismos->id == $formularioF->intervinieronOrganismos_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $organismos->id }}" {{ $selected }}>{{ $organismos->nombre }}</option>
                    @endforeach
                </select>
                <div class="form-group organismoDerivo" style="display: none;">
                    @foreach ($aFormularios as $aFormulario)
                        @if ($aFormulario->datos_numero_carpeta == $formularioF->numeroCarpeta)
                            @if ($aFormulario->derivacion_otro_organismo_id !== 16)
                                @foreach ($derivacionOrganismo as $organismo)
                                    @if ($organismo->id == $aFormulario->derivacion_otro_organismo_id)
                                        <input type="text" name="" class="form-control ml-3" readonly="readonly" 
                                        value="{{ $organismo->nombre }}">
                                    @endif
                                @endforeach
                            @endif
                            @if($aFormulario->derivacion_otro_organismo_id == 16)
                                <input type="text" name="" class="form-control ml-3" readonly="readonly" 
                                    value="{{ $aFormulario->derivacion_otro_organismo_cual }}">
                            @endif
                            @if($aFormulario->derivacion_otro_organismo_id == null)
                                {{-- <input type="text" name="" class="form-control ml-3" readonly="readonly" value="No intervino ningún organismo previamente"> --}}
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="intervinieron" style="display: none;">
                    <div class="form-group">
                        <label for="">E 1 I. Organismos Judiciales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosOrgJudiciales as $orgJudicial)
                            @php
                                $orgJudicialIds = $formularioF->orgjudicials->pluck('id')->toArray();
                                $checked = (in_array($orgJudicial->id, $orgJudicialIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $orgJudicial->id }}">{{ $orgJudicial->nombre }}</label>
                                <input {{ $checked }} type="checkbox" id="{{ $orgJudicial->id }}" value="{{ $orgJudicial->id }}" name="orgjudicials_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">E 1 II. Organismos/Programas Nacionales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosProgNacionales as $progNacionales)
                            @php
                                $progNacionalesIds = $formularioF->orgprognacionals->pluck('id')->toArray();
                                $checked = (in_array($progNacionales->id, $progNacionalesIds)) ? 'checked' : '';
                            @endphp
                            <div class="ml-3">
                                @if ($progNacionales->nombre == 'Otro')
                                            <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                            <input {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]" class="orgProgNacionalOtro">
                                @else
                                    <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                    <input {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]">
                                @endif      
                            </div>      
                        @endforeach

                        <div class="form-group orgProgNacionalCual" style="display: none;">
                            <input type="text" name="idsEliminados1" id="idsEliminados1" value="" style="display: none;">
                            @php $i = 1; @endphp
                            <div id="container_orgProgNacionalCualInput">
                            @foreach ($orgProgNacionalOtro as $otroProgNacional)
                                @if ($otroProgNacional->fformulario_id === $formularioF->id)
                                    <div class="otroProgNacionalOtro{{ $otroProgNacional->id }}">
                                        <label for=""><?php echo $i ?>° Cargado Anteriormente</label><a onclick="borrarOrgProgNacionalOtro({{ $otroProgNacional->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                        <input type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro_viejo[]" value="{{ $otroProgNacional->nombreOrganismo }}" ><br>
                                    </div>
                                @endif
                            @php $i++; @endphp
                            @endforeach
                            </div>
                            <div id="orgProgNacionalCual" name="orgProgNacionalCual">
                                <div id="container_orgProgNacionalCual">
                                   <!--  <div>
                                        <br/>
                                        <label for="">Cual?</label>
                                        <input type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro[]">
                                    </div> -->
                                </div>
                            </div>
                            

                            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalAgregarOtro" value="Agregar Otro" name="">
                            <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgNacionalBorrarOtro" value="Borrar Otro" name=""><br><br>
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <label for="">E 1 III.Organismos/Programas Provinciales:</label>
                        <input type="text" name="idsEliminados2" id="idsEliminados2" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgProgProvinciales_viejo">
                        @foreach ($orgProgProvincial as $programaProv)
                            @if ($programaProv->fformulario_id === $formularioF->id)
                                <div class="programaProv{{ $programaProv->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgProv({{ $programaProv->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input name="orgProgProvinciales_viejo[]" type="text" class="form-control ml-3 mb-3" value="{{ $programaProv->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                        <div id="orgProgProvinciales">
                            <div id="container_orgProgProvinciales">
                                <!-- <label for="">E 1 III. Organismos/Programas Provinciales:</label>
                                <input type="text" class="form-control ml-3" value="" name="orgProgProvinciales[]"> -->
                            </div>
                        </div>              
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesBorrarOtro" value="Borrar Otro" name=""><br><br>

                    <div class="form-group">
                    <label for="">E 1 IV.Organismos/Programas Municipales:</label>
                        <input type="text" name="idsEliminados3" id="idsEliminados3" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgProgMunicipales_viejo">
                        @foreach ($orgProgMunipal as $programaMuni)
                            @if ($programaMuni->fformulario_id === $formularioF->id)
                                <div class="programaMuni{{ $programaMuni->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgMuni({{ $programaMuni->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgProgMunicipales_viejo[]" class="form-control ml-3" value="{{ $programaMuni->nombreOrganismo  }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                        <div id="orgProgMunicipales">
                            <div id="container_orgProgMunicipales">
                            <!-- <label for="">E 1 IV. Organismos/Programas Municipales:</label>
                            <input type="text" class="form-control ml-3" name="orgProgMunicipales[]"> -->
                            </div>
                        </div>              
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesAgregarOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesBorrarOtro" value="Borrar Otro" name=""><br><br>

                    <div class="form-group">
                        <label for="">E 1 V. Policía:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label>
                        @foreach ($datosPolicia as $policia)
                            @php
                                $policiaIds = $formularioF->policias->pluck('id')->toArray();
                                $checked = (in_array($policia->id, $policiaIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $policia->id }}">{{ $policia->nombre }}</label>
                                <input {{ $checked }} type="checkbox" id="{{ $policia->id }}" value="{{ $policia->id }}" name="policias_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                    <label for="">Organizaciones de la Sociedad Civil:</label>
                        <input type="text" name="idsEliminados4" id="idsEliminados4" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgSocCivil_viejo">
                        @foreach ($orgSocCivil as $organizacion)
                            @if ($organizacion->fformulario_id === $formularioF->id)
                                <div class="organizacion{{ $organizacion->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgCivil({{ $organizacion->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgSocCivil_viejo[]" class="ml-3 form-control" value="{{ $organizacion->nombreOrganismo  }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                        <div id="orgSocCivil">
                            <div id="container_orgSocCivil">
                            <!-- <label for="">E 1 VI. Organizaciones de la Sociedad Civil:</label>
                            <input type="text" class="ml-3 form-control" name="orgSocCivil[]"> -->
                            </div>
                        </div>              
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilAgregarOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilBorrarOtro" value="Borrar Otro" name=""><br><br>
                </div>

                {{-- F 2 --}}
                <div class="form-group">
                    <label for="">E 2. Tipo de asistencia requerida:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label>
                    @foreach ($datosAsistencia as $asistencia)
                        @php
                            $asistenciaIds = $formularioF->asistencias->pluck('id')->toArray();
                            $checked = (in_array($asistencia->id, $asistenciaIds)) ? 'checked' : ''
                        @endphp
                        <div class="ml-3">
                            @if ($asistencia->id === 3)
                                <label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
                                <input {{ $checked }} type="checkbox" class="socioEconomicaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
                            @else
                                <label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
                                <input {{ $checked }} type="checkbox" class="asistenciaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
                            @endif
                        </div>
                    @endforeach
                    <div class="ml-3 socioEconomica" style="display: none;">
                        @foreach ($datosSocioeconomica as $socioeconomica)
                            @php
                                $socioeconomicaIds = $formularioF->socioeconomics->pluck('id')->toArray();
                                $checked = (in_array($socioeconomica->id, $socioeconomicaIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $socioeconomica->id }}">{{ $socioeconomica->nombre }}</label>
                                <input {{ $checked }} type="checkbox" class="deSocioEconomica{{ $socioeconomica->id }}" id="{{ $socioeconomica->id }}" value="{{ $socioeconomica->id }}" name="socioeconomic_id[]">
                            </div>
                        @endforeach
                    </div>
                    <div class="ml-3 socioEconomicaCual" style="display: none;">
                        <label for="">Cual?</label>
                        <input type="text" class="form-control socioEconomicaCualInput" value="{{ $formularioF->socioeconomicaCual }}" name="socioeconomicaCual">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">E 3 Organismos con los que se articula actualmente:</label><br>
                    <label for="">Se ha articulado con otros organismos en el transcurso de la asistencia?</label>
                    <select name="intervinieronOrganismosActualmente_id" class="form-control intervinieronOrganismosActualmente_id">
                        @foreach ($datosIntervinieronOrganismosActualmente as $organismosActualmente)
                            @php
                                $selected = ($organismosActualmente->id == $formularioF->intervinieronOrganismosActualmente_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $organismosActualmente->id }}" {{ $selected }}>{{ $organismosActualmente->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="intervinieronActualmente" style="display: none;">
                    <div class="form-group">
                        <label for="">E 3 I. Organismos Judiciales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                            @php
                                $orgJudicialesActualmenteIds = $formularioF->orgjudicialactualmentes->pluck('id')->toArray();
                                $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                                <input {{ $checked }} type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">E 3 II. Organismos/Programas Nacionales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                            @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                                @php
                                    $progNacionalesActualmenteIds = $formularioF->orgprognacionalactualmentes->pluck('id')->toArray();
                                    $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                                @endphp
                                <div class="ml-3">
                                    @if ($progNacionalesActualmente->nombre == 'Otro')
                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                        <input {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                    @else
                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                        <input {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                    @endif  
                                </div>
                            @endforeach

                        <div class="form-group orgprognacionalActualmenteCual" style="display: none;">
                            <input type="text" name="idsEliminados11" id="idsEliminados11" value="" style="display: none;">
                            @php $i = 1; @endphp
                            <div id="container_orgprognacionalActualmenteOtro_viejo">
                            @foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                                @if ($progNacionalOtro->fformulario_id === $formularioF->id)
                                    <div class="progNacionalOtro{{ $progNacionalOtro->id }}">
                                        <label for=""><?php echo $i ?>° Cargado Anteriormente</label><a onclick="borrarProgNacionalOtro({{ $progNacionalOtro->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                        <input type="text" name="orgprognacionalActualmenteOtro_viejo[]" class="form-control ml-3" value="{{ $progNacionalOtro->nombreOrganismo }}"><br>
                                    </div>
                                @endif
                            @php $i++; @endphp
                            @endforeach
                            </div>
                            <div id="orgprognacionalActualmenteCual">
                                <div id="container_orgProgNacionalActualmenteCualInput">
                                <!-- <label for="">Cual?</label>
                                <input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput" name="orgprognacionalActualmenteOtro[]"><br> -->
                                </div>
                            </div>
                            
                            <input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteAgregarOtro" value="Agregar Otro" name="">
                            <input type="button" class="ml-3 btn btn-outline-primary btnOrgprognacionalActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
                        </div>
                    </div>

                    <div class="form-group orgProgProvincialesActualmente">
                        <label for="">E 3 III. Organismos/Programas Provinciales:</label>
                        <input type="text" name="idsEliminados22" id="idsEliminados22" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgProgProvincialesActualmente_viejo">
                        @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                            @if ($provActualmente->fformulario_id === $formularioF->id)
                                <div class="provActualmente{{ $provActualmente->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgProvActualmente({{ $provActualmente->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgProgProvincialesActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $provActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                    </div>
                    <div id="orgProgProvincialesActualmente">
                        <div id="container_orgProgProvincialesActualmente"></div>
                        <!-- <label for="">E 3 III. Organismos/Programas Provinciales:</label>
                        <input type="text" class="form-control ml-3 mb-3" name="orgProgProvincialesActualmente[]"> -->
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteAgregarOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgProvincialesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

                    <div class="form-group orgProgMunicipalesActualmente">
                    <label for="">E 3 IV. Organismos/Programas Municipales:</label>
                    <input type="text" name="idsEliminados33" id="idsEliminados33" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgProgMunicipalesActualmente_viejo">
                        @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                            @if ($muniActualmente->fformulario_id === $formularioF->id)
                                <div class="muniActualmente{{ $muniActualmente->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgMuniActualmente({{ $muniActualmente->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgProgMunicipalesActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $muniActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                    </div>
                    <div id="orgProgMunicipalesActualmente">
                        <div id="container_orgProgMunicipalesActualmente"></div>
                        <!-- <label for="">E 3 IV. Organismos/Programas Municipales:</label>
                        <input type="text" class="form-control ml-3 mb-3" name="orgProgMunicipalesActualmente[]"> -->
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteAgregarOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgProgMunicipalesActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>

                    <div class="form-group">
                        <label for="">E 3 V. Policía:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label>
                        @foreach ($datosPoliciaActualmente as $policiaActualmente)
                            @php
                                $policiaActualmenteIds = $formularioF->policiaactualmentes->pluck('id')->toArray();
                                $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                                <input {{ $checked }} type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group orgSocCivilActualmente">
                        <label for="">E 3 VI. Organizaciones de la Sociedad Civil:</label>
                        <input type="text" name="idsEliminados44" id="idsEliminados44" value="" style="display: none;">
                        @php $i = 1; @endphp
                        <div id="container_orgSocCivilActualmente_viejo">
                        @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                            @if ($socCivilActualmente->fformulario_id === $formularioF->id)
                                <div class="socCivilActualmente{{ $socCivilActualmente->id }}">
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgCivilActualmente({{ $socCivilActualmente->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgSocCivilActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        </div>
                    </div>
                    <div id="orgSocCivilActualmente">
                        <div id="container_orgSocCivilActualmente"></div>
                        <!-- <label for="">E 3 VI. Organizaciones de la Sociedad Civil:</label>
                        <input type="text" class="form-control ml-3 mb-3" name="orgSocCivilActualmente[]"> -->
                    </div>
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteAgregarOtro" value="Agregar Otro" name="">
                    <input type="button" class="ml-3 btn btn-outline-primary btnOrgSocCivilActualmenteBorrarOtro" value="Borrar Otro" name=""><br><br>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-5 col-5" name="button">Actualizar</button>
                    {{-- <a href="/formularios" class="btn btn-primary col-5" title="">Volver</a> --}}
                </div>
            </form>
        @else
            <form action="" id="formularioF" class="form-group" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <input type="text" name="numeroCarpeta" value="{{ $formularioF->numeroCarpeta }}" style="display: none;">

                <h1 class="text-center" style="padding: 15px;">
                    Eje F: Atención del caso
                    <h5 style="text-align: center;" >Estas trabajando sobre el número de carpeta {{ $formularioF->numeroCarpeta }}</h5>
                </h1>
                <label for="">E 1. Organismos que intervinieron previamente:</label>
                <select disabled class="ml-3 mb-3 form-control intervinieronOrganismos" name="intervinieronOrganismos_id">
                    @foreach ($datosIntervinieronOrganismos as $organismos)
                        @php
                            $selected = ($organismos->id == $formularioF->intervinieronOrganismos_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $organismos->id }}" {{ $selected }}>{{ $organismos->nombre }}</option>
                    @endforeach
                </select>
                <div class="form-group organismoDerivo" style="display: none;">
                    @foreach ($aFormularios as $aFormulario)
                        @if ($aFormulario->datos_numero_carpeta == $formularioF->numeroCarpeta)
                            @if ($aFormulario->derivacion_otro_organismo_id !== 16)
                                @foreach ($derivacionOrganismo as $organismo)
                                    @if ($organismo->id == $aFormulario->derivacion_otro_organismo_id)
                                        <input readonly type="text" name="" class="form-control ml-3" readonly="readonly" 
                                        value="{{ $organismo->nombre }}">
                                    @endif
                                @endforeach
                            @endif
                            @if($aFormulario->derivacion_otro_organismo_id == 16)
                                <input readonly type="text" name="" class="form-control ml-3" readonly="readonly" 
                                    value="{{ $aFormulario->derivacion_otro_organismo_cual }}">
                            @endif
                            @if($aFormulario->derivacion_otro_organismo_id == null)
                                {{-- <input type="text" name="" class="form-control ml-3" readonly="readonly" value="No intervino ningún organismo previamente"> --}}
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="intervinieron" style="display: none;">
                    <div class="form-group">
                        <label for="">E 1 I. Organismos Judiciales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosOrgJudiciales as $orgJudicial)
                            @php
                                $orgJudicialIds = $formularioF->orgjudicials->pluck('id')->toArray();
                                $checked = (in_array($orgJudicial->id, $orgJudicialIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $orgJudicial->id }}">{{ $orgJudicial->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" id="{{ $orgJudicial->id }}" value="{{ $orgJudicial->id }}" name="orgjudicials_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">E 1 II. Organismos/Programas Nacionales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosProgNacionales as $progNacionales)
                            @php
                                $progNacionalesIds = $formularioF->orgprognacionals->pluck('id')->toArray();
                                $checked = (in_array($progNacionales->id, $progNacionalesIds)) ? 'checked' : '';
                            @endphp
                            <div class="ml-3">
                                @if ($progNacionales->nombre == 'Otro')
                                    <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                    <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]" class="orgProgNacionalOtro">
                                @else
                                    <label for="{{ $progNacionales->id }}">{{ $progNacionales->nombre }}</label>
                                    <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionales->id }}" value="{{ $progNacionales->id }}" name="orgprognacionals_id[]">
                                @endif      
                            </div>      
                        @endforeach

                        <div class="form-group orgProgNacionalCual" style="display: none;">
                            @php $i = 1; @endphp
                            @foreach ($orgProgNacionalOtro as $otroProgNacional)
                                @if ($otroProgNacional->fformulario_id === $formularioF->id)
                                    <div class="otroProgNacionalOtro{{ $otroProgNacional->id }}">
                                        <label for=""><?php echo $i ?>° Cargado Anteriormente</label>
                                        <input readonly type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro_viejo[]" value="{{ $otroProgNacional->nombreOrganismo }}"><br>
                                    </div>
                                @endif
                            @php $i++; @endphp
                            @endforeach
                            @if (count($orgProgNacionalOtro) == null)
                                <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        @php $i = 1; @endphp
                        @foreach ($orgProgProvincial as $programaProv)
                            @if ($programaProv->fformulario_id === $formularioF->id)
                                <div class="programaProv{{ $programaProv->id }}">
                                    <label for="">E 1 III. Organismos/Programas Provinciales</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label>
                                    <input readonly name="orgProgProvinciales_viejo[]" type="text" class="form-control ml-3 mb-3" value="{{ $programaProv->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgProgProvincial) == null)
                            <label for="">E 1 III. Organismos/Programas Provinciales</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif         
                    </div>

                    <div class="form-group">
                        @php $i = 1; @endphp
                        @foreach ($orgProgMunipal as $programaMuni)
                            @if ($programaMuni->fformulario_id === $formularioF->id)
                                <div class="programaMuni{{ $programaMuni->id }}">
                                    <label for="">E 1 IV. Organismos/Programas Municipales</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label>
                                    <input readonly type="text" name="orgProgMunicipales_viejo[]" class="form-control ml-3" value="{{ $programaMuni->nombreOrganismo  }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgProgMunipal) == null)
                            <label for="">E 1 IV. Organismos/Programas Municipales</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif            
                    </div>

                    <div class="form-group">
                        <label for="">E 1 V. Policía:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label>
                        @foreach ($datosPolicia as $policia)
                            @php
                                $policiaIds = $formularioF->policias->pluck('id')->toArray();
                                $checked = (in_array($policia->id, $policiaIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $policia->id }}">{{ $policia->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" id="{{ $policia->id }}" value="{{ $policia->id }}" name="policias_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        @php $i = 1; @endphp
                        @foreach ($orgSocCivil as $organizacion)
                            @if ($organizacion->fformulario_id === $formularioF->id)
                                <div class="organizacion{{ $organizacion->id }}">
                                    <label for="">E 1 VI. Organizaciones de la Sociedad Civil</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label>
                                    <input readonly type="text" name="orgSocCivil_viejo[]" class="ml-3 form-control" value="{{ $organizacion->nombreOrganismo  }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgSocCivil) == null)
                            <label for="">E 1 VI. Organizaciones de la Sociedad Civil</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif         
                    </div>
                </div>

                {{-- F 2 --}}
                <div class="form-group">
                    <label for="">E 2. Tipo de asistencia requerida:
                        <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                    </label>
                    @foreach ($datosAsistencia as $asistencia)
                        @php
                            $asistenciaIds = $formularioF->asistencias->pluck('id')->toArray();
                            $checked = (in_array($asistencia->id, $asistenciaIds)) ? 'checked' : ''
                        @endphp
                        <div class="ml-3">
                            @if ($asistencia->id === 3)
                                <label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" class="socioEconomicaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
                            @else
                                <label for="{{ $asistencia->id }}">{{ $asistencia->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" class="asistenciaCheckbox" id="{{ $asistencia->id }}" value="{{ $asistencia->id }}" name="asistencia_id[]">
                            @endif
                        </div>
                    @endforeach
                    <div class="ml-3 socioEconomica" style="display: none;">
                        @foreach ($datosSocioeconomica as $socioeconomica)
                            @php
                                $socioeconomicaIds = $formularioF->socioeconomics->pluck('id')->toArray();
                                $checked = (in_array($socioeconomica->id, $socioeconomicaIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $socioeconomica->id }}">{{ $socioeconomica->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" class="deSocioEconomica{{ $socioeconomica->id }}" id="{{ $socioeconomica->id }}" value="{{ $socioeconomica->id }}" name="socioeconomic_id[]">
                            </div>
                        @endforeach
                    </div>
                    <div class="ml-3 socioEconomicaCual" style="display: none;">
                        <label for="">Cual?</label>
                        <input readonly type="text" class="form-control socioEconomicaCualInput" value="{{ $formularioF->socioeconomicaCual }}" name="socioeconomicaCual">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">E 3 Organismos con los que se articula actualmente:</label><br>
                    <label for="">Se ha articulado con otros organismos en el transcurso de la asistencia?</label>
                    <select disabled name="intervinieronOrganismosActualmente_id" class="form-control intervinieronOrganismosActualmente">
                        @foreach ($datosIntervinieronOrganismosActualmente as $organismosActualmente)
                            @php
                                $selected = ($organismosActualmente->id == $formularioF->intervinieronOrganismosActualmente_id) ? 'selected' : '';
                            @endphp
                            <option value="{{ $organismosActualmente->id }}" {{ $selected }}>{{ $organismosActualmente->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="intervinieronActualmente" style="display: none;">
                    <div class="form-group">
                        <label for="">E 3 I. Organismos Judiciales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                        @foreach ($datosOrgJudicialesActualmente as $orgJudicialesActualmente)
                            @php
                                $orgJudicialesActualmenteIds = $formularioF->orgjudicialactualmentes->pluck('id')->toArray();
                                $checked = (in_array($orgJudicialesActualmente->id, $orgJudicialesActualmenteIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $orgJudicialesActualmente->id }}">{{ $orgJudicialesActualmente->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" id="{{ $orgJudicialesActualmente->id }}" value="{{ $orgJudicialesActualmente->id }}" name="orgjudicialactualmentes_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">E 3 II. Organismos/Programas Nacionales:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label><br>
                            @foreach ($datosProgNacionalesActualmente as $progNacionalesActualmente)
                                @php
                                    $progNacionalesActualmenteIds = $formularioF->orgprognacionalactualmentes->pluck('id')->toArray();
                                    $checked = (in_array($progNacionalesActualmente->id, $progNacionalesActualmenteIds)) ? 'checked' : ''
                                @endphp
                                <div class="ml-3">
                                    @if ($progNacionalesActualmente->nombre == 'Otro')
                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                        <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]" class="orgProgNacionalActualmenteOtro">
                                    @else
                                        <label for="{{ $progNacionalesActualmente->id }}">{{ $progNacionalesActualmente->nombre }}</label>
                                        <input disabled {{ $checked }} type="checkbox" id="{{ $progNacionalesActualmente->id }}" value="{{ $progNacionalesActualmente->id }}" name="orgprognacionalactualmente_id[]">
                                    @endif  
                                </div>
                            @endforeach     

                        <div class="form-group orgprognacionalActualmenteCual" style="display: none;">
                            @php $i = 1; @endphp
                            @foreach ($orgProgNacionalActualmenteOtro as $progNacionalOtro)
                                @if ($progNacionalOtro->fformulario_id === $formularioF->id)
                                    <div class="progNacionalOtro{{ $progNacionalOtro->id }}">
                                        <label for=""><?php echo $i ?>° Cargado Anteriormente</label>
                                        <input readonly type="text" name="orgprognacionalActualmenteOtro_viejo[]" class="form-control ml-3" value="{{ $progNacionalOtro->nombreOrganismo }}"><br>
                                    </div>
                                @endif
                            @php $i++; @endphp
                            @endforeach
                            @if (count($orgProgNacionalActualmenteOtro) == null)
                                <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                            @endif
                        </div>
                    </div>


                    <div class="form-group orgProgProvincialesActualmente">
                        @php $i = 1; @endphp
                        @foreach ($orgProgProvincialesAlactualmente as $provActualmente)
                            @if ($provActualmente->fformulario_id === $formularioF->id)
                                <div class="provActualmente{{ $provActualmente->id }}">
                                    <label for="">E 3 III. Organismos/Programas Provinciales</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label>
                                    <input readonly type="text" name="orgProgProvincialesActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $provActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgProgProvincialesAlactualmente) == null)
                            <label for="">E 3 III. Organismos/Programas Provinciales</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif
                    </div>

                    <div class="form-group orgProgMunicipalesActualmente">
                        @php $i = 1; @endphp
                        @foreach ($orgProgMunipalesActualmente as $muniActualmente)
                            @if ($muniActualmente->fformulario_id === $formularioF->id)
                                <div class="muniActualmente{{ $muniActualmente->id }}">
                                    <label for="">E 3 IV. Organismos/Programas Municipales</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label>
                                    <input readonly type="text" name="orgProgMunicipalesActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $muniActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgProgMunipalesActualmente) == null)
                            <label for="">E 3 IV. Organismos/Programas Municipales</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">E 3 V. Policía:
                            <span>(En caso de requerir, tildar todas las opciones que considere correspondientes)</span>
                        </label>
                        @foreach ($datosPoliciaActualmente as $policiaActualmente)
                            @php
                                $policiaActualmenteIds = $formularioF->policiaactualmentes->pluck('id')->toArray();
                                $checked = (in_array($policiaActualmente->id, $policiaActualmenteIds)) ? 'checked' : ''
                            @endphp
                            <div class="ml-3">
                                <label for="{{ $policiaActualmente->id }}">{{ $policiaActualmente->nombre }}</label>
                                <input disabled {{ $checked }} type="checkbox" id="{{ $policiaActualmente->id }}" value="{{ $policiaActualmente->id }}" name="policiaactualmentes_id[]">
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group orgSocCivilActualmente">
                        @php $i = 1; @endphp
                        @foreach ($orgSocCivilActualmente as $socCivilActualmente)
                            @if ($socCivilActualmente->fformulario_id === $formularioF->id)
                                <div class="socCivilActualmente{{ $socCivilActualmente->id }}">
                                    <label for="">E 3 VI. Organizaciones de la Sociedad Civil</label><br>
                                    <label for=""><?php echo $i ?>° Cargado Anteriormente:</label><a onclick="borrarOrgCivilActualmente({{ $socCivilActualmente->id }})" class="btn float-right" class=""><i class="far fa-trash-alt" style="color: red;"></i></a>
                                    <input type="text" name="orgSocCivilActualmente_viejo[]" class="form-control ml-3 mb-3" value="{{ $socCivilActualmente->nombreOrganismo }}">
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                        @if (count($orgSocCivilActualmente) == null)
                            <label for="">E 3 VI. Organizaciones de la Sociedad Civil</label><br>
                            <label for="" class="ml-3">No se cargó ningún organismo anteriormente.</label>
                        @endif
                    </div>
                </div>

               {{--  <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-5 col-5" name="button">Actualizar</button>
                    <a href="/formularios" class="btn btn-primary col-5" title="">Volver</a>
                </div> --}}
            </form>
        @endif
    	
    </section>
	{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"  type="text/javascript"></script> --}}
    <script src="/js/jqueryValidate.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="/js/formularioF.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>