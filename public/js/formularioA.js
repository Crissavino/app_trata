
// pregunta 4
	var selectModalidad = document.querySelector('.modalidad');
	var presentacionEspontaneaSelect = document.querySelector('.presentacion');
	var presentacionEspontanea = document.querySelector('.presentacion_espontanea');
	var derivacionOtroOrganismo = document.querySelector('.derivacion_otro_organismo');
	var derivacionOtroOrganismoSelect = document.querySelector('.derivacion_otro_organismo_select');
	var derivacionOtroOrganismoCual = document.querySelector('.derivacion_otro_organismo_cual');
	var derivacionOtroOrganismoCualInput = document.querySelector('.derivacion_otro_organismo_cual_input');

	if (selectModalidad.value == 3) {
		presentacionEspontanea.style.display = '';
		derivacionOtroOrganismo.style.display = 'none';
		derivacionOtroOrganismoCual.style.display = 'none';
		derivacionOtroOrganismoSelect.value = '';
		derivacionOtroOrganismoCualInput.value = '';
	}else if (selectModalidad.value == 5) {
		presentacionEspontanea.style.display = 'none';
		derivacionOtroOrganismo.style.display = '';
		presentacionEspontaneaSelect.value = '';
		if (derivacionOtroOrganismoSelect.value == 16) {
			derivacionOtroOrganismoCual.style.display = '';
		}else{
			derivacionOtroOrganismoCual.style.display = 'none';
			derivacionOtroOrganismoCualInput.value = '';
		}
	}else{
		presentacionEspontanea.style.display = 'none';
		derivacionOtroOrganismo.style.display = 'none';
		presentacionEspontaneaSelect.value = '';
		derivacionOtroOrganismoSelect.value = '';
		derivacionOtroOrganismoCualInput.value = '';
	}
	
//fin pregunta 4

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

	if (selectCaratulacion.value === '7') {
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
        divProfesionales.removeChild(divProfesionales.lastChild)
		swal('Se borro un profesional');
		
		if ($("[name^=profesional_id]").length == 0 && $("[name^=profesional_id_viejo]").length == 0) {

		    var btnAnadir = document.querySelector('.anadirProfesional');
		    var btnBorrar = document.querySelector('.borrarProfesional');

		    swal("Agregá al menos un referente");
		    btnAnadir.click();

		}
	});
	//borrado profesional anterior
	
	// var id_profesional = [];
	// var id_tabla = [];

	// function borrarProfesional(a,e) {
	// 	id_profesional.push(a);	
	// 	$('#idsEliminados').val(id_profesional);
	// 	id_tabla.push(e);
	// 	$('#idsProf_inter').val(id_tabla);
	// 	$('.profesionalAnterior' + e).html(" ");
		

	// }
	var ids = [];

	function borrarProfesional(id) {
	    ids.push(id);

	    $('#idsEliminados').val(ids);

		$('.profesional' + id).html(" ");

		if ($("[name^=profesional_id]").length == 0 && $("[name^=profesional_id_viejo]").length == 0) {

			var btnAnadir = document.querySelector('.anadirProfesional');
			var btnBorrar = document.querySelector('.borrarProfesional');

			swal("Agregá al menos un referente");
			btnAnadir.click();

		}

	}
//fin

window.onload =function (){

	//pregunta 4
		var selectModalidad = document.querySelector('.modalidad');
		var presentacionEspontanea = document.querySelector('.presentacion_espontanea');
		var presentacionEspontaneaSelect = document.querySelector('.presentacion');
		var derivacionOtroOrganismo = document.querySelector('.derivacion_otro_organismo');
		var derivacionOtroOrganismoSelect = document.querySelector('.derivacion_otro_organismo_select');
		var derivacionOtroOrganismoCual = document.querySelector('.derivacion_otro_organismo_cual');
		var derivacionOtroOrganismoCualInput = document.querySelector('.derivacion_otro_organismo_cual_input');

		selectModalidad.addEventListener('change', function(){
			if (selectModalidad.value == 3) {
				presentacionEspontanea.style.display = '';
				derivacionOtroOrganismo.style.display = 'none';
				derivacionOtroOrganismoCual.style.display = 'none';
				derivacionOtroOrganismoSelect.value = '';
				derivacionOtroOrganismoCualInput.value = '';
			}else if (selectModalidad.value == 5) {
				presentacionEspontanea.style.display = 'none';
				derivacionOtroOrganismo.style.display = '';
				presentacionEspontaneaSelect.value = '';
				derivacionOtroOrganismoSelect.addEventListener('change', function(){
					if (derivacionOtroOrganismoSelect.value == 16) {
						derivacionOtroOrganismoCual.style.display = '';
					}else{
						derivacionOtroOrganismoCual.style.display = 'none';
						derivacionOtroOrganismoCualInput.value = '';
					}
				});
			}else{
				presentacionEspontanea.style.display = 'none';
				derivacionOtroOrganismo.style.display = 'none';
				presentacionEspontaneaSelect.value = '';
				derivacionOtroOrganismoSelect.value = '';
				derivacionOtroOrganismoCualInput.value = '';
			}
		});
	//fin pregunta 4

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

	//pregunta 7
	var selectCaratulacion = document.querySelector('.caratulacionjudicial');
	var caratulacionJudicialCual = document.querySelector('.caratulacionjudicial_cual');
	var caratulacionJudicialCualInput = document.querySelector('.caratulacionjudicial_otro');

	selectCaratulacion.addEventListener('change', function(){
		if (selectCaratulacion.value === '7') {
			caratulacionJudicialCual.style.display = '';
			selectCaratulacion.addEventListener('change', function(){
				caratulacionJudicialCualInput.value = '';
			});
		}else{
			caratulacionJudicialCual.style.display = 'none';
		}
	});
	//fin pregunta 7


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

// se agrega un profesional por defecto



$("#formularioA").validate({ //se definen las opciones de validaciÃ³n para el formulario1
	debug:false,
	errorClass: 'error_cliente',
	ignore:":not(:visible)",
	rules: { //se definen las reglas
			   datos_nombre_referencia: {
				   required:true
			   },
			   datos_numero_carpeta: {
				   number:true,
				   required:true
			   },
			   datos_fecha_ingreso:{
				   date:true,
				   required:true,
			   },
			   modalidad_id:{
				   required: true,
			   },
			   presentacion_espontanea_id:{
				   required: true,
			   },
			   derivacion_otro_organismo_id:{
				   required: true,
			   },
			   derivacion_otro_organismo_cual:{
				   required: true,
			   },
			   estadocaso_id:{
				   required: true,
			   },
			   motivocierre_id:{
				   required: true,
			   },
			   ambito_id:{
				   required: true,
			   },
			   fiscalia_juzgado: {
				   required: true
			   },
			   departamento_id:{
				   required: true,
			   },
			   otrasprov_id:{
				   required: true,
			   },
			   caratulacionjudicial_id:{
				   required: true,
			   },
			   caratulacionjudicial_otro:{
				   required: true,
			   },
			   datos_nro_causa:{
				   required: true,
			   },
			   'profesional_id[]':{
				   required: true,
			   },
			   'datos_profesional_interviene_desde[]':{
				   required: true,
				   date:true
			   },
			   'profesionalactualmente_id[]':{
				   required: true,
			   },
			   'datos_profesional_interviene_hasta[]':{
				   required: true,
			   }
	   },
	   messages: { //se definen los mensajes a mostrar
		   datos_nombre_referencia:{
			   required:"Este campo es obligatorio",
		   },
		   datos_numero_carpeta: {
				  required: "Este campo es obligatorio",
				   number: "Debe ingresar un número",
			   },
		   datos_fecha_ingreso:{
			   date:"Debe ingresar una fecha válida",
			   required:"Este campo es obligatorio",
		   },
		   modalidad_id:{
			   required:"Este campo es obligatorio",
		   },
		   presentacion_espontanea_id:{
			   required:"Este campo es obligatorio",
		   },
		   derivacion_otro_organismo_id:{
			   required:"Este campo es obligatorio",
		   },
		   derivacion_otro_organismo_cual:{
			   required:"Este campo es obligatorio",
		   },
		   estadocaso_id:{
			   required:"Este campo es obligatorio",
		   },
		   motivocierre_id:{
			   required:"Este campo es obligatorio",
		   },
		   ambito_id:{
			   required:"Este campo es obligatorio",
		   },
		   fiscalia_juzgado:{
			   required:"Este campo es obligatorio",
		   },
		   departamento_id:{
			   required:"Este campo es obligatorio",
		   },
		   otrasprov_id:{
			   required:"Este campo es obligatorio",
		   },
		   caratulacionjudicial_id:{
			   required:"Este campo es obligatorio",
		   },
		   caratulacionjudicial_otro:{
			   required:"Este campo es obligatorio",
		   },
		   datos_nro_causa:{
			   required:"Este campo es obligatorio",
		   },
		   'profesional_id[]':{
			   required:"Este campo es obligatorio",
		   },
		   'datos_profesional_interviene_desde[]':{
			   required:"Este campo es obligatorio",
			   date:"Debe ingresar una fecha válida",
		   },
		   'profesionalactualmente_id[]':{
			   required:"Este campo es obligatorio",
		   },
		   'datos_profesional_interviene_hasta[]':{
			   required:"Este campo es obligatorio",
		   },
	   },
	   submitHandler:function(form){
			antesSubmit();
		}
   });

   function antesSubmit(){
		for(i=0;i<document.getElementsByName("profesional_id[]").length;i++){
			if((document.getElementsByName("profesional_id[]")[i].value==="") || (document.getElementsByName("datos_profesional_interviene_desde[]")[i].value==="")){
				alert("Debe completar todos los campos de todos los profesionales agregados");
				return false;
			}
		}
		document.getElementById("formularioA").submit();
   }




}

function otraFuncion(){


	
	$("[name^=profesional_id]").each(function () {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Campo Requerido"
            }
		});
	});
	$("#formularioA").validate(); //sets up the validator


}