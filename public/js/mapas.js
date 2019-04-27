// La llamada fecth de los datos debería ejecutar la siguiente consulta para que el mapa quede bien
// SELECT lat, `long`, count(*) as count from mapas where 1 GROUP BY lat,`long`



var baseLayer = L.tileLayer(
	'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Acceso a la Justicia',
		maxZoom: 20
	}
);

var cfg = {
	// radius should be small ONLY if scaleRadius is true (or small radius is intended)
	// if scaleRadius is false it will be the constant radius used in pixels
	"radius": 1.5,
	"maxOpacity": 0.8,
	// scales the radius based on map zoom
	"scaleRadius": true,
	// if set to false the heatmap uses the global maximum for colorization
	// if activated: uses the data maximum within the current map boundaries 
	//   (there will always be a red spot with useLocalExtremas true)
	"useLocalExtrema": true,
	// max: 1.0,
	// blur: 15,
	/* gradient: {
		// enter n keys between 0 and 1 here
		// for gradient color customization
		'.8': 'green',
		'.8': 'yellow',
		'.8': 'red'
	}, */
	// which field name in your data represents the latitude - default "lat"
	latField: 'lat',
	// which field name in your data represents the longitude - default "lng"
	lngField: 'long',
	// which field name in your data represents the data value - default "value"
	valueField: 'count'
};

var heatmapLayer = new HeatmapOverlay(cfg);


var map = new L.Map("map", {
    center: new L.LatLng(-34.0, -64.0),
    zoom: 4,
	layers: [baseLayer, heatmapLayer]
});

L.easyPrint({
	title:'Imprimir',
	sizeModes: ['Current', 'A4Portrait', 'A4Landscape'],
	defaultSizeTitles: {Current: 'Tamaño Actual', A4Landscape: 'A4 Horizontal', A4Portrait: 'A4 Vertical'}
}).addTo(map);

L.easyPrint({
	title:'Imprimir',
	sizeModes: ['Current', 'A4Portrait', 'A4Landscape'],
	defaultSizeTitles: {Current: 'Tamaño Actual', A4Landscape: 'A4 Horizontal', A4Portrait: 'A4 Vertical'},
	exportOnly: true
}).addTo(map);

$("#nacimiento").click(function () {
	changeLayerNacimiento("nacimiento");
});

// $("#captacion").click(function() {
// 	changeLayerCaptacion();
// });

// $("#explotacion").click(function() {
// 	changeLayerExplotacion();
// });

// $("#captacionNacimiento").click(function () {
//     changeLayerCaptacionNacimiento();
// });
// $("#captacionExplotacion").click(function () {
//     changeLayerCaptacionExplotacion();
// });

// $("#nacimientoExplotacion").click(function () {
//     changeLayerNacimientoExplotacion();
// });

// $("#captacionNacimientoExplotacion").click(function () {
//     changeLayerCaptacionNacimientoExplotacion();
// });

var selectMapa = document.querySelector('#selectMapa');

selectMapa.addEventListener('change', function(){
	document.querySelector('#disabled').setAttribute('disabled', 'disabled');
	if (this.value == 'Nacimiento') {
		changeLayerNacimiento();
	}else if (this.value == 'Explotación'){
		changeLayerExplotacion();
	}else if (this.value == 'Captación'){
		changeLayerCaptacion();
	}else if (this.value == 'captacionNacimiento'){
		changeLayerCaptacionNacimiento();
	}else if (this.value == 'captacionExplotacion'){
		changeLayerCaptacionExplotacion();
	}else if (this.value == 'nacimientoExplotacion'){
		changeLayerNacimientoExplotacion();
	}else{
		changeLayerCaptacionNacimientoExplotacion();
	}
});



// ----------------- call to url----------------------------------

// begin call to the Nacimiento---------------------------------------------------------------


function changeLayerNacimiento() {
    fetch("/mapas/datosN")
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var tabla = data;

            var marcadores = [];
            tabla.forEach(function(element, index) {
                delete element.id;
                delete element.created_at;
                delete element.updated_at;
                delete element.deleted_at;
                long: element.long;
                lat: element.lat;
                // console.log(element);
                // console.log(element.lat);
				// count: 1;
                marcadores.push(element);
            });

            var testData = {
                min: 0,
                max: 100,
                data: marcadores
                // data: [
                //     { lat: -56.9139, long: -17.9464, count: 1 },
                //     { lat: -46.9139, long: -67.9464, count: 1 },
                //     { lat: -36.9139, long: -57.9464, count: 1 },
                //     { lat: -36.9139, long: -57.9464, count: 1 },
                //     { lat: -36.9139, long: -57.9464, count: 1 },
                //     { lat: -36.9139, long: -47.9464, count: 1 },
                //     { lat: -34.9139, long: -54.9464, count: 1 },
                //     { lat: -34.9139, long: -54.9464, count: 2 },
                //     { lat: -34.9139, long: -54.9464, count: 2 },
                //     { lat: -34.9139, long: -54.9464, count: 2 },
    

                // ]
            };
            heatmapLayer.setData(testData);
			map.addLayer(heatmapLayer);
        })
        .catch(function(error) {
            console.log("The error was: " + error);
        });
}
// call to the captacion------------------------------------------------------------------
function changeLayerCaptacion() {
	map.removeLayer(heatmapLayer);
	// LLAMAR AL FETCH
	fetch("/mapas/datosC")
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {
			var tabla = data;

			var marcadores = [];
			tabla.forEach(function (element, index) {
				delete element.id;
				delete element.created_at;
				delete element.updated_at;
				delete element.deleted_at;
				long: element.long;
				lat: element.lat;
				// console.log(element);
				// console.log(element.lat);
				// count: 1;
				marcadores.push(element)
			});


			var testData = {
				min: 0,
				max: 100,
				data: marcadores
				// data: [{ lat: -34.91, long: -57.95, count: 1 }, { lat: -26.9139, long: -47.9464, count: 1 }, { lat: -46.9139, long: -47.9464, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -34.9139, long: -54.9464, count: 2 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }, { lat: -26.9139, long: -57.9464, count: 3 }]
			};
			//map.layers=heatmapLayer2;	
			heatmapLayer.setData(testData);
			map.addLayer(heatmapLayer);

		})
		.catch(function (error) {
			console.log("The error was: " + error);
		})
	// FIN DE LLAMADO
}
// call to the explotacion---------------------------------------------------------------------------------
function changeLayerExplotacion(){
	map.removeLayer(heatmapLayer);


	// LLAMAR AL FETCH
	fetch("/mapas/datosE")
			.then(function (response) {
				return response.json();
			})
			.then(function (data) {
				var tabla = data;
				
				var marcadores = [];
				tabla.forEach(function (element, index) {
					delete element.id;
					delete element.created_at;
					delete element.updated_at;
					delete element.deleted_at;
					long: element.long;
					lat: element.lat;
					// console.log(element);
					// console.log(element.lat);
					// count: 1;
					marcadores.push(element)
				});


			var testData = {
				min: 0,
				max: 100,
				data: marcadores
				// data: [{ lat: -26.9139, long: -57.9464, count: 1 }, { lat: -26.9139, long: -57.9464, count: 1 }, { lat: -34.91, long: -57.95, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }]
			};
			//map.layers=heatmapLayer2;	
				heatmapLayer.setData(testData);
				map.addLayer(heatmapLayer);

		})
		.catch(function (error) {
			console.log("The error was: " + error);
		})
// FIN DE LLAMADO
}

// ------------------

function changeLayerCaptacionNacimiento() {
    map.removeLayer(heatmapLayer);

    fetch("/mapas/datosCN")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
			// console.log(data);
            var tabla = data;

            var marcadores = [];
            tabla.forEach(function (element, index) {
                delete element.id;
                delete element.created_at;
                delete element.updated_at;
                delete element.deleted_at;
                long: element.long;
                lat: element.lat;
                // console.log(element);
                // console.log(element.lat);
                // count: 1;
                marcadores.push(element)
            });

            var testData = {
                min: 0,
                max: 100,
                data: marcadores
                // data: [{ lat: -26.9139, long: -57.9464, count: 1 }, { lat: -26.9139, long: -57.9464, count: 1 }, { lat: -34.91, long: -57.95, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }]
			};
			
            //map.layers=heatmapLayer2;	
            heatmapLayer.setData(testData);
            map.addLayer(heatmapLayer);

        })
        .catch(function (error) {
            console.log("The error was: " + error);
        })
    // FIN DE LLAMADO
}

function changeLayerCaptacionExplotacion() {
    map.removeLayer(heatmapLayer);

    fetch("/mapas/datosCE")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(data);
            var tabla = data;

            var marcadores = [];
            tabla.forEach(function (element, index) {
                delete element.id;
                delete element.created_at;
                delete element.updated_at;
                delete element.deleted_at;
                long: element.long;
                lat: element.lat;
                // console.log(element);
                // console.log(element.lat);
                // count: 1;
                marcadores.push(element)
            });

            var testData = {
                min: 0,
                max: 100,
                data: marcadores
                // data: [{ lat: -26.9139, long: -57.9464, count: 1 }, { lat: -26.9139, long: -57.9464, count: 1 }, { lat: -34.91, long: -57.95, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }]
            };

            //map.layers=heatmapLayer2;	
            heatmapLayer.setData(testData);
            map.addLayer(heatmapLayer);

        })
        .catch(function (error) {
            console.log("The error was: " + error);
        })
    // FIN DE LLAMADO
}

function changeLayerNacimientoExplotacion() {
    map.removeLayer(heatmapLayer);

    fetch("/mapas/datosNE")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(data);
            var tabla = data;

            var marcadores = [];
            tabla.forEach(function (element, index) {
                delete element.id;
                delete element.created_at;
                delete element.updated_at;
                delete element.deleted_at;
                long: element.long;
                lat: element.lat;
                // console.log(element);
                // console.log(element.lat);
                // count: 1;
                marcadores.push(element)
            });

            var testData = {
                min: 0,
                max: 100,
                data: marcadores
                // data: [{ lat: -26.9139, long: -57.9464, count: 1 }, { lat: -26.9139, long: -57.9464, count: 1 }, { lat: -34.91, long: -57.95, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }]
            };

            //map.layers=heatmapLayer2;	
            heatmapLayer.setData(testData);
            map.addLayer(heatmapLayer);

        })
        .catch(function (error) {
            console.log("The error was: " + error);
        })
    // FIN DE LLAMADO
}

function changeLayerCaptacionNacimientoExplotacion() {
    map.removeLayer(heatmapLayer);

    fetch("/mapas/datosCNE")
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(data);
            var tabla = data;

            var marcadores = [];
            tabla.forEach(function (element, index) {
                delete element.id;
                delete element.created_at;
                delete element.updated_at;
                delete element.deleted_at;
                long: element.long;
                lat: element.lat;
                // console.log(element);
                // console.log(element.lat);
                // count: 1;
                marcadores.push(element)
            });

            var testData = {
                min: 0,
                max: 100,
                data: marcadores
                // data: [{ lat: -26.9139, long: -57.9464, count: 1 }, { lat: -26.9139, long: -57.9464, count: 1 }, { lat: -34.91, long: -57.95, count: 1 }, { lat: -36.9139, long: -57.9464, count: 1 }]
            };

            //map.layers=heatmapLayer2;	
            heatmapLayer.setData(testData);
            map.addLayer(heatmapLayer);

        })
        .catch(function (error) {
            console.log("The error was: " + error);
        })
    // FIN DE LLAMADO
}