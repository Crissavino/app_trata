window.onload =function (){

	fetch("/mapas/datos")
		.then(function (response) {
		return response.json();
		})
		.then(function (data) {
			// console.log(typeof data);
			var tabla = data;
			// console.log(tabla);
			// delete tabla.id;
			// console.log("id" in tabla);
			// console.log(tabla);
			// var marcador = new Object();
			var marcadores = [];
			// window.setTimeout(function(){
			// 	for (var i = 0; i < tabla.length; i++) {
			// 		marcador.lat = tabla[i].lat;
			// 		marcador.lng = tabla[i].long;
			// 		marcador.count = tabla[i].count;

			// 		marcadores.push(marcador)
			// 		// console.log(marcador);
			// 	}
			// }, 2000)

			
			tabla.forEach(function(element, index){
				delete element.id;
				delete element.created_at;
				delete element.updated_at;
				delete element.deleted_at;
				// console.log(element);

				marcadores.push(element)
				// marcador.lat = element.lat;
				// marcador.lng = element.long;
				// marcador.count = element.count;
				
				// marcadores.push(marcador)
			// console.log(marcadores);
			});

			console.log(marcadores);

			var testData = {
			  min: 0,
			  max: 100,
			  data: marcadores
			  // data: [{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-36.9139,lng:-57.9464,count:1},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-34.9139,lng:-54.9464, count:2},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3},{lat:-26.9139,lng:-57.9464,count:3}]
			  // ,{lat:-36.9139,lng:-57.9464},{lat:-36.9139,lng:-57.9464},{lat:-36.9139,lng:-57.9464}]
			};

			var baseLayer = L.tileLayer(
				'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
					attribution: 'Cristian Savino',
					maxZoom: 18
				}
			);

			var cfg = {
				// radius should be small ONLY if scaleRadius is true (or small radius is intended)
				// if scaleRadius is false it will be the constant radius used in pixels
				"radius": 2,
				"maxOpacity": .8, 
				// scales the radius based on map zoom
				"scaleRadius": true, 
				// if set to false the heatmap uses the global maximum for colorization
				// if activated: uses the data maximum within the current map boundaries 
				//   (there will always be a red spot with useLocalExtremas true)
				"useLocalExtrema": true,
				gradient: {
				    // enter n keys between 0 and 1 here
				    // for gradient color customization
				    '.5': 'white',
				    '.8': 'yellow',
				    '.95': 'red'
				},
				// which field name in your data represents the latitude - default "lat"
				latField: 'lat',
				// which field name in your data represents the longitude - default "lng"
				lngField: 'long',
				// which field name in your data represents the data value - default "value"
				valueField: 'count'			
			};


			var heatmapLayer = new HeatmapOverlay(cfg);

			var map = new L.Map('map', {
				center: new L.LatLng(-34.0000, -64.0000),
				zoom: 4,
				layers: [baseLayer, heatmapLayer]
			});

			heatmapLayer.setData(testData);
		})
		.catch(function (error) {
			console.log("The error was: " + error);
		})

		

	//PEDIDO AJAX DE LAT Y LONG FUNCIONANDO
		// $.ajax({
		//   url: 'https://geocoder.api.here.com/6.2/geocode.json',
		//   type: 'GET',
		//   dataType: 'jsonp',
		//   jsonp: 'jsoncallback',
		//   data: {
		//     searchtext: 'La Matanza, Buenos Aires, Argentina',
		//     app_id: 'HkqpXchCOv6VUYhLEIEz',
		//     app_code: 'zl9UxG6jltjRVgHk4SqEaA',
		//     gen: '9'
		//   },
		//   success: function (data) {
		//   	var latitud = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
		//   	var longitud = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude;
		//   	console.log(latitud, longitud);
		    

		//   }
		// });
	//FIN PEDIDO AJAX FUNCIONANDO




}