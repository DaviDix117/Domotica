<?php

require_once "../controlador/temperaturaControlador.php";
require_once "../modelo/temperaturaModelo.php";

/**
 * 
 */
class ajaxTemperatura
{
	public $idTemperatura;

	public function ajaxEditarTemp()
	{
		$item = "id";
		$valor = $this -> idTemperatura;

		$respuesta = temperaturaControlador::ctrMostrarTemp($item, $valor);


		echo json_encode($respuesta);
	}

	/*=============================================
	=           ACTIVAR Temperatura            =
	=============================================*/

	public $activarId;
	public $activarTemp;

	public function ajaxActivarTemp()
	{

		$tabla = "temp_habitaciones";

		$item1  = "estado_temp";

		$valor1 = $this->activarTemp;

		$item2 = "id";
		
		$valor2 = $this->activarId;


		$respuesta = temperaturaModelo::mdlActualizarTemperatura($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	=            ACTIVAR Humedad            =
	=============================================*/
	// public $activarIdH;
	public $activarHum;

	public function ajaxActivarHum()
	{

		$tabla = "temp_habitaciones";

		$item1  = "estado_hum";

		$valor1 = $this->activarHum;

		$item2 = "id";
		
		$valor2 = $this->activarId;


		$respuesta = temperaturaModelo::mdlActualizarHumedad($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	=            ACTIVAR tvo            =
	=============================================*/
	public $activarTvo;

	public function ajaxActivarTvo()
	{

		$tabla = "temp_habitaciones";

		$item1  = "estado_tvo";

		$valor1 = $this->activarTvo;

		$item2 = "id";
		
		$valor2 = $this->activarId;


		$respuesta = temperaturaModelo::mdlActualizarTVO($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
=            EDITAR TEMPERATURA            =
=============================================*/
if (isset($_POST["idTemperatura"])) {

	$editar = new ajaxTemperatura();

	$editar-> idTemperatura = $_POST["idTemperatura"];

	$editar->ajaxEditarTemp();
}

/*=============================================
=            ACTIVAR TEMPERATURA            =
=============================================*/
if (isset($_POST["activarTemp"])) {

	$activar = new ajaxTemperatura();

	$activar-> activarId = $_POST["activarId"];

	$activar-> activarTemp = $_POST["activarTemp"];

	$activar-> ajaxActivarTemp();

}

/*=============================================
=            ACTIVAR HUMEDAD            =
=============================================*/
if (isset($_POST["activarHum"])) {

	$activar = new ajaxTemperatura();

	$activar-> activarId = $_POST["activarId"];

	$activar-> activarHum = $_POST["activarHum"];

	$activar-> ajaxActivarHum();

}
/*=============================================
=            ACTIVAR TVO            =
=============================================*/
if (isset($_POST["activarTvo"])) {

	$activar = new ajaxTemperatura();

	$activar-> activarId = $_POST["activarId"];

	$activar-> activarTvo = $_POST["activarTvo"];

	$activar-> ajaxActivarTvo();

}
