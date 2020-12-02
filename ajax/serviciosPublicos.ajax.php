<?php 
	
	require_once "../controlador/serviciosPublicosControlador.php";
	require_once "../modelo/serviciosPublicosModelo.php";

	/**
	 * 
	 */
	class ajaxServicios
	{
		/*=============================================
		=    VALIDAR NO REPETIR SERVICIOS            =
		=============================================*/

		public $serviciosEnergia;
		public $serviciosGas;
		public $serviciosAgua;
		public function ajaxMostrarServicio()
		{
			$tablaEnergia = $this -> serviciosEnergia;
			$tablaGas = $this -> serviciosGas;
			$tablaAgua = $this -> serviciosAgua;

			$respuesta = modeloServicios::mdlMostrarTablasServiciosPublicos($tablaEnergia, $tablaGas, $tablaAgua);

			echo json_encode($respuesta);
		}

		public $idGas;

		public function ajaxEditarGas()
		{	
			$tabla = "datos_gas";
			$item = "idGas";
			$valor = $this -> idServicioGas;

			$respuesta = ServiciosControlador::ctrMostrar($tabla,$item, $valor);

			echo json_encode($respuesta);

		}

		public $idAgua;

		public function ajaxEditarAgua()
		{
			$tabla = "datos_agua";
			$item = "idAgua";
			$valor = $this -> idServicioAgua;

			$respuesta = ServiciosControlador::ctrMostrar($tabla,$item, $valor);

			echo json_encode($respuesta);

		}

		public $idEnergia;

		public function ajaxEditarEnergia()
		{
			$tabla = "datos_energia";
			$item = "idEnergia";
			$valor = $this -> idServicioEnergia;

			$respuesta = ServiciosControlador::ctrMostrar($tabla,$item, $valor);

			echo json_encode($respuesta);

		}

	}


if (isset($_POST["serviciosEnergia"])) {
	
		$valServicio = new ajaxServicios();
		$valServicio -> serviciosEnergia = $_POST["serviciosEnergia"];
		$valServicio -> serviciosGas = $_POST['serviciosGas'];
		$valServicio -> serviciosAgua = $_POST['serviciosAgua'];
		$valServicio -> ajaxMostrarServicio();

} 


/*=============================================
=            EDITAR GAS           =
=============================================*/

if (isset($_POST["idServicioGas"])) {
	
		$editar = new ajaxServicios();

		$editar -> idServicioGas = $_POST["idServicioGas"];

		$editar -> ajaxEditarGas();

} 

/*=============================================
=            EDITAR AGUA           =
=============================================*/

if (isset($_POST["idServicioAgua"])) {
	
		$editar = new ajaxServicios();

		$editar -> idServicioAgua = $_POST["idServicioAgua"];

		$editar -> ajaxEditarAgua();

} 

/*=============================================
=            EDITAR ENERGIA          =
=============================================*/

if (isset($_POST["idServicioEnergia"])) {
	
		$editar = new ajaxServicios();

		$editar -> idServicioEnergia = $_POST["idServicioEnergia"];

		$editar -> ajaxEditarEnergia();

} 



