<?php 

	/*=============================================
	=            CONTROLADORES           =
	=============================================*/	
	require_once "./controlador/plantillaControlador.php";
	require_once "./controlador/inicioControlador.php";
	require_once "./controlador/ventanasControlador.php";
	require_once "./controlador/serviciosPublicosControlador.php";
	require_once "./controlador/puertaControlador.php";
	require_once "./controlador/temperaturaControlador.php";
	require_once "./controlador/ventanasControlador.php";
	require_once "./controlador/usuarioControlador.php";
	require_once "./controlador/iluminacionControlador.php";


	/*=============================================
	=            MODULOS          =
	=============================================*/
	require_once "./modelo/inicioModelo.php";
	require_once "./modelo/ventanasModelo.php";
	require_once "./modelo/serviciosPublicosModelo.php";
	require_once "./modelo/puertaModelo.php";
	require_once "./modelo/temperaturaModelo.php";
	require_once "./modelo/ventanasModelo.php";
	require_once "./modelo/usuarioModelo.php";
	require_once "./modelo/iluminacionModelo.php";



	$plantilla = new PlantillaControlador();

	$plantilla -> ctrPlantilla();