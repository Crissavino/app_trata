//JS para el EDIT

	//pregunta de F 1
		var intervinieronOrganismos = document.querySelector('.intervinieronOrganismos');
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
		var intervinieronOrganismosActualmente = document.querySelector('.intervinieronOrganismosActualmente');
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
			ids1.push(id);

			$('#idsEliminados1').val(ids1);

			$('.otroProgNacionalOtro'+id).html(" ");

		}
	//fin

	//borrado orgProgProvincial individual
		var ids2 = [];

		function borrarOrgProv(id){
			ids2.push(id);

			$('#idsEliminados2').val(ids2);

			$('.programaProv'+id).html(" ");

		}
	//fin

	//borrado orgProgMunipal individual
		var ids3 = [];

		function borrarOrgMuni(id){
			ids3.push(id);

			$('#idsEliminados3').val(ids3);

			$('.programaMuni'+id).html(" ");

		}
	//fin

	//borrado OrgCivil individual
		var ids4 = [];

		function borrarOrgCivil(id){
			ids4.push(id);

			$('#idsEliminados4').val(ids4);

			$('.organizacion'+id).html(" ");

		}
	//fin

	//borrado orgProgNacionalOtroActualmente individual
		var ids11 = [];

		function borrarProgNacionalOtro(id){
			ids11.push(id);

			$('#idsEliminados11').val(ids11);

			$('.progNacionalOtro'+id).html(" ");

		}
	//fin

	//borrado orgProgProvincialActualmente individual
		var ids22 = [];

		function borrarOrgProvActualmente(id){
			ids22.push(id);

			$('#idsEliminados22').val(ids22);

			$('.provActualmente'+id).html(" ");

		}
	//fin

	//borrado orgProgMunipalActualmente individual
		var ids33 = [];

		function borrarOrgMuniActualmente(id){
			ids33.push(id);

			$('#idsEliminados33').val(ids33);

			$('.muniActualmente'+id).html(" ");

		}
	//fin

	//borrado OrgCivilActualmente individual
		var ids44 = [];

		function borrarOrgCivilActualmente(id){
			ids44.push(id);

			$('#idsEliminados44').val(ids44);

			$('.socCivilActualmente'+id).html(" ");

		}
	//fin

window.onload =function (){

	//pregunta de F 1
		var intervinieronOrganismos = document.querySelector('.intervinieronOrganismos');
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

		btnOrgProgNacionalAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgNacionalCual');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgProgNacionalCual" class="form-group orgProgNacionalCual"><label for="">Cual?</label><input type="text" class="form-control ml-3 orgProgNacionalCualInput" name="orgprognacionalOtro[]"></div>');

		});

		btnOrgProgNacionalBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgNacionalCual');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 1.2

	//pregunta 1.3
		var btnOrgProgProvincialesOtro = document.querySelector('.btnOrgProgProvincialesOtro');
		var btnOrgProgProvincialesBorrarOtro = document.querySelector('.btnOrgProgProvincialesBorrarOtro');

		btnOrgProgProvincialesOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgProvinciales');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgProgProvinciales" class="form-group"><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3" name="orgProgProvinciales[]"></div>');
		});

		btnOrgProgProvincialesBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgProvinciales');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 1.3

	//pregunta 1.4
		var btnOrgProgMunicipalesAgregarOtro = document.querySelector('.btnOrgProgMunicipalesAgregarOtro');
		var btnOrgProgMunicipalesBorrarOtro = document.querySelector('.btnOrgProgMunicipalesBorrarOtro');

		btnOrgProgMunicipalesAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgMunicipales');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgProgMunicipales" class="form-group"><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3" name="orgProgMunicipales[]"></div>');
		});

		btnOrgProgMunicipalesBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgMunicipales');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 1.4

	//pregunta 1.6
		var btnOrgSocCivilAgregarOtro = document.querySelector('.btnOrgSocCivilAgregarOtro');
		var btnOrgSocCivilBorrarOtro = document.querySelector('.btnOrgSocCivilBorrarOtro');

		btnOrgSocCivilAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgSocCivil');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgSocCivil" class="form-group"><label for="">Organizaciones de la Sociedad Civil Otro:</label><input type="text" class="form-control ml-3" name="orgSocCivil[]"></div>');
		});

		btnOrgSocCivilBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgSocCivil');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
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
		var intervinieronOrganismosActualmente = document.querySelector('.intervinieronOrganismosActualmente');
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

		btnOrgprognacionalActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgprognacionalActualmenteCual');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgprognacionalActualmenteCual" class="form-group orgprognacionalActualmenteCual"><label for="">Cual?</label><input type="text" class="form-control ml-3 orgProgNacionalActualmenteCualInput" name="orgprognacionalActualmenteOtro[]"></div>');

		});

		btnOrgprognacionalActualmenteBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgprognacionalActualmenteCual');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 3.2

	//pregunta 3.3
		var btnOrgProgProvincialesActualmenteAgregarOtro = document.querySelector('.btnOrgProgProvincialesActualmenteAgregarOtro');
		var btnOrgProgProvincialesActualmenteBorrarOtro = document.querySelector('.btnOrgProgProvincialesActualmenteBorrarOtro');

		btnOrgProgProvincialesActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgProvincialesActualmente');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgProgProvincialesActualmente" class="form-group"><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3" name="orgProgProvincialesActualmente[]"></div>');
		});

		btnOrgProgProvincialesActualmenteBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgProvincialesActualmente');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 3.3

	//pregunta 3.4
		var btnOrgProgMunicipalesActualmenteAgregarOtro = document.querySelector('.btnOrgProgMunicipalesActualmenteAgregarOtro');
		var btnOrgProgMunicipalesActualmenteBorrarOtro = document.querySelector('.btnOrgProgMunicipalesActualmenteBorrarOtro');

		btnOrgProgMunicipalesActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgMunicipalesActualmente');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgProgMunicipalesActualmente" class="form-group"><label for="">Organismos/Programas Provinciales Otro:</label><input type="text" class="form-control ml-3" name="orgProgMunicipalesActualmente[]"></div>');
		});

		btnOrgProgMunicipalesActualmenteBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgProgMunicipalesActualmente');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 3.4

	//pregunta 3.1.6
		var btnOrgSocCivilActualmenteAgregarOtro = document.querySelector('.btnOrgSocCivilActualmenteAgregarOtro');
		var btnOrgSocCivilActualmenteBorrarOtro = document.querySelector('.btnOrgSocCivilActualmenteBorrarOtro');

		btnOrgSocCivilActualmenteAgregarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgSocCivilActualmente');
			divCual.insertAdjacentHTML('beforeend', '<div id="orgSocCivilActualmente" class="form-group"><label for="">Organizaciones de la Sociedad Civil Otro:</label><input type="text" class="form-control ml-3" name="orgSocCivilActualmente[]"></div>');
		});

		btnOrgSocCivilActualmenteBorrarOtro.addEventListener('click', function(){
			var divCual = document.getElementById('orgSocCivilActualmente');
			divCual.removeChild(divCual.lastChild)
			alert('Se borro una entrada')
		});
	//fin pregunta 3.1.6



};