<?php 

/**
 * 
 */
class ServiciosControlador 
{
	
	/* ================================================================
        		en este metodo puede consultar cualquier tabla de la BD
        ================================================================= */
		static public function ctrMostrarTabla($tabla,$itemEnergia,$datoEnergia){

			$respuesta = modeloServicios::mdlMostrarServicio($tabla,$itemEnergia,$datoEnergia);

			return $respuesta;
		
		}

		static public function ctrIngresarDatosGas(){
				
			if (isset($_POST["nuevoNumeroMedidorGas"])){

				$tabla = "datos_gas";

            	$datos = array("numeroMedidorGas" => $_POST["nuevoNumeroMedidorGas"],
            					"factorCorreccion" => $_POST["nuevoFactorCorreccion"]);

            	$respuesta = modeloServicios::mdlIngresarDatosGas($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>

		                                    Swal.fire({
												
		                                        type: 'success',
		                                        title: '<h3 class=".$color.">¡Los datos se ingresaron correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se ingresaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrIngresarDatosAgua(){
				
			if (isset($_POST["nuevoNumeroMedidorAgua"])){
				$tabla = "datos_agua";
				

            	$datos = array("numeroMedidorAgua" => $_POST["nuevoNumeroMedidorAgua"],

		            		   "tarifaAlcantarilladoSuntuario" => $_POST["nuevoTarifaAlcantarilladoSuntuario"],

		            		   "tarifaAlcantarilladoBasico" => $_POST["nuevoTarifaAlcantarilladoBasico"],

            		           "tarifaAlcantarilladoComplementario" => $_POST["nuevoTarifaAlcantarilladoComplementario"],

            				   "tarifaAcueductoSuntuario" => $_POST["nuevoTarifaAcueductoSuntuario"],

            				   "tarifaAcueductoBasico" => $_POST["nuevoTarifaAcueductoBasico"],

            				   "tarifaAcueductoComplementario" => $_POST["nuevoTarifaAcueductoComplementario"],

            				   "cargoFijoLiquidacionAcueducto" => $_POST["nuevoCargoFijoLiquidacionAcueducto"],

            				   "cargoFijoLiquidacionAlcantarillado" => $_POST["nuevoCargoFijoLiquidacionAlcantarillado"]);

            	$respuesta = modeloServicios::mdlIngresarDatosAgua($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        title: '<h3 class=".$color.">¡Los datos se ingresaron correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se ingresaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrIngresarDatosEnergia(){
				
			if (isset($_POST["nuevoNumeroMedidorEnergia"])){

				$tabla = "datos_energia";
	
            	$datos = array("numeroMedidorEnergia" => $_POST["nuevoNumeroMedidorEnergia"],
		            		   "tarifaEnergia" => $_POST["nuevaTarifaEnergia"]);

            	$respuesta = modeloServicios::mdlIngresarDatosEnergia($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        title: '<h3 class=".$color.">¡Los datos se ingresaron correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se ingresaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }

			}
		}


		/* ================================================================
        		MOSTRAR AJAX SERVICIOS
        ================================================================= */
		static public function ctrMostrar($tabla,$item,$valor){

			$respuesta = modeloServicios::mdlMostrar($tabla, $item, $valor);

			return $respuesta;
		
		} 

		/* ================================================================
        		MODIFICAR GAS
        ================================================================= */

		static public function ctrModificarDatosGas(){
			if (isset($_POST["modificarNumeroMedidorGas"])){

				$tabla = "datos_gas";

            	$datos = array("numeroMedidorGas" => $_POST["modificarNumeroMedidorGas"],
            					"factorCorreccion" => $_POST["modificarFactorCorreccion"]);

            	$respuesta = modeloServicios::mdlModificarDatosGas($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>

                                    Swal.fire({
										
                                        type: 'success',
                                        title: '<h3 class=".$color.">¡Los datos se modificaron correctamente!</h3>',
                                        background: '#343a40',
                                        showConfirmButton: true,
                                        confirmButtonColor: '#28a745',
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: false
                                        

                                        }).then((result)=>{

                                        if(result.value){

                                           window.location = 'serviciosPublicos';
                                        }      
                                    });

                                </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se modificaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrModificarDatosAgua(){
				
			if (isset($_POST["modificarNumeroMedidorAgua"])){
				$tabla = "datos_agua";
				

            	$datos = array("numeroMedidorAgua" => $_POST["modificarNumeroMedidorAgua"],

		            		   "tarifaAlcantarilladoSuntuario" => $_POST["modificarTarifaAlcantarilladoSuntuario"],

		            		   "tarifaAlcantarilladoBasico" => $_POST["modificarTarifaAlcantarilladoBasico"],

            		           "tarifaAlcantarilladoComplementario" => $_POST["modificarTarifaAlcantarilladoComplementario"],

            				   "tarifaAcueductoSuntuario" => $_POST["modificarTarifaAcueductoSuntuario"],

            				   "tarifaAcueductoBasico" => $_POST["modificarTarifaAcueductoBasico"],

            				   "tarifaAcueductoComplementario" => $_POST["modificarTarifaAcueductoComplementario"],

            				   "cargoFijoLiquidacionAcueducto" => $_POST["modificarCargoFijoLiquidacionAcueducto"],

            				   "cargoFijoLiquidacionAlcantarillado" => $_POST["modificarCargoFijoLiquidacionAlcantarillado"]);

            	$respuesta = modeloServicios::mdlModificarDatosAgua($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        title: '<h3 class=".$color.">¡Los datos se modificaron correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se modificaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrModificarDatosEnergia(){
				
			if (isset($_POST["modificarNumeroMedidorEnergia"])){

				$tabla = "datos_energia";
	
            	$datos = array("numeroMedidorEnergia" => $_POST["modificarNumeroMedidorEnergia"],
		            		   "tarifaEnergia" => $_POST["modificarTarifaEnergia"]);

            	$respuesta = modeloServicios::mdlModificarDatosEnergia($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        title: '<h3 class=".$color.">¡Los datos se modificaron correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡Los datos no se modificaron correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }

			}
		} 
		
}