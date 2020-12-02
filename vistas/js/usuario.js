/*=============================================
=    VALIDA EL FORMATO DE LA IMAGEN           =
=============================================*/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];

	/*=============================================
	Validar Formato Foto
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevaFoto").val("");

			Swal.fire({

				type: 'error',
				background: '#343a40',
				html: '<p class="tituloWhite">¡Error al subir la imagen! </p>',
				text: 'La imagen debe estar en formato JPG o PNG',
				confirmButtonColor: '#dc3545',
				confirmButtonText: 'Ok'

			});

	}else if(imagen["size"] > 2000000){

		$(".nuevaFoto").val("");

			Swal.fire({

				type: 'error',
				background: '#343a40',
				html: '<p class="tituloWhite"> ¡Error al subir la imagen! </p>',
				text: 'La imagen excede el tamaño permitido de 2MB',
				confirmButtonColor: '#dc3545',
				confirmButtonText: 'Ok'

			});

	}else{

		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;
			
			$(".previsualizar").attr("src", rutaImagen);
		});
	}
})

/*=============================================
=            EDITAR USUARIO            =
=============================================*/

$(document).on("click", ".btnEditarUsuario" ,function(){
	
	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();

	datos.append("idUsuario",idUsuario);

	$.ajax({

		url: 'ajax/usuario.ajax.php',
		method: 'POST',
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		success:function(respuesta){


			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").val(respuesta['perfil']);
			$("#passwordActual").val(respuesta["password"]);
			$("#fotoActual").val(respuesta["foto"]);

			 if(respuesta["foto"] != ""){
			 	$(".previsualizar").attr("src", respuesta["foto"]);
			 }

		}

	});
})

/*=============================================
=          ACTIVAR ESTADO USUARIO            =
=============================================*/
$(document).on("click",".btnActivar", function() {
	
	var idUsuario = $(this).attr("idUsuario");

	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();

	datos.append("activarId",idUsuario);

	datos.append("activarUsuario",estadoUsuario);

	$.ajax({

		url: 'ajax/usuario.ajax.php',
			method: 'POST',
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				if (window.matchMedia("(max-width:767px)")) {

					Swal.fire({

		 		        type: 'success',
		        		title: '<span Class="text-white">¡El usuario se a actualizado correctamente!</span>',
		                background: '#343a40',
		                showConfirmButton: true,
		                confirmButtonColor: '#28a745',
		                confirmButtonText: 'Ok',
		                closeOnConfirm: false 

		                }).then((result)=>{

		                    if(result.value){

		                    	window.location = 'usuarios';
		                    }      
		                });
				}

			}


	})

	if (estadoUsuario == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('desactivado');
		$(this).attr('estadoUsuario',1);

	} else {

		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoUsuario',0);

	}

})


/*=============================================
=  VALIDA SI EL USUARIO ES REPETIDO          =
=============================================*/
$("#nuevoUsuario").change(function() {

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();

	datos.append("validarUsuario",usuario);

	$.ajax({

			url:'ajax/usuario.ajax.php',
			method: 'POST',
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success:function(respuesta){

				//console.log("respuesta",respuesta);

				if (respuesta) {

					$("#nuevoUsuario").parent().after('<div class=" alert alert-warning">Este usuario ya exite</div>')

					$("#nuevoUsuario").val("");
				} 
				
			}


	});
})

/*========================================
=            Eliminar Usuario            =
========================================*/
$(document).on("click",'.btnEliminarUsuario', function() {

	var idUsuario = $(this).attr("idUsuario");

	var fotoUsuario = $(this).attr("fotoUsuario");

	var usuario = $(this).attr("usuario");

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

	    	window.location = "index.php?vista=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
	      

	    }
	})
	

	
});

/*=====  End of Eliminar Usuario  ======*/

/*=============================================
=            Borrar datos modal               =
=============================================*/
$('.modal').on('hidden.bs.modal', function(){ 
//borra el contenido de todos los campos de un modal al cerrarse y
//asigna un nuevo valor a la clase previzualizar
	$("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
	$(".previsualizar").attr("src", "images/foto/AdminMaleAvatar.png");
});












