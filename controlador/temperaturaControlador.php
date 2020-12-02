<?php 

	/**
	 * 
	 */
	class temperaturaControlador{
		
		static public function ctrMostrarTemp($item,$valor){

			$tabla = "temp_habitaciones";

			$respuesta = temperaturaModelo::mdlMostrarTemp($tabla, $item, $valor);

			return $respuesta;
		
		}

		// MOSTRAR GRAFICO DE TEMPERATURA 
		static public function ctrHistoricoTemperatura($tabla){			

			$respuesta = temperaturaModelo::mdlHistoricoTemperatura($tabla);

			return $respuesta;
		}


		static public function ctrCrearCuarto(){
				
			if (isset($_POST["nuevoCuarto"])) {

				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["nuevoCuarto"])) {

                	$tabla = "temp_habitaciones";

                	$datos = array("nombre" => $_POST["nuevoCuarto"],
                					"min_temp" => $_POST["minTemp"],
                					"min_hum" => $_POST["minHum"],
									"min_tvo" => $_POST["minGas"],
									"max_temp" => $_POST["maxTemp"],
									"max_hum" => $_POST["maxHum"],
									"max_tvo" => $_POST["maxGas"]);


                	$respuesta = temperaturaModelo::mdlIngresarCuarto($tabla, $datos);


                    if($respuesta == "ok"){

                    	$color="tituloWhite";

	                        echo "<script>
	                                    Swal.fire({
											
	                                        type: 'success',
	                                        html: '<h3 class=".$color.">¡El cuarto se ingreso correctamente!</h3>',
	                                        background: '#343a40',
	                                        showConfirmButton: true,
	                                        confirmButtonColor: '#28a745',
	                                        confirmButtonText: 'Ok',
	                                        closeOnConfirm: false
	                                        

	                                        }).then((result)=>{

	                                        if(result.value){

	                                           window.location = 'temperatura';
	                                        }      
	                                    });

	                              </script>";

			            }else{

			            	$color="tituloWhite";

		                        echo "<script>

			                            Swal.fire({

			                                type: 'error',
			                                html: '<h3 class=".$color.">¡El usuario no puede ir vacio o con carecteres especiales!</h3>',
			                                background: '#343a40',
			                                showConfirmButton: true,
			                                confirmButtonColor: '#dc3545',
			                                confirmButtonText: 'Ok',
			                                closeOnConfirm: false 

			                                }).then((result)=>{

			                                if(result.value){

			                                    window.location = 'temperatura';

			                                }  

			                            });

			                        </script>";
	                }
	            }    	
                	
            }

		}


		static public function ctrBorrarCuarto(){

			if (isset($_GET["idCuarto"])) {
				
				$tabla = "temp_habitaciones";

				$datos = $_GET["idCuarto"];

				if ($_GET["idCuarto"] != null) {

					$respuesta = temperaturaModelo::mdlBorrarCuarto($tabla, $datos);

					if ($respuesta == "ok") {

					$color="tituloWhite";

						echo "<script>
					            Swal.fire({

					                type: 'success',
					                html: '<h3 class=".$color.">¡El cuarto se a borrado correctamente!</h3>',
					                background: '#343a40',
					                showConfirmButton: true,
					                confirmButtonColor: '#28a745',
					                confirmButtonText: 'Ok',
					                closeOnConfirm: false,
					                customClass: {

										title: 'title-alert'
									},

					                }).then((result)=>{

					                    if(result.value){

					                        window.location = 'temperatura';
					                    }      
					                });

					            </script>";

						
					}

					
				}


			}

		}


		static public function ctrEditarTemperatura(){
			
				
			if (isset($_POST["editarCuarto"])) {

				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["editarCuarto"])) {
	                    

                    $tabla = "temp_habitaciones";
                    $idTemp = $_POST['idActual'];
					$datos = array("id" => $idTemp,
									"nombre" => $_POST["editarCuarto"],
		                    		"min_temp" => $_POST["editarMinTemp"],
		                    		"min_hum" => $_POST["editarMinHum"],
									"min_tvo" => $_POST["editarMinGas"],
		                    		"max_temp" => $_POST["editarMaxTemp"],
		                    		"max_hum" => $_POST["editarMaxHum"],
		                    		"max_tvo" => $_POST["editarMaxGas"]);

		            $respuesta = temperaturaModelo::mdlEditarTemperatura($tabla, $datos);

		            if($respuesta == "ok"){

                        echo "<script>
                                      Swal.fire({

                                          type: 'success',
                                          title: '¡El usuario se ingreso correctamente!',
                                          background: '#343a40',
                                          showConfirmButton: true,
                                          confirmButtonColor: '#28a745',
                                          confirmButtonText: 'Ok',
                                          closeOnConfirm: false 

                                          }).then((result)=>{

                                            if(result.value){

                                              window.location = 'temperatura';
                                            }      
                                        });

                              </script>";
			
					}else{

						echo "<script>

	                        Swal.fire({

	                            type: 'error',
	                            title: '¡El nombre no puede ir vacio o con carecteres especiales!',
	                            background: '#343a40',
	                            showConfirmButton: true,
	                            confirmButtonColor: '#dc3545',
	                            confirmButtonText: 'Ok',
	                            closeOnConfirm: false 

	                            }).then((result)=>{

	                            if(result.value){

	                                window.location = 'temperatura';

	                            }  

	                        });

	                        </script>";

					}
				}

			}

		}

	}


