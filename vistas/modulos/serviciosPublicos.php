<div class="content-wrapper" style="background: #6c757d; color:white;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Servicios Publicos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active" style="color:white;">Servicios publicos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- /*=============================================
  =           LOS CARDS          =
  =============================================*/ -->
  <section class="content">
      
      <div class="row" align="center">
        <!-- /*=============================================
        =            TARJETA DEL GAS            =
        =============================================*/ -->
            
            <div class="col-md-4 col-12 ">

                <!-- small card -->
                <div class="small-box bg-danger hiddenGasCont" hidden>

                  <div class="inner">

                    <h3>40<sup style="font-size: 20px">%</sup></h3>

                    <span>Consumo del Gas</span>

                  </div>

                    <div class="icon">

                      <i class="fas fa-fire"></i>

                    </div>

                    <a class="small-box-footer" onclick="gas();">Mas informacion <i class="fas fa-arrow-circle-right" id="clickGas"></i></a>


                </div>

                <button hidden class="btn btn-danger hiddenGasButton" data-toggle="modal" data-target="#modalCrearDatosGas"><i class="fas fa-fire" style="color: #fff;"></i>  Crear datos del gas</button>

            </div>

          <!-- /*=============================================
            =            TARJETA DEL AGUA            =
            =============================================*/ -->

            <div class="col-md-4 col-12">

                <!-- small card -->
                <div class="small-box bg-primary hiddenAguaCont" hidden>

                  <div class="inner">

                    <h3>60<sup style="font-size: 20px">%</sup></h3>

                    <span>Consumo del Agua</span>

                  </div>

                  <div class="icon">

                    <i class="fas fa-tint" ></i>

                  </div>

                  <a class="small-box-footer" onclick="agua();">Mas informacion <i class="fas fa-arrow-circle-right" id="clickAgua"></i></a>

                </div>

                <button hidden class="btn btn-primary hiddenAguaButton" data-toggle="modal" data-target="#modalCrearDatosAgua"><i class="fas fa-tint" style="color: #fff;"></i>  Crear datos del Agua</button>

            </div>

          <!-- =============================================
                  =          TARJETAS ENERGIA         =
            ============================================= -->

            <div class="col-md-4 col-12">

                <!-- small card -->
                <div class="small-box bg-warning hiddenEnergiaCont" hidden>

                  <div class="inner">

                    <h3>55<sup style="font-size: 20px">%</sup></h3>

                    <span>Consumo de la Energia</span>

                  </div>

                  <div class="icon">

                    <i class="fas fa-bolt"></i>

                  </div>

                  <a class="small-box-footer" onclick="energia();">Mas informacion<i class="fas fa-arrow-circle-right" id="clickEnergia"></i></a>

                </div>

                <button hidden class="btn btn-warning hiddenEnergiaButton" data-toggle="modal" data-target="#modalCrearDatosEnergia"><i class="fas fa-bolt" style="color: #fff;"></i>  Crear datos de la energia</button>

            </div>


      </div>

       

             <!-- =============================================
                 =            DIAGRAM DE LINEAS DEL GAS           =
            ============================================= -->
            <section id="infoGas" class="hiddenGasCont" hidden>

                <div class="col-lg-12">

                    <div class="card card-danger card-outline">

                      <div class="card-header" style="background: #343a40;">

                          <h3 class="card-title">

                            <i class="fas fa-fire" style="color:#FE2A4A;"></i>

                              Información de Gas

                          </h3>

                      </div><!-- fin de encabezado de la cabeza -->

                    </div><!-- fin de la tarjeta -->

                    <div class="card">

	                    <div class="card-body">

	                      <canvas id="chartGas" style=" width: 100%; height: 300px;"></canvas>

	                    </div>
	                </div>
                </div>

                <!-- =============================================
                 =            BOTON CON MAS INFO DEL GAS           =
                ============================================= -->
                <div class="card-footer"style="background: #343a40; color:#fff;">
                  <?php 
                    $tabla = "datos_gas";
                    $item = null;
                    $valor = null;

                    $modificarGas = ServiciosControlador::ctrMostrar($tabla ,$item, $valor);

                    foreach ($modificarGas as $key => $value) { 
                      echo'

                        <button class="btn btn-secondary " data-toggle="modal" data-target="#modalTablaGas" style="background-color: #FE2A4A;"><i class="fas fa-table" style="color: #000;"></i></button>

                        <button style="position:absolute; right:0;" class="btn btn-secondary btnEditarGas"  idServicioGas="'.$value["idGas"].'" data-toggle="modal" data-target="#modalModificarDatosGas"><i class="fas fa-address-card" style="color: #fff;"></i></button>

                      ';
                    }
                  ?>
                </div>
            </section>
            
            <!-- =============================================
              =            DIAGRAMA DE LINEAS DEL AGUA          =
            ============================================= -->
            <section id="infoAgua" class="hiddenAguaCont" hidden>
              
              <div class="col-lg-12">

                  <div class="card card-primary card-outline">

                    <div class="card-header" style="background: #343a40;">

                      <h3 class="card-title">

                        <i class="fas fa-tint" style="color:#2A50FE;"></i>

                          Información del Agua

                      </h3>

                    </div><!-- fin de encabezado de la cabeza -->

                  </div><!-- fin de la tarjeta -->

                  	<div class="card">

	                    <div class="card-body">

	                      <canvas id="chartAgua" style=" width: 100%; height: 300px;"></canvas>

	                    </div>
	                </div>

              </div>

              <!-- =============================================
                 =            BOTON CON MAS INFO DEL AGUA          =
                ============================================= -->
              <div class="card-footer"style="background: #343a40;color:#fff;">
                
                      
                          <button class="btn btn-secondary " data-toggle="modal" data-target="#modalTablaAgua" style="background-color:#2A50FE;"><i class="fas fa-table" style="color:#000;"></i></button>

                      <?php 
                        $tabla = "datos_Agua";
                        $item = null;
                        $valor = null;

                        $modificarAgua = ServiciosControlador::ctrMostrar($tabla ,$item, $valor);

                          foreach ($modificarAgua as $key => $value) { 
                            echo'<button style="position:absolute; right:0;" class="btn btn-secondary btnEditarAgua"  idServicioAgua="'.$value["idAgua"].'" data-toggle="modal" data-target="#modalModificarDatosAgua"><i class="fas fa-address-card" style="color: #fff;"></i></button>';
                          }
                      ?>
              </div>

            </section>
            
            <!-- =============================================
              =            DIAGRAMA DE LINEAS DE LA ENERGIA        =
            ============================================= -->

            <section id="infoEnergia" class="hiddenEnergiaCont" hidden>
              
                <div class="col-lg-12">

                    <div class="card card-warning card-outline">

                      <div class="card-header" style="background: #343a40;">

                        <h3 class="card-title">

                          <i class="fas fa-bolt" style="color:#FCCF19;"></i>

                            Información de la Energia

                        </h3>

                      </div><!-- fin de encabezado de la cabeza -->

                    </div><!-- fin de la tarjeta -->

	                    <div class="card">

		                    <div class="card-body">

		                      <canvas id="chartEnergia" style=" width: 100%; height: 300px;"></canvas>

		                    </div>

		                </div>

                </div>

                <!-- =============================================
                 =            BOTON CON MAS INFO DEL ENERGIA         =
                ============================================= -->
                <div class="card-footer"style="background: #343a40; color:#fff;">
                  <?php 
                    $tabla = "datos_Energia";
                    $item = null;
                    $valor = null;

                    $modificarEnergia = ServiciosControlador::ctrMostrar($tabla ,$item, $valor);

                    foreach ($modificarEnergia as $key => $value) { 
                      echo'

                      <button class="btn btn-secondary " data-toggle="modal" data-target="#modalTablaEnergy" style="background-color:#FCCF19;"><i class="fas fa-table" style="color:#000;"></i></button>

                      <button style="position:absolute; right:0;" class="btn btn-secondary btnEditarEnergia"  idServicioEnergia="'.$value["idEnergia"].'" data-toggle="modal" data-target="#modalModificarDatosEnergia"><i class="fas fa-address-card" style="color: #fff;"></i></button>';
                    }
                  ?>
                </div>
            </section>

       
        <!-- /*=============================================
        =           FIN DE LOS CARDS        =
        =============================================*/ -->

      

  </section>
  
</div>


<!-- /.content-wrapper -->
<!--  ================================================================
    Modal VER TABLA DE ENERGIA
  =================================================================  --> 
<!-- The Modal -->
<div class="modal fade" id="modalTablaEnergy">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;">Tabla de Datos de la Energia</h4>
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
      </div>
      <!-- contenido del modal -->
      <div class="modal-body" style="background: #6c757d; color:#fff;">
        <div class="box-body" style="align-content: center;">           
          <!--  ======================================================
            CARTA DE DATOS DE LA ENERGIA
          =================================================  --> 
          <div class="container" style="color: #000;">
            <div class="row" align="center" style="color: #fff;">
              <div class="col-md-4"></div>
                <!-- plugin del calendario -->
                <div class="card-body col-md-4">
                  <!-- Date range -->
                  <div class="form-group">
                    <label>Busqueda por fecha:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation-e">
                    </div>
                    
                  </div>
                </div>
              <div class="col-md-4"></div>
            </div>
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user card-energia">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-warning">
                <h3 class="widget-user-username" style="color: #000;">Informacion de la Energia</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="./images/servicios/rayo.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <?php 
                    $item = null;
                    $valor= null;
                    $tabla= "productos";

                    $servicio = ServiciosControlador::ctrMostrar($tabla,$item,$valor);
              
                    foreach ($servicio as $key => $value) {
                      // <!-- numero del medidor -->
                      echo'<div class="col-sm-2 border-right">
                          <div class="description-block">
                            <h5 class="description-header">No del Medidor</h5>
                            <span class="description-text">'.$value['codigo'].'</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- lectura actual -->
                        <div class="col-sm-3 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Lectura Actual</h5>
                            <span class="description-text">'.$value['precio_compra'].'</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- lectura anterior -->
                        <div class="col-sm-3 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Lectura Anterior</h5>
                            <span class="description-text">'.$value['precio_venta'].'</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- consumo del mes  -->
                        <div class="col-sm-2">
                          <div class="description-block">
                            <h5 class="description-header">Consumo del mes</h5>
                            <span class="description-text">'.$value['stock'].'</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!--  boton de imprimir  -->
                        <div class="col-sm-2">
                          <div class="description-block">
                            <h5 class="description-header">Acciones</h5>
                              <button type="button" class="btn btn-primary 
                              btnImprimirFactura" codigoReporte="'.$value['codigo'].'">
                                <i class="fa fa-print"></i>
                              </button>
                            </h5>
                          </div>
                        </div>';
                      }
                    ?>
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer" style="background: #343a40; color:#fff;margin-right: auto; margin-left: auto;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>

<!--  ================================================================
    Modal VER TABLA DE AGUA
  =================================================================  --> 
<!-- The Modal -->
<div class="modal fade" id="modalTablaAgua">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;">Tabla de Datos del Agua</h4>
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
      </div>
      <!-- contenido del modal -->
      <div class="modal-body" style="background: #6c757d; color:#fff;">
        <div class="box-body" style="align-content: center;">           
          <!--  ======================================================
            CARTA DE DATOS DEL AGUA
          =================================================  --> 
          <div class="container" style="color: #000;">
            <div class="row" align="center" style="color: #fff;">
              <div class="col-md-4"></div>
                <!-- plugin del calendario -->
                <div class="card-body col-md-4">
                  <!-- Date range -->
                  <div class="form-group">
                    <label>Busqueda por fecha:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation-2">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
              <div class="col-md-4"></div>
            </div>
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username" style="color: #fff;">Informacion del Agua</h3>
                <h5 class="widget-user-desc" style="color: #fff;">Datos</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="./images/servicios/agua.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">No del Medidor</h5>
                      <span class="description-text">6900992</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Lectura Actual</h5>
                      <span class="description-text">81828182</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Lectura Anterior</h5>
                      <span class="description-text">82177</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header">Consumo del mes</h5>
                      <span class="description-text">6</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>          
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer" style="background: #343a40; color:#fff;margin-right: auto; margin-left: auto;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>

<!--  ================================================================
    Modal VER TABLA DE GAS
  =================================================================  --> 
<!-- The Modal -->
<div class="modal fade" id="modalTablaGas">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" >Tabla de Datos del Gas</h4>
        <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
      </div>
      <!-- contenido del modal -->
      <div class="modal-body" style="background: #6c757d; color:#fff;">
        <div class="box-body" style="align-content: center;">           
          <!--  ======================================================
            CARTA DE DATOS DEL GAS
          =================================================  --> 
          <div class="container" style="color: #000;">
            <div class="row" align="center" style="color: #fff;">
              <div class="col-md-4"></div>
                <!-- plugin del calendario -->
                <div class="card-body col-md-4">
                  <!-- Date range -->
                  <div class="form-group">
                    <label>Busqueda por fecha:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation-1">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
              <div class="col-md-4"></div>
            </div>
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-danger">
                <h3 class="widget-user-username" style="color: #000;">Informacion del Gas</h3>
                <h5 class="widget-user-desc" style="color: #000;">Datos</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="./images/servicios/fuego.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">No del Medidor</h5>
                      <span class="description-text">6900992</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Lectura Actual</h5>
                      <span class="description-text">81828182</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Lectura Anterior</h5>
                      <span class="description-text">82177</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header">Consumo del mes</h5>
                      <span class="description-text">7</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer" style="background: #343a40; color:#fff;margin-right: auto; margin-left: auto;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>

<!--================================================================
  Modal crear Datos Gas
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalCrearDatosGas">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear datos gas</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">
          <!--  ================================================================
            INGRESA N° contador
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <label for="exampleInputEmail1">Email address</label>
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoNumeroMedidorGas" placeholder="Ingresar numero de medidor" required>
              </div>
            </div>
          </div>
          <!--  ================================================================
            INGRESA factor de Correccion
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="nuevoFactorCorreccion" name="nuevoFactorCorreccion" placeholder="Ingresar factor de correccion" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-danger">Crear</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrIngresarDatosGas();
        ?>
      </form>
    </div>
  </div>
</div>

<!--================================================================
  Modal Crear Datos Agua
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalCrearDatosAgua">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear datos agua</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">
          <!--  ================================================================
            INGRESA N° contador
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoNumeroMedidorAgua" placeholder="Ingresar numero de medidor" required>
              </div>
            </div>
          </div>
          <!--  ================================================================
            INGRESA tarifa Alcantarillado Suntuario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoTarifaAlcantarilladoSuntuario" placeholder="Ingresar tarifa de alcantarillado suntuario" required> 
              </div>
            </div>
          </div>
          <!--  ================================================================
            INGRESA tarifa Alcantarillado basico
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                  <input type="number" class="form-control input-lg"  name="nuevoTarifaAlcantarilladoBasico" placeholder="Ingresar tarifa de alcantarillado Basico" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            INGRESA tarifa Alcantarillado complementario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoTarifaAlcantarilladoComplementario" placeholder="Ingresar tarifa de alcantarillado complementario" required> 
              </div>
            </div>
          </div>

          <!--================================================================
            INGRESA tarifa Acueducto Suntuario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoTarifaAcueductoSuntuario" placeholder="Ingresar tarifa de acueducto suntuario" required> 
              </div>
            </div>
          </div>
          
          <!--================================================================
            INGRESA tarifa Acueducto Basico
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoTarifaAcueductoBasico" placeholder="Ingresar tarifa de acueducto basico" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            INGRESA tarifaA cueducto Complementario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoTarifaAcueductoComplementario" placeholder="Ingresar tarifa de acueducto complementario" required> 
              </div>
            </div>
          </div>

          <!--  ================================================================
            INGRESA cargo Fijo Liquidacion Acueducto
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoCargoFijoLiquidacionAcueducto" placeholder="Ingresar cargo fijo de liquidacion del acueducto" required> 
              </div>
            </div>
          </div>

          <!--  ================================================================
            INGRESA cargo Fijo Liquidacion Alcantarillado
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg"  name="nuevoCargoFijoLiquidacionAlcantarillado" placeholder="Ingresar cargo fijo de liquidacion del alcantarillado" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-primary">Crear</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrIngresarDatosAgua();
        ?> 
      </form>
    </div>
  </div>
</div>

<!--================================================================
  Modal Crear Datos Energia
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalCrearDatosEnergia">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear datos agua</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">
        
          <!--  ================================================================
            INGRESA N° contador
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoNumeroMedidorEnergia" placeholder="Ingresar numero de medidor" required>
              </div>
            </div>
          </div>
          <!--  ================================================================
            INGRESA tarifa Energia
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevaTarifaEnergia" placeholder="Ingresar tarifa energia" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-warning">Crear</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrIngresarDatosEnergia();
        ?>
      </form>
    </div>
  </div>
</div>

<!--================================================================
  Modal MODIFICAR Datos Gas
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalModificarDatosGas">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos gas</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">

          <!--  ================================================================
            MODIFICAR N° contador
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarNumeroMedidorGas">Numero Medidor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-sm" id="modificarNumeroMedidorGas" name="modificarNumeroMedidorGas" value="" required>
              </div>
            </div>
          </div>

          <!--  ================================================================
            MODIFICAR factor de Corrección
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarFactorCorreccion">Factor de Corrección</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarFactorCorreccion" name="modificarFactorCorreccion" value="" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-dark">Modificar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrModificarDatosGas();
        ?>
      </form>
    </div>
  </div>
</div>

<!--================================================================
  Modal MODIFICAR Datos Agua
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalModificarDatosAgua">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos agua</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">

        <!--  ================================================================
          MODIFICAR N° contador
        =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarNumeroMedidorAgua">Numero Medidor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarNumeroMedidorAgua" name="modificarNumeroMedidorAgua" value="" required>
              </div>
            </div>
          </div>

          <!--  ================================================================
            MODIFICAR tarifa Alcantarillado Suntuario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaAlcantarilladoSuntuario">Tarifa de Alcantarillado Suntuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAlcantarilladoSuntuario" name="modificarTarifaAlcantarilladoSuntuario" value="" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            MODIFICAR tarifa Alcantarillado basico
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaAlcantarilladoBasico">Tarifa de Alcantarillado Basico</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAlcantarilladoBasico" name="modificarTarifaAlcantarilladoBasico" value="" required> 
              </div>
            </div>
          </div>
          

            <!--  ================================================================
              MODIFICAR tarifa Alcantarillado complementario
            =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaAlcantarilladoComplementario">Tarifa de Alcantarillado Complementario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAlcantarilladoComplementario" name="modificarTarifaAlcantarilladoComplementario" value="" required> 
              </div>
            </div>
          </div>

          <!--  ================================================================
            MODIFICAR tarifa Acueducto Suntuario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaAcueductoSuntuario">Tarifa de Acueducto Suntuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAcueductoSuntuario" name="modificarTarifaAcueductoSuntuario" value="" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            MODIFICAR tarifa Acueducto Basico
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
               <label for="modificarTarifaAcueductoBasico">Tarifa de Acueducto Basico</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAcueductoBasico" name="modificarTarifaAcueductoBasico" value="" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            MODIFICAR tarifaA cueducto Complementario
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaAcueductoComplementario">Tarifa de Acueducto Complementario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaAcueductoComplementario" name="modificarTarifaAcueductoComplementario" value="" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            MODIFICAR cargo Fijo Liquidacion Acueducto
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarCargoFijoLiquidacionAcueducto">Cargo Fijo de Liquidacion Acueducto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarCargoFijoLiquidacionAcueducto" name="modificarCargoFijoLiquidacionAcueducto" value="" required> 
              </div>
            </div>
          </div>
          
          <!--  ================================================================
            MODIFICAR cargo Fijo Liquidacion Alcantarillado
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarCargoFijoLiquidacionAlcantarillado">Cargo Fijo de Liquidacion Alcantarillado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarCargoFijoLiquidacionAlcantarillado" name="modificarCargoFijoLiquidacionAlcantarillado" value="" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-dark">Modificar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrModificarDatosAgua();
        ?>
      </form>
    </div>
  </div>
</div>

<!--================================================================
Modal MODIFICAR Datos Energia
=================================================================--> 
<!-- The Modal -->
<div class="modal fade" id="modalModificarDatosEnergia">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar datos energia</h4>
          <button type="button" class="close" style="color:red;" data-dismiss="modal">&times;</button>
        </div>
        <!-- contenido del modal -->
        <div class="modal-body" style="background: #6c757d; color:#fff;">
        
          <!--  ================================================================
            MODIFICAR N° contador
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarNumeroMedidorEnergia">Numero Medidor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarNumeroMedidorEnergia" name="modificarNumeroMedidorEnergia" value="" required>
              </div>
            </div>
          </div>
          
          <!--  ================================================================
              MODIFICAR tarifa Energia
          =================================================================  --> 
          <div class="box-body">
            <div class="form-group">
              <label for="modificarTarifaEnergia">Tarifa de Energia</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="number" class="form-control input-lg" id="modificarTarifaEnergia" name="modificarTarifaEnergia" value="" required> 
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer" style="background: #343a40; color:#fff;">
          <button type="submit" class="btn btn-dark">Modificar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <?php 
          $registro = new ServiciosControlador();
          $registro->ctrModificarDatosEnergia();
        ?>
      </form>
    </div>
  </div>
</div>