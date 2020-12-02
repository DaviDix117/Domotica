<?php 

	/**
	 * 
	 */
	class usuariosControlador{
		/*=============================================
		=            INGRESO DE USUARIO            =
		=============================================*/
				
		public function ctrIngreso(){

			if (isset($_POST["ingUsuario"])) {
				
				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {


					$pass=$_POST["ingPassword"];
					
					$tabla = "usuarios";
					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = usuarioModelo::mdlMostrarUsuario($tabla, $item, $valor);

					$contra=false;

					if(password_verify($pass,$respuesta["password"])){

						$contra=true;

					}else{

						$contra = false;

					}


					if ($respuesta["usuario"] == $_POST["ingUsuario"] && $contra == true) {

						if($respuesta["estado"] == 1){

							$_SESSION["iniciarSesion"] = "ok";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["usuario"] = $respuesta["usuario"];

							/*=============================================
							= REGISTRAR FECHA HASTA EL ULTIMO LOGIN    =
							=============================================*/

							date_default_timezone_set('America/Bogota');

							$fecha = date('Y-m-d');

							$hora = date('H:i:s');

							$fechaActual = $fecha.' '.$hora;

							$item1="ultimo_login";
							$valor1= $fechaActual;

							$item2 ="id";
							$valor2 =$respuesta["id"];

							$ultimoLogin = usuarioModelo:: mdlActualizarUsuarios($tabla, $item1, $valor1, $item2, $valor2);

							if ($ultimoLogin == "ok") {
								
								echo '<script>

									window.location = "inicio";

									</script>';
							}
						
						}else{

							$color="tituloWhite";
							echo"<script>

	                            Swal.fire({

	                                type: 'error',
	                                html: '<h2 class=".$color.">¡Su Estado no es Activo!</h2>',
	                                background: '#343a40',
	                                showConfirmButton: true,
	                                confirmButtonColor: '#dc3545',
	                                confirmButtonText: 'Ok',
	                                closeOnConfirm: false  
	                                          
	                                        });

	                              </script>";
						}

					}else{

						$color="tituloWhite";
						echo"<script>
                                     swal.fire({

                                          type: 'error',
                                          html: '<h3 class=".$color.">¡El usuario o contraseña incorrecta!</h3>',
                                          background: '#343a40',
                                          showConfirmButton: true,
                                          confirmButtonColor: '#dc3545',
                                          confirmButtonText: 'Ok',
                                          closeOnConfirm: false  
                                          
                                        });

                              </script>";  
					}
				}
			}
		}




		/* ================================================================
        Registro de usuario
        ================================================================= */
		static public function ctrCrearUsuario(){
				
				if (isset($_POST["nuevoUsuario"])) {

					if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                    	preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoUsuario"]) &&
                    	preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {


							/*=============================================
							=            VALIDAR IMAGEN           =
							=============================================*/

							$ruta = "";
	                    if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

	                        list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

	                        $nuevoAncho = 500;
	                        $nuevoAlto = 500;

	                        /*=============================================
	                         Directorio de la Foto
	                         =============================================*/
	                        $directorio = "images/usuarios/".$_POST["nuevoUsuario"];

	                        mkdir($directorio, 0755);

	                        /*=============================================
	                        Guardar la imagen segun su Formato
	                        =============================================*/

	                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

	                            /*=============================================
	                            Guardar Formato JPG en Directorio
	                            =============================================*/ 

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

	                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagejpeg($destino,$ruta);
	                        }

	                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {

	                            /*=============================================
	                            Guardar Formato PNG en Directorio
	                            =============================================*/

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

	                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagepng($destino,$ruta);
	                        }

	                    }

	        
	                    	
	                    	$encriptado=password_hash($_POST["nuevoPassword"], PASSWORD_DEFAULT);

	                    	$tabla = "usuarios";

	                    	$datos = array("nombre" => $_POST["nuevoNombre"],
	                    					"usuario" => $_POST["nuevoUsuario"],
	                    					"password" => $encriptado,
	                    					"perfil" => $_POST["nuevoPerfil"],
	                    					"foto" => $ruta);

	                    	$respuesta = usuarioModelo::mdlIngresarUsuarios($tabla, $datos);


	                        if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡El usuario se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'usuarios';
		                                        }      
		                                    });

		                              </script>";

		                    }

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

		                                    window.location = 'usuarios';

		                                }  

		                            });

		                        </script>";
		                }

					
				}

		}

		/* ================================================================
        		MOSTRAR USUARIOS
        ================================================================= */
		static public function ctrMostrarUsuario($item,$valor){

			$tabla = "usuarios";

			$respuesta = usuarioModelo::mdlMostrarUsuario($tabla, $item, $valor);

			return $respuesta;
		
		}




		/* ================================================================
        		EDITAR USUARIOS
        ================================================================= */
		static public function ctrEditarUsuario(){

			if (isset($_POST["editarUsuario"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

					$ruta = $_POST["fotoActual"];

					if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

	                        list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);

	                        $nuevoAncho = 500;
	                        $nuevoAlto = 500;

	                        /*=============================================
	                         Directorio de la Foto
	                         =============================================*/
	                        $directorio = "images/usuarios/".$_POST["editarUsuario"];


	                        if (!empty($_POST["fotoActual"])) {
	                        	
	                        	unlink($_POST["fotoActual"]);

	                        }else{

	                        	mkdir($directorio, 0755);

	                        }

	                        /*=============================================
	                        Guardar la imagen segun su Formato
	                        =============================================*/

	                        if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

	                            /*=============================================
	                            Guardar Formato JPG en Directorio
	                            =============================================*/ 

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

	                            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagejpeg($destino,$ruta);
	                        }

	                        if ($_FILES["editarFoto"]["type"] == "image/png") {

	                            /*=============================================
	                            Guardar Formato PNG en Directorio
	                            =============================================*/

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

	                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagepng($destino,$ruta);
	                        }
	                    }

		                    $tabla = "usuarios";

		                    if ($_POST["editarPassword"] != "") {

		                    	if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
		                    		                    	
		                    		$encriptar=password_hash($_POST["editarPassword"], PASSWORD_DEFAULT);

		                    	}else{
		                    		$color="tituloWhite";
		                    		echo "<script>

			                            Swal.fire({

			                                type: 'error',
			                                html: '<h3 class=".$color.">¡La contraseña no puede ir vacio o con carecteres especiales!</h3>',
			                                background: '#343a40',
			                                showConfirmButton: true,
			                                confirmButtonColor: '#dc3545',
			                                confirmButtonText: 'Ok',
			                                closeOnConfirm: false 

			                                }).then((result)=>{

			                                if(result.value){

			                                    window.location = 'usuarios';

			                                }  

			                            });

			                        </script>";

		                    	}

	                    }	
							//si no se realizo el cambio de contraseña
							//se asignara la contraseña antigua
							if (!isset($encriptar)) {

								$encriptar = $_POST['passwordActual'];

							}					

							$datos = array("nombre" => $_POST["editarNombre"],
				                    		"usuario" => $_POST["editarUsuario"],
				                    		"password" => $encriptar,
				                    		"perfil" => $_POST["editarPerfil"],
				                    		"foto" => $ruta);

				            $respuesta = usuarioModelo::mdlEditarUsuarios($tabla, $datos);

				            if($respuesta == "ok"){

				            			$color="tituloWhite";

					                        echo "<script>
					                                      Swal.fire({

					                                          type: 'success',
					                                          html: '<h3 class=".$color.">¡El usuario se ingreso correctamente!</h3>',
					                                          background: '#343a40',
					                                          showConfirmButton: true,
					                                          confirmButtonColor: '#28a745',
					                                          confirmButtonText: 'Ok',
					                                          closeOnConfirm: false 

					                                          }).then((result)=>{

					                                            if(result.value){

					                                              window.location = 'usuarios';
					                                            }      
					                                        });

					                              </script>";

							} 

			
				}else{
					$color="tituloWhite";
					echo "<script>

		                        Swal.fire({

		                            type: 'error',
		                            html: '<h3 class=".$color.">¡El nombre no puede ir vacio o con carecteres especiales!</h3>',
		                            background: '#343a40',
		                            showConfirmButton: true,
		                            confirmButtonColor: '#dc3545',
		                            confirmButtonText: 'Ok',
		                            closeOnConfirm: false 

		                            }).then((result)=>{

		                            if(result.value){

		                                window.location = 'usuarios';

		                            }  

		                        });

		                        </script>";

				}
			}

		}

		/*=============================================
		= BORRAR O ELIMINAR USUARIO    =
		=============================================*/

		static public function ctrBorrarUsuario(){

			if (isset($_GET["idUsuario"])) {
				
				$tabla = "usuarios";

				$datos = $_GET["idUsuario"];

				if ($_GET["idUsuario"] != null) {

					unlink($_GET["fotoUsuario"]);

					rmdir('images/usuarios/'.$_GET["usuario"]);

					$respuesta = usuarioModelo::mdlBorrarUsuario($tabla, $datos);

					if ($respuesta == "ok") {

					$color="tituloWhite";

						echo "<script>
					            Swal.fire({

					                type: 'success',
					                html: '<h3 class=".$color.">¡El usuario se a borrado correctamente!</h3>',
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

					                        window.location = 'usuarios';
					                    }      
					                });

					            </script>";

						
					}

					
				}


			}

		}

		/*=============================================
		=             Actuazlizar sesion              =
		=============================================*/
		static public function ctrActualizarSession()
		{	
			//Actualiza todos los datos guardados en las variables de
			//sesion si se realiza un cambio de actualiza al reiniciar
			//la pagina, iniciar sesion y cerrar sesion
			$tabla = "usuarios";
			$item = "usuario";
			$valor = $_SESSION["usuario"];

			$respuesta = usuarioModelo::mdlMostrarUsuario($tabla, $item, $valor);

			$_SESSION["nombre"] = $respuesta["nombre"];
			$_SESSION["foto"] = $respuesta["foto"];
            $_SESSION["perfil"] = $respuesta["perfil"];
		}

	}