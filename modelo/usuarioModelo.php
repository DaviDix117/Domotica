<?php

	include_once "conexion.php";

class usuarioModelo
{

  static public function mdlMostrarUsuario($tabla, $item, $valor)
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
         Registro Usuario
       	================================================================= */
  static public function mdlIngresarUsuarios($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil,foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");


    $stmt->bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

    $stmt->bindparam(":usuario", $datos["usuario"], PDO::PARAM_STR);

    $stmt->bindparam(":password", $datos["password"], PDO::PARAM_STR);

    $stmt->bindparam(":perfil", $datos["perfil"], PDO::PARAM_STR);

    $stmt->bindparam(":foto", $datos["foto"], PDO::PARAM_STR);


    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }

  /* ================================================================
         EDITAR Usuario
       	================================================================= */
  static public function mdlEditarUsuarios($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  password = :password, 
    perfil = :perfil, foto = :foto WHERE usuario = :usuario");

    $stmt->bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

    $stmt->bindparam(":usuario", $datos["usuario"], PDO::PARAM_STR);

    $stmt->bindparam(":password", $datos["password"], PDO::PARAM_STR);

    $stmt->bindparam(":perfil", $datos["perfil"], PDO::PARAM_STR);

    $stmt->bindparam(":foto", $datos["foto"], PDO::PARAM_STR);

    if ($stmt->execute()) {

      return "ok";
    } else {

      return "error";
    }

    $stmt->close();

    $stmt = null;
  }

  /*=============================================
        =            ACTUALIZAR USUARIO           =
        =============================================*/
  static public function mdlActualizarUsuarios($tabla, $item1, $valor1, $item2, $valor2)
  {

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

  /* ================================================================
         BORRAR Usuario
        ================================================================= */
  static public function mdlBorrarUsuario($tabla, $datos)
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
