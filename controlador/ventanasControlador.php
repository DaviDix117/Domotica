<?php

class ventanasControlador
{

    /* ================================================================
        		MOSTRAR Ventana
                ================================================================= */
                static public function ctrMostrarVentana($item, $valor)
                {

                    $tabla = "ventana";

                    $respuesta = ventanaModelo::mdlMostrarVentana($tabla, $item, $valor);

                    return $respuesta;
                }

    /* ================================================================
        Registro de usuario
        ================================================================= */
        static public function ctrCrearVentana()
        {

            if (isset($_POST["nuevaReferencia"])) {

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
                                $directorio = "images/ventanas/".$_POST["nuevaReferencia"];
    
                                mkdir($directorio, 0755);
    
                                /*=============================================
                                Guardar la imagen segun su Formato
                                =============================================*/
    
                                if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
    
                                    /*=============================================
                                    Guardar Formato JPG en Directorio
                                    =============================================*/ 
    
                                    $aleatorio = mt_rand(100,999);
    
                                    $ruta = "images/ventanas/".$_POST["nuevaReferencia"]."/".$aleatorio.".jpg";
    
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
    
                                    $ruta = "images/ventanas/".$_POST["nuevaReferencia"]."/".$aleatorio.".png";
    
                                    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
    
                                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);
    
                                    imagepng($destino,$ruta);
                                }
    
                            }

         $tabla = "ventana";

         $datos = array(
            "referencia" => $_POST["nuevaReferencia"],
            "ubicacion" => $_POST["nuevaUbicacion"],
            "usuario_permitidos" => $_POST['nuevoUsuarioPermitido'],
            "dias_limpieza" => $_POST['nuevoGuardarDias'],
            "hora_limpieza" => $_POST["nuevaHora"],
            "foto_ventana" => $ruta
        );



         $respuesta = ventanaModelo::mdlIngresarVentana($tabla, $datos);

         if ($respuesta == "ok") {

            $color = "tituloWhite";

            echo "<script>
            Swal.fire({

                type: 'success',
                html: '<h3 class=" . $color . "> ¡Ventana añadida correctamente! </h3>',
                background: '#343a40',
                showConfirmButton: true,
                confirmButtonColor: '#28a745',
                confirmButtonText: 'Ok',
                closeOnConfirm: false


                }).then((result)=>{

                    if(result.value){

                        window.location = 'ventanas';
                    }      
                    });

                    </script>";
                }
            }
        }

    /* ================================================================
        		EDITAR Ventana
                ================================================================= */
                static public function ctrEditarVentana()
                {

                    if (isset($_POST["editarReferencia"])) {

                    $ruta = $_POST["fotoActual"];

					if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

	                        list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);

	                        $nuevoAncho = 500;
	                        $nuevoAlto = 500;

	                        /*=============================================
	                         Directorio de la Foto
	                         =============================================*/
	                        $directorio = "images/ventanas/".$_POST["editarReferencia"];


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

	                            $ruta = "images/ventanas/".$_POST["editarReferencia"]."/".$aleatorio.".jpg";

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

	                            $ruta = "images/ventanas/".$_POST["editarReferencia"]."/".$aleatorio.".png";

	                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagepng($destino,$ruta);
	                        }
	                    }

                        $tabla = "ventana";
                        $idVentana = $_POST['idActual'];

                        $datos = array(
                            "referencia" => $_POST["editarReferencia"],
                            "ubicacion" => $_POST["editarUbicacion"],
                            "usuario_permitidos" => $_POST['editarUsuarioPermitido'],
                            "dias_limpieza" => $_POST['editarGuardarDias'],
                            "hora_limpieza" => $_POST["editarHora"],
                            "foto_ventana" => $ruta,
                            "id" => $idVentana
                        );

                        $respuesta = ventanaModelo::mdlEditarVentana($tabla, $datos);

                        if ($respuesta == "ok") {

                            $color = "tituloWhite";

                            echo "<script>
                            Swal.fire({

                                type: 'success',
                                html: '<h3 class=" . $color . "> ¡Ventana añadida correctamente! </h3>',
                                background: '#343a40',
                                showConfirmButton: true,
                                confirmButtonColor: '#28a745',
                                confirmButtonText: 'Ok',
                                closeOnConfirm: false


                                }).then((result)=>{

                                    if(result.value){

                                        window.location = 'ventanas';
                                    }      
                                    });

                                    </script>";
                                }
                            }
                        }

    /*=============================================
		= BORRAR O ELIMINAR Ventana    =
		=============================================*/

        static public function ctrBorrarVentana()
        {

            if (isset($_GET["idVentana"])) {

                $tabla = "ventana";

                $datos = $_GET["idVentana"];

                if ($_GET["idVentana"] != null) {

                    unlink($_GET["fotoVentana"]);

                    rmdir('images/ventanas/' . $_GET["referencia"]);

                    $respuesta = ventanaModelo::mdlBorrarVentana($tabla, $datos);

                    if ($respuesta == "ok") {

                        $color = "tituloWhite";

                        echo "<script>
                        Swal.fire({

                           type: 'success',
                           html: '<h3 class=" . $color . ">¡La ventana ha sido borrada correctamente!</h3>',
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

                                   window.location = 'ventanas';
                               }      
                               });

                               </script>";
                           }
                       }
                   }
               }
           }
