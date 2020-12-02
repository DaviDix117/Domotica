<?php 

include_once "conexion.php";
/**
 * 
 */
class modeloServicios
{
	
	static public function mdlMostrarServicio($tabla,$itemEnergia,$datoEnergia)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $itemEnergia = :itemEnergia");
		$stmt -> bindparam(":".$item, $datoEnergia, PDO::PARAM_STR);
		$stmt -> execute();

        return $stmt -> fetch();
        $stmt -> close();
  		$stmt = null;
  	}

    /* ================================================================
     MOSTRAR AJAX SSERVICIO
    ================================================================= */
    static public function mdlMostrar($tabla, $item, $valor)
    {
      if ($item != null) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();


           return $stmt -> fetch();

            $stmt -> close();
            $stmt = null;

      }else{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt -> execute();

                return $stmt -> fetchAll();

                $stmt -> close();

            $stmt = null;

      }
      
    }

    /* ================================================================
     Registro datos gas
   	================================================================= */
   	static public function mdlIngresarDatosGas($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numeroMedidorGas, factorCorreccion) VALUES (:numeroMedidorGas, :factorCorreccion)");
   		

      	$stmt -> bindparam(":numeroMedidorGas", $datos["numeroMedidorGas"], PDO::PARAM_STR);

     	$stmt -> bindparam(":factorCorreccion", $datos["factorCorreccion"], PDO::PARAM_STR);

     	


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}

   	/* ================================================================
     Registro datos gas
   	================================================================= */
   	static public function mdlIngresarDatosAgua($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numeroMedidorAgua, tarifaAlcantarilladoSuntuario, tarifaAlcantarilladoBasico, tarifaAlcantarilladoComplementario, tarifaAcueductoSuntuario, tarifaAcueductoBasico, tarifaAcueductoComplementario, cargoFijoLiquidacionAcueducto, cargoFijoLiquidacionAlcantarillado) VALUES (:numeroMedidorAgua, :tarifaAlcantarilladoSuntuario, :tarifaAlcantarilladoBasico, :tarifaAlcantarilladoComplementario, :tarifaAcueductoSuntuario, :tarifaAcueductoBasico, :tarifaAcueductoComplementario, :cargoFijoLiquidacionAcueducto, :cargoFijoLiquidacionAlcantarillado)");
   		

      	$stmt -> bindparam(":numeroMedidorAgua", $datos["numeroMedidorAgua"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoSuntuario", $datos["tarifaAlcantarilladoSuntuario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoBasico", $datos["tarifaAlcantarilladoBasico"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoComplementario", $datos["tarifaAlcantarilladoComplementario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoSuntuario", $datos["tarifaAcueductoSuntuario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoBasico", $datos["tarifaAcueductoBasico"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoComplementario", $datos["tarifaAcueductoComplementario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":cargoFijoLiquidacionAcueducto", $datos["cargoFijoLiquidacionAcueducto"], PDO::PARAM_STR);

     	$stmt -> bindparam(":cargoFijoLiquidacionAlcantarillado", $datos["cargoFijoLiquidacionAlcantarillado"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}


   	/* ================================================================
     Registro datos Energia
   	================================================================= */
   	static public function mdlIngresarDatosEnergia($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numeroMedidorEnergia, tarifaEnergia) VALUES (:numeroMedidorEnergia, :tarifaEnergia)");
   		

      $stmt -> bindparam(":numeroMedidorEnergia", $datos["numeroMedidorEnergia"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaEnergia", $datos["tarifaEnergia"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}

    static public function mdlMostrarTablasServiciosPublicos($tablaEnergia, $tablaGas, $tablaAgua)
    {
        $stmt = Conexion::conectar()->prepare("SELECT
                                           (SELECT COUNT(*) FROM $tablaAgua) as totalAgua, 
                                           (SELECT COUNT(*) FROM $tablaEnergia) as totalEnergia,
                                           (SELECT COUNT(*) FROM $tablaGas) as totalGas");

                $stmt -> execute();

                return $stmt -> fetchAll();

                $stmt -> close();

            $stmt = null;
      
    }

    /* ================================================================
     Registro datos gas
    ================================================================= */
    static public function mdlModificarDatosGas($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroMedidorGas = :numeroMedidorGas, factorCorreccion = :factorCorreccion");
      

      $stmt -> bindparam(":numeroMedidorGas", $datos["numeroMedidorGas"], PDO::PARAM_STR);

      $stmt -> bindparam(":factorCorreccion", $datos["factorCorreccion"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    /* ================================================================
     Rmodificar datos gas
    ================================================================= */
    static public function mdlModificarDatosAgua($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroMedidorAgua = :numeroMedidorAgua, tarifaAlcantarilladoSuntuario = :tarifaAlcantarilladoSuntuario, tarifaAlcantarilladoBasico = :tarifaAlcantarilladoBasico, tarifaAlcantarilladoComplementario = :tarifaAlcantarilladoComplementario, tarifaAcueductoSuntuario = :tarifaAcueductoSuntuario, tarifaAcueductoBasico = :tarifaAcueductoBasico, tarifaAcueductoComplementario = :tarifaAcueductoComplementario, cargoFijoLiquidacionAcueducto = :cargoFijoLiquidacionAcueducto, cargoFijoLiquidacionAlcantarillado = :cargoFijoLiquidacionAlcantarillado");
      

      $stmt -> bindparam(":numeroMedidorAgua", $datos["numeroMedidorAgua"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAlcantarilladoSuntuario", $datos["tarifaAlcantarilladoSuntuario"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAlcantarilladoBasico", $datos["tarifaAlcantarilladoBasico"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAlcantarilladoComplementario", $datos["tarifaAlcantarilladoComplementario"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAcueductoSuntuario", $datos["tarifaAcueductoSuntuario"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAcueductoBasico", $datos["tarifaAcueductoBasico"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaAcueductoComplementario", $datos["tarifaAcueductoComplementario"], PDO::PARAM_STR);

      $stmt -> bindparam(":cargoFijoLiquidacionAcueducto", $datos["cargoFijoLiquidacionAcueducto"], PDO::PARAM_STR);

      $stmt -> bindparam(":cargoFijoLiquidacionAlcantarillado", $datos["cargoFijoLiquidacionAlcantarillado"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

    /* ================================================================
     Modificar datos Energia
    ================================================================= */
    static public function mdlModificarDatosEnergia($tabla, $datos){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroMedidorEnergia = :numeroMedidorEnergia, tarifaEnergia = :tarifaEnergia");
      

      $stmt -> bindparam(":numeroMedidorEnergia", $datos["numeroMedidorEnergia"], PDO::PARAM_STR);

      $stmt -> bindparam(":tarifaEnergia", $datos["tarifaEnergia"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }

}