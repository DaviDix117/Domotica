<?php 

	require_once "conexion.php";

	/**
	 * 
	 */
	class temperaturaModelo
	{
		
		static public function mdlMostrarTemp($tabla, $item, $valor){
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
        
    static public function mdlHistoricoTemperatura($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt -> close();

            $stmt = null;

        }

		static public function mdlIngresarCuarto($tabla, $datos){

       		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, min_temp, min_hum, min_tvo, max_temp, max_hum, max_tvo) 
               VALUES (:nombre, :min_temp, :min_hum, :min_tvo, :max_temp, :max_hum, :max_tvo)");
       		

            $stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

         	$stmt -> bindparam(":min_temp", $datos["min_temp"], PDO::PARAM_STR);

         	$stmt -> bindparam(":min_hum", $datos["min_hum"], PDO::PARAM_STR);

         	$stmt -> bindparam(":min_tvo", $datos["min_tvo"], PDO::PARAM_STR);

            $stmt -> bindparam(":max_temp", $datos["max_temp"], PDO::PARAM_STR);

         	$stmt -> bindparam(":max_hum", $datos["max_hum"], PDO::PARAM_STR);

         	$stmt -> bindparam(":max_tvo", $datos["max_tvo"], PDO::PARAM_STR);


            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt -> close();

            $stmt = null;
       	}

    static public function mdlBorrarCuarto($tabla, $datos){
        
          $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");
            
          $stmt -> bindparam(":id", $datos, PDO::PARAM_STR);

          if($stmt -> execute()){

                return "ok";

          }else{

                return "error";

          }

            $stmt -> close();

            $stmt = null;
        
        }

    static public function mdlEditarTemperatura($tabla, $datos){

          $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  min_temp = :min_temp, min_hum = :min_hum, min_tvo = :min_tvo,  max_temp = :max_temp, max_hum = :max_hum, max_tvo = :max_tvo WHERE id = :id");

          $stmt -> bindparam(":id", $datos["id"], PDO::PARAM_STR);
          
          $stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

          $stmt -> bindparam(":min_temp", $datos["min_temp"], PDO::PARAM_STR);

          $stmt -> bindparam(":min_hum", $datos["min_hum"], PDO::PARAM_STR);

          $stmt -> bindparam(":min_tvo", $datos["min_tvo"], PDO::PARAM_STR);

          $stmt -> bindparam(":max_temp", $datos["max_temp"], PDO::PARAM_STR);

          $stmt -> bindparam(":max_hum", $datos["max_hum"], PDO::PARAM_STR);

          $stmt -> bindparam(":max_tvo", $datos["max_tvo"], PDO::PARAM_STR);

          

          if($stmt -> execute()){

              return "ok";

          }else{

              return "error";

          }

          $stmt -> close();

          $stmt = null;

        }

    /*=============================================
    =            ACTUALIZAR TEMPERATURA           =
    =============================================*/
    static public function mdlActualizarTemperatura($tabla, $item1, $valor1, $item2, $valor2){

      var_dump($tabla, $item1, $valor1, $item2, $valor2);

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

      $stmt->bindparam(":" . $item1, $valor1, PDO::PARAM_STR);

      $stmt->bindparam(":" . $item2, $valor2, PDO::PARAM_STR);

      if ($stmt->execute()) {
        
        return "ok";

      } else {

        return "error";

      }

      $stmt->close();

      $stmt = null;

    }

    /*=============================================
    =            ACTUALIZAR HUMEDAD           =
    =============================================*/
    static public function mdlActualizarHumedad($tabla, $item1, $valor1, $item2, $valor2){

      var_dump($tabla, $item1, $valor1, $item2, $valor2);

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

      $stmt->bindparam(":" . $item1, $valor1, PDO::PARAM_STR);

      $stmt->bindparam(":" . $item2, $valor2, PDO::PARAM_STR);

      if ($stmt->execute()) {
        
        return "ok";

      } else {

        return "error";

      }

      $stmt->close();

      $stmt = null;

    }

    /*=============================================
    =            ACTUALIZAR TVO           =
    =============================================*/
    static public function mdlActualizarTVO($tabla, $item1, $valor1, $item2, $valor2){

      var_dump($tabla, $item1, $valor1, $item2, $valor2);

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

      $stmt->bindparam(":" . $item1, $valor1, PDO::PARAM_STR);

      $stmt->bindparam(":" . $item2, $valor2, PDO::PARAM_STR);

      if ($stmt->execute()) {
        
        return "ok";

      } else {

        return "error";

      }

      $stmt->close();

      $stmt = null;

    }
	}