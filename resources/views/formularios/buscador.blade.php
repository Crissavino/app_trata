<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Buscador</title>
    <style>
        /*.nroCarpeta{
            color: blue;
            font-size: 20px;
        }*/

        .encabezado{
            color: blue;
            font-size: 20px;
        }

        .encabezado-busqueda-carpeta{
            text-align: center;
        }

        .item-busqueda-carpeta{
            width: 14%;
            /*border: solid black 1px;*/
        }
    </style>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li>
        {{-- <li class="nav-item"> <a class="nav-link " href="/formularios">Formularios</a> </li> --}}
        <li class="nav-item active"> <a class="nav-link active" href="/formularios/buscador">Buscador</a> </li>
    </ul>
</header>
<body>
    <section class="container">
        <h1 class="text-center" style="padding: 15px;">
            Buscador de formularios
        </h1>

        {{-- Formularios mostrados como la url /formularios --}}
            {{-- <div class="" style="overflow: hidden;">
            <h2>Resultado busqueda por carpeta</h2>
            @foreach ($carpetas as $carpeta)
                <div class="cardForm d-flex flex-column float-left">
                    <h4 class="cardForm-title"><a name="{{ $carpeta->numeroCarpeta }}" title=""><strong>Carpeta Nº: {{ $carpeta->numeroCarpeta }}</strong></a></h4>
                    <div class="mb-3">
                        <h5 class="cardForm-title">Eje A</h5>
                        <a href="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                        @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i> Borrar </span>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id)
                            <h5 class="cardForm-title">Eje B</h5>
                            <a href="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @else
                            <h5 class="cardForm-title">Eje B</h5>
                            <a href="/formularios/B" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id && $carpeta->cformulario_id)
                            <h5 class="cardForm-title">Eje C</h5>
                            <a href="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @elseif($carpeta->bformulario_id && !($carpeta->cformulario_id))
                            <h5 class="cardForm-title">Eje C</h5>
                            <a href="/formularios/C" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id)
                            <h5 class="cardForm-title">Eje D</h5>
                            <a href="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && !($carpeta->dformulario_id))
                            <h5 class="cardForm-title">Eje D</h5>
                            <a href="/formularios/D" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id)
                            <h5 class="cardForm-title">Eje E</h5>
                            <a href="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->eformulario_id))
                            <h5 class="cardForm-title">Eje E</h5>
                            <a href="/formularios/E" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id && $carpeta->fformulario_id)
                            <h5 class="cardForm-title">Eje F</h5>
                            <a href="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id && !($carpeta->fformulario_id))
                            <h5 class="cardForm-title">Eje F</h5>
                            <a href="/formularios/F" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                    <div class="mb-3">
                        @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id && $carpeta->fformulario_id && $carpeta->gformulario_id)
                            <h5 class="cardForm-title">Eje G</h5>
                            <a href="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                            @if (auth()->user()->isAdmin === 1)
                                <form action="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i> Borrar </span>
                                    </button>
                                </form>
                            @endif
                        @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id && $carpeta->fformulario_id && !($carpeta->gformulario_id))
                            <h5 class="cardForm-title">Eje G</h5>
                            <a href="/formularios/G" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                        @endif
                    </div>

                </div>
            @endforeach
            </div> --}}
        {{-- fin --}}

        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="busquedaCarpetaInput form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Número de carpeta" name="numeroCarpeta">
                </div>
            </div> 
            {{-- <button type="submit" id="buscadorCarpetaBtn" class="btn" name="button">Enviar</button><br><br> --}}
        </form>

        <div class="mt-5 busqueda-carpeta">
            <table class="mb-5 table table-hover table-striped">
                <thead>
                    <h2>Resultado busqueda por número de carpeta</h2>
                </thead>
                <tbody>
                    <tr class="encabezado-busqueda-carpeta">
                        <th class="item-busqueda-carpeta">Carpeta</th>
                        <th class="item-busqueda-carpeta">Eje A</th>
                        <th class="item-busqueda-carpeta">Eje B</th>
                        <th class="item-busqueda-carpeta">Eje C</th>
                        <th class="item-busqueda-carpeta">Eje D</th>
                        {{-- <th class="item-busqueda-carpeta">Eje E</th> --}}
                        <th class="item-busqueda-carpeta">Eje E</th>
                        <th class="item-busqueda-carpeta">Eje F</th>
                    </tr>
                    @foreach ($carpetas as $carpeta)
                        <tr>
                            <td class="text-center align-middle"><h4><a name="{{ $carpeta->numeroCarpeta }}" title="">{{ $carpeta->numeroCarpeta }}</a></h4></td>
                            <td>
                                <a href="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                @if (auth()->user()->isAdmin === 1)
                                    <form action="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i> Borrar </span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($carpeta->bformulario_id)
                                    <a href="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <a href="/formularios/B" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                @if ($carpeta->bformulario_id && $carpeta->cformulario_id)
                                    <a href="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif($carpeta->bformulario_id && !($carpeta->cformulario_id))
                                    <a href="/formularios/C" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id)
                                    <a href="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && !($carpeta->dformulario_id))
                                    <a href="/formularios/D" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td>
                            {{-- <td>
                                @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id)
                                    <a href="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->eformulario_id))
                                    <a href="/formularios/E" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td> --}}
                            <td>
                                @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id)
                                    <a href="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->fformulario_id))
                                    <a href="/formularios/F" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                @if ($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && $carpeta->gformulario_id)
                                    <a href="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif($carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && !($carpeta->gformulario_id))
                                    <a href="/formularios/G" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Continuar carga </a><br><br>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Nombre de referencia del caso" name="nombreReferencia">
                </div>
            </div> 
        </form>

        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Número de causa judicial" name="numeroCausa">
                </div>
            </div> 
        </form>

        <div class="mt-5 busqueda-formA">
            <table class="mb-5 table table-hover table-striped">
                <thead>
                    <h2>Resultado busqueda por nombre de referencia y/o causa judicial</h2>
                </thead>
                <tbody>
                    <tr class="encabezado">
                        <th class="w-25">Número de carpeta</th>
                        <th class="w-25">Nombre de referencia</th>
                        <th class="w-25">Número de causa judicial</th>
                        <th class="w-25"></th>
                    </tr>
                    @foreach ($formsA as $formA)
                        <tr>
                            <td><a href="#{{ $formA->datos_numero_carpeta }}" title="">{{ $formA->datos_numero_carpeta }}</a></td>
                            <td>{{ $formA->datos_nombre_referencia }}</td>
                            <td>{{ $formA->datos_nro_causa }}</td>
                            <td><a href="/formularios/edicion/A/{{$formA->id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Nombre y apellido de la víctima" name="nombreApellido">
                </div>
            </div>
        </form>

        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="DNI de la víctima" name="dni">
                </div>
            </div> 
        </form>

        <div class="mt-5 busqueda-formB">
            <table class="mb-5 table table-hover table-striped">
                <thead>
                   <h2>Resultado busqueda por nombre y apellido y/o DNI</h2>
                </thead>
                <tbody>
                    <tr class="encabezado">
                        <th class="w-25">Número de carpeta</th>
                        <th class="w-25">Nombre y apellido</th>
                        <th class="w-25">DNI</th>
                        <th class="w-25"></th>
                    </tr>
                    @foreach ($formsB as $formB)
                        <tr>
                            <td><a href="#{{ $formB->numeroCarpeta }}" title="">{{ $formB->numeroCarpeta }}</a></td>
                            <td>{{ $formB->victima_nombre_y_apellido }}</td>
                            <td>{{ $formB->victima_documento }}</td>
                            <td><a href="/formularios/edicion/B/{{$formB->id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

    <script src="/js/buscador.js" type="text/javascript" charset="utf-8" async defer></script>

</body>
</html>

