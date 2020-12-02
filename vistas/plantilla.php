<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php 

      if (isset($_SESSION["iniciarSesion"]) 
          && $_SESSION["iniciarSesion"] == "ok") {
          if (isset($_GET["vista"])) {

              $cadena_devuelta = ucfirst($_GET["vista"]);//Asigna la primera letra en mayuscula
              
              //$resultado2 = str_replace("-", " ", $cadena_devuelta);

              echo $cadena_devuelta." - Domotica";

          }else{
          //si no existe una ruta se le asigna un nombre a la pagina

              echo 'Inicio - Domotica';

          }
      }else{
        echo 'Login - Domotica';
      }
    ?>
      
  </title>

  <link rel="icon" href="images/icons/casa.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- =============================================================
                PLUGINS
  ============================================================= -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- sweetalert 2 theme dark -->
  <!-- <link rel="stylesheet" href="@sweetalert2/theme-dark/dark.css"> -->
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  
  <!-- Selected2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <!-- customs CSS -->
  <link rel="stylesheet" href="css/ventanas.css">

  <!-- Booststrap Toggle-->
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- =============================================================
          JS
  ============================================================= -->
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="vistas/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  <script src="vistas/dist/js/demo.js"></script>
  <script src="vistas/dist/js/pages/dashboard3.js"></script>

  <!-- jquery flot -->
  <script src="vistas/plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="vistas/plugins/flot-old/jquery.flot.resize.min.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="vistas/plugins/flot-old/jquery.flot.pie.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- daterangepicker -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Summernote -->
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Selected2 -->
  <script src="vistas/plugins/select2/js/select2.full.min.js"></script>
  <!-- jQuery Knob -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- Bootstrap toggle-->
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <!-- jQuery Knob -->
  <script src="https://ghcdn.rawgit.org/aterrien/jQuery-Knob/master/dist/jquery.knob.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->


  <?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

  //Llama a un controlador que actualiza las variables de sesión
  $editarSession = new usuariosControlador();
  $editarSession -> ctrActualizarSession();
  
  echo '<div class="wrapper">';


    echo '<div class="wrapper">';

    /*=============================================
       =            CABEZOTE            =
       =============================================*/
    include "vistas/modulos/cabezote.php";

    /*=============================================
       =            MENU           =
       =============================================*/
    include "vistas/modulos/menu.php";

    /*=============================================
       =            CONTENIDO            =
       =============================================*/
    if (isset($_GET["vista"])) {

      if (
        $_GET["vista"] == "inicio" ||
        $_GET["vista"] == "usuarios" ||
        $_GET["vista"] == "serviciosPublicos" ||
        $_GET["vista"] == "temperatura" ||
        $_GET["vista"] == "puertas" ||
        $_GET["vista"] == "ventanas" ||
        $_GET["vista"] == "salir" ||
        $_GET["vista"] == "iluminacion" ||
        $_GET["vista"] == "reportes" ||
        $_GET["vista"] == "tempHabitacion"
      ) {

        include 'vistas/modulos/' . $_GET["vista"] . '.php';
      } else {

        include 'vistas/modulos/404.php';
      }
    }


    /*=============================================
       =            FOOTER           =
       =============================================*/
    include "vistas/modulos/footer.php";

    echo '</div>';
  } else {

    include "vistas/modulos/login.php";
  }

  if (isset($_GET["vista"])) {
    if ($_GET["vista"] == "serviciosPublicos") {

      echo '<script src="./vistas/js/serviciosP.js"></script>';
    }
  }

  ?>


  <script src="./vistas/js/iluminacion.js"></script>
  <script src="./vistas/js/plantilla.js"></script>
  <script src="./vistas/js/usuario.js"></script>
  <script src="./vistas/js/ventana.js"></script>
  <script src="vistas/js/temperatura.js"></script>
<!-- <script src="./vistas/js/serviciosP.js"></script> -->
</body>

</html>
