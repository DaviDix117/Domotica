document.addEventListener("DOMContentLoaded",function(event){

  var serviciosEnergia = "datos_energia";
  var serviciosGas = "datos_gas";
  var serviciosAgua = "datos_agua";

  var datos = new FormData();

  datos.append("serviciosEnergia",serviciosEnergia);
  datos.append('serviciosGas',serviciosGas);
  datos.append('serviciosAgua',serviciosAgua);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      if (respuesta[0].totalAgua == 0 && respuesta[0].totalEnergia == 0 && respuesta[0].totalGas == 0) 
      {
        Swal.fire({

              type: 'info',
              title:'<h4 class="tituloWhite">¡No se encontraron datos registrados!</h4>',
              html: '<p class="tituloWhite">Por favor ingrese los datos de agua, gas o energia<p>',
              background: '#343a40',
              showConfirmButton: true,
              confirmButtonColor: '#dc3545',
              confirmButtonText: 'Ok',
                               
          });
      }

      if(respuesta[0].totalAgua == 0)
      {
        $('.hiddenAguaCont').attr('hidden', true);
        $('.hiddenAguaButton').attr('hidden', false);
      }else{
        $('.hiddenAguaButton').attr('hidden', true);
        $('.hiddenAguaCont').attr('hidden', false);
        document.getElementById('clickAgua').click();
      }
      if(respuesta[0].totalEnergia == 0)
      {
        $('.hiddenEnergiaCont').attr('hidden', true);
        $('.hiddenEnergiaButton').attr('hidden', false);
      }else{
        $('.hiddenEnergiaButton').attr('hidden', true);
        $('.hiddenEnergiaCont').attr('hidden', false);
        document.getElementById('clickEnergia').click();
      }
      if(respuesta[0].totalGas == 0)
      {
        $('.hiddenGasCont').attr('hidden', true);
        $('.hiddenGasButton').attr('hidden', false);
      }else{
        $('.hiddenGasButton').attr('hidden', true);
        $('.hiddenGasCont').attr('hidden', false);
        document.getElementById('clickGas').click();
      }
    }
  });

});


          /*=============================================
       =            GRAFICA DEL AGUA           =
       =============================================*/
      $(function () {
        // Graphs
        var ctx = document.getElementById('chartAgua')
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
              'Sunday',
              'Monday',
              'Tuesday',
              'Wednesday',
              'Thursday',
              'Friday',
              'Saturday'
            ],
            datasets: [{
              data: [
                15339,
                21345,
                18483,
                24003,
                23489,
                24092,
                12034
              ],
              lineTension: 0,
              backgroundColor: 'transparent',
              borderColor: 'blue',
              borderWidth: 4,
              pointBackgroundColor: 'blue'
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: false
                }
              }]
            },
            legend: {
              display: false
            }
          }
        })
      });


      /*=============================================
       =            GRAFICA DE LA ENERGIA            =
       =============================================*/
      $(function () {
        // Graphs
        var ctx = document.getElementById('chartEnergia')
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
              'Sunday',
              'Monday',
              'Tuesday',
              'Wednesday',
              'Thursday',
              'Friday',
              'Saturday'
            ],
            datasets: [{
              data: [
                15339,
                21345,
                18483,
                24003,
                23489,
                24092,
                12034
              ],
              lineTension: 0,
              backgroundColor: 'transparent',
              borderColor: 'yellow',
              borderWidth: 4,
              pointBackgroundColor: 'yellow'
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: false
                }
              }]
            },
            legend: {
              display: false
            }
          }
        })
      });



      /*=============================================
       =            GRAFICA DE LA GAS           =
       =============================================*/
      $(function () {
        // Graphs
        var ctx = document.getElementById('chartGas')
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [
              'Lunes',
              'Monday',
              'Tuesday',
              'Wednesday',
              'Thursday',
              'Friday',
              'Saturday'
            ],
            datasets: [{
              data: [
                15339,
                21345,
                18483,
                24003,
                23489,
                24092,
                12034
              ],
              lineTension: 0,
              backgroundColor: 'transparent',
              borderColor: 'red',
              borderWidth: 4,
              pointBackgroundColor: 'red'
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: false
                }
              }]
            },
            legend: {
              display: false
            }
          }
        })
      });
    /*=============================================
       =            MOSTRAR INFO DEL GAS           =
       =============================================*/
function gas() {

  document.getElementById('infoGas').style.display="block";
  document.getElementById('infoAgua').style.display="none";
  document.getElementById('infoEnergia').style.display="none"; 

}

/*=============================================
       =       MOSTRAR INFO DE LA ENERGIA    =
=============================================*/
function energia() {

  document.getElementById('infoGas').style.display="none";
  document.getElementById('infoAgua').style.display="none";
  document.getElementById('infoEnergia').style.display="block"; 
     
}
/*=============================================
  =            MOSTRAR INFO DEL AGUA           =
=============================================*/
function agua() {

  document.getElementById('infoGas').style.display="none";
  document.getElementById('infoAgua').style.display="block";
  document.getElementById('infoEnergia').style.display="none"; 
     
}

/*=============================================
  =            IMPIRMIR CONSUMO  de ENERGIA  =
=============================================*/
$(".card-energia").on("click", ".btnImprimirFactura" ,function(){

  var codigoEnergia = $(this).attr("codigoReporte");

  window.open("extensiones/TCPDF/examples/factura.php?codigo="+codigoEnergia, "_blank");

})

// filtro de fecha del gas
$(function () {
    //Date range picker
  $('#reservation-1').daterangepicker()
    //Date range picker with time picker  
})

  // filtro de fecha del agua
$(function () {
    //Date range picker
  $('#reservation-2').daterangepicker()
    //Date range picker with time picker  
 })


  // filtro de fecha de la energia
$(function () {
    //Date range picker
  $('#reservation-e').daterangepicker()
    //Date range picker with time picker  
})
/*=============================================
=            EDITAR GAS           =
=============================================*/

$(document).on("click", ".btnEditarGas" ,function(){
  
  var idServicioGas = $(this).attr("idServicioGas");

  var datos = new FormData();

  datos.append("idServicioGas",idServicioGas);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      $("#modificarNumeroMedidorGas").val(respuesta["numeroMedidorGas"]);
      $("#modificarFactorCorreccion").val(respuesta["factorCorreccion"]);

    }

  });
})

/*=============================================
=            EDITAR AGUA           =
=============================================*/

$(document).on("click", ".btnEditarAgua" ,function(){
  
  var idServicioAgua = $(this).attr("idServicioAgua");

  var datos = new FormData();

  datos.append("idServicioAgua",idServicioAgua);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){
    console.log(respuesta);

      $("#modificarNumeroMedidorAgua").val(respuesta["numeroMedidorAgua"]);
      $("#modificarTarifaAlcantarilladoSuntuario").val(respuesta["tarifaAlcantarilladoSuntuario"]);
      $("#modificarTarifaAlcantarilladoBasico").val(respuesta["tarifaAlcantarilladoBasico"]);
      $("#modificarTarifaAlcantarilladoComplementario").val(respuesta["tarifaAlcantarilladoComplementario"]);
      $("#modificarTarifaAcueductoSuntuario").val(respuesta["tarifaAcueductoSuntuario"]);
      $("#modificarTarifaAcueductoBasico").val(respuesta["tarifaAcueductoBasico"]);
      $("#modificarTarifaAcueductoComplementario").val(respuesta["tarifaAcueductoComplementario"]);
      $("#modificarCargoFijoLiquidacionAcueducto").val(respuesta["cargoFijoLiquidacionAcueducto"]);
      $("#modificarCargoFijoLiquidacionAlcantarillado").val(respuesta["cargoFijoLiquidacionAlcantarillado"]);
    }
  });
})

/*=============================================
=            EDITAR ENERGIA          =
=============================================*/

$(document).on("click", ".btnEditarEnergia" ,function(){
  
  var idServicioEnergia = $(this).attr("idServicioEnergia");

  var datos = new FormData();

  datos.append("idServicioEnergia",idServicioEnergia);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      $("#modificarNumeroMedidorEnergia").val(respuesta["numeroMedidorEnergia"]);
      $("#modificarTarifaEnergia").val(respuesta["tarifaEnergia"]);

    }
  });
})