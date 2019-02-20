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
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
        <li class="nav-item active"> <a class="nav-link active" href="/formularios/buscador">Buscador por número</a> </li>
        <li class="nav-item"> <a class="nav-link" href="/formularios/buscadorNombre">Buscador por nombre</a> </li>
        <li class="nav-item "> <a class="nav-link " href="/formularios/buscadorVictima">Buscador por victima</a> </li>
    </ul>
</header>
<body>
    @if(session()->has('message'))
        <div class="alert alert-danger text-center">
            {{ session()->get('message') }}
        </div>
    @endif

    <section class="container">
        <h1 class="text-center" style="padding: 15px;">
            Buscador de formularios
        </h1>

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
                                {{-- @dd($carpeta->aformulario->deleted_at == null) --}}
                        <tr>
                            <td class="text-center align-middle"><h4><a name="{{ $carpeta->numeroCarpeta }}" title="">{{ $carpeta->numeroCarpeta }}</a></h4></td>
                            <td>
                                @if ($carpeta->aformulario_id)
                                    {{-- nuevo --}}
                                    <a href="/formularios/edicion/A/{{ $carpeta->id }}/{{ $carpeta->aformulario_id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    {{-- <a href="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br> --}}
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                @elseif(!($carpeta->aformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                    <a href="/formularios/A" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                {{-- @if ($carpeta->bformulario_id) --}}
                                @if ($carpeta->aformulario_id && $carpeta->bformulario_id)
                                {{-- nuevo --}}
                                    <a href="/formularios/edicion/B/{{ $carpeta->id }}/{{ $carpeta->bformulario_id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    {{-- <a href="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br> --}}
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                {{-- @elseif(!($carpeta->bformulario_id)) --}}
                                @elseif($carpeta->aformulario_id && !($carpeta->bformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                {{-- nuevo --}}
                                    <a href="/formularios/B/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                {{-- @if ($carpeta->cformulario_id) --}}
                                @if (($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id))
                                    <a href="/formularios/edicion/C/{{ $carpeta->id }}/{{$carpeta->cformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/C/{{$carpeta->cformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                {{-- @elseif(!($carpeta->cformulario_id)) --}}
                                @elseif($carpeta->aformulario_id && ($carpeta->bformulario_id) && !($carpeta->cformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                    <a href="/formularios/C/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                {{-- @if ($carpeta->dformulario_id) --}}
                                @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id)
                                    <a href="/formularios/edicion/D/{{ $carpeta->id }}/{{$carpeta->dformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/D/{{$carpeta->dformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                {{-- @elseif(!($carpeta->dformulario_id)) --}}
                                @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && !($carpeta->dformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                    <a href="/formularios/D/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                            {{-- <td>
                                @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id)
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
                                @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->eformulario_id))
                                    <a href="/formularios/E" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td> --}}
                            <td>
                                {{-- @if ($carpeta->fformulario_id) --}}
                                @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id)
                                    <a href="/formularios/edicion/F/{{ $carpeta->id }}/{{$carpeta->fformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/F/{{$carpeta->fformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                {{-- @elseif(!($carpeta->fformulario_id)) --}}
                                @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && !($carpeta->fformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                    <a href="/formularios/F/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                            <td>
                                {{-- @if ($carpeta->gformulario_id) --}}
                                @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && $carpeta->gformulario_id)
                                    <a href="/formularios/edicion/G/{{ $carpeta->id }}/{{$carpeta->gformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>
                                    @if (auth()->user()->isAdmin === 1)
                                        <form action="/formularios/edicion/G/{{$carpeta->gformulario_id}}" class="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button>
                                        </form>
                                    @endif
                                {{-- @elseif(!($carpeta->gformulario_id)) --}}
                                @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->fformulario_id && !($carpeta->gformulario_id) && ($carpeta->user_id == auth()->user()->id))
                                    <a href="/formularios/G/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

    <script src="/js/buscador.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          swal(msg);
        }
    </script>

</body>
</html>

