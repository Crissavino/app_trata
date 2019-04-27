{{-- Esto esta funcinando perfecto NO TOCAR--}}
	<table>
	    <thead>
	        <h1>Estadísticas</h1>
	    </thead>
	    <tbody>
	    	<tr>
	    		<th>Número de carpeta</th>
	    		<th>Fecha de ingreso</th>
	    		<th>Modalidad de ingreso</th>
	    		<th>Estado actual del caso</th>
	    		<th>Motivo de cierre</th>
	    		<th>Caratulación judicial</th>
	    		<th>Género de la víctima</th>
	    		<th>País de nacimiento de la víctima</th>
				<th>Franja etaria de la víctima</th>
				<th>Calificación específica</th>				
	    		<th>Finalidad de explotación</th>
	    		<th>País de captación</th>
	    		<th>Localidad de explotación</th>
				<th>Tipo de víctima</th>				
				
	    	</tr>
	    	@foreach ($carpetas as $carpeta)
	        	<tr>
	    			<td>
	    				@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					{{$formA->datos_numero_carpeta}}
	        				@endif
	    				@endforeach
					</td>
					<td>
	        			@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					{{ Carbon\Carbon::parse($formA->datos_fecha_ingreso)->format('d/m/Y')}}
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					@foreach ($datosModalidad as $modalidad)
	        						@if ($formA->modalidad_id == $modalidad->id)
	        							{{ $modalidad->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	    			<td>
	        			@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					@foreach ($datosEstadoCaso as $estadoCaso)
	        						@if ($formA->estadocaso_id == $estadoCaso->id)
	        							{{ $estadoCaso->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					@foreach ($datosMotivoCierre as $motivoCierre)
	        						@if ($formA->motivocierre_id == $motivoCierre->id)
	        							{{ $motivoCierre->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsA as $formA)
	        				@if ($formA->id == $carpeta->aformulario_id)
	        					@foreach ($datosCaratulacion as $caratulacion)
	        						@if ($formA->caratulacionjudicial_id == $caratulacion->id)
	        							{{ $caratulacion->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsB as $formB)
	        				@if ($formB->id == $carpeta->bformulario_id)
	        					@foreach ($datosGenero as $genero)
	        						@if ($formB->genero_id == $genero->id)
	        							{{ $genero->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsB as $formB)
	        				@if ($formB->id == $carpeta->bformulario_id)
	        					{{ $formB->paisNacimiento }}
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsB as $formB)
	        				@if ($formB->id == $carpeta->bformulario_id)
	        					@foreach ($datosFranjaEtaria as $franjaEtaria)
	        						@if ($formB->franjaetaria_id == $franjaEtaria->id)
	        							{{ $franjaEtaria->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
					</td>
					<td>
	        			@foreach ($formsD as $formD)
	        				@if ($formD->id == $carpeta->dformulario_id)
	        					@foreach ($datosCalificacionespecificas as $calificacionespecificas)
	        						@if ($formD->calificacionespecifica_id == $calificacionespecificas->id)
	        							{{ $calificacionespecificas->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsD as $formD)
	        				@if ($formD->id == $carpeta->dformulario_id)
	        					@foreach ($datosFinalidad as $finalidad)
	        						@if ($formD->finalidad_id == $finalidad->id)
	        							{{ $finalidad->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	    			</td>
	        		<td>
	        			@foreach ($formsD as $formD)
	        				@if ($formD->id == $carpeta->dformulario_id)
	        					{{ $formD->paisCaptacion }}
	        				@endif
	    				@endforeach
	        		</td>
	        		<td>
	        			@foreach ($formsD as $formD)
	        				@if ($formD->id == $carpeta->dformulario_id)
	        					{{ $formD->ciudadExplotacion }}
	        				@endif
	    				@endforeach
	        		</td>
	        		<td>
	        			@foreach ($formsD as $formD)
	        				@if ($formD->id == $carpeta->dformulario_id)
	        					@foreach ($datosTipoVictima as $tipoVictima)
	        						@if ($formD->tipovictima_id == $tipoVictima->id)
	        							{{ $tipoVictima->nombre }}
	        						@endif
	        					@endforeach
	        				@endif
	    				@endforeach
	        		</td>
	        	</tr>
	    	@endforeach
	    </tbody>
	</table>
{{-- FIN --}}