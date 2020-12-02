$(".tablas").DataTable({

	"language": {
        	"sProcessing":     "Procesando...",
        	"sLengthMenu":     "Mostrar _MENU_ registros",
        	"sZeroRecords":    "No se encontraron resultados",
        	"sEmptyTable":     "Ningún dato disponible en esta tabla",
        	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        	"sInfoEmpty":      "Mostrando registros del 0 al 0 a un total de 0 ",
        	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        	"sInfoPostFix":    "",
        	"sSearch":         "Buscar:",
        	"sUrl":            "",
        	"sInfoThousands":  ",",
        	"sLoadingRecords": "Cargando...",
        	"oPaginate": {
        		"sFirst":    "Primero",
        		"sLast":     "Último",
        		"sNext":     "Siguiente",
        		"sPrevious": "Anterior"
        	},
        	"oAria": {
        		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
        	}
        }

});

$(".paginate_page").text("Página");
$(".paginate_of").text($(".paginate_of").text().replace("of","de"));

window.addEventListener("load",function() {
  
        //oculta la barra de navegación de dispositivos moviles
        setTimeout(function(){
            window.scrollTo(0, 1);
          }, 0);


        //Permite que muestre la seleccion de la pagina actual
        var url = window.location;

        // treeview
        $('ul.nav-treeview a').filter(function() {
                return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

        // sidebar menu pero no afecta treeview
        $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
        }).addClass('active');
});
//Colorpicker
$('.my-colorpicker1').colorpicker()
//color picker with addon
$('.my-colorpicker2').colorpicker()

$('.my-colorpicker2').on('colorpickerChange', function(event) {
  $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
});
