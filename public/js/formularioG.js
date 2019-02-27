//borrado referenteAnterior individual
var ids = [];

function borrarIntervencionAnterior(id) {
    ids.push(id);

    $('#idsEliminados').val(ids);

    $('.intervencionAnterior' + id).html(" ");

}
//fin

//borrar intervencion
var btnBorrarIntervencion = document.querySelector('.borrarIntervencion');

if (btnBorrarIntervencion) {
	btnBorrarIntervencion.addEventListener('click', function () {
		var divIntervenciones = document.getElementById('intervenciones');
		divIntervenciones.removeChild(divIntervenciones.lastChild)
	});
}


//fin

window.onload =function (){
	//de la docInterna
	$('.docInterna-input').on('change', function() {
	    let fileName = $(this).val().split('\\').pop();
	    $(this).siblings('.docInterna').addClass('selected').html(fileName);
	});

	//documentacion interna
	var docInternaLabel = document.querySelector('.docInterna');
	var docInternaInput = document.querySelector('.docInterna-input');

	if (docInternaInput) {
		docInternaInput.addEventListener('change', function () {
		    docInternaLabel.innerText = 'Estas agregando ' + docInternaInput.files.length + ' archivos';
		});
	}
	
	//fin documentacion interna

	//documentacion externa
	var docExternaLabel = document.querySelector('.docExterna');
	var docExternaInput = document.querySelector('.docExterna-input');
	
	if (docExternaInput) {
		docExternaInput.addEventListener('change', function () {
		    docExternaLabel.innerText = 'Estas agregando ' + docExternaInput.files.length + ' archivos';
		});
	}
	
	//fin documentacion externa

	//noticias Relacionadas
	var notRelacionadasLabel = document.querySelector('.notRelacionadas');
	var notRelacionadasInput = document.querySelector('.notRelacionadas-input');
	
	if (notRelacionadasInput) {
		notRelacionadasInput.addEventListener('change', function () {
		    notRelacionadasLabel.innerText = 'Estas agregando ' + notRelacionadasInput.files.length + ' archivos';
		});
	}
	
	//fin noticias Relacionadas

	//Plan de Intervención/Estrategias de abordaje
	var intervencionEstrategiasLabel = document.querySelector('.intervencionEstrategias');
	var intervencionEstrategiasInput = document.querySelector('.intervencionEstrategias-input');
	
	if (intervencionEstrategiasInput) {
		intervencionEstrategiasInput.addEventListener('change', function () {
		    intervencionEstrategiasLabel.innerText = 'Estas agregando ' + intervencionEstrategiasInput.files.length + ' archivos';
		});
	}
	
	//fin Plan de Intervención/Estrategias de abordaje

	//Informe Socioambiental
	var infoSocioambientalLabel = document.querySelector('.infoSocioambiental');
	var infoSocioambientalInput = document.querySelector('.infoSocioambiental-input');
	
	if (infoSocioambientalInput) {
		infoSocioambientalInput.addEventListener('change', function () {
			infoSocioambientalLabel.innerText = 'Estas agregando ' + infoSocioambientalInput.files.length + ' archivos';
		});
	}
	//fin Informe Socioambiental



	$(".imprimir").click(function(){
		var noprint=$("#noimprimir").html();
		$("#noimprimir").hide();
		$("#imprimible").show();
		$("#imprimirbtn").hide();
		window.print();
		$("#imprimible").hide();
		$("#noimprimir").show();
		$("#imprimirbtn").show();
		// $("#noimprimir").html(noprint);
	});
	//imprimir pantalla solo es para el edit
	/* 	var imprimir = document.querySelector('.imprimir');

		imprimir.addEventListener('click', function(){
     		var contenidoImprimible = document.getElementById('imprimible').innerHTML;
     		var contendioOriginal = document.body.innerHTML;
     		
     		document.body.innerHTML = contenidoImprimible;

			window.print()

     		document.body.innerHTML = contendioOriginal;

		}); */
	//fin imprimir pantalla

	//descargar pdf
		// var btnDescargar = document.querySelector('.descargar');

		// btnDescargar.addEventListener('click', function(){
		// 	var contenidoImprimible = document.getElementById('imprimible').innerHTML;
  //    		var contendioOriginal = document.body.innerHTML;

  //    		document.body.innerHTML = contenidoImprimible;

  //    		// var data = JSON.stringify(document.body.innerHTML)

  //    		var datos = document.getElementById('form');
  //    		var datosDelFormulario = new FormData(datos)

  //    		console.log(datosDelFormulario.get('fechaIntervencion[]'));

  //    		var id ={
		// 					fechaIntervencion: datosDelFormulario.get('fechaIntervencion[]'),
		// 				}

		// 	var camposJSON = JSON.stringify(campos)

  //    		// console.log(datos);

		// 	// var lala = datos.append('datos', data);

  //           // var lala = datos.insertAdjacentHTML('beforeend', data);

  //    		console.log(datosDelFormulario);

   //   		fetch("/generarPDF", {
			// 	method: 'POST',
			// 	body: id,
			// 	headers:{
			// 		'Content-Type': 'application/json',
			// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 	}
			// })

			// .then(function (response) {
			// 	return response.text();
			// })
			// .then(function (data) {
			// 	console.log(data);
			// })
			// .catch(function (error) {
			// 	console.log("The error was: " + error);
			// })


  //    		document.body.innerHTML = contendioOriginal;
		// });


	//fin

	//preguntar si quiere imprimir antes de enviar
		// var btnEnviarForm = document.querySelector('.btnEnviarForm');

		// btnEnviarForm.addEventListener('click', function(event){
		// 	// event.preventDefault();
		// 	var resp = confirm('Desea imprimir el formulario?');
		// 	if (resp === true) {
		// 		var contenidoImprimible = document.getElementById('imprimible').innerHTML;
	 //     		var contendioOriginal = document.body.innerHTML;
	     		
	 //     		document.body.innerHTML = contenidoImprimible;

		// 		window.print()

	 //     		document.body.innerHTML = contendioOriginal;
		// 	}
		// });
	//fin

	

}

