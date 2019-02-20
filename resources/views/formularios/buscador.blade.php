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

        .encabezado {
            color: blue;
            font-size: 20px;
        }

        .encabezado-busqueda-carpeta {
            text-align: center;
        }

        .item-busqueda-carpeta {
            width: 14%;
            /*border: solid black 1px;*/
        }

        .cerrarSesion {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        {{--
        <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li> --}}
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
        <li class="nav-item active"> <a class="nav-link active" href="/formularios/buscador">Buscador</a> </li>
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
                    <input type="text" class="busquedaCarpetaInput form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Número de carpeta"
                        name="numeroCarpeta">
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
                        {{--
                        <th class="item-busqueda-carpeta">Eje E</th> --}}
                        <th class="item-busqueda-carpeta">Eje E</th>
                        <th class="item-busqueda-carpeta">Eje F</th>
                    </tr>


                    @foreach ($carpetas as $carpeta) {{-- @dd($carpeta->aformulario->deleted_at == null) --}}
                    <tr>
                        <td class="text-center align-middle">
                            <h4><a name="{{ $carpeta->numeroCarpeta }}" title="">{{ $carpeta->numeroCarpeta }}</a></h4>
                        </td>
                        <td>
                            @if ($carpeta->aformulario_id) {{-- nuevo --}}
                            <a href="/formularios/edicion/A/{{ $carpeta->id }}/{{ $carpeta->aformulario_id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            {{-- <a href="/formularios/edicion/A/{{$carpeta->aformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            --}} @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/A/{{$carpeta->id}}" class="" method="post" id="form{{$carpeta->id}}" data-id="form{{ $carpeta->id }}">
                                @method('DELETE') @csrf

                                <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                            </button> 


                            </form>
                            @endif @elseif(!($carpeta->aformulario_id) && ($carpeta->user_id == auth()->user()->id))
                            <a href="/formularios/A" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                        <td>
                            {{-- @if ($carpeta->bformulario_id) --}} @if ($carpeta->aformulario_id && $carpeta->bformulario_id) {{-- nuevo --}}
                            <a href="/formularios/edicion/B/{{ $carpeta->id }}/{{ $carpeta->bformulario_id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            {{-- <a href="/formularios/edicion/B/{{$carpeta->bformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            --}} @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/B/{{$carpeta->id}}" class="" method="post" id="form">
                                @method('DELETE') @csrf

                                <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                                                            </button>
                            </form>
                            @endif {{-- @elseif(!($carpeta->bformulario_id)) --}} @elseif($carpeta->aformulario_id && !($carpeta->bformulario_id) &&
                            ($carpeta->user_id == auth()->user()->id)) {{-- nuevo --}}
                            <a href="/formularios/B/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                        <td>
                            {{-- @if ($carpeta->cformulario_id) --}} @if (($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id))
                            <a href="/formularios/edicion/C/{{ $carpeta->id }}/{{$carpeta->cformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/C/{{$carpeta->id}}" class="" method="post" id="form">
                                @method('DELETE') @csrf
                                <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                                                            </button>
                            </form>
                            @endif {{-- @elseif(!($carpeta->cformulario_id)) --}} @elseif($carpeta->aformulario_id && ($carpeta->bformulario_id) && !($carpeta->cformulario_id)
                            && ($carpeta->user_id == auth()->user()->id))
                            <a href="/formularios/C/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                        <td>
                            {{-- @if ($carpeta->dformulario_id) --}} @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && $carpeta->dformulario_id)
                            <a href="/formularios/edicion/D/{{ $carpeta->id }}/{{$carpeta->dformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/D/{{ $carpeta->id }}" class="" method="post" id="form">
                                @method('DELETE') @csrf
                               <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                                                            </button>
                            </form>
                            @endif {{-- @elseif(!($carpeta->dformulario_id)) --}} @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && !($carpeta->dformulario_id) && ($carpeta->user_id == auth()->user()->id))
                            <a href="/formularios/D/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                        {{--
                        <td>
                            @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id && $carpeta->eformulario_id)
                            <a href="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/E/{{$carpeta->eformulario_id}}" class="" method="post">
                                @method('DELETE') @csrf
                     <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                                            <i class="far fa-trash-alt"></i> Borrar </span>
                                                                                                        </button>
                            </form>
                            @endif @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id && $carpeta->dformulario_id
                            && !($carpeta->eformulario_id))
                            <a href="/formularios/E" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td> --}}
                        <td>
                            {{-- @if ($carpeta->fformulario_id) --}} @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && $carpeta->dformulario_id && $carpeta->fformulario_id)
                            <a href="/formularios/edicion/F/{{ $carpeta->id }}/{{$carpeta->fformulario_id}}" class="btn btn-primary float-left">
                                <i class="far fa-edit"></i> Ver/Editar </a><br><br> @if (auth()->user()->isAdmin
                            === 1)
                            <form action="/formularios/edicion/F/{{$carpeta->id}}" class="" method="post">
                                @method('DELETE') @csrf
                               <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                                                            </button>
                            </form>
                            @endif {{-- @elseif(!($carpeta->fformulario_id)) --}} @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && $carpeta->dformulario_id && !($carpeta->fformulario_id) && ($carpeta->user_id == auth()->user()->id))
                            <a href="/formularios/F/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                        <td>
                            {{-- @if ($carpeta->gformulario_id) --}} @if ($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && $carpeta->dformulario_id && $carpeta->fformulario_id && $carpeta->gformulario_id)
                            <a href="/formularios/edicion/G/{{ $carpeta->id }}/{{$carpeta->gformulario_id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Ver/Editar </a><br><br>                            @if (auth()->user()->isAdmin === 1)
                            <form action="/formularios/edicion/G/{{$carpeta->id}}" class="" method="post" id="form">
                                @method('DELETE') @csrf
                                <button type="button" class="btn btn-danger" id="form{{ $carpeta->id }}" onClick="preSubmit(this.id)">
                                                                                <i class="far fa-trash-alt"></i> Borrar </span>
                                                                            </button>
                            </form>
                            @endif {{-- @elseif(!($carpeta->gformulario_id)) --}} @elseif($carpeta->aformulario_id && $carpeta->bformulario_id && $carpeta->cformulario_id
                            && $carpeta->dformulario_id && $carpeta->fformulario_id && !($carpeta->gformulario_id) && ($carpeta->user_id
                            == auth()->user()->id))
                            <a href="/formularios/G/{{ $carpeta->id }}" class="btn btn-success float-left"><i class="fas fa-redo-alt"></i> Completar carga </a><br><br>                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>


                <!-- Modal -->
                <div class="modal fade" name="exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> ATENCIÓN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Si usted elimina este eje, tambien eliminará la carpeta que lo contiene. Recuerde que al eliminar la carpeta, no podrá volver
                                a uitlizar el mismo numero de carpeta
                                <input type="hide" name="bookId" id="bookId" value="" style="display:none" />
                            </div>
                            <div class="modal-footer">
                                <form role="form" id="newModalForm">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger" id="btnSaveIt">Continuar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>


        <form action="/formularios/buscador" class="navbar-form" method="get" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Nombre de referencia del caso"
                        name="nombreReferencia">
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
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Número de causa judicial"
                        name="numeroCausa">
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
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="Nombre y apellido de la víctima"
                        name="nombreApellido">
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
                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroupUsername2" placeholder="DNI de la víctima"
                        name="dni">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          swal(msg);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <script>
        function preSubmit(e){
            $('#exampleModal').modal('show');
            $("#bookId").val( e );
        }
        $('#btnSaveIt').click(function(){
            var id_form = $('#bookId').val();
            submitform(id_form);
        })
        function submitform(e) { 
            document.getElementById(e).submit();
        }
    </script>


</body>

</html>