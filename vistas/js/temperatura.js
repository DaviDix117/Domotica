/*==============================
   Sweet alert eliminar
=============================*/
$(document).on("click", ".btnEliminar", function(){

    var idCuarto = $(this).attr("idCuarto");

    Swal.fire({

    title: '<span class="tituloWhite"> ¿Estas seguro de eliminarlo? </span>',
    html: '<p class="text-white"> Puedes cancelar la accion si no estas seguro </p>',
    type: 'warning',
    background: '#343a40',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'si, eliminarlo!'

  }).then(function(result){

    if (result.value) {

        window.location = "index.php?vista=temperatura&idCuarto="+idCuarto;
        

      }
  })
})

/*=============================================
=          EDITAR TEMPERATURA            =
=============================================*/
$(document).on("click", ".btnEditarTemperatura", function () {

    var idTemperatura = $(this).attr("idTemperatura");

    document.getElementById('idActual').value=idTemperatura;

    console.log("el id es: " + idTemperatura);

    var datos = new FormData();

    datos.append("idTemperatura", idTemperatura);

    $.ajax({

        url: 'ajax/temperatura.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (respuesta) {

          $("#editarCuarto").val(respuesta["nombre"]);
		  $("#editarMinTemp").val(respuesta["min_temp"]);
		  $("#editarMinHum").val(respuesta["min_hum"]);
		  $("#editarMinGas").val(respuesta["min_tvo"]);
          $("#editarMaxTemp").val(respuesta["max_temp"]);          
          $("#editarMaxHum").val(respuesta["max_hum"]);          
          $("#editarMaxGas").val(respuesta["max_tvo"]);
        }

    });
});

/*=============================================
=          ACTIVAR ESTADO TEMPERATURA            =
=============================================*/
$(document).on("click",".btnActivarTemp", function() {
	
	var idTemperatura = $(this).attr("idTemperatura");

	var estadoTemp = $(this).attr("estadoTemp");

	var datos = new FormData();

	datos.append("activarId",idTemperatura);

	datos.append("activarTemp",estadoTemp);

	$.ajax({
		url: 'ajax/temperatura.ajax.php',
			method: 'POST',
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				if (window.matchMedia("(max-width:767px)")) {

					Swal.fire({

						type: 'success',
						title: '<span Class="text-white">¡El estado de temperatura se a actualizado correctamente!</span>',
						background: '#343a40',
						showConfirmButton: true,
						confirmButtonColor: '#28a745',
						confirmButtonText: 'Ok',
						closeOnConfirm: false 

					}).then((result)=>{

						if(result.value){
							window.location = 'temperatura';
						}   
						   
					});
				}
		}
	})

	if (estadoTemp == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('desactivado');
		$(this).attr('estadoTemp',1);

	} else {

		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoTemp',0);

	}

});

/*=============================================
=          ACTIVAR ESTADO HUMEDAD            =
=============================================*/
$(document).on("click",".btnActivarHum", function() {
	
	var idHumedad = $(this).attr("idHumedad");

	var estadoHum = $(this).attr("estadoHum");

	var datos = new FormData();

	datos.append("activarId",idHumedad);

	datos.append("activarHum",estadoHum);

	$.ajax({
		url: 'ajax/temperatura.ajax.php',
			method: 'POST',
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				if (window.matchMedia("(max-width:767px)")) {

					Swal.fire({

						type: 'success',
						title: '<span Class="text-white">¡El estado de la humedad se a actualizado correctamente!</span>',
						background: '#343a40',
						showConfirmButton: true,
						confirmButtonColor: '#28a745',
						confirmButtonText: 'Ok',
						closeOnConfirm: false 

					}).then((result)=>{

						if(result.value){
							window.location = 'temperatura';
						}   
						   
					});
				}
		}
	})

	if (estadoHum == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('desactivado');
		$(this).attr('estadoHum',1);

	} else {

		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoHum',0);

	}

});

/*=============================================
=          ACTIVAR ESTADO HUMEDAD            =
=============================================*/
$(document).on("click",".btnActivarTvo", function() {
	
	var idTvo = $(this).attr("idTvo");

	var estadoTvo = $(this).attr("estadoTvo");

	var datos = new FormData();

	datos.append("activarId",idTvo);

	datos.append("activarTvo",estadoTvo);

	$.ajax({
		url: 'ajax/temperatura.ajax.php',
			method: 'POST',
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				if (window.matchMedia("(max-width:767px)")) {

					Swal.fire({

						type: 'success',
						title: '<span Class="text-white">¡El estado del tvo se a actualizado correctamente!</span>',
						background: '#343a40',
						showConfirmButton: true,
						confirmButtonColor: '#28a745',
						confirmButtonText: 'Ok',
						closeOnConfirm: false 

					}).then((result)=>{

						if(result.value){
							window.location = 'temperatura';
						}   
						   
					});
				}
		}
	})

	if (estadoTvo == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('desactivado');
		$(this).attr('estadoTvo',1);

	} else {

		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoTvo',0);

	}

});

/*==============================
   Bootstrap Switch
=============================*/
$("input[data-bootstrap-switch]").each(function(){
	$(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

/*==============================
   KnoB
=============================*/
// Temperatura
	$('.knobT').knob();
// Humedad
	$('.knobH').knob();
// Gas
	$('.knobG').knob();	
