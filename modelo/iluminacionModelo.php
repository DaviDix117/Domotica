<?php

require_once "conexion.php";

class ModeloIluminacion{

    /*=================================================
	    MOSTRAR ILUMINACION
    ================================================*/

    static public function mdlMostrarIluminacion($tabla, $item, $valor){
        
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
            
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
            
        }

        $stmt->close();
                
        $stmt=null;

    }

    /*==============================
     CREAR BOMBILLO
    =============================*/

    static public function mdlCrearBombillo($tabla, $datos)
    {

    	$stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, encendido, color, intensidad, estado) VALUES (:nombre, :encendido, :color, :intensidad, :estado)");

    	$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    	$stmt->bindParam(":encendido", $datos["encendido"], PDO::PARAM_INT);
    	$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
    	$stmt->bindParam(":intensidad", $datos["intensidad"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

    	if ($stmt->execute()) {
    		
    		return "ok";

    	} else {

    		return "error";

    	}

    	$stmt->close();

		$stmt=null;
    	

    }

    /*==============================
     BORRAR BOMBILLO
    =============================*/


    static public function mdlBorrarBombillo($tabla, $id){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_bombillo = :idBombillo");

        $stmt->bindParam(":idBombillo", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            
            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt=null;

    }

    /*=================================================
	    EDITAR BOMBILLO
    ================================================*/

    static public function mdlEditarBombillo($tabla, $datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_bombillo = :id_bombillo");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        
        $stmt->bindParam(":id_bombillo", $datos["id_bombillo"], PDO::PARAM_INT);

        if ($stmt->execute()) {
    		
    		return "ok";

    	} else {

    		return "error";

    	}

    	$stmt->close();

		$stmt=null;

    }

}