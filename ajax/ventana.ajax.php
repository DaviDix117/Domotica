<?php

require_once "../controlador/ventanasControlador.php";
require_once "../modelo/ventanasModelo.php";

/**
 * 
 */
class ajaxVentana
{
	public $idVentana;

	public function ajaxEditarVentana()
	{
		$item = "id";
		$valor = $this-> idVentana;

		$respuesta = ventanasControlador::ctrMostrarVentana($item, $valor);


		echo json_encode($respuesta);
	}
}

/*=============================================
=            EDITAR Ventana            =
=============================================*/

if (isset($_POST["idVentana"])) {

	$editar = new ajaxVentana();

	$editar-> idVentana = $_POST["idVentana"];

	$editar->ajaxEditarVentana();
}
