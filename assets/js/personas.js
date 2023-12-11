$(document).ready(function (){
    let datosNuevos = true;
    let idpersona = 0; //Actualizar - eliminar

    function mostrarPersonas() {
        $.ajax({
            url: '../controllers/personas.controllers.php',
            type: 'GET',
            data: {'operacion': 'listarPersonas'},
            success: function (result) {
                var tabla = $("#tabla-personas").DataTable(); // Corregir aquí
                tabla.destroy(); // Destruir DataTable existente
                $("#tabla-personas tbody").html(result);
                $("#tabla-personas").DataTable({
                    dom: 'Bfrtip',
                    ordering: false,
                    searching: false,
                    columnDefs: [
                        {
                            responsivePriority: 1,
                            targets: [7]
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
                        $("#formulario-busqueda-personas")[0].reset();
                    } else {
                        $("#nombres").val(result.nombres);
                        $("#apellidos").val(result.apellidos);
                        //$("#genero").val(result.genero);
                        $("#celular").val(result.celular);
                        $("#direccion").val(result.direccion);
                        $("#fechanacimiento").val(result.fechanacimiento);
                    }
                }
            });
        }
    }

    function editarPersonas(id){
        $("#formulario-busqueda-personas")[0].reset();
        $.ajax({
            url: '',
            type: 'GET',
            data: {
                'operacion': 'obtenerDatosPersonas',
                'idpersona': id
            },
            dataType: 'JSON',
            success: function (result){
                $("#nombres").val(result.nombres);
            }
        });
        $("#modal-buscador").modal("show");
    }

    function eliminarPersonas(idpersona) {
        Swal.fire({
            title: '¿Estás seguro de eliminar a esta persona?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../controllers/personas.controllers.php',
                    type: 'GET',
                    data: {
                        'operacion': 'eliminarPersonas',
                        'idpersona': idpersona
                    },
                    success: function () {
                        mostrarPersonas();
                        Swal.fire('Eliminado', 'La persona ha sido eliminada correctamente.', 'success');
                    }
                });
            }
        });
    }


    $("#tabla-personas tbody").on("click", ".eliminar", function() {
        idpersona = $(this).data("ideliminar");
        eliminarPersonas(idpersona);
    });

    $("#tabla-personas tbody").on("click", ".editar", function() {
        idpersona = $(this).data("ideditar");
        editarPersonas(idpersona);
    });

    $("#registrar").click(registrarPersonas);
    mostrarGenero();
    mostrarTipoDoc();
    mostrarPersonas();
});