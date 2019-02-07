
// pregunta 4
	var selectModalidad = document.querySelector('.modalidad');
	var presentacionEspontaneaSelect = document.querySelector('.presentacion');
	var presentacionEspontanea = document.querySelector('.presentacion_espontanea');
	var derivacionOtroOrganismo = document.querySelector('.derivacion_otro_organismo');
	var derivacionOtroOrganismoSelect = document.querySelector('.derivacion_otro_organismo_select');
	var derivacionOtroOrganismoCual = document.querySelector('.derivacion_otro_organismo_cual');
	var derivacionOtroOrganismoCualInput = document.querySelector('.derivacion_otro_organismo_cual_input');

	if (selectModalidad.value === '3') {
		presentacionEspontanea.style.display = '';
	}else if (selectModalidad.value === '4') {
		derivacionOtroOrganismo.style.display = '';
		if (derivacionOtroOrganismoSelect.value === '16') {
			derivacionOtroOrganismoCual.style.display = '';
			derivacionOtroOrganismoSelect.addEventListener('change', function(){
				derivacionOtroOrganismoCualInput.value = '';
			});
		}
	}else{
		presentacionEspontanea.style.display = 'none';
		derivacionOtroOrganismo.style.display = 'none';
		derivacionOtroOrganismoCual.style.display = 'none';
	}

//pregunta 5

	var selectEstadoCaso = document.querySelector('.selectEstadoCaso');
    var divMotivoCierre = document.querySelector('.divMotivoCierre');

    if (selectEstadoCaso.value == 3) {
        divMotivoCierre.style.display = '';
    }else{
        divMotivoCierre.style.display = 'none';
    }

//fin pregunta 5

// pregunta 6
	var selectAmbito = document.querySelector('.selectAmbito');
	var divDepartamento = document.querySelector('.divDepartamento');
	var selectDepartamento = document.querySelector('.selectDepartamento');
	var divOtrasProv = document.querySelector('.divOtrasProv');
	var selectOtrasProv = document.querySelector('.selectOtrasProv');

	if (selectAmbito.value == 2) {
		divDepartamento.style.display = '';
		divOtrasProv.style.display = 'none';
		selectOtrasProv.value = '';
	}else if (selectAmbito.value == 3) {
		divDepartamento.style.display = 'none';
		selectDepartamento.value = '';
		divOtrasProv.style.display = '';
	}else{
		divDepartamento.style.display = 'none';
		selectDepartamento.value = '';
		divOtrasProv.style.display = 'none';
		selectOtrasProv.value = '';
	}
// fin pregunta 6

//pregunta 7
	var selectCaratulacion = document.querySelector('.caratulacionjudicial');
	var caratulacionJudicialCual = document.querySelector('.caratulacionjudicial_cual');
	var caratulacionJudicialCualInput = document.querySelector('.caratulacionjudicial_otro');

	if (selectCaratulacion.value === '6') {
		caratulacionJudicialCual.style.display = '';
		selectCaratulacion.addEventListener('change', function(){
			caratulacionJudicialCualInput.value = '';
		});
	}else{
		caratulacionJudicialCual.style.display = 'none';
	}

//borrar profesionales
	// var borrarProfesional = document.querySelector('.borrarProfesional');
	// var hijoBorrado = document.querySelector('.hijo');

	// borrarProfesional.addEventListener('click', function(){
	// 	$('.hijo').first().remove();
 //        swal('Se borro un profesional');
	// });

	var btnBorrarProfesional = document.querySelector('.borrarProfesional');

	btnBorrarProfesional.addEventListener('click', function(){
        var divProfesionales = document.querySelector('.padre');
        console.log(divProfesionales.lastChild);
        divProfesionales.removeChild(divProfesionales.lastChild)
        swal('Se borro un profesional');
    });

window.onload =function (){

	//pregunta 5
		var selectEstadoCaso = document.querySelector('.selectEstadoCaso');
        var divMotivoCierre = document.querySelector('.divMotivoCierre');
        var selectMotivoCierre = document.querySelector('.selectMotivoCierre');

        selectEstadoCaso.addEventListener('change', function(){
            if (selectEstadoCaso.value == 3) {
                divMotivoCierre.style.display = '';
            }else{
                divMotivoCierre.style.display = 'none';
                selectMotivoCierre.value = ''
            }
        });
	//fin pregunta 5

	//pregunta 6

		var selectAmbito = document.querySelector('.selectAmbito')
		var divDepartamento = document.querySelector('.divDepartamento')
		var selectDepartamento = document.querySelector('.selectDepartamento')
		var divOtrasProv = document.querySelector('.divOtrasProv')
		var selectOtrasProv = document.querySelector('.selectOtrasProv')


		selectAmbito.addEventListener('change', function(){
			if (selectAmbito.value == 2) {
				divDepartamento.style.display = '';
				divOtrasProv.style.display = 'none';
				selectOtrasProv.value = '';
			}else if (selectAmbito.value == 3) {
				divDepartamento.style.display = 'none';
				selectDepartamento.value = '';
				divOtrasProv.style.display = '';
			}else{
				divDepartamento.style.display = 'none';
				selectDepartamento.value = '';
				divOtrasProv.style.display = 'none';
				selectOtrasProv.value = '';
			}
		});

	//fin pregunta 6

//---------FORMULARIO A--------------
	// var agregar = document.querySelector('.anadirProfesional');

 // 	agregar.addEventListener('click', funcionalidadCheck);

 // 	var clicks = 0;

 // 	function funcionalidadCheck() {
		
	// 	//agarro a la clase hijo que esta oculta y la muestro
	// 	var hijo = document.querySelectorAll('.hijo');
	// 	console.log(hijo);
	// 	console.log(clicks);

 // 		hijo[clicks].style.display = "";

 // 		clicks += 1;

 // 		//esto es para poder guardar y que validen los datos
 // 		var profesionalId = document.querySelector('.profesional_id');

 // 		profesionalId.classList.remove('profesional_id');

	// 	profesionalId.classList.add('profesional_id'+clicks)

	// 	var profesionalIdN = document.querySelector('.profesional_id'+clicks);
		
	// 	profesionalIdN.setAttribute('name', 'profesional_id[]')

 // 		var desde = document.querySelector('.desde');

	// 	desde.classList.remove('desde');

	// 	desde.classList.add('desde'+clicks)

	// 	var desdeN = document.querySelector('.desde'+clicks);
		
	// 	desdeN.setAttribute('name', 'datos_profesional_interviene_desde[]')

 // 		var hasta = document.querySelector('.hasta');

 // 		hasta.classList.remove('hasta');

	// 	hasta.classList.add('hasta'+clicks)

	// 	var hastaN = document.querySelector('.hasta'+clicks);
		
	// 	hastaN.setAttribute('name', 'datos_profesional_interviene_hasta[]')
	// 	//hasta aca mas lo de actualmente


 // 		var actualmente = document.querySelector('.actualmente');

 // 		actualmente.classList.remove('actualmente');

	// 	actualmente.classList.add('actualmente'+clicks)

	// 	var actualmenteN = document.querySelector('.actualmente'+clicks);
		
	// 	actualmenteN.setAttribute('name', 'profesionalactualmente_id[]')

	// 	var inicio = document.querySelector('.mostrarInicio');

 // 		inicio.classList.remove('mostrarInicio');

	// 	inicio.classList.add('mostrarInicio'+clicks)

	// 	var inicioN = document.querySelector('.mostrarInicio'+clicks);

	// 	var final = document.querySelector('.mostrarFinal');

 // 		final.classList.remove('mostrarFinal');

	// 	final.classList.add('mostrarFinal'+clicks)

	// 	var finalN = document.querySelector('.mostrarFinal'+clicks);


	// 	actualmente.addEventListener('change', function(){
	// 		if (actualmenteN.value == "1") {
	// 			finalN.style.display = 'none';
	// 		}else if(actualmenteN.value == "2"){
	// 			finalN.style.display = '';
	// 		}else{
	// 			finalN.style.display = 'none';
	// 		}
	// 	})
 // 	}

 	 

//---------FIN FORMULARIO A--------------

}

