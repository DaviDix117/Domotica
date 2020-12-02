<div class="content-wrapper" style="background: #6c757d; color:white;">
  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-4">
          <h1>Habitacion 1</h1>
        </div>

        <div class="col-sm-4 d-flex justify-content-center">
          <button class="btn btn-info btnImprimir"><i class="fas fa-print"></i></button>
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

  <!-- Temperatura -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>Temperatura</a>
      </div>
      <div class="card-body" style="background: #424242;">
        <div class="row">

          <!-- Control -->
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knobT" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">Temperatura y aire acondicionado</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>

          <!-- Grafico temp -->
          <div class="col-md-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">

                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafTemp" class="chartjs-render-monitor"></canvas>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </div>
          </div>

        </div>
      </div>
    </div>  
  </section>

  <!-- Humedad -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>Humedad</a>
      </div>      
      <div class="card-body" style="background: #424242;">
        <div class="row">
          <!-- Control -->
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knobH" data-readonly="true" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">Humedad y humidificador</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>            
          <!-- grafiko Humedad -->
          <div class="col-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafHum" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

  <!-- GASES -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>Gases</a>
      </div>       
      <div class="card-body" style="background: #424242;">
        <div class="row">
          
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knobG" data-readonly="true" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">TVOC y Purificador</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>
          
          <div class="col-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                
                <div class="card-body">
                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafTvo" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>                
              </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

</div>

<?php
//---- Grafico----
  $labelsTemp=array(); // label para hora

  $temperaturas=array(); //datos de las temperaturas
  $gases=array();        //datos de los gases
  $humedades=array();    //dattos de las humedades

  $tabla="temp_historico_dia";

  $respuestaTemperatura= temperaturaControlador::ctrHistoricoTemperatura($tabla);
  
  foreach($respuestaTemperatura as $key => $value){
    array_push($temperaturas, $value["Temp"]);
    array_push($gases, $value["Gas"]);
    array_push($humedades, $value["Hum"]);

    $hora_temperatura=substr($value["Fecha"],11,5);

    array_push($labelsTemp, $hora_temperatura);
  }
//---------

?>

<script>
//--------  Grafico de Temperatura --------------
  var ctxT =$("#GrafTemp").get(0).getContext('2d');
  var chart = new Chart(ctxT, {
    type: 'line',
    data: {
      labels: [
        <?php
          foreach($labelsTemp as $value){
            echo "'".$value."',";
          }
        ?>
      ],          
      datasets: [{
        label: 'Temperatura en grados ºC',
        backgroundColor: 'rgb(251, 154, 153)',
        borderColor: 'rgb(255, 99, 132)',
        data:[
          <?php
            foreach($temperaturas as $key => $value){
              echo $value.",";
            }
          ?>
        ]
      }]
    },

    // Configuration options go here
    options: {
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItems, data){
            return tooltipItems.yLabel + '°C';
          }
        }
      }
    }
  });
//----------------

//------------- GRAFICO DE GASES --------------
  var ctxTv = document.getElementById('GrafTvo',).getContext('2d');
  var chart = new Chart(ctxTv, {
    type: 'line',
    data: {
      labels:[
        <?php
          foreach($labelsTemp as $value){
            echo "'".$value."',";
          }
        ?>
      ],   
      datasets: [{
        label: 'Tvoc en %',
        backgroundColor: 'rgb(253, 191, 111)',
        borderColor: 'rgb(255, 127, 0)',
        data: [
          <?php
            foreach($gases as $key => $value){
              echo $value.",";
            }
          ?>
        ]
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItems, data){
            return tooltipItems.yLabel + '%';
          }
        }
      }
    }
  });  
//----------------

//------------- GRAFICO DE HUMEDAD --------------
  var ctxHu = document.getElementById('GrafHum',).getContext('2d');
  var chart = new Chart(ctxHu, {
    type: 'line',
    data: {
      labels: [
      <?php
        foreach($labelsTemp as $value){
          echo "'".$value."',";
        }
      ?>
    ],
      datasets: [{
        label: 'Humedad en %',
        backgroundColor: 'rgb(166, 206, 227)',
        borderColor: 'rgb(31, 120, 180)',
        data: [
          <?php
            foreach($humedades as $key => $value){
              echo $value.",";
            }
          ?>
        ]
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItems, data){
            return tooltipItems.yLabel + '%';
          }
        }
      },
			hover: {
				mode: 'nearest',
				intersect: true
			}
    }
  });
//----------------

</script>
