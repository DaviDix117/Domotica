<?php 
	
	require_once "../controlador/usuarioControlador.php";
	require_once "../modelo/usuarioModelo.php";

	/**
	 * 
	 */
	class ajaxUsuarios
	{
		public $idUsuario;

		public function ajaxEditarUsuario()
		{
			$item = "id";
			$valor = $this -> idUsuario;

			$respuesta = usuariosControlador::ctrMostrarUsuario($item, $valor);

			echo json_encode($respuesta);


		}
	

	/*=============================================
	=            ACTIVAR USUARIO            =
	=============================================*/

		public $activarId;
		public $activarUsuario;

		public function ajaxActivarUsuario()
		{

			$tabla = "usuarios";

			$item1  = "estado";

			$valor1 = $this->activarUsuario;

			$item2 ="id";
			
			$valor2 =$this->activarId;

			$respuesta = usuarioModelo::mdlActualizarUsuarios($tabla, $item1, $valor1, $item2, $valor2);

		}

		/*=============================================
		=    VALIDAR NO REPETIR USUARIO            =
		=============================================*/

		public $validarUsuario;
		public function ajaxValidarUsuario()
		{
			$item = "usuario";
			$valor = $this ->validarUsuario;

			$respuesta = usuariosControlador::ctrMostrarUsuario($item, $valor);

			echo json_encode($respuesta);

		}
	}

/*=============================================
=            EDITAR USUARIO            =
=============================================*/

if (isset($_POST["idUsuario"])) {
	
		$editar = new ajaxUsuarios();

		$editar -> idUsuario = $_POST["idUsuario"];

		$editar -> ajaxEditarUsuario();

} 

/*=============================================
=            ACTIVAR USUARIO            =
=============================================*/
if (isset($_POST["activarUsuario"])) {

	$activar = new ajaxUsuarios();

	$activar-> activarId = $_POST["activarId"];

	$activar-> activarUsuario = $_POST["activarUsuario"];

	$activar-> ajaxActivarUsuario();

}

/*=============================================
		=    VALIDAR NO REPETIR USUARIO            =
=============================================*/
if (isset($_POST["validarUsuario"])) {
	
		$valUsuario = new ajaxUsuarios();

		$valUsuario -> validarUsuario = $_POST["validarUsuario"];

		$valUsuario -> ajaxValidarUsuario();

} 




