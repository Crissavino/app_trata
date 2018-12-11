//pregunta 2
	var selectDocumento = document.querySelector('.documentos');
	var documentoOtro = document.querySelector('.documentoOtro');
	var documentoCual = document.querySelector('.documentoCual');

	if (selectDocumento.value === '7') {
		documentoOtro.style.display = '';
		selectDocumento.addEventListener('change', function(){
			documentoCual.value = '';
		});
	}else{
		documentoOtro.style.display = 'none';
		documentoCual.value = '';
	}


//pregunta 3
	var numeroDocumento = document.querySelector('.numeroDocumento');
	var checkDocSeDesconoce = document.querySelector('.docSeDesconoce');

	if (numeroDocumento.value === 'Se desconoce') {
		numeroDocumento.setAttribute('readonly', 'readonly');
		checkDocSeDesconoce.checked = true;
	}else{
		numeroDocumento.removeAttribute('readonly');
		checkDocSeDesconoce.checked = false;
	}

//pregunta 4
	var edad = document.querySelector('.edad');
	var checkEdadSeDesconoce = document.querySelector('.edadSeDesconoce');

	if (edad.value === 'Se desconoce') {
		edad.setAttribute('readonly', 'readonly');
		checkEdadSeDesconoce.checked = true;
	}else{
		edad.removeAttribute('readonly');
		checkEdadSeDesconoce.checked = false;
	}

//pregunta 5
	var selectGenero = document.querySelector('.genero');
	var generoOtro = document.querySelector('.generoOtro');
	var generoCual = document.querySelector('.generoCual');

	if (selectGenero.value === '5') {
		generoOtro.style.display = '';
		selectGenero.addEventListener('change', function(){
			generoCual.value = '';
		});
	}else{
		generoOtro.style.display = 'none';
		generoCual.value = '';
	}

//pregunta 6
	var selectVinculacion = document.querySelector('.vinculacion');
	var vinculacionOtro = document.querySelector('.vinculacionOtro');
	var vinculacionCual = document.querySelector('.vinculacionCual');

	if (selectVinculacion.value === '6') {
		vinculacionOtro.style.display = '';
		selectGenero.addEventListener('change', function(){
			vinculacionCual.value = '';
		});
	}else{
		vinculacionOtro.style.display = 'none';
		vinculacionCual.value = '';
	}


window.onload = function(){

	//pregunta 2
		var selectDocumento = document.querySelector('.documentos');
		var documentoOtro = document.querySelector('.documentoOtro');
		var documentoCual = document.querySelector('.documentoCual');

		selectDocumento.addEventListener('change', function(){
			if (selectDocumento.value === '7') {
				documentoOtro.style.display = '';
			}else{
				documentoOtro.style.display = 'none';
				documentoCual.value = '';
			}
		});

	//pregunta 3
		var numeroDocumento = document.querySelector('.numeroDocumento');
		var docSeDesconoce = document.querySelector('.docSeDesconoce');

		docSeDesconoce.addEventListener('click', function(){
			if (this.checked) {
				numeroDocumento.setAttribute('readonly', 'readonly');
				numeroDocumento.value = 'Se desconoce';
			}else{
				numeroDocumento.removeAttribute('readonly');
				numeroDocumento.value = '';
			}
		});

	//pregunta 4
		var edad = document.querySelector('.edad');
		var edadSeDesconoce = document.querySelector('.edadSeDesconoce');

		edadSeDesconoce.addEventListener('click', function(){
			if (this.checked) {
				edad.setAttribute('readonly', 'readonly');
				edad.value = 'Se desconoce';
			}else{
				edad.removeAttribute('readonly');
				edad.value = '';
			}
		});

	//pregunta 5
		var selectGenero = document.querySelector('.genero');
		var generoOtro = document.querySelector('.generoOtro');
		var generoCual = document.querySelector('.generoCual');

		selectGenero.addEventListener('change', function(){
			if (selectGenero.value === '5') {
				generoOtro.style.display = '';
			}else{
				generoOtro.style.display = 'none';
				generoCual.value = '';
			}
		});

	//pregunta 6
		var selectVinculacion = document.querySelector('.vinculacion');
		var vinculacionOtro = document.querySelector('.vinculacionOtro');
		var vinculacionCual = document.querySelector('.vinculacionCual');

		selectVinculacion.addEventListener('change', function(){
			if (selectVinculacion.value === '6') {
				vinculacionOtro.style.display = '';
			}else{
				vinculacionOtro.style.display = 'none';
				vinculacionCual.value = '';
			}
		});

	//pregunta 7
		var rolDesconoce = document.querySelector('.rolDesconoce');

		rolDesconoce.addEventListener('click', function(){
			if (this.checked) {
				document.getElementById('Ofrecimiento').disabled = true;
				document.getElementById('Ofrecimiento').checked = false;
				document.getElementById('Captación').disabled = true;
				document.getElementById('Captación').checked = false;
				document.getElementById('Traslado').disabled = true;
				document.getElementById('Traslado').checked = false;
				document.getElementById('Acogida').disabled = true;
				document.getElementById('Acogida').checked = false;
				document.getElementById('Explotación').disabled = true;
				document.getElementById('Explotación').checked = false;
			}else{
				document.getElementById('Ofrecimiento').disabled = false;
				document.getElementById('Captación').disabled = false;
				document.getElementById('Traslado').disabled = false;
				document.getElementById('Acogida').disabled = false;
				document.getElementById('Explotación').disabled = false;
			}
		});
}