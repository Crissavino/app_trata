//----------edicion--------

	//select de pais/prov/ciud captacion
		var selectPaisCaptacion = document.querySelector('.countries');
		var selectProvinciaCaptacion = document.querySelector('.states');
		var selectCiudadCaptacion = document.querySelector('.cities');

		var paisCaptacionViejo = document.querySelector('.paisCaptacion_viejo');
		var provinciaCaptacionViejo = document.querySelector('.provinciaCaptacion_viejo');
		var ciudadCaptacionViejo = document.querySelector('.ciudadCaptacion_viejo');
// console.log(paisCaptacionViejo.value);
// console.log(provinciaCaptacionViejo.value);
// console.log(ciudadCaptacionViejo.value);
if (paisCaptacionViejo) {	
			var optionPaisCaptacionAnterior = document.createElement("option");
			optionPaisCaptacionAnterior.id = "paisCaptacionViejo";
			optionPaisCaptacionAnterior.text = paisCaptacionViejo.value;
			selectPaisCaptacion.add(optionPaisCaptacionAnterior);
			optionPaisCaptacionAnterior.selected = true;
		}

if (provinciaCaptacionViejo) {	
			var optionProvinciaCaptacionAnterior = document.createElement("option");
			optionProvinciaCaptacionAnterior.id = "provinciaCaptacionViejo";
	optionProvinciaCaptacionAnterior.text = provinciaCaptacionViejo.value;
			selectProvinciaCaptacion.add(optionProvinciaCaptacionAnterior);
			optionProvinciaCaptacionAnterior.selected = true;
		}
if (ciudadCaptacionViejo) {	
			var optionCiudadCaptacionAnterior = document.createElement("option");
			optionCiudadCaptacionAnterior.id = "ciudadCaptacionViejo";
	optionCiudadCaptacionAnterior.text = ciudadCaptacionViejo.value;
			selectCiudadCaptacion.add(optionCiudadCaptacionAnterior);
			optionCiudadCaptacionAnterior.selected = true;
		}
	//fin

	//select de pais/prov/ciud explotacion
		var selectPaisExplotacion = document.querySelector('.countries2');
		var selectProvinciaExplotacion = document.querySelector('.states2');
		var selectCiudadExplotacion = document.querySelector('.cities2');

		var paisExplotacionViejo = document.querySelector('.paisExplotacion_viejo');
		var provinciaExplotacionViejo = document.querySelector('.provinciaExplotacion_viejo');
		var ciudadExplotacionViejo = document.querySelector('.ciudadExplotacion_viejo');

		if (paisExplotacionViejo) {
			var optionPaisExplotacionAnterior = document.createElement("option");
			optionPaisExplotacionAnterior.id = "paisExplotacionViejo";
			optionPaisExplotacionAnterior.text = paisExplotacionViejo.value;
			selectPaisExplotacion.add(optionPaisExplotacionAnterior);
			optionPaisExplotacionAnterior.selected = true;
		}

		if (provinciaExplotacionViejo) {
			var optionProvinciaExplotacionAnterior = document.createElement("option");
			optionProvinciaExplotacionAnterior.id = "provinciaExplotacionViejo";
			optionProvinciaExplotacionAnterior.text = provinciaExplotacionViejo.value;
			selectProvinciaExplotacion.add(optionProvinciaExplotacionAnterior);
			optionProvinciaExplotacionAnterior.selected = true;

		}

		if (ciudadExplotacionViejo) {
			var optionCiudadExplotacionAnterior = document.createElement("option");
			optionCiudadExplotacionAnterior.id = "ciudadExplotacionViejo";
			optionCiudadExplotacionAnterior.text = ciudadExplotacionViejo.value;
			selectCiudadExplotacion.add(optionCiudadExplotacionAnterior);
			optionCiudadExplotacionAnterior.selected = true;
		}
	//fin

	//pregunta 1

		var calificacionGeneral = document.querySelector('.calificacionGeneral');
		var calificacionGeneralCual = document.querySelector('.calificacionGeneralCual');
		var calificacionGeneralOtraInput = document.querySelector('.calificacionGeneralOtraInput');

		calificacionGeneral.addEventListener('change', function(){
			calificacionGeneralOtraInput.value = '';
		});

		if (calificacionGeneral.value === '8') {
			calificacionGeneralCual.style.display = ''
		}else{
			calificacionGeneralCual.style.display = 'none'
			}

	//pregunta 3
		var selectFinalidad = document.querySelector('.finalidad');
		var finalidadCual = document.querySelector('.finalidadCual');
		var finalidadOtraInput = document.querySelector('.finalidadOtraInput');

		selectFinalidad.addEventListener('change', function(){
			finalidadOtraInput.value = '';
		});

		if (selectFinalidad.value == '5') {
			finalidadCual.style.display = '';
		}else {
			finalidadCual.style.display = 'none';
		}

	//pregunta 4
		var selectActividad = document.querySelector('.actividad');
		var actividadCual = document.querySelector('.actividadCual');
		var actividadOtraInput = document.querySelector('.actividadOtraInput');

		var rural = document.querySelector('.rural');
		var checkRural = document.getElementsByName('rural_id[]');
		checkRural[5].addEventListener('click', function(){
			if (this.checked) {
				ruralCual.style.display = '';
			}else{
				ruralCual.style.display = 'none';
				ruralOtraInput.value = '';
			}
		});
		var ruralCual = document.querySelector('.ruralCual');
		var ruralOtraInput = document.querySelector('.ruralOtraInput');
		var ruralCualDomicilioInput = document.querySelector('.ruralCualDomicilio');
		var checkRuralDesconoce = document.querySelector('.checkRuralDesconoce');
		var checkRuralCualDesconoce = document.querySelector('.ruralCualDesconoce');
		var checkRuralOtro = document.querySelector('.checkRuralOtro');

		var privado = document.querySelector('.privado');
		var checkPrivado = document.getElementsByName('privado_id[]');
		var checkPrivadoDesconoce = document.querySelector('.checkPrivadoDesconoce');
		var checkPrivadoOtro = document.querySelector('.checkPrivadoOtro');
		var privadoCual = document.querySelector('.privadoCual');
		var privadoOtraInput = document.querySelector('.privadoOtraInput');
		if (checkPrivadoOtro.checked) {
			privadoCual.style.display = '';
		}else{
			privadoCual.style.display = 'none';
			privadoOtraInput.value = '';
		}

		var textil = document.querySelector('.textil');
		var textilCual = document.querySelector('.textilCual');
		var checkTextilOtro = document.querySelector('.checkTextilOtro');
		var checkTextilDesconoce = document.querySelector('.checkTextilDesconoce');
		var marcaTextil = document.querySelector('.marcaTextil');
		var textilOtraInput = document.querySelector('.textilOtraInput');
		var checkTextil = document.getElementsByName('textil_id[]');
		if (checkTextilOtro.checked) {
			textilCual.style.display = '';
		}else{
			textilCual.style.display = 'none';
			textilOtraInput.value = '';
		}
		// checkTextil[5].addEventListener('click', function(){
		// 	if (this.checked) {
		// 		textilCual.style.display = '';
		// 	}else{
		// 		textilCual.style.display = 'none';
		// 	}
		// });
		var marcaDesconoce = document.querySelector('.marcaDesconoce');
		marcaDesconoce.addEventListener('click', function(){
			if (this.checked) {
				marcaTextil.value = 'Se desconoce';
				marcaTextil.setAttribute("readonly", "readonly")
			}else{
				marcaTextil.value = '';
				marcaTextil.removeAttribute('readonly')

			}
		});

		// if (selectActividad.value === '6') {
		// 	textil.style.display = ''
		// }

		if (selectActividad.value == '6') {
			actividadCual.style.display = '';
			rural.style.display = 'none';
			privado.style.display = 'none';
			textil.style.display = 'none';
			ruralCual.style.display = 'none';
			marcaTextil.value = '';
			textilOtraInput.value = '';
			ruralOtraInput.value = '';
			privadoCual.style.display = 'none';
			privadoOtraInput.value = '';
			ruralCualDomicilioInput.value = '';
			ruralCualDomicilioInput.removeAttribute('readonly');
			checkRuralCualDesconoce.checked = false;
			textilCual.style.display = 'none';
			marcaTextil.removeAttribute('readonly')
			marcaDesconoce.checked = false;
			checkTextil.forEach(function(element, index){
				checkTextil[index].checked = false;
			});
			checkPrivado.forEach(function(element, index){
				checkPrivado[index].checked = false;
			});
			checkRural.forEach(function(element, index){
				checkRural[index].checked = false;
			});
			}else if(selectActividad.value == '1' || selectActividad.value == '2'){
				rural.style.display = '';
				privado.style.display = 'none';
				actividadCual.style.display = 'none';
				textil.style.display = 'none';
				actividadOtraInput.value = '';
				privadoCual.style.display = 'none';
				privadoOtraInput.value = '';
				marcaTextil.value = '';
				textilOtraInput.value = '';
				textilCual.style.display = 'none';
				marcaTextil.removeAttribute('readonly')
				marcaDesconoce.checked = false;
				checkTextil.forEach(function(element, index){
					checkTextil[index].checked = false;
				});
				checkPrivado.forEach(function(element, index){
					checkPrivado[index].checked = false;
				})
					if (checkRuralOtro.checked) {
						ruralCual.style.display = '';
					}else{
						ruralCual.style.display = 'none';
						ruralOtraInput.value = '';
					}
				checkRuralDesconoce.addEventListener('click', function(){
					if (this.checked) {
						document.getElementById('FeriaRural').disabled = true;
						document.getElementById('FeriaRural').checked = false;
						document.getElementById('VerduleríaRural').disabled = true;
						document.getElementById('VerduleríaRural').checked = false;
						document.getElementById('SupermercadoRural').disabled = true;
						document.getElementById('SupermercadoRural').checked = false;
						document.getElementById('ParticularRural').disabled = true;
						document.getElementById('ParticularRural').checked = false;
						document.getElementById('OtroRural').disabled = true;
						document.getElementById('OtroRural').checked = false;
						ruralCual.style.display = 'none';
						ruralOtraInput.value = '';
					}else{
						document.getElementById('FeriaRural').disabled = false;
						document.getElementById('VerduleríaRural').disabled = false;
						document.getElementById('SupermercadoRural').disabled = false;
						document.getElementById('ParticularRural').disabled = false;
						document.getElementById('OtroRural').disabled = false;
					}
				});
			}else if (selectActividad.value == '3' || selectActividad.value == '4') {
				privado.style.display = '';
				textil.style.display = 'none';
				actividadCual.style.display = 'none';
				rural.style.display = 'none';
				ruralCual.style.display = 'none';
				actividadOtraInput.value = '';
				marcaTextil.value = '';
				textilOtraInput.value = '';
				ruralOtraInput.value = '';
				ruralCualDomicilioInput.value = '';
				ruralCualDomicilioInput.removeAttribute('readonly');
				checkRuralCualDesconoce.checked = false;
				textilCual.style.display = 'none';
				marcaTextil.removeAttribute('readonly')
				marcaDesconoce.checked = false;
				checkTextil.forEach(function(element, index){
					checkTextil[index].checked = false;
				});
				checkRural.forEach(function(element, index){
					checkRural[index].checked = false;
				});
				checkPrivadoOtro.addEventListener('click', function(){
					if (checkPrivadoOtro.checked) {
						privadoCual.style.display = '';
					}else{
						privadoCual.style.display = 'none';
						privadoOtraInput.value = '';
					}
				});
				checkPrivadoDesconoce.addEventListener('click', function(){
					if (this.checked) {
						document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').disabled = true;
						document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').checked = false;
						document.getElementById('Vía públicaPrivado').disabled = true;
						document.getElementById('Vía públicaPrivado').checked = false;
						document.getElementById('PrivadoPrivado').disabled = true;
						document.getElementById('PrivadoPrivado').checked = false;
						document.getElementById('Domicilio particularPrivado').disabled = true;
						document.getElementById('Domicilio particularPrivado').checked = false;
						document.getElementById('HotelPrivado').disabled = true;
						document.getElementById('HotelPrivado').checked = false;
						document.getElementById('ProstíbuloPrivado').disabled = true;
						document.getElementById('ProstíbuloPrivado').checked = false;
						document.getElementById('OtroPrivado').disabled = true;
						document.getElementById('OtroPrivado').checked = false;
						privadoCual.style.display = 'none';
						privadoOtraInput.value = '';
					}else{
						document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').disabled = false;
						document.getElementById('Vía públicaPrivado').disabled = false;
						document.getElementById('PrivadoPrivado').disabled = false;
						document.getElementById('Domicilio particularPrivado').disabled = false;
						document.getElementById('HotelPrivado').disabled = false;
						document.getElementById('ProstíbuloPrivado').disabled = false;
						document.getElementById('OtroPrivado').disabled = false;
					}
				});
			}else if (selectActividad.value == '5') {
				textil.style.display = '';
				rural.style.display = 'none';
				actividadCual.style.display = 'none';
				privado.style.display = 'none';
				ruralCual.style.display = 'none';
				actividadOtraInput.value = '';
				privadoCual.style.display = 'none';
				privadoOtraInput.value = '';
				ruralOtraInput.value = '';
				ruralCualDomicilioInput.value = '';
				ruralCualDomicilioInput.removeAttribute('readonly');
				checkRuralCualDesconoce.checked = false;
				checkPrivado.forEach(function(element, index){
					checkPrivado[index].checked = false;
				})
				checkTextilOtro.addEventListener('click', function(){
					if (checkTextilOtro.checked) {
						textilCual.style.display = '';
					}else{
						textilCual.style.display = 'none';
						textilOtraInput.value = '';
					}
				});
				checkRural.forEach(function(element, index){
					checkRural[index].checked = false;
				});
				checkTextilDesconoce.addEventListener('click', function(){
					if (this.checked) {
						document.getElementById('FeriaTextil').disabled = true;
						document.getElementById('FeriaTextil').checked = false;
						document.getElementById('Local de ventaTextil').disabled = true;
						document.getElementById('Local de ventaTextil').checked = false;
						document.getElementById('ParticularTextil').disabled = true;
						document.getElementById('ParticularTextil').checked = false;
						document.getElementById('Vía públicaTextil').disabled = true;
						document.getElementById('Vía públicaTextil').checked = false;
						document.getElementById('OtroTextil').disabled = true;
						document.getElementById('OtroTextil').checked = false;
						textilCual.style.display = 'none';
						textilOtraInput.value = '';
					}else{
						document.getElementById('FeriaTextil').disabled = false;
						document.getElementById('Local de ventaTextil').disabled = false;
						document.getElementById('ParticularTextil').disabled = false;
						document.getElementById('Vía públicaTextil').disabled = false;
						document.getElementById('OtroTextil').disabled = false;
					}
				});
		}else{
			actividadCual.style.display = 'none';
			rural.style.display = 'none';
			privado.style.display = 'none';
			textil.style.display = 'none';
			ruralCual.style.display = 'none';
			actividadOtraInput.value = '';
			privadoCual.style.display = 'none';
			privadoOtraInput.value = '';
			marcaTextil.value = '';
			textilOtraInput.value = '';
			ruralOtraInput.value = '';
			ruralCualDomicilioInput.value = '';
			ruralCualDomicilioInput.removeAttribute('readonly');
			checkRuralCualDesconoce.checked = false;
			textilCual.style.display = 'none';
			marcaTextil.removeAttribute('readonly')
			marcaDesconoce.checked = false;
			checkTextil.forEach(function(element, index){
				checkTextil[index].checked = false;
			});
			checkPrivado.forEach(function(element, index){
				checkPrivado[index].checked = false;
			});
			checkRural.forEach(function(element, index){
				checkRural[index].checked = false;
			});
		}

		// if (selectActividad.value === '1' || selectActividad.value === '2') {
		// 	rural.style.display = '';
		// 	if (checkRural[5].checked) {
		// 		ruralCual.style.display = '';
		// 	}else{
		// 		ruralOtraInput.value = '';
		// 	}
		// }else if (selectActividad.value === '3' || selectActividad.value === '4') {
		// 	privado.style.display = '';
		// 	if (checkPrivado[7].checked) {
		// 		privadoCual.style.display = '';
		// 	}else{
		// 		privadoOtraInput.value = '';
		// 	}
		// }else if (selectActividad.value === '5') {
		// 	textil.style.display = '';
		// 	if (checkTextil[5].checked) {
		// 		textilCual.style.display = '';
		// 	}else{
		// 		textilOtraInput.value = '';
		// 	}
		// }else if (selectActividad.value === '7') {
		// 	actividadCual.style.display = '';
		// }else {
		// 	rural.style.display = 'none';
		// 	privado.style.display = 'none';
		// 	textil.style.display = 'none';
		// }

	//pregunta 9
		var contactoExplotacion = document.querySelector('.contactoExplotacion');
		var contactoExplotacionCual = document.querySelector('.contactoExplotacionCual');
		var contactoExplotacionCualInput = document.querySelector('.contactoexplotacion_otro');

		if (contactoExplotacion.value == '6') {
			contactoExplotacionCual.style.display = '';
		}else{
			contactoExplotacionCual.style.display = 'none';
			contactoExplotacionCualInput.value = '';
		}

	//pregunta 10
		var viajo = document.querySelector('.viajo');
		var viajoAcompanado = document.querySelector('.viajoAcompanado');
		var acompanado = document.querySelector('.acompanado');
		var acompanadoRed = document.querySelector('.acompanadored');

		if (viajo.value === '2') {
			viajoAcompanado.style.display = '';
		}else{
			viajoAcompanado.style.display = 'none'
			acompanado.value = '';
			acompanadoRed.value = '';
		}

	//pregunta 14 I
		var otroLugarExplotacionSelect = document.querySelector('.otroLugarExplotacionSelect');
		var lugarexplotacionCual = document.querySelector('.lugarexplotacionCual');
		var lugarexplotacionCualInput = document.querySelector('.lugarexplotacionCualInput');
		if (otroLugarExplotacionSelect) {
			if (otroLugarExplotacionSelect.value == 1) 	{
				lugarexplotacionCual.style.display = '';
			}else{
				lugarexplotacionCual.style.display = 'none';
				lugarexplotacionCualInput.value = '';
			}
		}
		

	//pregunta 21
		var selectFrecuenciaPago = document.querySelector('.selectFrecuenciaPago');
		var selectModalidadPagos = document.querySelector('.modalidadPagos');

		if (selectFrecuenciaPago.value == 4) {
			selectModalidadPagos.value = 5;
		}

	//pregunta 22
		var selectModalidadPagos = document.querySelector('.modalidadPagos');
		var especias = document.querySelector('.especias');
		var checkEspeciasOtro = document.querySelector('.especiasOtro');
		var checkEspecias = document.getElementsByName('especiaconcepto_id[]');
		var especiasCual = document.querySelector('.especiasCual');
		var especiasCualInput = document.querySelector('.especiasCualInput');

		if (checkEspeciasOtro.checked) {
			especiasCual.style.display = 'block';
		}

		if (selectModalidadPagos.value == '4') {
			especias.style.display = '';
			checkEspeciasOtro.addEventListener('click', function(){
				if (this.checked) {
					especiasCual.style.display = '';
				}else{
					especiasCual.style.display = 'none';
					especiasCualInput.value = '';
				}
			});
		}else{
			checkEspecias.forEach(function(element){
				element.checked = false;
			});
			especias.style.display = 'none';
			especiasCual.style.display = 'none';
			especiasCualInput.value = '';
		}

	//pregunta 24
		var selectDeuda = document.querySelector('.deuda');
		var deudaSi = document.querySelector('.deudaSi');
		var checkDeuda = document.getElementsByName('motivodeuda_id[]');
		var checkDeudaOtro = document.querySelector('.deudaOtro');
		var deudaCual = document.querySelector('.deudaCual');
		var deudaCualInput = document.querySelector('.deudaCualInput');

		if (selectDeuda.value == '1') {
			deudaSi.style.display = '';
			if (checkDeudaOtro.checked) {
				deudaCual.style.display = '';
			}else{
				deudaCual.style.display = 'none';
				deudaCualInput.value = '';
			}
		}else{
			checkDeuda.forEach(function(element){
				element.checked = false;
			});
			deudaSi.style.display = 'none';
			deudaCual.style.display = 'none';
			deudaCualInput.value = '';
		}

	//pregunta 26
		var selectTestigo = document.querySelector('.testigo');
		var testigoSi = document.querySelector('.testigoSi');
		var coordinadorPTN = document.querySelector('.coordinadorPTN');
		var coordinadorPTNOtro = document.querySelector('.coordinadorPTN_otro');

		if (selectTestigo.value === '1') {
			testigoSi.style.display = '';
			selectTestigo.addEventListener('change', function(){
				coordinadorPTN.value = '';
				coordinadorPTNOtro.value = '';
			});
		}else{
			testigoSi.style.display = 'none';
		}

	//pregunta 29
		var checkHayMedidaOtro = document.querySelector('.hayMedidaOtro');
		var checkHayMedidaDesconoce = document.querySelector('.hayMedidaDesconoce');
		var checkHayMedidaNoPosee = document.querySelector('.hayMedidaNoPosee');
		var hayMedidaCual = document.querySelector('.hayMedidaCual');
		var hayMedidaCualInput = document.querySelector('.haymedidas_otro');

		if (checkHayMedidaOtro.checked) {
			hayMedidaCual.style.display = '';
		}else{
			hayMedidaCual.style.display = 'none';
			hayMedidaCualInput.value = '';
		}

	//pregunta 34
		var selectMaterial = document.querySelector('.material');
		var materialCual = document.querySelector('.materialCual');
		var materialOtro = document.querySelector('.material_otro');

		if (selectMaterial.value === '7') {
			materialCual.style.display = '';
		}else{
			materialCual.style.display = 'none';
			materialOtro.value = '';
		}

//---fin edicion------

window.onload = function (){

	//pregunta 1
		var selectCalifGeneral = document.querySelector('.calificacionGeneral');
		var califGeneralCual = document.querySelector('.calificacionGeneralCual');
		var calificacionGeneralOtraInput = document.querySelector('.calificacionGeneralOtraInput');

		selectCalifGeneral.addEventListener('change', function(){
			if (this.value == '8') {
				califGeneralCual.style.display = '';
			}else {
				califGeneralCual.style.display = 'none';
				calificacionGeneralOtraInput.value = '';
			}
		});	

	//pregunta 3
		var selectFinalidad = document.querySelector('.finalidad');
		var finalidadCual = document.querySelector('.finalidadCual');
		var finalidadOtraInput = document.querySelector('.finalidadOtraInput');

		selectFinalidad.addEventListener('change', function(){
			if (this.value == '5') {
				finalidadCual.style.display = '';
			}else {
				finalidadCual.style.display = 'none';
				finalidadOtraInput.value = '';
			}
		});	

	//pregunta 4
		var selectActividad = document.querySelector('.actividad');
		var actividadCual = document.querySelector('.actividadCual');
		var actividadOtraInput = document.querySelector('.actividadOtraInput');

		var rural = document.querySelector('.rural');
		var checkRural = document.getElementsByName('rural_id[]');
		var checkRuralOtro = document.querySelector('.checkRuralOtro');
		var ruralOtraInput = document.querySelector('.ruralOtraInput');
		var checkRuralDesconoce = document.querySelector('.checkRuralDesconoce');
		var ruralCual = document.querySelector('.ruralCual');

		var checkRuralCualDesconoce = document.querySelector('.ruralCualDesconoce');
		var ruralCualDomicilioInput = document.querySelector('.ruralCualDomicilio');
		checkRuralCualDesconoce.addEventListener('click', function(){
			if (this.checked) {
				ruralCualDomicilioInput.value = 'SE DESCONOCE'
				ruralCualDomicilioInput.setAttribute("readonly", "readonly")
			}else{
				ruralCualDomicilioInput.value = ''
				ruralCualDomicilioInput.removeAttribute('readonly')
			}
		});

		var privado = document.querySelector('.privado');
		var checkPrivado = document.getElementsByName('privado_id[]');
		var checkPrivadoOtro = document.querySelector('.checkPrivadoOtro');
		var privadoOtraInput = document.querySelector('.privadoOtraInput');
		var checkPrivadoDesconoce = document.querySelector('.checkPrivadoDesconoce');
		var privadoCual = document.querySelector('.privadoCual');

		var textil = document.querySelector('.textil');
		var marcaTextil = document.querySelector('.marcaTextil');
		var marcaDesconoce = document.querySelector('.marcaDesconoce');
		marcaDesconoce.addEventListener('click', function(){
			if (this.checked) {
				marcaTextil.value = 'Se desconoce';
				marcaTextil.setAttribute("readonly", "readonly")
			}else{
				marcaTextil.value = '';
				marcaTextil.removeAttribute('readonly')

			}
		});
		var checkTextil = document.getElementsByName('textil_id[]');
		var checkTextilOtro = document.querySelector('.checkTextilOtro');
		var textilOtraInput = document.querySelector('.textilOtraInput');
		var checkTextilDesconoce = document.querySelector('.checkTextilDesconoce');
		var textilCual = document.querySelector('.textilCual');


		selectActividad.addEventListener('change', function(){
			if (this.value == '6') {
				actividadCual.style.display = '';
				rural.style.display = 'none';
				privado.style.display = 'none';
				textil.style.display = 'none';
				ruralCual.style.display = 'none';
				privadoCual.style.display = 'none';
				marcaTextil.value = '';
				textilCual.style.display = 'none';
				textilOtraInput.value = '';
				ruralOtraInput.value = '';
				privadoOtraInput.value = '';
				ruralCualDomicilioInput.value = '';
				ruralCualDomicilioInput.removeAttribute('readonly');
				checkRuralCualDesconoce.checked = false;
				marcaTextil.removeAttribute('readonly');
				marcaDesconoce.checked = false;
				checkTextil.forEach(function(element, index){
					checkTextil[index].checked = false;
				});
				checkPrivado.forEach(function(element, index){
					checkPrivado[index].checked = false;
				});
				checkRural.forEach(function(element, index){
					checkRural[index].checked = false;
				});
				}else if(this.value == '1' || this.value == '2'){
					rural.style.display = '';
					privado.style.display = 'none';
					actividadCual.style.display = 'none';
					textil.style.display = 'none';
					privadoCual.style.display = 'none';
					actividadOtraInput.value = '';
					privadoOtraInput.value = '';
					marcaTextil.value = '';
					textilCual.style.display = 'none';
					textilOtraInput.value = '';
					privadoOtraInput.value = '';
					marcaTextil.removeAttribute('readonly');
					marcaDesconoce.checked = false;
					checkTextil.forEach(function(element, index){
						checkTextil[index].checked = false;
					});
					checkPrivado.forEach(function(element, index){
						checkPrivado[index].checked = false;
					})
					checkRuralOtro.addEventListener('click', function(){
						if (this.checked) {
							ruralCual.style.display = '';
						}else{
							ruralCual.style.display = 'none';
							ruralOtraInput.value = '';
						}
					});
					checkRuralDesconoce.addEventListener('click', function(){
						if (this.checked) {
							document.getElementById('FeriaRural').disabled = true;
							document.getElementById('FeriaRural').checked = false;
							document.getElementById('VerduleríaRural').disabled = true;
							document.getElementById('VerduleríaRural').checked = false;
							document.getElementById('SupermercadoRural').disabled = true;
							document.getElementById('SupermercadoRural').checked = false;
							document.getElementById('ParticularRural').disabled = true;
							document.getElementById('ParticularRural').checked = false;
							document.getElementById('OtroRural').disabled = true;
							document.getElementById('OtroRural').checked = false;
						}else{
							document.getElementById('FeriaRural').disabled = false;
							document.getElementById('VerduleríaRural').disabled = false;
							document.getElementById('SupermercadoRural').disabled = false;
							document.getElementById('ParticularRural').disabled = false;
							document.getElementById('OtroRural').disabled = false;
						}
					});
				}else if (this.value == '3' || this.value == '4') {
					privado.style.display = '';
					textil.style.display = 'none';
					actividadCual.style.display = 'none';
					rural.style.display = 'none';
					ruralCual.style.display = 'none';
					actividadOtraInput.value = '';
					marcaTextil.value = '';
					textilCual.style.display = 'none';
					textilOtraInput.value = '';
					ruralOtraInput.value = '';
					ruralCualDomicilioInput.value = '';
					marcaTextil.removeAttribute('readonly');
					ruralCualDomicilioInput.removeAttribute('readonly');
					checkRuralCualDesconoce.checked = false;
					marcaDesconoce.checked = false;
					checkTextil.forEach(function(element, index){
						checkTextil[index].checked = false;
					});
					checkRural.forEach(function(element, index){
						checkRural[index].checked = false;
					});
					checkPrivadoOtro.addEventListener('click', function(){
						if (checkPrivadoOtro.checked) {
							privadoCual.style.display = '';
						}else{
							privadoCual.style.display = 'none';
							privadoOtraInput.value = '';
						}
					});
					checkPrivadoDesconoce.addEventListener('click', function(){
						if (this.checked) {
							document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').disabled = true;
							document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').checked = false;
							document.getElementById('Vía públicaPrivado').disabled = true;
							document.getElementById('Vía públicaPrivado').checked = false;
							document.getElementById('PrivadoPrivado').disabled = true;
							document.getElementById('PrivadoPrivado').checked = false;
							document.getElementById('Domicilio particularPrivado').disabled = true;
							document.getElementById('Domicilio particularPrivado').checked = false;
							document.getElementById('HotelPrivado').disabled = true;
							document.getElementById('HotelPrivado').checked = false;
							document.getElementById('ProstíbuloPrivado').disabled = true;
							document.getElementById('ProstíbuloPrivado').checked = false;
							document.getElementById('OtroPrivado').disabled = true;
							document.getElementById('OtroPrivado').checked = false;
							privadoCual.style.display = 'none';
							privadoOtraInput.value = '';
						}else{
							document.getElementById('Local, bar o expendio de bebidas alcohólicasPrivado').disabled = false;
							document.getElementById('Vía públicaPrivado').disabled = false;
							document.getElementById('PrivadoPrivado').disabled = false;
							document.getElementById('Domicilio particularPrivado').disabled = false;
							document.getElementById('HotelPrivado').disabled = false;
							document.getElementById('ProstíbuloPrivado').disabled = false;
							document.getElementById('OtroPrivado').disabled = false;
						}
					});
				}else if (this.value == '5') {
					textil.style.display = '';
					rural.style.display = 'none';
					actividadCual.style.display = 'none';
					privado.style.display = 'none';
					ruralCual.style.display = 'none';
					privadoCual.style.display = 'none';
					actividadOtraInput.value = '';
					privadoOtraInput.value = '';
					ruralOtraInput.value = '';
					privadoOtraInput.value = '';
					ruralCualDomicilioInput.removeAttribute('readonly');
					checkRuralCualDesconoce.checked = false;
					ruralCualDomicilioInput.value = '';
					checkPrivado.forEach(function(element, index){
						checkPrivado[index].checked = false;
					})
					checkTextilOtro.addEventListener('click', function(){
						if (checkTextilOtro.checked) {
							textilCual.style.display = '';
						}else{
							textilCual.style.display = 'none';
							textilOtraInput.value = '';
						}
					});
					checkRural.forEach(function(element, index){
						checkRural[index].checked = false;
					});
					checkTextilDesconoce.addEventListener('click', function(){
						if (this.checked) {
							document.getElementById('FeriaTextil').disabled = true;
							document.getElementById('FeriaTextil').checked = false;
							document.getElementById('Local de ventaTextil').disabled = true;
							document.getElementById('Local de ventaTextil').checked = false;
							document.getElementById('ParticularTextil').disabled = true;
							document.getElementById('ParticularTextil').checked = false;
							document.getElementById('Vía públicaTextil').disabled = true;
							document.getElementById('Vía públicaTextil').checked = false;
							document.getElementById('OtroTextil').disabled = true;
							document.getElementById('OtroTextil').checked = false;
							textilCual.style.display = 'none';
							textilOtraInput.value = '';
						}else{
							document.getElementById('FeriaTextil').disabled = false;
							document.getElementById('Local de ventaTextil').disabled = false;
							document.getElementById('ParticularTextil').disabled = false;
							document.getElementById('Vía públicaTextil').disabled = false;
							document.getElementById('OtroTextil').disabled = false;
						}
					});
			}else{
				actividadCual.style.display = 'none';
				rural.style.display = 'none';
				privado.style.display = 'none';
				textil.style.display = 'none';
				ruralCual.style.display = 'none';
				privadoCual.style.display = 'none';
				actividadOtraInput.value = '';
				privadoOtraInput.value = '';
				marcaTextil.value = '';
				textilCual.style.display = 'none';
				textilOtraInput.value = '';
				ruralOtraInput.value = '';
				ruralCualDomicilioInput.removeAttribute('readonly');
				checkRuralCualDesconoce.checked = false;
				ruralCualDomicilioInput.value = '';
				marcaTextil.removeAttribute('readonly');
				marcaDesconoce.checked = false;
				checkTextil.forEach(function(element, index){
					checkTextil[index].checked = false;
				});
				checkPrivado.forEach(function(element, index){
					checkPrivado[index].checked = false;
				});
				checkRural.forEach(function(element, index){
					checkRural[index].checked = false;
				});
			}
		});
		
	//pregunta 6
		var paisCaptacion = document.querySelector('.countries');
		var desconocePaisCaptacion = document.querySelector('#desconocePaisCaptacion');
		var provinciaCaptacion = document.querySelector('.states');
		var desconoceProvinciaCaptacion = document.querySelector('#desconoceProvinciaCaptacion');
		var ciudadCaptacion = document.querySelector('.cities');
		var desconoceCiudadCaptacion = document.querySelector('#desconoceCiudadCaptacion');
	
		desconocePaisCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option1 = document.createElement("option");
				var option2 = document.createElement("option");
				var option3 = document.createElement("option");
				option1.text = "SE DESCONOCE";
				option2.text = "SE DESCONOCE";
				option3.text = "SE DESCONOCE";

				paisCaptacion.add(option1);
				paisCaptacion.value = 'SE DESCONOCE';
				paisCaptacion.setAttribute("readonly", "readonly");

				provinciaCaptacion.add(option2);
				provinciaCaptacion.value = 'SE DESCONOCE';
				provinciaCaptacion.setAttribute("readonly", "readonly");
				desconoceProvinciaCaptacion.checked = true;

				ciudadCaptacion.add(option3);
				ciudadCaptacion.value = 'SE DESCONOCE';
				ciudadCaptacion.setAttribute("readonly", "readonly");
				desconoceCiudadCaptacion.checked = true;




			}else{
				paisCaptacion.value = '';
				paisCaptacion.removeAttribute('readonly');


				provinciaCaptacion.value = '';
				provinciaCaptacion.removeAttribute('readonly');
				desconoceProvinciaCaptacion.checked = false;

				ciudadCaptacion.value = '';
				ciudadCaptacion.removeAttribute('readonly');
				desconoceCiudadCaptacion.checked = false;
			}
		});

	//pregunta 7


		desconoceProvinciaCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "SE DESCONOCE";
	    		provinciaCaptacion.add(option);
	    		provinciaCaptacion.value = 'SE DESCONOCE';
				provinciaCaptacion.setAttribute("readonly", "readonly");
			}else{
				provinciaCaptacion.value = '';
				provinciaCaptacion.removeAttribute('readonly');
			}
		});

	//pregunta 8


		desconoceCiudadCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "SE DESCONOCE";
	    		ciudadCaptacion.add(option);
	    		ciudadCaptacion.value = 'SE DESCONOCE';
				ciudadCaptacion.setAttribute("readonly", "readonly");
			}else{
				ciudadCaptacion.value = '';
				ciudadCaptacion.removeAttribute('readonly');
			}
		});

	//pregunta 9
		var contactoExplotacion = document.querySelector('.contactoExplotacion');
		var contactoExplotacionCual = document.querySelector('.contactoExplotacionCual');
		var contactoExplotacionCualInput = document.querySelector('.contactoexplotacion_otro');

		contactoExplotacion.addEventListener('change', function(){
			if (this.value == '6') {
				contactoExplotacionCual.style.display = '';
			}else{
				contactoExplotacionCual.style.display = 'none';
				contactoExplotacionCualInput.value = '';
			}
		});

	//pregunta 10
		var viajo = document.querySelector('.viajo');
		var viajoAcompanado = document.querySelector('.viajoAcompanado');
		var acompanado = document.querySelector('.acompanado');
		var acompanadoRed = document.querySelector('.acompanadored');

		viajo.addEventListener('change', function(){
			if (this.value == '2') {
				viajoAcompanado.style.display = '';
			}else{
				viajoAcompanado.style.display = 'none';
				acompanado.value = '';
				acompanadoRed.value = '';
			}
		});

	//pregunta 11
		var paisExplotacion = document.querySelector('.countries2');
		var desconocePaisExplotacion = document.querySelector('#desconocePaisExplotacion');
	var provinciaExplotacion = document.querySelector('.states2');
	var desconoceProvinciaExplotacion = document.querySelector('#desconoceProvinciaExplotacion');
	var ciudadExplotacion = document.querySelector('.cities2');
	var desconoceCiudadExplotacion = document.querySelector('#desconoceCiudadExplotacion');
	
		desconocePaisExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option1 = document.createElement("option");
				var option2 = document.createElement("option");
				var option3 = document.createElement("option");
				option1.text = "SE DESCONOCE";
				option2.text = "SE DESCONOCE";
				option3.text = "SE DESCONOCE";
	    		paisExplotacion.add(option1);
	    		paisExplotacion.value = 'SE DESCONOCE';
				paisExplotacion.setAttribute("readonly", "readonly");


				provinciaExplotacion.add(option2);
				provinciaExplotacion.value = 'SE DESCONOCE';
				provinciaExplotacion.setAttribute("readonly", "readonly");
				desconoceProvinciaExplotacion.checked = true;

				ciudadExplotacion.add(option3);
				ciudadExplotacion.value = 'SE DESCONOCE';
				ciudadExplotacion.setAttribute("readonly", "readonly");
				desconoceCiudadExplotacion.checked = true;
			}else{
				paisExplotacion.value = '';
				paisExplotacion.removeAttribute('readonly');

				provinciaExplotacion.value = '';
				provinciaExplotacion.removeAttribute('readonly');
				desconoceProvinciaExplotacion.checked = false;

				ciudadExplotacion.value = '';
				ciudadExplotacion.removeAttribute('readonly');
				desconoceCiudadExplotacion.checked = false;
			}
		});

	//pregunta 12		

		desconoceProvinciaExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "SE DESCONOCE";
	    		provinciaExplotacion.add(option);
	    		provinciaExplotacion.value = 'SE DESCONOCE';
				provinciaExplotacion.setAttribute("readonly", "readonly");
			}else{
				provinciaExplotacion.value = '';
				provinciaExplotacion.removeAttribute('readonly');
			}
		});

	//pregunta 13
		

		desconoceCiudadExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "SE DESCONOCE";
	    		ciudadExplotacion.add(option);
	    		ciudadExplotacion.value = 'SE DESCONOCE';
				ciudadExplotacion.setAttribute("readonly", "readonly");
			}else{
				ciudadExplotacion.value = '';
				ciudadExplotacion.removeAttribute('readonly');
			}
		});

	//pregunta 14
		var inputDomicilio = document.querySelector('.domicilio');
		var checkDomicilioDesconoce = document.querySelector('.domicilioDesconoce');
		checkDomicilioDesconoce.addEventListener('click', function(){
			if (this.checked) {
				inputDomicilio.value = 'SE DESCONOCE'
				inputDomicilio.setAttribute("readonly", "readonly")
			}else{
				inputDomicilio.value = ''
				inputDomicilio.removeAttribute('readonly')
			}
		});

	//pregunta 14 I
		var otroLugarExplotacionSelect = document.querySelector('.otroLugarExplotacionSelect');
		var lugarexplotacionCual = document.querySelector('.lugarexplotacionCual');
		var lugarexplotacionCualInput = document.querySelector('.lugarexplotacionCualInput');

		// if (otroLugarExplotacionSelect) {
			otroLugarExplotacionSelect.addEventListener('change', function(){
				if (otroLugarExplotacionSelect.value == 1) {
					lugarexplotacionCual.style.display = '';
				} else {
					lugarexplotacionCual.style.display = 'none';
					lugarexplotacionCualInput.value = '';
				}
			})
		// }
		
		

	//pregunta 20
		var inputHorasTarea = document.querySelector('.horasTarea');
		var checkHorasTareaDesconoce = document.querySelector('.horasTareaDesconoce');
		checkHorasTareaDesconoce.addEventListener('click', function(){
			if (this.checked) {
				inputHorasTarea.value = 'SE DESCONOCE'
				inputHorasTarea.setAttribute("readonly", "readonly")
			}else{
				inputHorasTarea.value = ''
				inputHorasTarea.removeAttribute('readonly')
			}
		});

	//pregunta 21
		var selectFrecuenciaPago = document.querySelector('.selectFrecuenciaPago');
		var selectModalidadPagos = document.querySelector('.modalidadPagos');

		selectFrecuenciaPago.addEventListener('change', function(){
			if (this.value == 4) {
				selectModalidadPagos.value = 5;
			}else{
				selectModalidadPagos.value = '';
			}
		});

	// pregunta 22
		var selectModalidadPagos = document.querySelector('.modalidadPagos');
		var especias = document.querySelector('.especias');
		var checkEspeciasOtro = document.querySelector('.especiasOtro');
		var checkEspecias = document.getElementsByName('especiaconcepto_id[]');
		var especiasCual = document.querySelector('.especiasCual');
		var especiasCualInput = document.querySelector('.especiasCualInput');

		selectModalidadPagos.addEventListener('change', function(){
			if (this.value == '4') {
				especias.style.display = '';
				checkEspeciasOtro.addEventListener('click', function(){
					if (this.checked) {
						especiasCual.style.display = '';
					}else{
						especiasCual.style.display = 'none';
						especiasCualInput.value = '';
					}
				});
			}else{
				checkEspecias.forEach(function(element){
					element.checked = false;
				});
				especias.style.display = 'none';
				especiasCual.style.display = 'none';
				especiasCualInput.value = '';
			}
		});

	// pregunta 23
		var inputMontoPago = document.querySelector('.montoPago');
		var checkMontoPagoDesconoce = document.querySelector('.montoPagoDesconoce');

		checkMontoPagoDesconoce.addEventListener('click', function(){
			if (this.checked) {
				inputMontoPago.value = 'SE DESCONOCE'
				inputMontoPago.setAttribute("readonly", "readonly")
			}else{
				inputMontoPago.value = ''
				inputMontoPago.removeAttribute('readonly')
			}
		});

	// pregunta 24
		var selectDeuda = document.querySelector('.deuda');
		var deudaSi = document.querySelector('.deudaSi');
		var checkDeuda = document.getElementsByName('motivodeuda_id[]');
		var checkDeudaOtro = document.querySelector('.deudaOtro');
		var deudaCual = document.querySelector('.deudaCual');
		var deudaCualInput = document.querySelector('.deudaCualInput');
		var legurDeuda = document.querySelector('.lugardeuda_id');

		selectDeuda.addEventListener('change', function(){
			if (this.value == '1') {
				deudaSi.style.display = '';
				checkDeudaOtro.addEventListener('click', function(){
					if (this.checked) {
						deudaCual.style.display = '';
					}else{
						deudaCual.style.display = 'none';
						deudaCualInput.value = '';
					}
				});
			}else{
				checkDeuda.forEach(function(element){
					element.checked = false;
				});
				deudaSi.style.display = 'none';
				deudaCual.style.display = 'none';
				deudaCualInput.value = '';
				legurDeuda.value = '';
			}
		});

	// pregunta 26
		var selectTestigo = document.querySelector('.testigo');
		var testigoSi = document.querySelector('.testigoSi');
		var coordinadorPTN = document.querySelector('.coordinadorPTN');
		var coordinadorPTNOtro = document.querySelector('.coordinadorPTNOtro');

		selectTestigo.addEventListener('change', function(){
			if (this.value == '1') {
				testigoSi.style.display = '';
			}else{
				testigoSi.style.display = 'none';
				coordinadorPTN.value = '';
				coordinadorPTNOtro.value = '';
			}
		});

	// pregunta 29
		var checkHayMedidaOtro = document.querySelector('.hayMedidaOtro');
		var checkHayMedidaDesconoce = document.querySelector('.hayMedidaDesconoce');
		var checkHayMedidaNoPosee = document.querySelector('.hayMedidaNoPosee');
		var hayMedidaCual = document.querySelector('.hayMedidaCual');
		var hayMedidaCualInput = document.querySelector('.haymedidas_otro');

		checkHayMedidaOtro.addEventListener('click', function(){
			if (this.checked) {
				hayMedidaCual.style.display = '';
			}else{
				hayMedidaCual.style.display = 'none';
				hayMedidaCualInput.value = '';
			}
		});
		checkHayMedidaDesconoce.addEventListener('click', function(){
			if (this.checked) {
				document.getElementById('Cámaras').disabled = true;
				document.getElementById('Cámaras').checked = false;
				document.getElementById('Personal de seguridad').disabled = true;
				document.getElementById('Personal de seguridad').checked = false;
				document.getElementById('Rejas').disabled = true;
				document.getElementById('Rejas').checked = false;
				document.getElementById('No posee').disabled = true;
				document.getElementById('No posee').checked = false;
				document.getElementById('Otro').disabled = true;
				document.getElementById('Otro').checked = false;
				hayMedidaCual.style.display = 'none';
				hayMedidaCualInput.value = '';
			}else{
				document.getElementById('Cámaras').disabled = false;
				document.getElementById('Personal de seguridad').disabled = false;
				document.getElementById('Rejas').disabled = false;
				document.getElementById('No posee').disabled = false;
				document.getElementById('Otro').disabled = false;
			}
		});
		checkHayMedidaNoPosee.addEventListener('click', function(){
			if (this.checked) {
				document.getElementById('Cámaras').disabled = true;
				document.getElementById('Cámaras').checked = false;
				document.getElementById('Personal de seguridad').disabled = true;
				document.getElementById('Personal de seguridad').checked = false;
				document.getElementById('Rejas').disabled = true;
				document.getElementById('Rejas').checked = false;
				document.getElementById('Se desconoce').disabled = true;
				document.getElementById('Se desconoce').checked = false;
				document.getElementById('Otro').disabled = true;
				document.getElementById('Otro').checked = false;
				hayMedidaCual.style.display = 'none';
				hayMedidaCualInput.value = '';
			}else{
				document.getElementById('Cámaras').disabled = false;
				document.getElementById('Personal de seguridad').disabled = false;
				document.getElementById('Rejas').disabled = false;
				document.getElementById('Se desconoce').disabled = false;
				document.getElementById('Otro').disabled = false;
			}
		});

	// pregunta 34
		var selectMaterial = document.querySelector('.material');
		var materialCual = document.querySelector('.materialCual');
		var materialOtro = document.querySelector('.material_otro');

		selectMaterial.addEventListener('change', function(){
			if (this.value == '7') {
				materialCual.style.display = '';
			}else{
				materialCual.style.display = 'none';
				materialOtro.value = '';
			}
		});

}






$.validator.addMethod("horasdiarias",function(value,element){
	tipo=isNaN(parseInt(value));
	valorSeDesconoce=(value=="SE DESCONOCE");
	premisa1=(tipo && valorSeDesconoce);
	valorMenor=false;
	if(!tipo){
		if(value<=24 && value>0)
		valorMenor=true;
	}

	return (premisa1 || (!tipo && valorMenor));


},"Ingrese un Número de 1 a 24. ");


$.validator.addMethod("montopago",function(value,element){
	//return this.optional(element) || /^[\t 0-9 Ã±]+$/i.test(value);
	tipo=isNaN(parseInt(value));
	valorSeDesconoce = (value == "SE DESCONOCE");
	premisa1=(tipo && valorSeDesconoce);
	return (premisa1 || (!tipo));


},"Ingrese un Número ");




$("#formularioD").validate({ 
	debug:false,
	errorClass: 'error_cliente',
	ignore:":not(:visible)",
	rules: { //se definen las reglas
		calificaciongeneral_id:{
				   required:true
			},
		calificaciongeneral_otra:{
			required:true
		},
		calificacionespecifica_id:{
			required:true
		},
		finalidad_id:{
			required:true
		},
		finalidad_otra:{
			required:true
		},
		actividad_id:{
			required:true
		},
		actividad_otra:{
			required:true
		},
		'privado_id[]':{
			required:true
		},
		privado_otra:{
			required:true
		},
		marcaTextil:{
			required:true
		},
		'textil_id[]':{
			required:true,
		},
		textil_otra:{
			required:true,
		},
		'rural_id[]':{
			required:true,
		},
		rural_otra:{
			required:true,
		},
		domicilioVenta:{
			required:true,
		},
		engano_id:{
			required:true,
		},
		/*paisCaptacion:{
			equired:true,
		},
		provinciaCaptacion:{
			required:true,
		},
		ciudadCaptacion:{
			required:true,
		},*/
		contactoexplotacion_id:{
			required:true,
		},
		contactoexplotacion_otro:{
			required:true,
		},
		viajo_id:{
			required:true,
		},
		acompanado_id:{
			required:true,
		},
		acompanadored_id:{
			required:true,
		},
		/*
		paisExplotacion:{
			required:true,
		},
		provinciaExplotacion:{
			required:true,
		},
		ciudadExplotacion:{
			required:true,
		},*/
		domicilio:{
			required:true,
		},
		residelugar_id:{
			required:true,
		},
		engano_id:{
			required:true
		},
		haypersona_id:{
			required:true
		},
		tipovictima_id:{
			required:true
		},
		tarea:{
			required:true
		},
		horasTarea:{
			required:true,
			horasdiarias:"#horasTarea",
		},
		frecuenciapago_id:{
			required:true
		},
		modalidadpagos_id:{
			required:true
		},
		'especiaconcepto_id[]':{
			required:true
		},
		montoPago:{
			required:true,
			montopago:"#montopago"
		},
		deuda_id:{
			required:true
		},
		'motivodeuda_id[]':{
			required:true
		},
		motivodeuda_otro:{
			required:true
		},
		lugardeuda_id:{
			required:true
		},
		permanencia_id:{
			required:true
		},
		testigo_id:{
			required:true
		},
		coordinadorPTN:{
			required:true
		},
		coordinadorPTN_otro:{
			required:true
		},
		haycorriente_id:{
			required:true
		},
		haygas_id:{
			required:true
		},
		'haymedida_id[]':{
			required:true
		},
		haymedidas_otro:{
			required:true
		},
		hayhacinamiento_id:{
			required:true
		},
		hayagua_id:{
			required:true
		},
		haybano_id:{
			required:true
		},
		cuantosbano_id:{
			required:true
		},
		material_id:{
			required:true
		},
		material_otro:{
			required:true
		},
		elementotrabajo_id:{
			required:true
		},
		elementoseguridad_id:{
			required:true
		},
		
	   },
	   messages: { //se definen los mensajes a mostrar
		calificaciongeneral_id:{
			   required:"Este campo es obligatorio",
		   },
		   calificaciongeneral_otra:{
			required:"Este campo es obligatorio",
		},
		calificacionespecifica_id:{
			required:"Este campo es obligatorio",
		},
		finalidad_id:{
			required:"Este campo es obligatorio",
		},
		finalidad_otra:{
			required:"Este campo es obligatorio",
		},
		actividad_id:{
			required:"Este campo es obligatorio",
		},
		actividad_otra:{
			required:"Este campo es obligatorio",
		},
		'privado_id[]':{
			required:"Este campo es obligatorio",
		},
		privado_otra:{
			required:"Este campo es obligatorio",
		},
		marcaTextil:{
			required:"Este campo es obligatorio",
		},
		'textil_id[]':{
			required:"Este campo es obligatorio",
		},
		textil_otra:{
			required:"Este campo es obligatorio",
		},
		'rural_id[]':{
			required:"Este campo es obligatorio",
		},
		rural_otra:{
			required:"Este campo es obligatorio",
		},
		domicilioVenta:{
			required:"Este campo es obligatorio",
		},
		paisCaptacion:{
			required:"Este campo es obligatorio",
		},
		provinciaCaptacion:{
			required:"Este campo es obligatorio",
		},
		ciudadCaptacion:{
			required:"Este campo es obligatorio",
		},
		contactoexplotacion_id:{
			required:"Este campo es obligatorio",
		},
		contactoexplotacion_otro:{
			required:"Este campo es obligatorio",
		},
		viajo_id:{
			required:"Este campo es obligatorio",
		},
		acompanado_id:{
			required:"Este campo es obligatorio",
		},
		acompanadored_id:{
			required:"Este campo es obligatorio",
		},

		paisExplotacion:{
			required:"Este campo es obligatorio",
		},
		provinciaExplotacion:{
			required:"Este campo es obligatorio",
		},
		ciudadExplotacion:{
			required:"Este campo es obligatorio",
		},
		domicilio:{
			required:"Este campo es obligatorio",
		},
		residelugar_id:{
			required:"Este campo es obligatorio",
		},
		engano_id:{
			required:"Este campo es obligatorio"
		},
		haypersona_id:{
			required:"Este campo es obligatorio"
		},
		tipovictima_id:{
			required:"Este campo es obligatorio"
		},
		tarea:{
			required:"Este campo es obligatorio"
		},
		horasTarea:{
			required:"Este campo es obligatorio",
			horasdiarias:"Ingrese un número de 1 a 24"
		},
		frecuenciapago_id:{
			required:"Este campo es obligatorio"
		},
		modalidadpagos_id:{
			required:"Este campo es obligatorio"
		},
		'especiaconcepto_id[]':{
			required:"Este campo es obligatorio"
		},
		especiaconceptos_otro:{
			required:"Este campo es obligatorio"
		},
		montoPago:{
			required:"Este campo es obligatorio"
		},
		deuda_id:{
			required:"Este campo es obligatorio"
		},
		'motivodeuda_id[]':{
			required:"Este campo es obligatorio"
		},
		motivodeuda_otro:{
			required:"Este campo es obligatorio"
		},
		lugardeuda_id:{
			required:"Este campo es obligatorio"
		},
		permanencia_id:{
			required:"Este campo es obligatorio"
		},
		testigo_id:{
			required:"Este campo es obligatorio"
		},
		coordinadorPTN:{
			required:"Este campo es obligatorio"
		},
		coordinadorPTN_otro:{
			required:"Este campo es obligatorio"
		},
		haycorriente_id:{
			required:"Este campo es obligatorio"
		},
		haygas_id:{
			required:"Este campo es obligatorio"
		},
		'haymedida_id[]':{
			required:"Este campo es obligatorio"
		},
		haymedidas_otro:{
			required:"Este campo es obligatorio"
		},
		hayhacinamiento_id:{
			required:"Este campo es obligatorio"
		},
		hayagua_id:{
			required:"Este campo es obligatorio"
		},
		haybano_id:{
			required:"Este campo es obligatorio"
		},
		cuantosbano_id:{
			required:"Este campo es obligatorio"
		},
		material_id:{
			required:"Este campo es obligatorio"
		},
		material_otro:{
			required:"Este campo es obligatorio"
		},
		elementotrabajo_id:{
			required:"Este campo es obligatorio"
		},
		elementoseguridad_id:{
			required:"Este campo es obligatorio"
		},
	   }
   });

