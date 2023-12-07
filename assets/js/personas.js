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

    function registrarPersonas() {
        // Obtener los valores de los campos
        let nombres = $("#nombres").val();
        let apellidos = $("#apellidos").val();
        let genero = $("#genero").val();
        let celular = $("#celular").val();
        let fechanacimiento = $("#fechanacimiento").val();
        let tipodocumento = $("#tipodocumento").val();
        let numerodocumento = $("#numerodocumento").val();

        // Verificar si los campos obligatorios están completos
        if (!nombres || !apellidos || !genero || !celular || !fechanacimiento || !tipodocumento || !numerodocumento) {
            Swal.fire('Por favor, complete todos los campos obligatorios', '', 'error');
            return; // Detener la ejecución si hay campos incompletos
        }

        // Crear el objeto con los datos a enviar
        let datosEnviar = {
            'operacion': 'registrarPersonas',
            'nombres': nombres,
            'apellidos': apellidos,
            'genero': genero,
            'celular': celular,
            'direccion': $("#direccion").val(), // Agregado para obtener el valor de la dirección
            'fechanacimiento': fechanacimiento,
            'tipodocumento': tipodocumento,
            'numerodocumento': numerodocumento
        };

        if (!datosNuevos) {
            datosEnviar["operacion"] = "actualizarPersonas";
            datosEnviar["idpersona"] = idpersona;
        }

        Swal.fire({
            title: '¿Revise bien los campos antes de registrar a la persona?',
            showDenyButton: true,
            confirmButtonText: 'Guardar',
            denyButtonText: 'Cancelar',
        }).then((result) => {
            // Resto del código para manejar la confirmación
            $.ajax({
                    url: '../controllers/personas.controllers.php',
                    type: 'GET',
                    data: datosEnviar,
                    success: function (result) {
                        $("#formulario-persona")[0].reset();
                        mostrarPersonas();
                        Swal.fire('Se Registro Correctamente', '', 'success');
                    }
                });
        });
/*
        // Mostrar la confirmación antes de enviar los datos
        Swal.fire({
            title: '¿Revise bien los campos antes de registrar a la persona?',
            showDenyButton: true,
            confirmButtonText: 'Guardar',
            denyButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar los datos solo si se confirma
                $.ajax({
                    url: '../controllers/personas.controllers.php',
                    type: 'GET',
                    data: datosEnviar,
                    success: function (result) {
                        $("#formulario-persona")[0].reset();
                        mostrarPersonas();
                        Swal.fire('Se Registro Correctamente', '', 'success');
                    }
                });
            } else if (result.isDenied) {
                // Si se cancela, no hagas nada o muestra un mensaje
                Swal.fire('Revise su registro', '', 'error');
            }
        });*/
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