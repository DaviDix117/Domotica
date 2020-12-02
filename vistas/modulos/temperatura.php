<div class="content-wrapper" style="background: #6c757d; color:white;"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-4">
          <h1>Temperatura</h1>
        </div>

        <div class="col-sm-4 d-flex justify-content-center">
          <div class="btn-group">

            <button class="btn btn-success btnAñadir" data-toggle="modal" data-target="#añadir"><i class="fas fa-plus"></i></button>
            <button class="btn btn-info btnImpPt" codigoHap="Habitacion"><i class="fas fa-print"></i></button>
          </div>          
        </div>

        <div class="col-sm-4">

          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active" style="color:white;">Temperatura</li>
          </ol>

        </div>

      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped table-hover table-dark  tablas">        
        <thead class="thead-dark">          
          <tr>
            <th>id</th>
            <th>Habitacion</th>
            <th>Temp</th>
            <th>Hum</th>
            <th>Tvo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody> 

          <?php  

            $item = null;
            $valor = null;

            $temp = temperaturaControlador::ctrMostrarTemp($item, $valor);

            foreach ($temp as $key => $value) {

            echo 

            '<tr>

              <td class="align-middle text-center">
                '.$value["id"].' 
              </td>

              <!-- NOMBRE -->
              <td class="align-middle text-center">
                '.$value["nombre"].'
              </td>

              <!-- Temperatura -->
                <td class="align-middle text-center">
                  <div class="d-flex justify-content-center">                
                  '.$value["temp"].'°C
                  </div>
                  <div class="d-flex justify-content-center">';
                    if ($value["estado_temp"] == 1) {
                      echo '<button class="btn btn-success btn-xs btnActivarTemp" idTemperatura="'.$value["id"].'" estadoTemp="0">Activado</button>';
                    }else{
                      echo '<button class="btn btn-danger btn-xs btnActivarTemp" idTemperatura="'.$value["id"].'" estadoTemp="1">Desactivado</button>';
                    }echo'
                  </div>
                </td>
              
              <!-- HUMEDAD -->
              <td>
                <div class="d-flex justify-content-center"> 
                  '.$value["hum"].'%
                </div>
                <div class="d-flex justify-content-center">'; 
                  if ($value["estado_hum"] == 1) {
                    echo '<button class="btn btn-success btn-xs btnActivarHum" idHumedad="'.$value["id"].'" estadoHum="0">Activado</button>';
                  }else{
                    echo '<button class="btn btn-danger btn-xs btnActivarHum" idHumedad="'.$value["id"].'" estadoHum="1">Desactivado</button>';
                  }echo'
                </div>                              
              </td>
              
              <!-- GASES -->
              <td>
                <div class="d-flex justify-content-center"> 
                  '.$value["tvo"].'%
                </div>
                <div class="d-flex justify-content-center">'; 
                  if ($value["estado_tvo"] == 1) {
                    echo '<button class="btn btn-success btn-xs btnActivarTvo" idTvo="'.$value["id"].'" estadoTvo="0">Activado</button>';
                  }else{
                    echo '<button class="btn btn-danger btn-xs btnActivarTvo" idTvo="'.$value["id"].'" estadoTvo="1">Desactivado</button>';
                  }echo'
                </div>              
              </td>

              <!-- BOTONES -->
              <td>
                <div class="btn-group btn-block">
                  <a class="btn btn-outline-light btnGrafica" href="tempHabitacion" role="button"><i class="fas fa-chart-bar"></i></a>

                  <button class="btn btn-outline-info btnPermiso" data-toggle="modal" data-target="#permisos"><i class="fas fa-users-cog"></i></button>

                  <button class="btn btn-outline-warning btnEditarTemperatura" idTemperatura="'.$value["id"].'" data-toggle="modal" data-target="#editar"><i class="fas fa-pen"></i></button>

                  <button class="btn btn-outline-danger btnEliminar" idCuarto="'.$value["id"].'""><i class="fas fa-times"></i></button>
                </div>
              </td>
            <tr>';
          }

        ?>
        </tbody>
      </table>
    </div>    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL EDITAR-->
<div class="modal fade" id="editar">-
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Editar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #424242; color:#fff;">

          <!-- ID habitacion -->
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="idActual" id="idActual" required readonly>
              </div>
            </div>
          </div>

          <!-- Modificar nombre -->
          <div class="box-body">
            <h6>Ingrese el nombre de la habitación</h6>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="editarCuarto" id="editarCuarto" required>
              </div>
            </div>
          </div>

          <br>
          <h5>Modificar los valores para las alarmas</h5>
          <br>

          <!-- RANGOS -->
          <dl class="row">
            <dt class="col-sm-4">Temperatura</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMinTemp" id="editarMinTemp" 
                  required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMaxTemp" id="editarMaxTemp"
                   required>
                </div>
              </div>              
            </dd>

            <dt class="col-sm-4">Humedad</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMinHum" id="editarMinHum"
                   required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMaxHum" id="editarMaxHum"
                   required>
                </div>
              </div>              
            </dd>

            <dt class="col-sm-4">Gas</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMinGas" id="editarMinGas"
                   required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="editarMaxGas" id="editarMaxGas"
                   required>
                </div>
              </div>              
            </dd>
          </dl>

          <!-- <div class="box-body">

            <h6>Ingrese la temperatura actual</h6>
            <div class="form-group">              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="editarTemp" id="editarTemp"  required>
              </div>
            </div>

          </div><br>

          <div class="box-body">

            <h6>Ingrese la humedad actual</h6>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="editarHum" id="editarHum"  required>
              </div>
            </div>

          </div><br>

          <div class="box-body">

            <h6>Ingrese el porcentaje de gases actual</h6>
            <div class="form-group">              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="editarTvo" id="editarTvo"  required>
              </div>
            </div>

          </div> -->

        </div>

        <div class="modal-footer" style="background: #343a40; color:#fff;">
            <button type="submit" class="btn btn-dark">guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>

        <?php

          $registro = new temperaturaControlador();

          $registro->ctrEditarTemperatura();

        ?>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL AÑADIR -->
<div class="modal fade" id="añadir">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Añadir</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #424242; color:#fff;">

          <!-- Ingresar nombre -->
          <div class="box-body">
            <h5>Ingrese el nombre de la habitación</h5>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoCuarto"
                placeholder="Ingresar Nombre" required>
              </div>
            </div>
          </div>

          <br>
          <h5>Establezca los valores para alarmas</h5>
          <br>

          <!-- RANGOS -->
          <dl class="row">
            <dt class="col-sm-4">Temperatura</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="minTemp"
                  placeholder="Min" required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="maxTemp"
                  placeholder="Max" required>
                </div>
              </div>              
            </dd>

            <dt class="col-sm-4">Humedad</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="minHum"
                  placeholder="Min" required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="maxHum"
                  placeholder="Max" required>
                </div>
              </div>              
            </dd>

            <dt class="col-sm-4">Gas</dt>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-minus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="minGas"
                  placeholder="Min" required>
                </div>
              </div>              
            </dd>
            <dd class="col-sm-4">
              <div class="form-group">              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus-square"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" name="maxGas"
                  placeholder="Max" required>
                </div>
              </div>              
            </dd>
          </dl>

        </div>

        <div class="modal-footer" style="background: #343a40; color:#fff;">
            <button type="submit" class="btn btn-dark">Agregar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>

        <?php

            $registro = new temperaturaControlador();

            $registro->ctrCrearCuarto();

          ?>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL PERMISOS-->
<div class="modal fade" id="permisos">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <div class="modal-header">
        <h4 class="modal-title">Permisos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #424242; color:#fff;" >
        <div class="table-responsive">
          <table class="table table-striped table-dark table-bordered table-hover" >
            <caption>Tabla para modificar los permisos de controlar la habitacion y las notificaciones</caption>
            <thead>
              <tr>
                <th scope="col">Habitacion</th>
                <th scope="col">Usuario</th>
                <th scope="col">Persmiso controles</th>
                <th scope="col">Permiso notificaciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Fabian</th>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs" idUsuario="">Activado</button></td>
                <td><button class="btn btn-success btn-xs" idUsuario="">Activado</button></td>
              </tr>
              <tr>
                <th scope="row">Fabian</th>
                <td>Fabian</td>
                <td><button class="btn btn-success btn-xs" idUsuario="">Activado</button></td>
                <td><button class="btn btn-success btn-xs" idUsuario="">Activado</button></td>
              </tr>              
            </tbody>
          </table>
        </div>
        <div class="form-check">
        </div>
      </div>
      <div class="modal-footer justify-content-between" style="background: #333; color: #888;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php

  $borrar = new temperaturaControlador();
  $borrar->ctrBorrarCuarto();

?>