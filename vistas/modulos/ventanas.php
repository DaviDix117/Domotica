<div class="content-wrapper" style="background: #6c757d; color:white;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Ventanas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active" style="color:white;">Ventanas</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">

      <div class="card-header" style="background: #343a40; color:#fff;">

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarVentana">
          <i class="fab fa-windows"></i>
        </button>

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalProgramarVentana">
          <i class="far fa-calendar-alt"></i>
        </button>

      </div>

    </div>

    <div class="card-body" style="background: #6c757d; color:#fff;">

      <table class="table table-dark table-striped table-hover dt-responsive tablas " style="width:100%">

        <thead style="text-align:center">

          <tr>

            <th style="width: 8px">#</th>
            <th>Referencia</th>
            <th>Ubicación</th>
            <th>Usuarios permitidos</th>
            <th>Días de limpieza</th>
            <th>Hora de la limpieza</th>
            <th>Foto Ventana</th>
            <th>Acciones</th>
          </tr>

        </thead>

        <tbody style="text-align:center">

          <?php
          $item = null;
          $valor = null;
          $numero = 0;

          $ventana = ventanasControlador::ctrMostrarVentana($item, $valor);
          
          foreach ($ventana as $key => $value) {
            $numero++;
            echo
              '<tr>

              <td>' . $numero . '</td>

              <td>' . $value["referencia"] . '</td>

              <td>' . $value["ubicacion"] . '</td>
             
              <td>' . $value["usuario_permitidos"] . '</td>

              <td>' . $value["dias_limpieza"] . '</td>

              <td>' . $value["hora_limpieza"] . '</td>';

              if ($value["foto_ventana"] == null) {

                echo '<td><img src="images/ventanas/Ventana Cerrado.png" class="img-thumbnail" width="40px"></td>';

              } else {

                echo '<td><img src="'.$value["foto_ventana"].'" class="img-thumbnail" width="40px"></td>';

              }

              echo'<td>
                <div class="btn-group">

                <button class="btn btn-outline btnEditarVentana"   idVentana="' . $value["id"] . '" data-toggle="modal"
                style="border-color: yellow;color:yellow;margin:3px"  data-target="#modalEditarVentana"><i class="fa fa-pencil-alt" ></i></button>

                <button class="btn btnEliminarVentana" fotoVentana="'.$value["foto_ventana"].'"referencia="' . $value["referencia"] . '" idVentana="' . $value["id"] . '" 
                style="border-color: red;color:red;margin:3px"><i class="fa fa-times"></i></button>

                </div>
              </td>

            </tr>';
          }
          ?>
        </tbody>

      </table>

    </div>

  </section>

</div>

<!--  ================================================================
        Modal Programar ventana
=================================================================  -->  
<!-- The Modal -->
<div class="modal fade" id="modalProgramarVentana">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">

          <h4 class="modal-title">Limpieza</h4>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #7A7878; color:#fff;">

          <h1>Referencias</h1>
          <select class="form-control input-lg" name="limpieza">

            <option value="Administrador">ventana A</option>

            <option value="Permanente">ventana B</option>

            <option value="Invitado">ventana C</option>

          </select>
          <!--  ================================================================
                                    intesidad
          =================================================================  -->
          <h1>Intensidad</h1>

          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">Limpieza Suave</button>
            <button type="button" class="btn btn-secondary">Limpieza Profunda</button>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn" style="background: #3d9970; color:white">Agregar</button>

            <button type="button" class="btn" style="background:#d81b60; color:white" data-dismiss="modal">Cancelar</button>


          </div>

        </div>
      </form>
    </div>
  </div>
</div>
<!--  ================================================================
        Modal Agregar ventana
=================================================================  -->
<!-- The Modal -->
<div class="modal fade" id="modalAgregarVentana">

  <div class="modal-dialog modal-lg">

    <div class="modal-content" style="background: #343a40; color:#fff;">

      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">

          <h4 class="modal-title">Agregar Ventana</h4>

          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>

        </div>

        <!-- contenido del modal -->
        <div class="modal-body" style="background: #7A7878; color:#fff;">

          <!--  ================================================================
                        INGRESA LA REFERENCIA
          =================================================================  -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text">Ingresar La Referencia:</span>

                </div>

                <input type="text" class="form-control input-lg" id="nuevaReferencia" name="nuevaReferencia" required>

              </div>

            </div>

          </div>

          <!--  ================================================================
                    INGRESA LA UBICACION
          =================================================================  -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text">Ingresar La Ubicación:</span>

                </div>

                <input type="text" class="form-control input-lg" id="nuevaUbicacion" name="nuevaUbicacion" required>

              </div>

            </div>

          </div>

          <!--  ================================================================
                Usuarios Permitidos
          =================================================================  -->

          <label> Ingrese los usuarios que tengan acceso a la ventana</label>
          <div class="form-group select2-dark">
            <?php
            $item = null;
            $valor = null;
            $numero = 0;

            $usuarios = usuariosControlador::ctrMostrarUsuario($item, $valor);
            echo
              '<select name="opcionesUsuarios" id="opcionesUsuarios" class="select2"  multiple="true" style="width: 100%"
                data-placeholder="Seleccione usuarios permitidos" onchange="changeSelect(event)" required> ';
            foreach ($usuarios as $key => $value) {
              echo
                '<option value="' . $value["usuario"] . '">' . $value["usuario"] . '</option>';
            }
            echo '</select>';

            ?>

            <input type="hidden" name="nuevoUsuarioPermitido" id="nuevoUsuarioPermitido"></input>

          </div>
          

          <!--  ================================================================
                Dias
          =================================================================  -->
          </br>
          <label>Dias De Limpieza</label>
          </br>
          <input type="checkbox" id="nuevoDia1" name="nuevoDia1" value="Lunes">Lunes
          <input type="checkbox" id="nuevoDia2" name="nuevoDia2" value="Martes">Martes
          <input type="checkbox" id="nuevoDia3" name="nuevoDia3" value="Miercoles">Miercoles
          <input type="checkbox" id="nuevoDia4" name="nuevoDia4" value="Jueves">Jueves
          <input type="checkbox" id="nuevoDia5" name="nuevoDia5" value="Viernes">Viernes
          <input type="checkbox" id="nuevoDia6" name="nuevoDia6" value="Sabado">Sabado
          <input type="checkbox" id="nuevoDia7" name="nuevoDia7" value="Domingo">Domingo

          <input type="hidden" name="nuevoGuardarDias" id="nuevoGuardarDias" ></input>
          <!--  ================================================================
                Hora de la Limpieza
          =================================================================  -->
          </br>
          <label>Hora De La Limpieza</label>
          </br>
          <form action="https://www.anerbarrena.com/demos/2014/002-time-input-html5.php" name="horaLimpieza">
            <input type="time" id="nuevaHora" name="nuevaHora" value="11:45:00" step="1">
          </form>

          <!--  ================================================================
                INGRESAR FOTO
          =================================================================  -->
          <div class="box-body">

            <div class="form-group">

              <div class="panel">Subir Foto</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso maximo 2MB</p>

              <img src="images/ventanas/ventana Cerrado.png" class="img-thumbnail previsualizar" width="200px" height="200px">

            </div>

          </div>


          <!-- Modal footer -->
          <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn" style="background: #3d9970; color:white">Agregar</button>

            <button type="button" class="btn" style="background:#d81b60; color:white" data-dismiss="modal">Cancelar</button>

          </div>

          
          <?php

          $registro = new ventanasControlador();

          $registro->ctrCrearVentana();

          ?>

        </div>

      </form>

    </div>

  </div>

</div>

<!--  ================================================================
        Modal Editar ventana
=================================================================  -->
<!-- The Modal -->
<div class="modal fade" id="modalEditarVentana">

  <div class="modal-dialog modal-lg">

    <div class="modal-content" style="background: #343a40; color:#fff;">

      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">

          <h4 class="modal-title">Editar Ventana</h4>

          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>

        </div>

        <input type="hidden" class="form-control input-lg" id="idActual" name="idActual" required>

        <!-- contenido del modal -->
        <div class="modal-body" style="background: #7A7878; color:#fff;">

          <!--  ================================================================
                        INGRESA LA REFERENCIA
          =================================================================  -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text">Ingresar La Referencia:</span>

                </div>

                <input type="text" class="form-control input-lg" id="editarReferencia" name="editarReferencia" required>

              </div>

            </div>

          </div>

          <!--  ================================================================
                    INGRESA LA UBICACION
          =================================================================  -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text">Ingresar La Ubicación:</span>

                </div>

                <input type="text" class="form-control input-lg" id="editarUbicacion" name="editarUbicacion" required>

              </div>

            </div>

          </div>

          <!--  ================================================================
                Usuarios Permitidos
          =================================================================  -->

          <label> Ingrese los usuarios que tengan acceso a la ventana</label>
          <div class="form-group select2-dark">
            <?php
            $item = null;
            $valor = null;
            $numero = 0;

            $usuarios = usuariosControlador::ctrMostrarUsuario($item, $valor);
            echo
              '<select name="opcionesUsuarios" id="editarOpcionesUsuarios" class="select2"  multiple="true" style="width: 100%"
                data-placeholder="Seleccione usuarios permitidos" onchange="changeSelect(event)" required > ';
            foreach ($usuarios as $key => $value) {
              echo
                '<option value="' . $value["usuario"] . '">' . $value["usuario"] . '</option>';
            }
            echo '</select>';

            ?>

            <input type="hidden" name="editarUsuarioPermitido" id="editarUsuarioPermitido" class="guardaUsuarioPermitido"></input>

          </div>

          <!--  ================================================================
                Dias
          =================================================================  -->
          </br>
          <label>Dias De Limpieza</label>
          </br>
          <input type="checkbox"  id="editarDia1" name="editarDia1" value="Lunes">Lunes
          <input type="checkbox"  id="editarDia2" name="editarDia2" value="Martes">Martes
          <input type="checkbox"  id="editarDia3" name="editarDia3" value="Miercoles">Miercoles
          <input type="checkbox"  id="editarDia4" name="editarDia4" value="Jueves">Jueves
          <input type="checkbox"  id="editarDia5" name="editarDia5" value="Viernes">Viernes
          <input type="checkbox"  id="editarDia6" name="editarDia6" value="Sabado">Sabado
          <input type="checkbox"  id="editarDia7" name="editarDia7" value="Domingo">Domingo

          <input type="hidden" name="editarGuardarDias" id="editarGuardarDias" ></input>

          <!--  ================================================================
                Hora de la Limpieza
          =================================================================  -->
          </br>
          <label>Hora De La Limpieza</label>
          </br>
          <form action="https://www.anerbarrena.com/demos/2014/002-time-input-html5.php" name="horaLimpieza">
            <input type="time" id="editarHora" name="editarHora" value="11:45:00" step="1">
          </form>

          <!--  ================================================================
                  EDITAR FOTO
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="panel">Subir Foto</div>

                <input type="file" class="nuevaFoto" id="editarFoto" name="editarFoto">

                <input type="hidden" id="fotoActual" name="fotoActual">

                <p class="help-block">Peso maximo 2MB</p>

                      <img src="images/ventanas/Ventana Cerrado.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          <!-- Modal footer -->
          <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn" style="background: #3d9970; color:white">Editar</button>

            <button type="button" class="btn" style="background:#d81b60; color:white" data-dismiss="modal">Cancelar</button>


          </div>
          </div>

        </div>

        <?php

             $editar = new ventanasControlador();

             $editar->ctrEditarVentana();

          ?>

      </form>

    </div>

  </div>
</div>

<?php

$borrar = new ventanasControlador();

$borrar->ctrBorrarVentana();

?>
