
window.onload =function (){

	// pregunta 7
		var paisNacimiento = document.querySelector('.countries');
		var desconocePaisNacimiento = document.querySelector('#desconocePaisNacimiento');

		desconocePaisNacimiento.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		paisNacimiento.add(option);
	    		paisNacimiento.value = 'Se desconoce';
				paisNacimiento.setAttribute("readonly", "readonly");
			}else{
				paisNacimiento.value = '';
				paisNacimiento.removeAttribute('readonly');
			}
		});
	// fin pregunta 7

	// pregunta 8
		var provinciaNacimiento = document.querySelector('.states');
		var desconoceProvinciaNacimiento = document.querySelector('#desconoceProvinciaNacimiento');

		desconoceProvinciaNacimiento.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		provinciaNacimiento.add(option);
	    		provinciaNacimiento.value = 'Se desconoce';
				provinciaNacimiento.setAttribute("readonly", "readonly");
			}else{
				provinciaNacimiento.value = '';
				provinciaNacimiento.removeAttribute('readonly');
			}
		});
	// fin pregunta 8


	// pregunta 9
		var ciudadNacimiento = document.querySelector('.cities');
		var desconoceCiudadNacimiento = document.querySelector('#desconoceCiudadNacimiento');

		desconoceCiudadNacimiento.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		ciudadNacimiento.add(option);
	    		ciudadNacimiento.value = 'Se desconoce';
				ciudadNacimiento.setAttribute("readonly", "readonly");
			}else{
				ciudadNacimiento.value = '';
				ciudadNacimiento.removeAttribute('readonly');
			}
		});
	// fin pregunta 9

	//guardar lat y long funcionando
		var btnEnviar = document.querySelector('.btnEnviar');
		var formulario = document.querySelector('.formulario');

		console.log(formulario);

		// btnEnviar.addEventListener('submit', function(){
		formulario.addEventListener('submit', function(){
			// event.preventDefault()
			// var formulario = document.querySelector('.formulario');

			arrayForm = formulario.elements;

			// console.log(arrayForm.ciudadNacimiento.value);

			// var campos ={
			// 	bformulario_id: arrayForm.bformulario_id.value = element.bformulario_id,
			// 	lat: arrayForm.lat.value = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude,
			// 	long: arrayForm.long.value = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude,
			// }
			// console.log(arrayForm.paisNacimiento.value !== 'Se desconoce');

			if ((arrayForm.paisNacimiento.value !== 'Se desconoce' && arrayForm.paisNacimiento.value !== null) || (arrayForm.provinciaNacimiento.value !== 'Se desconoce' && arrayForm.provinciaNacimiento.value !== null) || (arrayForm.ciudadNacimiento.value !== 'Se desconoce' && arrayForm.ciudadNacimiento.value !== null)) {
				var paisNacimiento = arrayForm.paisNacimiento.value;
				var provinciaNacimiento = arrayForm.provinciaNacimiento.value;
				var ciudadNacimiento = arrayForm.ciudadNacimiento.value;
				event.preventDefault()

				console.log(ciudadNacimiento+', '+provinciaNacimiento+', '+paisNacimiento);
				$.ajax({
					url: 'https://geocoder.api.here.com/6.2/geocode.json',
					type: 'GET',
					dataType: 'jsonp',
					// headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					jsonp: 'jsoncallback',
					data: {
						searchtext: ciudadNacimiento+', '+provinciaNacimiento+', '+paisNacimiento,
						app_id: 'HkqpXchCOv6VUYhLEIEz',
						app_code: 'zl9UxG6jltjRVgHk4SqEaA',
						gen: '1'
					},
					success: function (data) {
						// console.log(JSON.stringify(data));
						
						// individuales.lat = data.Response.View[0].Result[0].Location.DisplayPosition.Latitude;
						// individuales.long = data.Response.View[0].Result[0].Location.DisplayPosition.Longitude;


						var campos ={
							lat: data.Response.View[0].Result[0].Location.DisplayPosition.Latitude,
							long: data.Response.View[0].Result[0].Location.DisplayPosition.Longitude,
							count: 1
						}

						console.log(JSON.stringify(campos));
						var camposJSON = JSON.stringify(campos)

						// var datosDelFormulario = new FormData();

						// datosDelFormulario.append('datos', JSON.stringify(campos));
						// console.log(datosDelFormulario);

						fetch("/mapas", {
							method: 'POST',
							body: camposJSON,
							// body: camposJSON,
							headers:{
								'Content-Type': 'application/json',
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						})

						.then(function (response) {
							return response.text();
						})
						.then(function (data) {
							// var prueba = $(".prueba");
							console.log(data);

							// formulario.append('<div>'
							// 	+ '<p>Latitud' + data.Response.View[0].Result[0].Location.DisplayPosition.Latitude + ' Longitud '+data.Response.View[0].Result[0].Location.DisplayPosition.Longitude+'</p>'
							// 	+ '</div>'
							// );
						})
						.catch(function (error) {
							console.log("The error was: " + error);
						})

						// markers.push(individuales)
						


						// console.log(markers.length);
						
					}
				});
			}

			window.setTimeout(function(){formulario.submit()}, 2000)
		});

		// btnEnviar.addEventListener('click', function(){
			
		// });
	//fin
}