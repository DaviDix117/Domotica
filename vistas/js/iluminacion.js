//////////////////////////////////
/*       */




$(".btnEliminarBombillo").click(function() {

    var idBombillo = $(this).attr("idBombillo");

    Swal.fire({

		icon: "warning",
		title: "¿Esta seguro de borrar el bombillo?",
		text: "¡Si no lo esta puede cancelar la acción!",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, ¡Borrar bombillo!'

	}).then(function(result){
		
		if (result.value) {
			
			window.location = "index.php?vista=iluminacion&idBombillo="+idBombillo;
			
		}
		
	})
    
})

/*=================================================
	    EDITAR BOMBILLO
================================================*/

$(".btnEditarBombillo").click(function() {

	var idBombillo = $(this).attr("idBombillo");

    var datos = new FormData();

    datos.append("idBombillo", idBombillo);

    $.ajax({

        url: "ajax/iluminacion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);

            $("#idBombillo").val(respuesta["id_bombillo"]);
            
        }

    })
    
})
