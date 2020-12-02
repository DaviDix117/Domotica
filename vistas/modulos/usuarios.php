  <div class="content-wrapper" style="background: #6c757d;">

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="text-white">Usuarios</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

              <li class="breadcrumb-item active text-white">Usuarios</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-header" style="background: #343a40;">

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarUsuario">
              <i class="fas fa-user-plus"></i>
            </button>

        </div>

        <div class="card-body" style="background: #adb5bd;">

          <table class="table table-dark table-striped table-hover dt-responsive tablas" width="100%">

            <thead>

              <tr>

                <th style="width: 8px">id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo Login</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

                $item = null;
                $valor = null;
                $numero=0;

                $usuarios = usuariosControlador::ctrMostrarUsuario($item, $valor);

                foreach ($usuarios as $key => $value) {
                  $numero++;
                  echo
                  '<tr>

                    <td>'.$numero.'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["usuario"].'</td>';

                    if ($value["foto"] == null) {

                      echo '<td><img src="images/foto/AdminMaleAvatar.png" class="img-thumbnail" width="40px"></td>';

                    } else {

                      echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                    }

                    echo
                    '<td>'.$value["perfil"].'</td>';

                    if ($value["estado"] == 1) {

                      echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                    }

                    echo'<td>'.$value["ultimo_login"].'</td>

                    <td>
                      <div class="btn-group">

                        <button class="btn btn-dark btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal"
                        data-target="#modalEditarUsuario"><i class="fa fa-pencil-alt" style="color:#fff;"></i></button>

                        <button class="btn btn-danger btnEliminarUsuario" fotoUsuario="'.$value["foto"].'" idUsuario="
                        '.$value["id"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                      </div>
                    </td>

                  </tr>';
                }
              ?>

            </tbody>

          </table>

        </div>

        <div class="card-footer" style="background: #343a40; color:#fff;">

          <h6>Tabla de usuarios</h6>

        </div>

        <!-- /.card-footer-->
      </div>

      <!-- /.card -->

    </section>

    <!-- /.content -->
  </div>

  <!--  ================================================================
          Modal Agregar Usuario
      =================================================================  -->
  <!-- The Modal -->
  <div class="modal fade" id="modalAgregarUsuario">

    <div class="modal-dialog modal-lg">

      <div class="modal-content" style="background: #343a40; color:#fff;">

        <form role="form" method="post" enctype="multipart/form-data">

          <!-- Modal Header -->
          <div class="modal-header">

            <h4 class="modal-title">Agregar usuario</h4>

            <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>

          </div>

          <!-- contenido del modal -->
          <div class="modal-body" style="background: #6c757d; color:#fff;">

            <!--  ================================================================
                          INGRESA EL NOMBRE
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                      <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoNombre"
                  placeholder="Ingresar Nombre" required>

                </div>

              </div>

            </div>

            <!--  ================================================================
                      INGRESA EL USUARIO
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario"
                  placeholder="Ingresar Nombre" required>

                </div>

              </div>

            </div>

            <!--  ================================================================
                  INGRESA PASSWORD
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-lock"></i></span>

                  </div>

                  <input type="password" class="form-control input-lg" name="nuevoPassword"
                  placeholder="Ingresar Contraseña" required>

                </div>

              </div>

            </div>

            <!--  ================================================================
                  INGRESA PERFIL
            =================================================================  -->

            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <select class="form-control input-lg" name="nuevoPerfil" required="">

                  </div>

                  <select class="form-control input-lg" name="nuevoPerfil">

                    <option value="">Selecionar Perfil</option>

                    <option value="Administrador">Administrador</option>

                    <option value="Permanente">usuario</option>

                    <option value="Invitado">Invitado</option>

                  </select>

                </div>

              </div>

            </div>

            <!--  ================================================================
                  INGRESAR FOTO
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="panel">Subir Foto</div>

                <input type="file" class="nuevaFoto" name="nuevaFoto">

                <p class="help-block">Peso maximo 2MB</p>

                <img src="images/foto/AdminMaleAvatar.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn btn-dark">Agregar</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>

          <?php

            $registro = new usuariosControlador();

            $registro->ctrCrearUsuario();

          ?>

        </form>

      </div>

    </div>

  </div>

  <!--  ================================================================
          Modal Editar Usuario
  =================================================================  -->

  <!-- The Modal -->
  <div class="modal fade" id="modalEditarUsuario">

    <div class="modal-dialog modal-lg">

      <div class="modal-content" style="background: #343a40; color:#fff;">

        <form role="form" method="post" enctype="multipart/form-data">

          <!-- Modal Header -->
          <div class="modal-header">

            <h4 class="modal-title">Modificar usuario</h4>

            <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>

          </div>

          <!-- contenido del modal -->
          <div class="modal-body" style="background: #6c757d; color:#fff;">

            <!--  ================================================================
                          EDITA EL NOMBRE
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                      <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                </div>

              </div>

            </div>

            <!--  ================================================================
                      EDITA EL USUARIO
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" id="editarUsuario"
                  name="editarUsuario" value="" required readonly>

                </div>

              </div>

            </div>

            <!--  ================================================================
                  EDITA PASSWORD
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-lock"></i></span>

                  </div>

                  <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword" placeholder="ingrese una nueva contraseña">

                  <input type="hidden" id="passwordActual" name="passwordActual">

                </div>

              </div>

            </div>

            <!--  ================================================================
                  EDITA PERFIL
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-users"></i></span>

                    <select class="form-control input-lg"  name="editarPerfil" id="editarPerfil">

                    <option value="" id="editarPerfil"></option>

                    <option value="Administrador">Administrador</option>

                    <option value="Permanente">usuario</option>

                    <option value="Invitado">Invitado</option>

                  </select>

                </div>

              </div>

            </div>

            <!--  ================================================================
                  EDITAR FOTO
            =================================================================  -->
            <div class="box-body">

              <div class="form-group">

                <div class="panel">Subir Foto</div>

                <input type="file" class="nuevaFoto" id="editarFoto" name="editarFoto">

                <input type="hidden" id="fotoActual" name="fotoActual">

                <p class="help-block">Peso maximo 2MB</p>

                      <img src="images/foto/AdminMaleAvatar.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn btn-dark">Guardar Cambios</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>

          <?php

             $editar = new usuariosControlador();

             $editar->ctrEditarUsuario();

          ?>

        </form>

      </div>

    </div>

  </div>

  <?php

    $borrar = new usuariosControlador();

    $borrar->ctrBorrarUsuario();

   ?>
