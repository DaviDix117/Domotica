<?php 

class ControladorIluminacion{

    /*=================================================
	    MOSTRAR ILUMINACION
    ================================================*/

    static public function ctrMostrarIluminacion($item, $valor){
        
        $tabla = "iluminacion";

        $respuesta = ModeloIluminacion::mdlMostrarIluminacion($tabla, $item, $valor);

        return $respuesta;

    }

    /*=================================================
	    CREAR BOMBILLO
    ================================================*/
    
    static public function ctrCrearBombillo(){

        if (isset($_POST["nuevoNombre"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
                
                $tabla = "iluminacion";

                $datos=array("nombre" => $_POST["nuevoNombre"],
    						"encendido" => $_POST["nuevoEncendido"],
                            "color" => $_POST["nuevoColor"],
                            "intensidad" => $_POST["nuevaIntensidad"],
                            "estado" => $_POST["nuevoEstado"]);

                $respuesta = ModeloIluminacion::mdlCrearBombillo($tabla, $datos);

                if ($respuesta == "ok") {
                    
                    echo "<script>

    					Swal.fire({

    							icon: 'success',
    							title: 'Datos correctos',
    							text: '!El bombillo ha sido guardado exitosamente¡',

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

                }

            }else{

                echo "<script>

    					Swal.fire({

    							icon: 'error',
    							title: 'Datos invalidos',
    							text: '!El bombillo esta vacio o contiene caracteres especiales, y esto no esta permitido¡',
    							footer: 'Ingresa la categoría nuevamente'

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

            }

        }

    }


    static public function ctrBorrarBombillo(){
        
        if (isset($_GET["idBombillo"])) {
            
            $tabla = "iluminacion";

            $id = $_GET["idBombillo"];

             $respuesta = ModeloIluminacion::mdlBorrarBombillo($tabla, $id);
            

            if ($respuesta == "ok") {
                
                echo "<script>

    					Swal.fire({

    							icon: 'success',
    							title: 'Datos correctos',
    							text: '!El bombillo ha sido borrada exitosamente¡',

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

            }

        }

    }

    /*=================================================
	    EDITAR BOMBILLO
    ================================================*/
    
    static public function ctrEditarBombillo(){

        if (isset($_POST["editarNombre"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
                
                $tabla = "iluminacion";

                $datos = array("nombre" => $_POST["editarNombre"],
                                "id_bombillo" => $_POST["idBombillo"]);

                $respuesta = ModeloIluminacion::mdlEditarBombillo($tabla, $datos);

                if ($respuesta == "ok") {
                    
                    echo "<script>

    					Swal.fire({

    							icon: 'success',
    							title: 'Datos correctos',
    							text: '!El bombillo ha sido editado exitosamente¡',

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

                }

            }else{

                echo "<script>

    					Swal.fire({

    							icon: 'error',
    							title: 'Datos invalidos',
    							text: '!El bombillo esta vacio o contiene caracteres especiales, y esto no esta permitido¡',
    							footer: 'Intentalo nuevamente'

    						}).then((result)=>{

    							if(result.value){

    								window.location = 'iluminacion';

    							}

    						})

    				</script>";

            }

        }

    }

}