<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formularios</title>
	@include('partials.head')
	<style type="text/css">
		body {
			/*padding: 5px*/
		}
		/*.page-item.active .page-link {
			background-color: tomato;
			border-color: tomato
		}*/
	</style>
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
        <li class="nav-item"> <a class="nav-link" href="/home">Inicio</a> </li>
        <li class="nav-item cerrarSesion"> <a class="nav-link " href="/logout">Cerrar sesión</a> </li>
    </ul>
</header>
<body>
	
<div>{{$usuario}}</div>
<div>{{$password}}</div>
<div>{{$isUser}}</div>

	
</body>
</html>