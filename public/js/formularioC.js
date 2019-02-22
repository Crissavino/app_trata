	var borrarConviviente = document.querySelector('.clickBorrar');

	console.log(borrarConviviente);

	borrarConviviente.addEventListener('click', function(){
        var divConvivientes = document.querySelector('.referentes');
        divConvivientes.removeChild(divConvivientes.lastChild)
        swal('Se borro un referente')
	});

	var noPersonas = document.querySelector('.noPersonas');
	
	if (noPersonas.value == '2' || noPersonas.value == '3') {
		var convivientes = document.querySelector('.referentes');
		convivientes.style.display = "none";
		var btnAnadir = document.querySelector('.clickAnadir');
		var btnBorrar = document.querySelector('.clickBorrar');
	}else if(noPersonas.value == '1'){
		var convivientes = document.querySelector('.referentes');
		convivientes.style.display = "";
		var btnAnadir = document.querySelector('.clickAnadir');
		var btnBorrar = document.querySelector('.clickBorrar');
		btnAnadir.removeAttribute('disabled', 'disabled');
		btnBorrar.removeAttribute('disabled', 'disabled');
		// swal("Agregá al menos un conviviente");
	}else{
		var convivientes = document.querySelector('.referentes');
		convivientes.style.display = "";
		var btnAnadir = document.querySelector('.clickAnadir');
		var btnBorrar = document.querySelector('.clickBorrar');
	}

	//muestra u oculta los botones si de acuerdo a la seleccion
		var noPersonas = document.querySelector('.noPersonas');

			if (noPersonas.value == 1) {
				$('#botones').show()
			}else{
				$('#botones').hide()
			}
	//fin

	//cuando se cliquea para borrar UN referente
	
		var ids = [];

		function borrarReferenteAnterior(id){
			ids.push(id)
			$('#idsEliminados').val(ids)

			$('.referenteAnterior'+id).html(" ")

		}

	//fin

window.onload =function (){

//---------FORMULARIO C--------------
//de esta forma muestro o oculto si no estaba con alguien mas

	var noPersonas = document.querySelector('.noPersonas');

 	noPersonas.addEventListener('change', mostrarConviviente);

 	function mostrarConviviente() {
 		if (this.value == '2' || this.value == '3') {
			var convivientes = document.querySelector('.referentes');
			convivientes.style.display = "none";
			var btnAnadir = document.querySelector('.clickAnadir');
			var btnBorrar = document.querySelector('.clickBorrar');
 		}else if(this.value == '1'){
 			var convivientes = document.querySelector('.referentes');
			convivientes.style.display = "";
			var btnAnadir = document.querySelector('.clickAnadir');
			var btnBorrar = document.querySelector('.clickBorrar');
			btnAnadir.removeAttribute('disabled', 'disabled');
			btnBorrar.removeAttribute('disabled', 'disabled');
			swal("Agregá al menos un referente");
 		}else{
 			var convivientes = document.querySelector('.referentes');
 			convivientes.style.display = "";
 			var btnAnadir = document.querySelector('.clickAnadir');
			var btnBorrar = document.querySelector('.clickBorrar');
 		}
 	};
//hasta aca

//cuando la opcion cambie de si a no o se desconoce, se oculten y se borren los referentes cargados
	var noPersonas = document.querySelector('.noPersonas');
	var referentesAnteriores = $('.referentes-anteriores')
	var referentes = $('.referentes')
	
	noPersonas.addEventListener('change', function(){
		if (this.value !== 1) {
			referentesAnteriores.html(" ");
			referentes.html(" ");
		}
	});
//fin

//cuando se seleccion la opcion si(agregar otro referente) aparece un referente automaticamente
	var noPersonas = document.querySelector('.noPersonas');

	noPersonas.addEventListener('change', function(){
		if (this.value == 1) {
			$('#anadir').click();
			$('#botones').show()
		}else{
			$('#botones').hide()
		}
	});
//fin

//de esta forma agrego otro conviviente

	// var agregar = document.querySelector('.clickAnadir');

 // 	var agrego = agregar.addEventListener('click', funcionalidadCheck);

 // 	var clicks = 0;

	// function funcionalidadCheck() {
		
	// 	//agarro a la clase hijo que esta oculta y la muestro
	// 	var hijo = document.querySelectorAll('.hijo');

 // 		hijo[clicks].style.display = "";

 // 		clicks += 1;

		
 // 		//agarro el input text nombre_apellido
	// 	var inputNomApText = document.querySelector('.nombre_apellido');
	// 	//le saco la clase nombre_apellido
	// 	inputNomApText.classList.remove('nombre_apellido')
	// 	//le agrego la clase nombre_apellido + la cantidad de clicks nombre_apellido1, nombre_apellido2, etc...
	// 	inputNomApText.classList.add('nombre_apellido'+clicks)
	// 	//agarro el nuevo input
	// 	var inputNomApTextN = document.querySelector('.nombre_apellido'+clicks)
		
	// 	inputNomApTextN.setAttribute('name', 'nombre_apellido[]')

	// 	//agarro el input check nombre_apellido
	// 	var inputNomApCheck = document.querySelector('.desconoceNA')
	// 	//le saco la clase desconoceNA
	// 	inputNomApCheck.classList.remove('desconoceNA')
	// 	//le agrego la clase desconoceNA + la cantidad de clicks desconoceNA1, desconoceNA2, etc...
	// 	inputNomApCheck.classList.add('desconoceNA'+clicks)
	// 	//agarro le nuevo check
	// 	var inputNomApCheckN = document.querySelector('.desconoceNA'+clicks)

	// 	inputNomApCheck.addEventListener('click', function () {
	// 			if (inputNomApCheckN.checked) {
	// 			inputNomApTextN.value = 'Se desconoce'
	// 			inputNomApTextN.setAttribute("readonly", "readonly")
	// 		}else{
	// 			inputNomApTextN.value = ''
	// 			inputNomApTextN.removeAttribute('readonly')
	// 		}
	// 	})


	// 	//agarro el input text edad
	// 	var inputEdadText = document.querySelector('.edad');
	// 	//le saco la clase edad
	// 	inputEdadText.classList.remove('edad')
	// 	//le agrego la clase edad + la cantidad de clicks edad1, edad2, etc...
	// 	inputEdadText.classList.add('edad'+clicks)
	// 	//agarro el nuevo input
	// 	var inputEdadTextN = document.querySelector('.edad'+clicks)

	// 	inputEdadTextN.setAttribute('name', 'edad[]')

	// 	//agarro el input check edad
	// 	var inputEdadCheck = document.querySelector('.desconoceE')
	// 	//le saco la clase desconoceE
	// 	inputEdadCheck.classList.remove('desconoceE')
	// 	//le agrego la clase desconoceE + la cantidad de clicks desconoceE1, desconoceE2, etc...
	// 	inputEdadCheck.classList.add('desconoceE'+clicks)
	// 	//agarro le nuevo check
	// 	var inputEdadCheckN = document.querySelector('.desconoceE'+clicks)

	// 	inputEdadCheckN.addEventListener('click', function () {
	// 			if (inputEdadCheckN.checked) {
	// 				inputEdadTextN.value = 'Se desconoce'
	// 				inputEdadTextN.setAttribute("readonly", "readonly")
	// 			}else{
	// 				inputEdadTextN.value = ''
	// 				inputEdadTextN.removeAttribute('readonly')
	// 			}
	// 	})

	// 	var selectGenero = document.querySelector('.genero');
	// 	//le saco la clase vinculo
	// 	selectGenero.classList.remove('genero')
	// 	//le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
	// 	selectGenero.classList.add('genero'+clicks)
	// 	//agarro el nuevo input
	// 	var selectGeneroN = document.querySelector('.genero'+clicks)

	// 	selectGeneroN.setAttribute('name', 'genero_id[]')

	// 	//esto es para que aparezca el compo cual en la vinculacion con la victima
	// 	//agarro el select vinculo
	// 	var selectVinculo = document.querySelector('.vinculo');
	// 	//le saco la clase vinculo
	// 	selectVinculo.classList.remove('vinculo')
	// 	//le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
	// 	selectVinculo.classList.add('vinculo'+clicks)
	// 	//agarro el nuevo input
	// 	var selectVinculoN = document.querySelector('.vinculo'+clicks)

	// 	selectVinculoN.setAttribute('name', 'vinculo_id[]')

	// 	//agarro el input otro_vinculo
	// 	var inputOtroVinculo = document.querySelector('.otro_vinculo')
	// 	//le saco la clase otro_vinculo
	// 	inputOtroVinculo.classList.remove('otro_vinculo')
	// 	//le agrego la clase otro_vinculo + la cantidad de clicks otro_vinculo1, otro_vinculo2, etc...
	// 	inputOtroVinculo.classList.add('otro_vinculo'+clicks)
	// 	//agarro le nuevo input
	// 	var inputOtroVinculoN = document.querySelector('.otro_vinculo'+clicks)

	// 	selectVinculo.addEventListener('change', function () {
	// 		if (selectVinculo.value == '6') {
	// 			inputOtroVinculo.style.display = ""
	// 		}else{
	// 			inputOtroVinculo.style.display = "none"
	// 		}
	// 	})

	// 	var otroVinculo = document.querySelector('.vinculo_otro');
	// 	//le saco la clase vinculo
	// 	otroVinculo.classList.remove('vinculo_otro')
	// 	//le agrego la clase vinculo + la cantidad de clicks vinculo1, vinculo2, etc...
	// 	otroVinculo.classList.add('vinculo_otro'+clicks)
	// 	//agarro el nuevo input
	// 	var otroVinculoN = document.querySelector('.vinculo_otro'+clicks)

	// 	otroVinculoN.setAttribute('name', 'vinculo_otro[]')
	// };

	// var formulario = document.querySelector('.ejeC');

	// var elementosForm = formulario.elements;

	// var arrayElementos = Array.from(elementosForm);

	// arrayElementos.pop()

	// console.log(arrayElementos[2]);

	// arrayElementos.forEach(function(element, index){
	// 	addEventListener('submit', function(event){
	// 		event.preventDefault();
	// 		if (element.name == 'nombre_apellido') {
	// 			console.log(element.value);
	// 			alert('hola');
	// 		}
	// 	})
	// })

//funcionalidad de convivientes agregados, no se como seguir
        //le agrego las funcionalidades para cada caso
            // var i = <?=$i?>;
            // // console.log(i);

            // var inputNomApTextNAnt = document.querySelectorAll('.nombre_apellidoAnt');
            // // var inputNomApTextNAnt+i = document.querySelector('.nombre_apellidoAnt'+i);
            // var inputNomApCheckNAnt = document.querySelectorAll('.desconoceNAAnt');
            // // var inputNomApCheckNAnt = document.querySelector('.desconoceNAAnt'+i);
            // // console.log(inputNomApTextNAnt);
            // inputNomApCheckNAnt.forEach(function(element, index){
            //     // console.log(inputNomApTextNAnt[index]);
            //     // console.log(inputNomApCheckNAnt[index]);
            //     inputNomApCheckNAnt[index].addEventListener('click', function () {
            //         if (inputNomApCheckNAnt[index].checked) {
            //             inputNomApTextNAnt[index].value = 'Se desconoce'
            //             inputNomApTextNAnt[index].setAttribute("readonly", "readonly")
            //         }else{
            //             inputNomApTextNAnt[index].value = ''
            //             inputNomApTextNAnt[index].removeAttribute('readonly')
            //         }
            //     });
            // });
            // // for (var j = 1; i <= i.length; j++) {
            // //     console.log('test');
            // //     console.log(inputNomApTextNAnt[j]);
            // // }
            // // // console.log(inputNomApTextN, inputNomApCheckN);

            // inputNomApCheckNAnt.addEventListener('click', function () {
            //     if (inputNomApCheckNAnt.checked) {
            //         inputNomApTextNAnt.value = 'Se desconoce'
            //         inputNomApTextNAnt.setAttribute("readonly", "readonly")
            //     }else{
            //         inputNomApTextNAnt.value = ''
            //         inputNomApTextNAnt.removeAttribute('readonly')
            //     }
            // });


            // var inputEdadCheckNAnt = document.querySelector('.desconoceEAnt'+i);
            // var inputEdadTextNAnt = document.querySelector('.edadAnt'+i);

            // inputEdadCheckNAnt.addEventListener('click', function () {
            //     if (inputEdadCheckNAnt.checked) {
            //         inputEdadTextNAnt.value = 'Se desconoce'
            //         inputEdadTextNAnt.setAttribute("readonly", "readonly")
            //     }else{
            //         inputEdadTextNAnt.value = ''
            //         inputEdadTextNAnt.removeAttribute('readonly')
            //     }
            // });

            // var selectVinculoNAnt = document.querySelector('.vinculoAnt'+i)
            // var divOtroVinculoNAnt = document.querySelector('.otro_vinculoAnt'+i)
            // var inputOtroVinculoNAnt = document.querySelector('.vinculo_otroAnt'+i)

            // selectVinculoNAnt.addEventListener('change', function () {
            //     if (selectVinculoNAnt.value == '6') {
            //         divOtroVinculoNAnt.style.display = ""
            //     }else{
            //         divOtroVinculoNAnt.style.display = "none"
            //         inputOtroVinculoNAnt.value = '';
            //     }
            // })
        //fin funcionalidades
//fin


//---------FIN FORMULARIO C--------------


}


///VALIDACIÓN DEL LADO DEL CLIENTE

$("#ejeC").validate({ 
	debug:false,
	errorClass: 'error_cliente',
	ignore:":not(:visible)",
	rules: { //se definen las reglas
			otraspersonas_id:{
				   required:true
			},
	   },
	   messages: { //se definen los mensajes a mostrar
			otraspersonas_id:{
			   required:"Este campo es obligatorio",
		   },

		   
		   
	   }
   });