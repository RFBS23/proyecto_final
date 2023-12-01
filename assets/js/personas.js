$(document).ready(function (){
    let datosNuevos = true;
    let idpersona = 0;

    function mostrarPersonas(){
        $.ajax({
            url: '../controllers/personas.controllers.php',
            type: 'GET',
            data: {'operacion': 'listarPersonas'},
            success: function (result){
                var tabla = $("#tabla-persona").DataTable();
                tabla.destroy();
                $("#tabla-personas tbody").html(result);
                $("#tabla-personas").DataTable({
                    dom: 'Bfrtip',
                    ordering: false,
                    searching: false,
                    columnDefs:[
                        {
                            responsivePriority: 1,
                            targets: [8]
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    }
                });
            }
        });
    }

    function mostrarGenero(){
        $.ajax({
            url: '../controllers/personas.controllers.php',
            type: 'GET',
            data: {'operacion':'listarGenero'},
            success: function (result){
                $("#genero").html(result);
            }
        });
    }

    function mostrarTipoDoc(){
        $.ajax({
            url: '../controllers/personas.controllers.php',
            type: 'GET',
            data: {'operacion':'listarTipoDoc'},
            success: function (result){
                $("#tipodocumento").html(result);
            }
        });
    }

    function registrarPersonas(){
        let datosEnviar = {
            'operacion' : 'registrarPersonas',
            'nombres' : $("#nombres").val(),
            'apellidos' : $("#apellidos").val(),
            'genero' : $("#genero").val(),
            'celular' : $("#celular").val(),
            'direccion' : $("#direccion").val(),
            'fechanacimiento' : $("#fechanacimiento").val(),
            'tipodocumento' : $("#tipodocumento").val(),
            'numerodocumento' : $("#numerodocumento").val()
        };

        if (!datosNuevos){
            datosEnviar["operacion"] = "actualizarPersonas";
            datosEnviar["idpersona"] = idpersona;
        }

        Swal.fire({
            title: '¿Revise bien los campos antes de registrar a la persona?',
            showDenyButton: true,
            confirmButtonText: 'Guardar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../controllers/personas.controllers.php',
                    type: 'GET',
                    data: datosEnviar,
                    success: function (result){
                        $("#formulario-persona")[0].reset();
                        mostrarPersonas();
                    }
                });
                Swal.fire('Se Registro Correctamente', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Revise su registro', '', 'error')
            }
        });
        /*
        if (confirm("¿Revise bien los campos antes de registrar a la persona?")){
            $.ajax({
                url: '../controllers/personas.controllers.php',
                type: 'GET',
                data: datosEnviar,
                success: function (result){
                    $("#formulario-persona")[0].reset();
                    mostrarPersonas();
                }
            });
        }*/
    }

    function buscarPersonas(){
        let numerodocumento = $("#numerodocumento").val();
        if (numerodocumento.length == 12){
            $.ajax({
                url: '../controllers/personas.controllers.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'operacion': 'buscarPersonas',
                    'numerodocumento' : numerodocumento
                },
                success: function (result){
                    if (!result){
                        $("#formulario-busqueda-persona")[0].reset();
                    } else {
                        $("#nombres").val(result.nombres);
                        $("#apellidos").val(result.apellidos);
                        $("#genero").val(result.genero);
                        $("#celular").val(result.celular);
                        $("#direccion").val(result.direccion);
                        $("#fechanacimiento").val(result.fechanacimiento);
                    }
                }
            });
        }
    }

    function eliminarPersonas(id){
        if (confirm("¿Estas Seguro de Eliminar a esta persona?")){
            $.ajax({
                url: '../controllers/personas.controllers.php',
                type: 'GET',
                data: {
                    'operacion' : 'eliminarPersonas',
                    'idpersona' : id
                },
                success: function (){
                    mostrarPersonas();
                }
            });
        }
    }

    $("#tabla-personas tbody").on("click", ".eliminar", function() {
        idpersona = $(this).data("ideliminar");
        eliminarPersonas(idpersona);
    });

    $("#tabla-personas tbody").on("click", ".editar", function() {
        idpersona = $(this).data("ideditar");
        mostrarPersonas(idpersona);
    });



    $("#registrar").click(registrarPersonas);
    mostrarGenero();
    mostrarTipoDoc();
    mostrarPersonas();
});