<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
	<link rel="stylesheet" href="/css/leaflet.css" />
    <title>Mapa de calor</title>
    <style>
        /*.nroCarpeta{
            color: blue;
            font-size: 20px;
        }*/

        .encabezado{
            color: blue;
            font-size: 20px;
        }

        .encabezado-busqueda-carpeta{r
        }

        .item-busqueda-carpeta{
            width: 12.5%;
            /*border: solid black 1px;*/
        }

        #map { 
		    width: 100%;
		    height: 580px;
		    box-shadow: 5px 5px 5px #888;
        border-radius: 0.8px
		 }
    </style>
</head>
<header>
    <ul class="nav nav-tabs">
        <li class="nav-item"> <a class="nav-link " href="/home">Inicio</a> </li>
        <li class="nav-item"> <a class="nav-link " href="/formularios/A">Comenzar carga</a> </li>
        <li class="nav-item"> <a class="nav-link" href="/formularios/buscador">Buscador</a> </li>
        <li class="nav-item active"> <a class="nav-link active" href="">Mapa de calor</a> </li>
    </ul>
</header>

<body>
    <section class="container">
        {{-- <div>
            <input type="button" name="nacimiento" id="nacimiento" value="Nacimiento" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="explotacion" id="explotacion" value="Explotación" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="captacion" id="captacion" value="Captación" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="captacionNacimiento" id="captacionNacimiento" value="captacionNacimiento" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="captacionExplotacion" id="captacionExplotacion" value="captacionExplotacion" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="nacimientoExplotacion" id="nacimientoExplotacion" value="nacimientoExplotacion" class="float-left btn btn-primary" style="margin:10px;">
            <input type="button" name="captacionNacimientoExplotacion" id="captacionNacimientoExplotacion" value="captacionNacimientoExplotacion" class="float-left btn btn-primary" style="margin:10px;">
        </div> --}}

        <div class="form-group">
            <select name="" id="selectMapa" class="form-control">
                <option value="" id="disabled">Seleccioná una opción</option>
                <option value="Nacimiento">Nacimiento</option>
                <option value="Explotación">Explotación</option>
                <option value="Captación">Captación</option>
                <option value="captacionNacimiento">Captación y Nacimiento</option>
                <option value="captacionExplotacion">Captación y Explotación</option>
                <option value="nacimientoExplotacion">Nacimiento y Explotación</option>
                <option value="captacionNacimientoExplotacion">Captación, Nacimiento y Explotación</option>
            </select>
        </div>
    <br>
    <br>
    	<div id="map">
    		
      </div>

    </section>

  
    <script src="/js/leaflet.js"></script>
    <script src="/js/heatmap.js" type="text/javascript" charset="utf-8" ></script>
    <script src="/js/leaflet-heatmap.js" type="text/javascript" charset="utf-8" ></script>    
    <script src="/js/bundle.js" type="text/javascript" charset="utf-8" ></script>            
    <script src="/js/mapas.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>

