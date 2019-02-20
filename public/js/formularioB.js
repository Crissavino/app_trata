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

//validación en el cliente

$.validator.addMethod("edad",function(value,element){
	//return this.optional(element) || /^[\t 0-9 Ã±]+$/i.test(value);
	tipo=isNaN(parseInt(value));
	valorSeDesconoce=(value=="Se desconoce");
	premisa1=(tipo && valorSeDesconoce);
	valorMenor=false;
	if(!tipo){
		if(value<150 && value>0)
		valorMenor=true;
	}

	return (premisa1 || (!tipo && valorMenor));


},"Ingrese un Número de 1 a 150. ");





$("#formularioB").validate({ //se definen las opciones de validaciÃ³n para el formulario1
	debug:false,
	errorClass: 'error_cliente',
	ignore:":not(:visible)",
	rules: { //se definen las reglas
				victima_nombre_y_apellido: {
				   required:true
			   },
			   victima_apodo: {
				required:true
			},
			genero_id: {
				required:true
			},
			tienedoc_id: {
				required:true
			},
			tipodocumento_id: {
				required:true
			},
			residenciaprecaria_id: {
				required:true
			},
			victima_tipo_documento_otro: {
				required:true
			},
			victima_documento: {
				number:true,
				required:true
			},
			paisNacimiento: {
				required:true
			},
			provinciaNacimiento: {
				required:true
			},
			ciudadNacimiento: {
				required:true
			},
			victima_fecha_nacimiento:{
				date:true,
				required:true,
			},
			victima_edad:{
				edad:"#victima_edad",
				required:true,
			},
			franjaetaria_id: {
				required:true
			},
			embarazorelevamiento_id: {
				required:true
			},
			embarazoprevio_id: {
				required:true
			},
			hijosembarazo_id: {
				required:true
			},
			bajoefecto_id: {
				required:true
			},
			'discapacidad_id[]':{
				required:true
			},
			tienelesion_id: {
				required:true
			},
			victima_lesion: {
				required:true
			},
			lesionconstatada_id: {
				required:true
			},
			victima_lesion_organismo: {
				required:true
			},
			enfermedadcronica_id: {
				required:true
			},
			victima_tipo_enfermedad_cronica: {
				required:true
			},
			'limitacion_id[]':{
				required:true
			},
			victima_limitacion_otra:{
				required:true
			},
			niveleducativo_id:{
				required:true
			},
			oficio_id:{
				required:true
			},
			victima_oficio_cual:{
				required:true
			},
			
			
			
			
			
			
			
			
			
			
			
			
			   /*datos_numero_carpeta: {
				   number:true,
				   required:true
			   },
			   datos_fecha_ingreso:{
				   date:true,
				   required:true,
			   },*/
	   },
	   messages: { //se definen los mensajes a mostrar
			victima_nombre_y_apellido:{
			   required:"Este campo es obligatorio",
		   },
		   victima_apodo:{
			required:"Este campo es obligatorio",
			},
			genero_id:{
				required:"Este campo es obligatorio",
				},
			tienedoc_id:{
				required:"Este campo es obligatorio",
			},
			tipodocumento_id:{
				required:"Este campo es obligatorio",
			},
			residenciaprecaria_id:{
				required:"Este campo es obligatorio",
			},
			victima_tipo_documento_otro:{
				required:"Este campo es obligatorio",
			},
			victima_documento:{
				number:"Ingrese números",
				required:"Este campo es obligatorio",
			},
			paisNacimiento:{
				required:"Este campo es obligatorio",
			},
			provinciaNacimiento: {
				required:"Este campo es obligatorio",
			},
			ciudadNacimiento: {
				required:"Este campo es obligatorio",
			},
			victima_fecha_nacimiento:{
				date:"Debe ingresar una fecha válida",
				required:"Este campo es obligatorio",
			},
			victima_edad:{
				number:"Debe ingresar un número",
				required:"Este campo es obligatorio",
			},
			franjaetaria_id: {
				required:"Este campo es obligatorio",
			},
			embarazorelevamiento_id: {
				required:"Este campo es obligatorio",
			},
			embarazoprevio_id: {
				required:"Este campo es obligatorio",
			},
			hijosembarazo_id: {
				required:"Este campo es obligatorio",
			},
			bajoefecto_id: {
				required:"Este campo es obligatorio",
			},
			'discapacidad_id[]':{
				required:"Este campo es obligatorio",
			},
			tienelesion_id: {
				required:"Este campo es obligatorio",
			},
			victima_lesion: {
				required:"Este campo es obligatorio",
			},
			lesionconstatada_id: {
				required:"Este campo es obligatorio",
			},
			victima_lesion_organismo: {
				required:"Este campo es obligatorio",
			},
			enfermedadcronica_id: {
				required:"Este campo es obligatorio",
			},
			victima_tipo_enfermedad_cronica: {
				required:"Este campo es obligatorio",
			},
			'limitacion_id[]':{
				required:"Este campo es obligatorio",
			},
			victima_limitacion_otra:{
				required:"Este campo es obligatorio",
			},
			niveleducativo_id:{
				required:"Este campo es obligatorio",
			},
			oficio_id:{
				required:"Este campo es obligatorio",
			},
			victima_oficio_cual:{
				required:"Este campo es obligatorio",
			},
			
			
			
			
			
			
			
			
			
			
			
			
			
		   
		   /*datos_numero_carpeta: {
				  required: "Este campo es obligatorio",
				   number: "Debe ingresar un número",
			   },
		   datos_fecha_ingreso:{
			   date:"Debe ingresar una fecha válida",
			   required:"Este campo es obligatorio",
		   },*/
	   },
	   submitHandler:function(form){
			antesSubmit();
		}
   });

