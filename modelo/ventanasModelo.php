<?php
require_once "conexion.php";

/**    
 * 
 */
class ventanaModelo
{

    static public function mdlMostrarVentana($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindparam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();


            return $stmt->fetch();

            $stmt->close();
            $stmt = null;
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->close();

            $stmt = null;
        }
    }

    /* ================================================================
         Registro Ventana
       	================================================================= */
    static public function mdlIngresarVentana($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(referencia, 
            ubicacion, usuario_permitidos,dias_limpieza,hora_limpieza,foto_ventana) VALUES 
            (:referencia, :ubicacion, :usuario_permitidos, :dias_limpieza,:hora_limpieza,:foto_ventana)");


        $stmt->bindparam(":referencia", $datos["referencia"], PDO::PARAM_STR);

        $stmt->bindparam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);

        $stmt->bindparam(":usuario_permitidos", $datos["usuario_permitidos"], PDO::PARAM_STR);

        $stmt->bindparam(":dias_limpieza", $datos["dias_limpieza"], PDO::PARAM_STR);

        $stmt->bindparam(":hora_limpieza", $datos["hora_limpieza"], PDO::PARAM_STR);

        $stmt->bindparam(":foto_ventana", $datos["foto_ventana"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* ================================================================
         EDITAR Ventana
       	================================================================= */
    static public function mdlEditarVentana($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET referencia = :referencia,  ubicacion = :ubicacion,
         usuario_permitidos = :usuario_permitidos, dias_limpieza = :dias_limpieza, hora_limpieza = :hora_limpieza, 
         foto_ventana = :foto_ventana    
         WHERE id = :id");

        $stmt->bindparam(":referencia", $datos["referencia"], PDO::PARAM_STR);

        $stmt->bindparam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);

        $stmt->bindparam(":usuario_permitidos", $datos["usuario_permitidos"], PDO::PARAM_STR);

        $stmt->bindparam(":dias_limpieza", $datos["dias_limpieza"], PDO::PARAM_STR);

        $stmt->bindparam(":hora_limpieza", $datos["hora_limpieza"], PDO::PARAM_STR);

        $stmt->bindparam(":foto_ventana", $datos["foto_ventana"], PDO::PARAM_STR);

        $stmt->bindparam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* ================================================================
         BORRAR Ventana
        ================================================================= */
    static public function mdlBorrarVentana($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");

        $stmt->bindparam(":id", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
