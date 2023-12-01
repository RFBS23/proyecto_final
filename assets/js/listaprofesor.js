$(document).ready(function (){
    //global
    let datosNuevos = true;
    let idprofesor = 0; //Actualizar - Eliminar

    function mostrarProfesor(){
        $.ajax({
            url: '../controllers/profesores.controllers.php',
            type: 'GET',
            data: {'operacion': 'listarProfesores'},
            success: function (result) {
                var  tabla = $("#tabla_profesor").DataTable();
                tabla.destroy();
                $("#tabla_profesor tbody").html(result);
                $("#tabla_profesor").DataTable({
                    dom: 'Bfrtip',
                    ordering: false,
                    searching: false,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    }
                });
            }
        });
    }

    //boton mostrar
    mostrarProfesor();
});