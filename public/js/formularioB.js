//pregunta 5
	var selectTipoDocumento = document.querySelector('#tipodocumento_id');
	var divResidenciaPrecaria = document.querySelector('.residenciaPrecaria');
	var selectResidenciaPrecaria = document.querySelector('#residenciaprecaria_id');
	var divTipoDocumentoOtro = document.querySelector('.tipoDocumentoOtro');
	var tipoDocumentoOtroInput = document.querySelector('#victima_tipo_documento_otro');

	if (selectTipoDocumento.value == 6) {
		divResidenciaPrecaria.style.display = '';
	}else if (selectTipoDocumento.value == 9) {
		divTipoDocumentoOtro.style.display = '';
	}else{
		divResidenciaPrecaria.style.display = 'none';
		divTipoDocumentoOtro.style.display = 'none';
		selectResidenciaPrecaria.value = '';
		tipoDocumentoOtroInput.value = '';
	}
//fin pregunta 5

// pregunta 18
	var selectTieneLesion = document.querySelector('.selectTieneLesion');
	var divVictimaLesion = document.querySelector('#victima_lesion_si');
	var victimaLesionInput = document.querySelector('.victimaLesionInput');
	var selectLesionConstatada = document.querySelector('.selectLesionConstatada');
	var divVictimaLesionOrganismo = document.querySelector('#victima_lesion_organismo');
	var victimaLesionOrganismoInput = document.querySelector('.victimaLesionOrganismoInput');
	var checkDesconoce = document.querySelector('.desconoce18');

	if (selectTieneLesion.value == 1) {
		divVictimaLesion.style.display = ''
		if (selectLesionConstatada.value == 1) {
			divVictimaLesionOrganismo.style.display = '';
		}else{
			divVictimaLesionOrganismo.style.display = 'none';
			victimaLesionOrganismoInput.value = '';
			checkDesconoce.checked = false;
			victimaLesionOrganismoInput.removeAttribute('readonly');
		}
	}else{
		divVictimaLesion.style.display = 'none'
		divVictimaLesionOrganismo.style.display = 'none';
		victimaLesionInput.value = '';
		selectLesionConstatada.value = '';
		victimaLesionOrganismoInput.value = '';
		checkDesconoce.checked = false;
		victimaLesionOrganismoInput.removeAttribute('readonly');
	}
// fin pregunta 18

// pregunta 19
	var selectEnfermedadCronica = document.querySelector('#enfermedadcronica_id');
	var divVictimaTipoEnfermedadCronica = document.querySelector('#victima_tipo_enfermedad_cronica');
	var victimaTipoEnfermedadCronicaInput = document.querySelector('.victima_tipo_enfermedad_cronica_input');

	if (selectEnfermedadCronica.value == 1) {
		divVictimaTipoEnfermedadCronica.style.display = '';
	}else{
		divVictimaTipoEnfermedadCronica.style.display = 'none';
		victimaTipoEnfermedadCronicaInput.value = '';
	}
// fin pregunta 19

// pregunta 20
	var checkNo = document.querySelector('.checkNo');
	var checkOtro = document.querySelector('.checkOtro');
	var victimaLimitacionCual = document.querySelector('#victimaLimitacionCual');
	var victimaLimitacionCualInput = document.querySelector('.victimaLimitacionCualInput');

	if (checkNo.checked) {
		document.getElementById("Analfabetismo").disabled = true;
        document.getElementById("Analfabetismo").checked = false;
        document.getElementById("Discapacidad").disabled = true;                                
        document.getElementById("Discapacidad").checked = false;                                
        document.getElementById("Idioma").disabled = true;
        document.getElementById("Idioma").checked = false;
		checkOtro.disabled = true;
		checkOtro.checked = false;
		victimaLimitacionCual.style.display = 'none';
		victimaLimitacionCualInput.value = '';
	}else{
		document.getElementById("Analfabetismo").disabled = false;
        document.getElementById("Discapacidad").disabled = false;
        document.getElementById("Idioma").disabled = false;
		checkOtro.disabled = false;
	}

	if (checkOtro.checked) {
		victimaLimitacionCual.style.display = '';
	}else{
		victimaLimitacionCual.style.display = 'none';
		victimaLimitacionCualInput.value = '';
	}
// fin pregunta 20

// pregunta 22
	var selectOficio = document.querySelector('.oficio');
	var victimaOficioCual = document.querySelector('.victimaOficioCual');
	var victimaOficioCualInput = document.querySelector('.victimaOficioCualInput');

	if (selectOficio.value == 1) {
		victimaOficioCual.style.display = '';
	}else{
		victimaOficioCual.style.display = 'none';
		victimaOficioCualInput.value = '';
	}
// fin pregunta 22

window.onload =function (){

	//pregunta 5
		var selectTipoDocumento = document.querySelector('#tipodocumento_id');
		var divResidenciaPrecaria = document.querySelector('.residenciaPrecaria');
		var selectResidenciaPrecaria = document.querySelector('#residenciaprecaria_id');
		var divTipoDocumentoOtro = document.querySelector('.tipoDocumentoOtro');
		var tipoDocumentoOtroInput = document.querySelector('#victima_tipo_documento_otro');

		selectTipoDocumento.addEventListener('change', function(){
			if (selectTipoDocumento.value == 6) {
				divResidenciaPrecaria.style.display = '';
			}else if (selectTipoDocumento.value == 9) {
				divTipoDocumentoOtro.style.display = '';
			}else{
				divResidenciaPrecaria.style.display = 'none';
				divTipoDocumentoOtro.style.display = 'none';
				selectResidenciaPrecaria.value = '';
				tipoDocumentoOtroInput.value = '';
			}
		});
	//fin pregunta 5

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
	
	// pregunta 18
		var selectTieneLesion = document.querySelector('.selectTieneLesion');
		var divVictimaLesion = document.querySelector('#victima_lesion_si');
		var victimaLesionInput = document.querySelector('.victimaLesionInput');
		var selectLesionConstatada = document.querySelector('.selectLesionConstatada');
		var divVictimaLesionOrganismo = document.querySelector('#victima_lesion_organismo');
		var victimaLesionOrganismoInput = document.querySelector('.victimaLesionOrganismoInput');
		var checkDesconoce = document.querySelector('.desconoce18');

		selectTieneLesion.addEventListener('change', function(){
			if (selectTieneLesion.value == 1) {
				divVictimaLesion.style.display = ''
				selectLesionConstatada.addEventListener('change', function(){
					if (selectLesionConstatada.value == 1) {
						divVictimaLesionOrganismo.style.display = '';
					}else{
						divVictimaLesionOrganismo.style.display = 'none';
						victimaLesionOrganismoInput.value = '';
						checkDesconoce.checked = false;
						victimaLesionOrganismoInput.removeAttribute('readonly');
					}
				});
			}else{
				divVictimaLesion.style.display = 'none'
				divVictimaLesionOrganismo.style.display = 'none';
				victimaLesionInput.value = '';
				selectLesionConstatada.value = '';
				victimaLesionOrganismoInput.value = '';
				checkDesconoce.checked = false;
				victimaLesionOrganismoInput.removeAttribute('readonly');
			}
		});
	// fin pregunta 18

	// pregunta 19
		var selectEnfermedadCronica = document.querySelector('#enfermedadcronica_id');
		var divVictimaTipoEnfermedadCronica = document.querySelector('#victima_tipo_enfermedad_cronica');
		var victimaTipoEnfermedadCronicaInput = document.querySelector('.victima_tipo_enfermedad_cronica_input');

		selectEnfermedadCronica.addEventListener('change', function(){
			if (selectEnfermedadCronica.value == 1) {
				divVictimaTipoEnfermedadCronica.style.display = '';
			}else{
				divVictimaTipoEnfermedadCronica.style.display = 'none';
				victimaTipoEnfermedadCronicaInput.value = '';
			}
		});
	// fin pregunta 19

	// pregunta 20
		var checkNo = document.querySelector('.checkNo');
		var checkOtro = document.querySelector('.checkOtro');
		var victimaLimitacionCual = document.querySelector('#victimaLimitacionCual');
		var victimaLimitacionCualInput = document.querySelector('.victimaLimitacionCualInput');

		checkNo.addEventListener('click', function(){
			if (checkNo.checked) {
				document.getElementById("Analfabetismo").disabled = true;
                document.getElementById("Analfabetismo").checked = false;
                document.getElementById("Discapacidad").disabled = true;                                
                document.getElementById("Discapacidad").checked = false;                                
                document.getElementById("Idioma").disabled = true;
                document.getElementById("Idioma").checked = false;
				checkOtro.disabled = true;
				checkOtro.checked = false;
				victimaLimitacionCual.style.display = 'none';
				victimaLimitacionCualInput.value = '';
			}else{
				document.getElementById("Analfabetismo").disabled = false;
                document.getElementById("Discapacidad").disabled = false;
                document.getElementById("Idioma").disabled = false;
				checkOtro.disabled = false;
			}
		});

		checkOtro.addEventListener('click', function(){
			if (checkOtro.checked) {
				victimaLimitacionCual.style.display = '';
			}else{
				victimaLimitacionCual.style.display = 'none';
				victimaLimitacionCualInput.value = '';
			}
		});
	// fin pregunta 20

	// pregunta 22
		var selectOficio = document.querySelector('.oficio');
		var victimaOficioCual = document.querySelector('.victimaOficioCual');
		var victimaOficioCualInput = document.querySelector('.victimaOficioCualInput');

		selectOficio.addEventListener('change', function(){
			if (selectOficio.value == 1) {
				victimaOficioCual.style.display = '';
			}else{
				victimaOficioCual.style.display = 'none';
				victimaOficioCualInput.value = '';
			}
		});
	// fin pregunta 22


}