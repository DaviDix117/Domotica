 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="vistas/index3.html" class="brand-link">

      <img src="vistas/dist/img/AdminLTELogo.png"

           alt="AdminLTE Logo"

           class="brand-image img-circle elevation-3"

           style="opacity: .8">

      <span class="brand-text font-weight-light">Domotica Home</span>

    </a>


    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <?php 

          if ($_SESSION["foto"] == null) {

            echo'<img src="images/foto/AdminMaleAvatar.png" class="img-circle elevation-2" alt="User Image">';

          }else{

            echo'<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';
          }
          
          ?>

        </div>

        <div class="info">

          <a href="#" class="d-block"><?php echo $_SESSION["nombre"] ?></a>

        </div>

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <!-- =============================================
          =            INICIO            =
          ============================================= -->
          <i class="nav-header">Menú</i>

          <li class="nav-item">

            <a href="inicio" class="nav-link">

              <i class="nav-icon fas fa-home"></i>

              <p>

                Inicio

              </p>

            </a>

          </li>

      <!-- =============================================
          =            USUARIO            =
          ============================================= -->


          <li class="nav-item">

            <a href="usuarios" class="nav-link">

              <i class="nav-icon fas fa-users"></i>

              <p>

                Usuarios

                <span class="right badge badge-warning">New</span>

              </p>

            </a>

          </li>


          <!-- =============================================
          =            SERVICIOS PUBLICOS            =
          ============================================= -->
          <li class="nav-item has-treeview">

            <a href="serviciosPublicos" class="nav-link">

              <i class="nav-icon fas fa-fire"></i>

              <p>

                Servicios Públicos

              </p>

            </a>

          </li>

          <!-- =============================================
          =            VENTANAS           =
          ============================================= -->
          <li class="nav-item has-treeview">

            <a href="ventanas" class="nav-link">

              <i class="nav-icon fab fa-windows"></i>

              <p>

                Ventanas

              </p>

            </a>

          </li>

        <!-- =============================================
          =            PUERTAS           =
          ============================================= -->
          <li class="nav-item has-treeview">

            <a href="puertas" class="nav-link">

              <i class="nav-icon fas fa-door-closed"></i>

              <p>

                Puertas

              </p>

            </a>

          </li>
          


          <!-- =============================================
          =            TEMPERATURA            =
          ============================================= -->
          <li class="nav-item has-treeview">

            <a href="temperatura" class="nav-link">

              <i class="nav-icon fas fa-thermometer-three-quarters"></i>

              <p>

                Temperatura

              </p>

            </a>

          </li>

          <!-- =============================================
          =            ILUMINACION            =
          ============================================= -->
          <li class="nav-item has-treeview">

            <a href="iluminacion" class="nav-link">

              <i class="nav-icon fas fa-lightbulb"></i>

              <p>

                Iluminacion

              </p>

            </a>
            
          </li>


          <!-- =============================================
          =           REPORTES           =
          ============================================= -->

          <li class="nav-item has-treeview">

            <a href="reportes" class="nav-link">

             <i class="nav-icon fas fa-check-double"></i>

              <p>

                Modulo Reportes

              </p>

            </a>
            
          </li>
        
        
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>