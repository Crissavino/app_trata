//----------edicion--------
//pregunta 1

	var calificacionGeneral = document.querySelector('.calificacionGeneral');
	var calificacionGeneralCual = document.querySelector('.calificacionGeneralCual');
	var calificacionGeneral_otra = document.querySelector('.calificaciongeneral_otra');

	if (calificacionGeneral.value === '8') {
		calificacionGeneralCual.style.display = ''
		calificacionGeneral.addEventListener('change', function(){
				calificacionGeneral_otra.value = '';
			})
	}else{
		calificacionGeneralCual.style.display = 'none'
		}

//pregunta 4
	var actividad = document.querySelector('.actividad');

	var rural = document.querySelector('.rural');
	var checkRural = document.getElementsByName('rural_id[]');
	checkRural[5].addEventListener('click', function(){
		if (this.checked) {
			ruralCual.style.display = '';
		}else{
			ruralCual.style.display = 'none';
		}
	});
	var ruralCual = document.querySelector('.ruralCual');
	var ruralOtra = document.querySelector('.rural_otra');

	var privado = document.querySelector('.privado');
	var checkPrivado = document.getElementsByName('privado_id[]');
	checkPrivado[7].addEventListener('click', function(){
		if (this.checked) {
			privadoCual.style.display = '';
		}else{
			privadoCual.style.display = 'none';
		}
	});
	var privadoCual = document.querySelector('.privadoCual');
	var privadoOtra = document.querySelector('.privado_otra');

	var textil = document.querySelector('.textil');
	var marcaTextil = document.querySelector('.marcaTextil');
	var checkTextil = document.getElementsByName('textil_id[]');
	checkTextil[5].addEventListener('click', function(){
		if (this.checked) {
			textilCual.style.display = '';
		}else{
			textilCual.style.display = 'none';
		}
	});
	var textilCual = document.querySelector('.textilCual');
	var textilOtra = document.querySelector('.textil_otra');

	if (actividad.value === '1') {
		rural.style.display = '';
		if (checkRural[5].checked) {
			ruralCual.style.display = '';
		}
	}else if (actividad.value === '3') {
		privado.style.display = '';
		if (checkPrivado[7].checked) {
			privadoCual.style.display = '';
		}
	}else if (actividad.value === '6') {
		textil.style.display = '';
		if (checkTextil[5].checked) {
			textilCual.style.display = '';
		}
	}else {
		rural.style.display = 'none';
		privado.style.display = 'none';
		textil.style.display = 'none';
	}

	actividad.addEventListener('change', function(){
		checkPrivado.forEach(function(element, index){
			checkPrivado[index].checked = false;
		})
		privadoOtra.value = '';

		checkTextil.forEach(function(element, index){
			checkTextil[index].checked = false;
		})
		marcaTextil.value = '';
		textilOtra.value = '';

		checkRural.forEach(function(element, index){
			checkRural[index].checked = false;
		})
		ruralOtra.value = '';
	})

//pregunta 9
	var contactoExplotacion = document.querySelector('.contactoExplotacion');
	var contactoExplotacionCual = document.querySelector('.contactoExplotacionCual');
	var contactoExplotacionOtro = document.querySelector('.contactoexplotacion_otro');
	var acompanado = document.querySelector('.acompanado_id');
	var acompanadoRed = document.querySelector('.acompanadored_id');

	if (contactoExplotacion.value === '6') {
		contactoExplotacionCual.style.display = '';
	}else{
		contactoExplotacionCual.style.display = 'none';
			contactoExplotacion.addEventListener('change', function(){
			contactoExplotacionOtro.value = '';
		});
	}

//pregunta 10
	var viajo = document.querySelector('.viajo');
	var viajoAcompanado = document.querySelector('.viajoAcompanado');

	if (viajo.value === '2') {
		viajoAcompanado.style.display = '';
		viajo.addEventListener('change', function(){
			acompanado.value = '';
			acompanadoRed.value = '';
		});
	}else{
		viajoAcompanado.style.display = 'none'
	}

//pregunta 22
	var selectModalidadPagos = document.querySelector('.modalidadPagos');
	var especias = document.querySelector('.especias');
	var checkEspecias = document.getElementsByName('especiaconcepto_id[]');
	var checkEspeciasOtro = document.querySelector('.especiasOtro');
	var especiasCual = document.querySelector('.especiasCual');
	var especiaConceptosOtro = document.querySelector('.especiaconceptos_otro');

	if (selectModalidadPagos.value === '4') {
		especias.style.display = ''
		selectModalidadPagos.addEventListener('change', function(){
			checkEspecias.forEach(function(element, index){
				checkEspecias[index].checked = false;
			});
			especiaConceptosOtro.value = '';
		});
		if (checkEspeciasOtro.checked) {
			especiasCual.style.display = '';
		}else{
			especiasCual.style.display = 'none';
		}
	}else{
		especias.style.display = 'none'
	}

//pregunta 24
	var selectDeuda = document.querySelector('.deuda');
	var deudaSi = document.querySelector('.deudaSi');
	var checkMotivoDeuda = document.getElementsByName('motivodeuda_id[]');
	var checkDeudaOtro = document.querySelector('.deudaOtro');
	var deudaCual = document.querySelector('.deudaCual');
	var motivoDeudaOtro = document.querySelector('.motivodeuda_otro');
	var lugarDeuda = document.querySelector('.lugardeuda_id');

	if (selectDeuda.value === '1') {
		deudaSi.style.display = '';
		selectDeuda.addEventListener('change', function(){
			checkMotivoDeuda.forEach(function(element, index){
				checkMotivoDeuda[index].checked = false;
			});
			motivoDeudaOtro.value = '';
			lugarDeuda.value = '';
		});
		if (checkDeudaOtro.checked) {
			deudaCual.style.display = '';
		}else{
			deudaCual.style.display = 'none';
		}
	}else{
		deudaSi.style.display = 'none';
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
	var hayMedidaOtro = document.querySelector('.haymedidas_otro');

	if (checkHayMedidaOtro.checked) {
		hayMedidaCual.style.display = '';
		checkHayMedidaOtro.addEventListener('change', function(){
			hayMedidaOtro.value = '';
		});
	}else{
		hayMedidaCual.style.display = 'none';
	}

//pregunta 34
	var selectMaterial = document.querySelector('.material');
	var materialCual = document.querySelector('.materialCual');
	var materialOtro = document.querySelector('.material_otro');

	if (selectMaterial.value === '7') {
		materialCual.style.display = '';
		selectMaterial.addEventListener('change', function(){
			materialOtro.value = '';
		});
	}else{
		materialCual.style.display = 'none';
	}

//---fin edicion------


window.onload = function (){

	//pregunta 1
		var selectCalifGeneral = document.querySelector('.calificacionGeneral');
		var califGeneralCual = document.querySelector('.calificacionGeneralCual');

		selectCalifGeneral.addEventListener('change', function(){
			if (this.value == '8') {
				califGeneralCual.style.display = '';
			}else {
				califGeneralCual.style.display = 'none';
			}
		});	

		//pregunta 3
		var selectFinalidad = document.querySelector('.finalidad');
		var finalidadCual = document.querySelector('.finalidadCual');

		selectFinalidad.addEventListener('change', function(){
			if (this.value == '5') {
				finalidadCual.style.display = '';
			}else {
				finalidadCual.style.display = 'none';
			}
		});	

	//pregunta 4
		var selectActividad = document.querySelector('.actividad');
		var actividadCual = document.querySelector('.actividadCual');

		var rural = document.querySelector('.rural');
		var checkRuralOtro = document.querySelector('.checkRuralOtro');
		var checkRuralDesconoce = document.querySelector('.checkRuralDesconoce');
		var ruralCual = document.querySelector('.ruralCual');

		var checkRuralCualDesconoce = document.querySelector('.ruralCualDesconoce');
		var ruralCualDomicilioInput = document.querySelector('.ruralCualDomicilio');
		checkRuralCualDesconoce.addEventListener('click', function(){
			if (this.checked) {
				ruralCualDomicilioInput.value = 'Se desconoce'
				ruralCualDomicilioInput.setAttribute("readonly", "readonly")
			}else{
				ruralCualDomicilioInput.value = ''
				ruralCualDomicilioInput.removeAttribute('readonly')
			}
		});

		var privado = document.querySelector('.privado');
		var checkPrivadoOtro = document.querySelector('.checkPrivadoOtro');
		var checkPrivadoDesconoce = document.querySelector('.checkPrivadoDesconoce');
		var privadoCual = document.querySelector('.privadoCual');

		var textil = document.querySelector('.textil');
		var checkTextilOtro = document.querySelector('.checkTextilOtro');
		var checkTextilDesconoce = document.querySelector('.checkTextilDesconoce');
		var textilCual = document.querySelector('.textilCual');


		selectActividad.addEventListener('change', function(){
			if (this.value == '8') {
				actividadCual.style.display = '';
				rural.style.display = 'none';
				privado.style.display = 'none';
				textil.style.display = 'none';
				}else if(this.value == '1'){
					rural.style.display = '';
					privado.style.display = 'none';
					actividadCual.style.display = 'none';
					textil.style.display = 'none';
					checkRuralOtro.addEventListener('click', function(){
						if (this.checked) {
							ruralCual.style.display = '';
						}else{
							ruralCual.style.display = 'none';
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
				}else if (this.value == '3') {
					privado.style.display = '';
					textil.style.display = 'none';
					actividadCual.style.display = 'none';
					rural.style.display = 'none';
					checkPrivadoOtro.addEventListener('click', function(){
						if (checkPrivadoOtro.checked) {
							privadoCual.style.display = '';
						}else{
							privadoCual.style.display = 'none';
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
				}else if (this.value == '6') {
					textil.style.display = '';
					rural.style.display = 'none';
					actividadCual.style.display = 'none';
					privado.style.display = 'none';
					checkTextilOtro.addEventListener('click', function(){
						if (checkTextilOtro.checked) {
							textilCual.style.display = '';
						}else{
							textilCual.style.display = 'none';
						}
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
			}
		});

	//pregunta 6
		var paisCaptacion = document.querySelector('.countries');
		var desconocePaisCaptacion = document.querySelector('#desconocePaisCaptacion');

		desconocePaisCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		paisCaptacion.add(option);
	    		paisCaptacion.value = 'Se desconoce';
				paisCaptacion.setAttribute("readonly", "readonly");
			}else{
				paisCaptacion.value = '';
				paisCaptacion.removeAttribute('readonly');
			}
		});

	//pregunta 7
		var provinciaCaptacion = document.querySelector('.states');
		var desconoceProvinciaCaptacion = document.querySelector('#desconoceProvinciaCaptacion');

		desconoceProvinciaCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		provinciaCaptacion.add(option);
	    		provinciaCaptacion.value = 'Se desconoce';
				provinciaCaptacion.setAttribute("readonly", "readonly");
			}else{
				provinciaCaptacion.value = '';
				provinciaCaptacion.removeAttribute('readonly');
			}
		});

	//pregunta 8
		var ciudadCaptacion = document.querySelector('.cities');
		var desconoceCiudadCaptacion = document.querySelector('#desconoceCiudadCaptacion');

		desconoceCiudadCaptacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		ciudadCaptacion.add(option);
	    		ciudadCaptacion.value = 'Se desconoce';
				ciudadCaptacion.setAttribute("readonly", "readonly");
			}else{
				ciudadCaptacion.value = '';
				ciudadCaptacion.removeAttribute('readonly');
			}
		});

	//pregunta 9
		var contactoExplotacion = document.querySelector('.contactoExplotacion');
		var contactoExplotacionCual = document.querySelector('.contactoExplotacionCual');

		contactoExplotacion.addEventListener('change', function(){
			if (this.value == '6') {
				contactoExplotacionCual.style.display = '';
			}else{
				contactoExplotacionCual.style.display = 'none';
			}
		});

	//pregunta 10
		var viajo = document.querySelector('.viajo');
		var viajoAcompanado = document.querySelector('.viajoAcompanado');

		viajo.addEventListener('change', function(){
			if (this.value == '2') {
				viajoAcompanado.style.display = '';
			}else{
				viajoAcompanado.style.display = 'none';
			}
		});

	//pregunta 11
		var paisExplotacion = document.querySelector('.countries2');
		var desconocePaisExplotacion = document.querySelector('#desconocePaisExplotacion');

		desconocePaisExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		paisExplotacion.add(option);
	    		paisExplotacion.value = 'Se desconoce';
				paisExplotacion.setAttribute("readonly", "readonly");
			}else{
				paisExplotacion.value = '';
				paisExplotacion.removeAttribute('readonly');
			}
		});

	//pregunta 12
		var provinciaExplotacion = document.querySelector('.states2');
		var desconoceProvinciaExplotacion = document.querySelector('#desconoceProvinciaExplotacion');

		desconoceProvinciaExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		provinciaExplotacion.add(option);
	    		provinciaExplotacion.value = 'Se desconoce';
				provinciaExplotacion.setAttribute("readonly", "readonly");
			}else{
				provinciaExplotacion.value = '';
				provinciaExplotacion.removeAttribute('readonly');
			}
		});

		//pregunta 13
		var ciudadExplotacion = document.querySelector('.cities2');
		var desconoceCiudadExplotacion = document.querySelector('#desconoceCiudadExplotacion');

		desconoceCiudadExplotacion.addEventListener('click', function() {
			if (this.checked) {
				var option = document.createElement("option");
	    		option.text = "Se desconoce";
	    		ciudadExplotacion.add(option);
	    		ciudadExplotacion.value = 'Se desconoce';
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
				inputDomicilio.value = 'Se desconoce'
				inputDomicilio.setAttribute("readonly", "readonly")
			}else{
				inputDomicilio.value = ''
				inputDomicilio.removeAttribute('readonly')
			}
		});

		//pregunta 20
		var inputHorasTarea = document.querySelector('.horasTarea');
		var checkHorasTareaDesconoce = document.querySelector('.horasTareaDesconoce');
		checkHorasTareaDesconoce.addEventListener('click', function(){
			if (this.checked) {
				inputHorasTarea.value = 'Se desconoce'
				inputHorasTarea.setAttribute("readonly", "readonly")
			}else{
				inputHorasTarea.value = ''
				inputHorasTarea.removeAttribute('readonly')
			}
		});

	// pregunta 22
		var selectModalidadPagos = document.querySelector('.modalidadPagos');
		var especias = document.querySelector('.especias');
		var checkEspeciasOtro = document.querySelector('.especiasOtro');
		var especiasCual = document.querySelector('.especiasCual');

		selectModalidadPagos.addEventListener('change', function(){
			if (this.value == '4') {
				especias.style.display = '';
			}else{
				especias.style.display = 'none';
			}
		});

		checkEspeciasOtro.addEventListener('click', function(){
			if (this.checked) {
				especiasCual.style.display = '';
			}else{
				especiasCual.style.display = 'none';
			}
		});

	// pregunta 23
		var inputMontoPago = document.querySelector('.montoPago');
		var checkMontoPagoDesconoce = document.querySelector('.montoPagoDesconoce');
		checkMontoPagoDesconoce.addEventListener('click', function(){
			if (this.checked) {
				inputMontoPago.value = 'Se desconoce'
				inputMontoPago.setAttribute("readonly", "readonly")
			}else{
				inputMontoPago.value = ''
				inputMontoPago.removeAttribute('readonly')
			}
		});

	// pregunta 24
		var selectDeuda = document.querySelector('.deuda');
		var deudaSi = document.querySelector('.deudaSi');
		var checkDeudaOtro = document.querySelector('.deudaOtro');
		var deudaCual = document.querySelector('.deudaCual');

		selectDeuda.addEventListener('change', function(){
			if (this.value == '1') {
				deudaSi.style.display = '';
			}else{
				deudaSi.style.display = 'none';
			}
		});

		checkDeudaOtro.addEventListener('click', function(){
			if (this.checked) {
				deudaCual.style.display = '';
			}else{
				deudaCual.style.display = 'none';
			}
		});

	// pregunta 26
		var selectTestigo = document.querySelector('.testigo');
		var testigoSi = document.querySelector('.testigoSi');

		selectTestigo.addEventListener('change', function(){
			if (this.value == '1') {
				testigoSi.style.display = '';
			}else{
				testigoSi.style.display = 'none';
			}
		});

	// pregunta 29
		var checkHayMedidaOtro = document.querySelector('.hayMedidaOtro');
		var checkHayMedidaDesconoce = document.querySelector('.hayMedidaDesconoce');
		var checkHayMedidaNoPosee = document.querySelector('.hayMedidaNoPosee');
		var hayMedidaCual = document.querySelector('.hayMedidaCual');
		var hayMedidaOtro = document.querySelector('.haymedidas_otro');

		checkHayMedidaOtro.addEventListener('click', function(){
			if (this.checked) {
				hayMedidaCual.style.display = '';
			}else{
				hayMedidaCual.style.display = 'none';
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
				hayMedidaOtro.value = '';
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
				hayMedidaOtro.value = '';
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

		selectMaterial.addEventListener('change', function(){
			if (this.value == '7') {
				materialCual.style.display = '';
			}else{
				materialCual.style.display = 'none';
			}
		});
}