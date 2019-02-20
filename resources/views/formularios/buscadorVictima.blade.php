<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Buscador</title>
    <style>
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
        <li class="nav-item"> <a class="nav-link" href="/formularios/buscador">Buscador por número</a> </li>
        <li class="nav-item "> <a class="nav-link " href="/formularios/buscadorNombre">Buscador por nombre</a> </li>
        <li class="nav-item active"> <a class="nav-link active" href="/formularios/buscadorVictima">Buscador por victima</a> </li>
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

        <form action="/formularios/buscadorVictima" class="navbar-form" method="get" accept-charset="utf-8">
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

        <form action="/formularios/buscadorVictima" class="navbar-form" method="get" accept-charset="utf-8">
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
                            <td><a href="/formularios/edicion/B/{{$formB->numerocarpetasId}}/{{$formB->id}}" class="btn btn-primary float-left"><i class="far fa-edit"></i>  @if(auth()->user()->isAdmin == 2)  Ver @else Ver/Editar @endif </a><br><br></td>
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

