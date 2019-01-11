window.onload =function (){
	//de la docInterna
	$('.docInterna-input').on('change', function() {
	    let fileName = $(this).val().split('\\').pop();
	    $(this).siblings('.docInterna').addClass('selected').html(fileName);
	});

	//documentacion interna
	var docInternaLabel = document.querySelector('.docInterna');
	var docInternaInput = document.querySelector('.docInterna-input');

	docInternaInput.addEventListener('change', function(){
		docInternaLabel.innerText = 'Estas agregando '+docInternaInput.files.length+' archivos';
	});
	//fin documentacion interna

	//documentacion externa
	var docExternaLabel = document.querySelector('.docExterna');
	var docExternaInput = document.querySelector('.docExterna-input');
	
	docExternaInput.addEventListener('change', function(){
		docExternaLabel.innerText = 'Estas agregando '+docExternaInput.files.length+' archivos';
	});
	//fin documentacion externa

	//noticias Relacionadas
	var notRelacionadasLabel = document.querySelector('.notRelacionadas');
	var notRelacionadasInput = document.querySelector('.notRelacionadas-input');
	
	notRelacionadasInput.addEventListener('change', function(){
		notRelacionadasLabel.innerText = 'Estas agregando '+notRelacionadasInput.files.length+' archivos';
	});
	//fin noticias Relacionadas

	//Plan de Intervención/Estrategias de abordaje
	var intervencionEstrategiasLabel = document.querySelector('.intervencionEstrategias');
	var intervencionEstrategiasInput = document.querySelector('.intervencionEstrategias-input');
	
	intervencionEstrategiasInput.addEventListener('change', function(){
		intervencionEstrategiasLabel.innerText = 'Estas agregando '+intervencionEstrategiasInput.files.length+' archivos';
	});
	//fin Plan de Intervención/Estrategias de abordaje

	//Informe Socioambiental
	var infoSocioambientalLabel = document.querySelector('.infoSocioambiental');
	var infoSocioambientalInput = document.querySelector('.infoSocioambiental-input');
	
	infoSocioambientalInput.addEventListener('change', function(){
		infoSocioambientalLabel.innerText = 'Estas agregando '+infoSocioambientalInput.files.length+' archivos';
	});
	//fin Informe Socioambiental


	//imprimir pantalla
		var imprimir = document.querySelector('.imprimir');

		imprimir.addEventListener('click', function(){
     		var contenidoImprimible = document.getElementById('imprimible').innerHTML;
     		var contendioOriginal = document.body.innerHTML;
     		
     		document.body.innerHTML = contenidoImprimible;

			window.print()

     		document.body.innerHTML = contendioOriginal;

		});
	//fin imprimir pantalla

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

