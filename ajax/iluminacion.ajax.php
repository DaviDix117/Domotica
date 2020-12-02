<?php

require_once "../controlador/iluminacionControlador.php";

require_once "../modelo/iluminacionModelo.php";

class AjaxIluminacion{

    /*=================================================
	    EDITAR BOMBILLO
    ================================================*/

    public $idBombillo;

    public function ajaxEditarBombillo(){
        
        $item = "id_bombillo";

        $valor = $this->idBombillo;

        $respuesta = ControladorIluminacion::ctrMostrarIluminacion($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=================================================
	EDITAR BOMBILLO
================================================*/

if (isset($_POST["idBombillo"])) {

    $bombillo = new AjaxIluminacion();

    $bombillo->idBombillo = $_POST["idBombillo"];

    $bombillo->ajaxEditarBombillo();
    
}
