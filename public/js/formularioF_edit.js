//JS para el EDIT

	//pregunta de F 1
    var intervinieronOrganismos = document.querySelector('.intervinieronOrganismos_id');
    var organismoDerivo = document.querySelector('.organismoDerivo');
    var intervinieron = document.querySelector('.intervinieron');

    if (intervinieronOrganismos.value == 3) {
        organismoDerivo.style.display = '';
        intervinieron.style.display = '';
    }else if (intervinieronOrganismos.value == 2) {
        organismoDerivo.style.display = '';
        intervinieron.style.display = 'none';
    }else if(intervinieronOrganismos.value == 1){
        organismoDerivo.style.display = 'none';
        intervinieron.style.display = 'none';
    }
//fin

// pregunta 1.2
    var orgProgNacionalOtro = document.querySelector('.orgProgNacionalOtro');
    var orgProgNacionalCual = document.querySelector('.orgProgNacionalCual');
    var divOrgProgNacionalCual = document.querySelector('#orgProgNacionalCual');

    if (orgProgNacionalOtro.checked) {
        orgProgNacionalCual.style.display = '';
    }
// fin pregunta 1.2

// pregunta 2.2
    var socioEconomicaCheckbox = document.querySelector('.socioEconomicaCheckbox');
    var socioEconomica = document.querySelector('.socioEconomica');
    var deSocioEconomica = document.querySelectorAll('input[name="socioeconomic_id[]"]');
    var socioEconomicaCual = document.querySelector('.socioEconomicaCual');
    var socioEconomicaCualInput = document.querySelector('.socioEconomicaCualInput');

    if (socioEconomicaCheckbox.checked) {
        socioEconomica.style.display = '';
        socioEconomicaCheckbox.addEventListener('click', function(){
            if (this.checked) {
                socioEconomica.style.display = '';
            }else{
                socioEconomica.style.display = 'none';
                socioEconomicaCual.style.display = 'none';
                socioEconomicaCualInput.value = '';
                deSocioEconomica.forEach(function(element){
                    element.checked = false
                });
            }
        });
        if (deSocioEconomica[6].checked) {
            socioEconomicaCual.style.display = '';
            deSocioEconomica[6].addEventListener('click', function(){
                if (this.checked) {
                socioEconomicaCual.style.display = '';
                }else{
                    socioEconomicaCual.style.display = 'none';
                    socioEconomicaCualInput.value = '';
                }
            });
        }
    }
// fin pregunta 2.2

//pregunta de F 3
    var intervinieronOrganismosActualmente = document.querySelector('.intervinieronOrganismosActualmente_id');
    var intervinieronActualmente = document.querySelector('.intervinieronActualmente');

    if (intervinieronOrganismosActualmente.value == 1) {
        intervinieronActualmente.style.display = '';
    }else{
        intervinieronActualmente.style.display = 'none';
    }
//fin

// pregunta 3.2
    var orgProgNacionalActualmenteOtro = document.querySelector('.orgProgNacionalActualmenteOtro');
    var orgprognacionalActualmenteCual = document.querySelector('.orgprognacionalActualmenteCual');

    if (orgProgNacionalActualmenteOtro.checked) {
        orgprognacionalActualmenteCual.style.display = '';
    }else{
        orgprognacionalActualmenteCual.style.display = 'none';
    }
// fin pregunta 3.2

//borrado orgProgNacionalOtro individual
    var ids1 = [];

    function borrarOrgProgNacionalOtro(id){
        
        if(document.getElementById("container_orgProgNacionalCual").getElementsByTagName("input").length===0 && document.getElementById("container_orgProgNacionalCualInput").getElementsByTagName("input").length===1){
            alert("Debe agregar al menos una descripción");
        }
        else{
            ids1.push(id);

            $('#idsEliminados1').val(ids1);
    
            $('.otroProgNacionalOtro'+id).html(" ");
        }
        
        

    }
//fin

//borrado orgProgProvincial individual
    var ids2 = [];

    function borrarOrgProv(id){
        if(document.getElementById("container_orgProgProvinciales").getElementsByTagName("input").length===0 && document.getElementById("container_orgProgProvinciales_viejo").getElementsByTagName("input").length===1){
            alert("Debe agregar al menos una descripción");
        }
        else{
            ids2.push(id);

            $('#idsEliminados2').val(ids2);

            $('.programaProv'+id).html(" ");
        }
    }
//fin

//borrado orgProgMunipal individual
    var ids3 = [];

    function borrarOrgMuni(id){

        if(document.getElementById("container_orgProgMunicipales").getElementsByTagName("input").length===0 && document.getElementById("container_orgProgMunicipales_viejo").getElementsByTagName("input").length===1){
            alert("Debe agregar al menos una descripción");
        }
        else{

        ids3.push(id);

        $('#idsEliminados3').val(ids3);

        $('.programaMuni'+id).html(" ");
        }
    }
//fin

//borrado OrgCivil individual
    var ids4 = [];

    function borrarOrgCivil(id){
        if(document.getElementById("container_orgSocCivil").getElementsByTagName("input").length===0 && document.getElementById("container_orgSocCivil_viejo").getElementsByTagName("input").length===1){
            alert("Debe agregar al menos una descripción");
        }
        else{
        ids4.push(id);

        $('#idsEliminados4').val(ids4);

        $('.organizacion'+id).html(" ");
        }
    }
//fin

//borrado orgProgNacionalOtroActualmente individual
    var ids11 = [];

    function borrarProgNacionalOtro(id){
       
        if(document.getElementById("container_orgProgNacionalActualmenteCualInput").getElementsByTagName("input").length===0 && document.getElementById("container_orgProgNacionalActualmenteCualInput_viejo").getElementsByTagName("input").length===1){
            alert("Debe agregar al menos una descripción");
        }
        else{
        ids11.push(id);

        $('#idsEliminados11').val(ids11);

        $('.progNacionalOtro'+id).html(" ");
        }
    }
//fin

//borrado orgProgProvincialActualmente individual
    var ids22 = [];

    function borrarOrgProvActualmente(id){
      
        if(document.getElementById("container_orgProgProvincialesActualmente").getElementsByTagName("input").length==0 && document.getElementById("container_orgProgProvincialesActualmente_viejo").getElementsByTagName("input").length==1){
            alert("Debe agregar al menos una descripción");
        }
        else{
        ids22.push(id);

        $('#idsEliminados22').val(ids22);

        $('.provActualmente'+id).html(" ");
        }
    }
//fin

//borrado orgProgMunipalActualmente individual
    var ids33 = [];

    function borrarOrgMuniActualmente(id){
        if(document.getElementById("container_orgProgMunicipalesActualmente").getElementsByTagName("input").length==0 && document.getElementById("container_orgProgMunicipalesActualmente_viejo").getElementsByTagName("input").length==1){
            alert("Debe agregar al menos una descripción");
        }
        else{

        ids33.push(id);

        $('#idsEliminados33').val(ids33);

        $('.muniActualmente'+id).html(" ");
        }

    }
//fin

//borrado OrgCivilActualmente individual
    var ids44 = [];

    function borrarOrgCivilActualmente(id){
        
        if(document.getElementById("container_orgSocCivilActualmente").getElementsByTagName("input").length==0 && document.getElementById("container_orgSocCivilActualmente_viejo").getElementsByTagName("input").length==1){
            alert("Debe agregar al menos una descripción");
        }
        else{
        ids44.push(id);

        $('#idsEliminados44').val(ids44);

        $('.socCivilActualmente'+id).html(" ");
        }
    }
//fin
window.onload =function (){

	//pregunta de F 1
		var intervinieronOrganismos = document.querySelector('.intervinieronOrganismos_id');
		var intervinieron = document.querySelector('.intervinieron');
		var organismoDerivo = document.querySelector('.organismoDerivo');

		intervinieronOrganismos.addEventListener('change', function(){

			if (intervinieronOrganismos.value == 3) {
				organismoDerivo.style.display = '';
				intervinieron.style.display = '';
			}else if (intervinieronOrganismos.value == 2) {
				organismoDerivo.style.display = '';
				intervinieron.style.display = 'none';
			}else if(intervinieronOrganismos.value == 1){
				organismoDerivo.style.display = 'none';
				intervinieron.style.display = 'none';
			}
		});
	//fin

	// pregunta 1.2
		var orgProgNacionalOtro = document.querySelector('.orgProgNacionalOtro');
		var orgProgNacionalCual = document.querySelector('.orgProgNacionalCual');
		var btnOrgProgNacionalAgregarOtro = document.querySelector('.btnOrgProgNacionalAgregarOtro');
		var btnOrgProgNacionalBorrarOtro = document.querySelector('.btnOrgProgNacionalBorrarOtro');


		orgProgNacionalOtro.addEventListener('click', function(){
			if (orgProgNacionalOtro.checked) {
				orgProgNacionalCual.style.display = '';
				
			}else{
				orgProgNacionalCual.style.display = 'none';
				var orgProgNacionalCualInput = document.querySelectorAll('input[name="orgprognacionalOtro[]"]');
				orgProgNacionalCualInput.forEach(function(element){
					element.value = '';
				});
			}
		});
		var numberIncr_orgProgNacionalCual = 0;
		btnOrgProgNacionalAgregarOtro.addEventListener('click', function(){
            //var divCual = document.getElementById('orgProgNacionalCual');
            var divCual = document.getElementById('container_orgProgNacionalCual');
            $('#container_orgProgNacionalCual').append('<div><br/><label for="">Cual?</label><input type="text" class="form-control ml-3 orgProgNacionalCualInput required" title="Este campo es obligatorio" name="orgprognacionalOtro['+numberIncr_orgProgNacionalCual+']"></div>');//<div id="orgProgNacionalCual" name="orgProgNacionalCual" class="form-group orgProgNacionalCual"></div>
            numberIncr_orgProgNacionalCual++;
		});

		btnOrgProgNacionalBorrarOtro.addEventListener('click', function(){
            
            if(document.getElementById("container_orgProgNacionalCual").getElementsByTagName("input").length===1 && document.getElementById("container_orgProgNacionalCualInput").getElementsByTagName("input").length===0){
                alert("Debe agregar al menos una descripción");
            }
            else{
                //var divCual = document.getElementById('orgProgNacionalCual');
                var divCual = document.getElementById('container_orgProgNacionalCual');
                //divCual.removeChild(divCual.lastChild)
                divCual.removeChild(divCual.lastChild);
                numberIncr_orgProgNacionalCual--;
                alert('Se borro una entrada')
            }

            
		});
	//fin pregunta 1.2

	//pregunta 1.3
		var btnOrgProgProvincialesOtro = document.querySelector('.btnOrgProgProvincialesOtro');
		var btnOrgProgProvincialesBorrarOtro = document.querySelector('.btnOrgProgProvincialesBorrarOtro');

		var numberIncr_orgProgProvinciales = 0;
		btnOrgProgProvincialesOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgProgProvinciales');
			$("#container_orgProgProvinciales").append('<div><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgProgProvinciales['+numberIncr_orgProgProvinciales+']"></div>');
			numberIncr_orgProgProvinciales++;
		});

		btnOrgProgProvincialesBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgProgProvinciales").getElementsByTagName("input").length===1 && document.getElementById("container_orgProgProvinciales_viejo").getElementsByTagName("input").length===0){
                alert("Debe agregar al menos una descripción");
            }
            else{
            
                var divCual = document.getElementById('container_orgProgProvinciales');
                divCual.removeChild(divCual.lastChild)
                numberIncr_orgProgProvinciales--
                alert('Se borro una entrada')
            }
		});
	//fin pregunta 1.3

	//pregunta 1.4
		var btnOrgProgMunicipalesAgregarOtro = document.querySelector('.btnOrgProgMunicipalesAgregarOtro');
		var btnOrgProgMunicipalesBorrarOtro = document.querySelector('.btnOrgProgMunicipalesBorrarOtro');

		var numberIncr_orgProgMunicipales = 0;
		btnOrgProgMunicipalesAgregarOtro.addEventListener('click', function(){
            //var divCual = document.getElementById('orgProgMunicipales');
            var divCual = document.getElementById('container_orgProgMunicipales');
			$("#container_orgProgMunicipales").append('<div id="orgProgMunicipales" class="form-group"><label for="">Organismos/Programas Municipales Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgProgMunicipales['+numberIncr_orgProgMunicipales+']"></div>');
			numberIncr_orgProgMunicipales++;
		});

		btnOrgProgMunicipalesBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgProgMunicipales").getElementsByTagName("input").length===1 && document.getElementById("container_orgProgMunicipales_viejo").getElementsByTagName("input").length===0){
                alert("Debe agregar al menos una descripción");
            }
            else{
                
                var divCual = document.getElementById('container_orgProgMunicipales');
                divCual.removeChild(divCual.lastChild)
                numberIncr_orgProgMunicipales--;
                alert('Se borro una entrada')
            }
		});
	//fin pregunta 1.4

	//pregunta 1.6
		var btnOrgSocCivilAgregarOtro = document.querySelector('.btnOrgSocCivilAgregarOtro');
		var btnOrgSocCivilBorrarOtro = document.querySelector('.btnOrgSocCivilBorrarOtro');
		var numberIncr_orgSocCivil = 0;
		btnOrgSocCivilAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgSocCivil');
			$("#container_orgSocCivil").append('<div id="orgSocCivil" class="form-group"><label for="">Organizaciones de la Sociedad Civil Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgSocCivil['+numberIncr_orgSocCivil+']"></div>');
			numberIncr_orgSocCivil++;
		});

		btnOrgSocCivilBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgSocCivil").getElementsByTagName("input").length===1 && document.getElementById("container_orgSocCivil_viejo").getElementsByTagName("input").length===0){
                alert("Debe agregar al menos una descripción");
            }
            else{
                var divCual = document.getElementById('container_orgSocCivil');
                divCual.removeChild(divCual.lastChild)
                numberIncr_orgSocCivil--;
                alert('Se borro una entrada')
            }
		});
	//fin pregunta 1.6

	// pregunta 2
		var socioEconomicaCheckbox = document.querySelector('.socioEconomicaCheckbox');
		var socioEconomica = document.querySelector('.socioEconomica');
		var socioEconomicaCual = document.querySelector('.socioEconomicaCual');
		var socioEconomicaCualInput = document.querySelector('.socioEconomicaCualInput');
		var deSocioEconomica = document.querySelectorAll('input[name="socioeconomic_id[]"]');

		socioEconomicaCheckbox.addEventListener('click', function(){
			if (socioEconomicaCheckbox.checked) {
				socioEconomica.style.display = '';
				deSocioEconomica[6].addEventListener('click', function(){
					if (this.checked) {
					socioEconomicaCual.style.display = '';
					}else{
						socioEconomicaCual.style.display = 'none';
						socioEconomicaCualInput.value = '';
					}
				});
			}else{
				socioEconomica.style.display = 'none';
				socioEconomicaCual.style.display = 'none';
				socioEconomicaCualInput.value = '';
				deSocioEconomica.forEach(function(element){
						element.checked = false
					});
			}
		});
	// fin pregunta 2

	//pregunta de F 3
		var intervinieronOrganismosActualmente = document.querySelector('.intervinieronOrganismosActualmente_id');
		var intervinieronActualmente = document.querySelector('.intervinieronActualmente');

		intervinieronOrganismosActualmente.addEventListener('change', function(){
			if (intervinieronOrganismosActualmente.value == 1) {
				intervinieronActualmente.style.display = '';
			}else{
				intervinieronActualmente.style.display = 'none';
			}
		});
	//fin

	//pregunta 3.2
		var orgProgNacionalActualmenteOtro = document.querySelector('.orgProgNacionalActualmenteOtro');
		var orgprognacionalActualmenteCual = document.querySelector('.orgprognacionalActualmenteCual');
		var btnOrgprognacionalActualmenteAgregarOtro = document.querySelector('.btnOrgprognacionalActualmenteAgregarOtro');
		var btnOrgprognacionalActualmenteBorrarOtro = document.querySelector('.btnOrgprognacionalActualmenteBorrarOtro');


		orgProgNacionalActualmenteOtro.addEventListener('click', function(){
			if (orgProgNacionalActualmenteOtro.checked) {
				orgprognacionalActualmenteCual.style.display = '';
				
			}else{
				orgprognacionalActualmenteCual.style.display = 'none';
				var orgProgNacionalActualmenteCualInput = document.querySelectorAll('input[name="orgprognacionalActualmenteOtro[]"]');
				orgProgNacionalActualmenteCualInput.forEach(function(element){
					element.value = '';
				});
			}
			
		});

		var numberIncr_orgprognacionalActualmenteCual = 0;
		btnOrgprognacionalActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgProgNacionalActualmenteCualInput');
			$("#container_orgProgNacionalActualmenteCualInput").append('<div id="orgprognacionalActualmenteCual" class="form-group orgprognacionalActualmenteCual"><label for="">Cual?</label><input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput required" title="Este campo es obligatorio" name="orgprognacionalActualmenteOtro['+numberIncr_orgprognacionalActualmenteCual+']"></div>');
			numberIncr_orgprognacionalActualmenteCual++;
		});

		btnOrgprognacionalActualmenteBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgProgNacionalActualmenteCualInput").getElementsByTagName("input").length==1 && document.getElementById("container_orgprognacionalActualmenteCual_viejo").getElementsByTagName("input").length==0){
                alert("Debe agregar al menos una descripción");
            }
            else{
            
            var divCual = document.getElementById('container_orgProgNacionalActualmenteCualInput');
			divCual.removeChild(divCual.lastChild)
			numberIncr_orgprognacionalActualmenteCual--
            alert('Se borro una entrada')
            }
		});
	//fin pregunta 3.2

	//pregunta 3.3
		var btnOrgProgProvincialesActualmenteAgregarOtro = document.querySelector('.btnOrgProgProvincialesActualmenteAgregarOtro');
		var btnOrgProgProvincialesActualmenteBorrarOtro = document.querySelector('.btnOrgProgProvincialesActualmenteBorrarOtro');

		var numberIncr_orgProgProvincialesActualmente = 0;
		btnOrgProgProvincialesActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgProgProvincialesActualmente');
			$("#container_orgProgProvincialesActualmente").append('<div id="orgProgProvincialesActualmente" class="form-group"><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgProgProvincialesActualmente['+orgProgProvincialesActualmente+']"></div>');
			numberIncr_orgProgProvincialesActualmente++
		});

		btnOrgProgProvincialesActualmenteBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgProgProvincialesActualmente").getElementsByTagName("input").length==1 && document.getElementById("container_orgProgProvincialesActualmente_viejo").getElementsByTagName("input").length==0){
                alert("Debe agregar al menos una descripción");
            }
            else{
                    var divCual = document.getElementById('container_orgProgProvincialesActualmente');
                    divCual.removeChild(divCual.lastChild)
                    numberIncr_orgProgProvincialesActualmente--;
                    alert('Se borro una entrada')
            }
		});
	//fin pregunta 3.3

	//pregunta 3.4
		var btnOrgProgMunicipalesActualmenteAgregarOtro = document.querySelector('.btnOrgProgMunicipalesActualmenteAgregarOtro');
		var btnOrgProgMunicipalesActualmenteBorrarOtro = document.querySelector('.btnOrgProgMunicipalesActualmenteBorrarOtro');
		var numberIncr_orgProgMunicipalesActualmente = 0;
		btnOrgProgMunicipalesActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgProgMunicipalesActualmente');
			$("#container_orgProgMunicipalesActualmente").append('<div id="orgProgMunicipalesActualmente" class="form-group"><label for="">Organismos/Programas Municipales Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgProgMunicipalesActualmente['+numberIncr_orgProgMunicipalesActualmente+']"></div>');
			numberIncr_orgProgMunicipalesActualmente++;
		});

		btnOrgProgMunicipalesActualmenteBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgProgMunicipalesActualmente").getElementsByTagName("input").length==1 && document.getElementById("container_orgProgMunicipalesActualmente_viejo").getElementsByTagName("input").length==0){
                alert("Debe agregar al menos una descripción");
            }
            else{
                var divCual = document.getElementById('container_orgProgMunicipalesActualmente');
                divCual.removeChild(divCual.lastChild)
                numberIncr_orgProgMunicipalesActualmente--;
                alert('Se borro una entrada')
            }
		});
	//fin pregunta 3.4

	//pregunta 3.1.6
		var btnOrgSocCivilActualmenteAgregarOtro = document.querySelector('.btnOrgSocCivilActualmenteAgregarOtro');
		var btnOrgSocCivilActualmenteBorrarOtro = document.querySelector('.btnOrgSocCivilActualmenteBorrarOtro');

		var numberIncr_orgSocCivilActualmente = 0;
		btnOrgSocCivilActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('container_orgSocCivilActualmente');
			$("#container_orgSocCivilActualmente").append('<div id="orgSocCivilActualmente" class="form-group"><label for="">Organizaciones de la Sociedad Civil Otro:</label><input type="text" class="form-control ml-3 required" title="Este campo es obligatorio" name="orgSocCivilActualmente['+numberIncr_orgSocCivilActualmente+']"></div>');
			numberIncr_orgSocCivilActualmente++;
		});

		btnOrgSocCivilActualmenteBorrarOtro.addEventListener('click', function(){
            if(document.getElementById("container_orgSocCivilActualmente").getElementsByTagName("input").length==1 && document.getElementById("container_orgSocCivilActualmente_viejo").getElementsByTagName("input").length==0){
                alert("Debe agregar al menos una descripción");
            }
            else{
            var divCual = document.getElementById('container_orgSocCivilActualmente');
			divCual.removeChild(divCual.lastChild)
			numberIncr_orgSocCivilActualmente++;
            alert('Se borro una entrada')
            }
		});
	//fin pregunta 3.1.6

};


$("#formularioF").validate({ //se definen las opciones de validaciÃ³n para el formulario1
	debug:false,
	errorClass: 'error_cliente',
	ignore:":not(:visible)",
	rules: { //se definen las reglas
		intervinieronOrganismos_id: {
				   required:true
			   },
		/*'asistencia_id[]': {
			required:true
		},*/
		/*"orgjudicials_id[]": {
			required:true
		}, */
		"orgprognacionals_id[]": {
			required:true
		},
		"orgprognacionalOtro[]": {
			required:true
        },
        "orgprognacionalOtro_viejo[]": {
			required:true
        },
		"orgProgProvinciales[]" : {
			required:true
        },
        "orgProgProvinciales_viejo[]": {
			required:true
		}, 
		'orgProgMunicipales[]' : {
			required:true
        }, 
        'orgProgMunicipales_viejo[]' : {
			required:true
		}, 
	/*	"policias_id[]": {
			required:true
        }, */
        "orgSocCivil_viejo[]": {
			required:true
		}, 
		"orgSocCivil[]": {
			required:true
		}, 
	/*	"asistencia_id[]": {
			required:true
		},*/
		"socioeconomic_id[]": {
			required:true
		},
		socioeconomicaCual : {
			required:true
		},
		intervinieronOrganismosActualmente_id: {
			required:true
		},
		/*'orgjudicialactualmentes_id[]': {
			required:true
		},*/
		"orgprognacionalactualmente_id[]": {
			required:true
		},
		'orgprognacionalActualmenteOtro[]': {
			required:true
		},
		"orgProgProvincialesActualmente[]": {
			required:true
        },
        "orgProgProvincialesActualmente_viejo[]": {
			required:true
        },
		"orgProgMunicipalesActualmente[]": {
			required:true
        },
        "orgProgMunicipalesActualmente_viejo[]": {
			required:true
		},
	/*	"policiaactualmentes_id[]": {
			required:true
		},*/
		"orgSocCivilActualmente[]": {
			required:true
        },
        "orgSocCivilActualmente_viejo[]": {
			required:true
		},
	   },

	   messages: { //se definen los mensajes a mostrar
		intervinieronOrganismos_id:{
			   required:"Este campo es obligatorio",
		   },
		/*   'asistencia_id[]': {
			required:"Seleccione alguna de las opciones",
		},*/
	/*	"orgjudicials_id[]": {
			required:"Seleccione alguna de las opciones",
		},*/
		"orgprognacionals_id[]": {
			required:"Seleccione alguna de las opciones",
		},  
		"orgprognacionalOtro[]": {
			required:"Este campo es obligatorio",
        },
        "orgprognacionalOtro_viejo[]": {
			required:"Este campo es obligatorio",
        }, 
		"orgProgProvinciales[]" : {
			required:"Este campo es obligatorio",
        },
        "orgProgProvinciales_viejo[]": {
			required:"Este campo es obligatorio",
		},
		'orgProgMunicipales[]' : {
			required:"Este campo es obligatorio",
        },
         
        'orgProgMunicipales_viejo[]' : {
			required:"Este campo es obligatorio",
		},
	/*	"policias_id[]": {
			required:"Seleccione alguna de las opciones",
        }, */
        "orgSocCivil_viejo[]": {
			required:"Este campo es obligatorio",
		}, 
		"orgSocCivil[]": {
			required:"Este campo es obligatorio",
		}, 
	/*	"asistencia_id[]": {
			required:"Seleccione alguna de las opciones",
		}, */
		"socioeconomic_id[]": {
			required:"Seleccione alguna de las opciones",
		}, 
		socioeconomicaCual : {
			required:"Este campo es obligatorio",
		},
		intervinieronOrganismosActualmente_id: {
			required:"Este campo es obligatorio",
		},
	/*	'orgjudicialactualmentes_id[]': {
			required:"Seleccione alguna de las opciones",
		},*/
		"orgprognacionalactualmente_id[]": {
			required:"Seleccione alguna de las opciones",
		},
		'orgprognacionalActualmenteOtro[]': {
			required:"Este campo es obligatorio",
		},
		"orgProgProvincialesActualmente[]": {
			required:"Este campo es obligatorio",
        },
        "orgProgProvincialesActualmente_viejo[]": {
			required:"Este campo es obligatorio",
        },
		"orgProgMunicipalesActualmente[]": {
			required:"Este campo es obligatorio",
        },
        "orgProgMunicipalesActualmente_viejo[]": {
			required:"Este campo es obligatorio",
		},
	/*	"policiaactualmentes_id[]": {
			required:"Seleccione alguna de las opciones",
		},*/
		"orgSocCivilActualmente[]": {
			required:"Este campo es obligatorio",
        },
        "orgSocCivilActualmente_viejo[]": {
			required:"Este campo es obligatorio",
		},

		


	   }
   });

