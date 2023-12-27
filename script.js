
document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a elementos HTML
    const periodoSelector = document.getElementById('periodoSelector');
    const cursosContainer = document.getElementById('cursosContainer');
    const tablasAsistencia = document.querySelector('#tablasAsistencia');
    const cuerpotabla = tablasAsistencia.querySelector('tbody');
    const tablaResultado = document.querySelector('#tablaResultado');
    const cuerpotabla1 = tablaResultado.querySelector('tbody');
    const tablaPractica = document.querySelector('#tablaPractica');
    const cuerpotablaPractica = tablaPractica.querySelector('tbody');
    const btnasistencia = document.getElementById('GenerarReporteA');



    function cargarNombresModulo() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarnombremodulo");
    
        fetch(`../controllers/modulos.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => response.json())
        .then(datos => {
            periodoSelector.innerHTML = ''; 
    
            datos.forEach(element => {
                const optionTag = document.createElement("option");
                optionTag.text = element.nombremodulo;
                periodoSelector.appendChild(optionTag);
            });
    
    
            if (datos.length > 0) {
                periodoSelector.value = datos[datos.length - 1].nombremodulo;
            }
    
    
            cargarCursos(periodoSelector.value);
    
    
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Función para cargar cursos desde el servidor
    function cargarCursos(periodoSeleccionado) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarModulos");
        parametros.append("nombremodulo", periodoSeleccionado);
        fetch(`../controllers/modulos.controllers.php`, {
            method: 'POST',
            body: parametros
        })
            .then(response => response.json())
            .then(data => {
                // Limpiar el contenedor de cursos
                cursosContainer.innerHTML = '';

                // Mostrar los cursos en tarjetas
                data.forEach(cursos => {
                    const card = document.createElement('div');
                    card.classList.add('div', 'h-100');
                    card.innerHTML = `
                        <div class="card border-success" style="width: 23rem; cursor: pointer;">
                            <div class="text-center py-3">
                                <img src="../assets/img/administrador.png" class="img-fluid" alt="..." style="width: 100px; height: 100px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">${cursos.Cursos}</h5>
                                <p class="card-text">Profesor: ${cursos.Docente}</p>
                                <a href="#" class="btn btn-outline-success">Abrir</a>
                            </div>
                        </div>
                    `;
                    card.addEventListener('click', function () {
                        // Abre el modal
                        $('#modal-buscador').modal('show');
                        // Adjunta un evento para ejecutar la función cuando el modal se muestra
                        $('#modal-buscador').on('shown.bs.modal', function onModalShown() {
                            const nombreCurso = cursos.Cursos;
                            cargarEstudiantesPorCurso(nombreCurso);
                            cargarEstudiantesResultado(nombreCurso);
                            cargarEstudiantesPractica(nombreCurso);
                            // Remueve el controlador de eventos después de que el modal se ha mostrado
                            $(this).off('shown.bs.modal', onModalShown);

                        });

                    });
                    
                    cursosContainer.appendChild(card);
                    
    
                });
            })
    }


    function getInitialAvatar(apellidos, nombres) {
        //const initials = lastName.charAt(0).toUpperCase();
        const initials = `${apellidos.charAt(0).toUpperCase()}${nombres.charAt(0).toUpperCase()}`;
        // Puedes utilizar un servicio de letras iniciales o almacenar tus propias imágenes con iniciales.
        // Aquí se utiliza "https://dummyimage.com" con un fondo gris y texto blanco para la inicial.
        return `https://dummyimage.com/40x40/999999/ffffff&text=${initials}`;
    }

    function cargarEstudiantesPorCurso(nombreCurso) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarAlumnosPorCurso");
        parametros.append("nombrecurso", nombreCurso);

        fetch(`../controllers/asistencia.controllers.php`, {
            method: 'POST',
            body: parametros
        })
            .then(response => response.json())
            .then(data => {
                cuerpotabla.innerHTML = '';

                let numeroFila = 1;

                const estadoSelects = {};

                data.forEach(Alumno => {
                    estadoSelects[Alumno.idasistencia] = Alumno.Estado;
                    const fila = `
                        <tr>
                            <td>
                                <img src="${getInitialAvatar(Alumno.Apellidos, Alumno.Nombres)}" alt="Avatar" style="border-radius: 50%; width: 40px; height: 40px;">
                            </td>
                            <td style="width: 20%;">${Alumno.Apellidos}</td>
                            <td style="width: 20%;">${Alumno.Nombres}</td>
                            <td style='display: none;'>${Alumno.NombreUsuarios}</td>
                            <td class="attendance-status" data-idasistencia="${Alumno.idasistencia}" style="width: 15%;">${Alumno.Estado}</td>
                            <td>
                                <input type="radio" class="btn-check" name="attendance-options-${Alumno.idasistencia}" id="presente-${Alumno.idasistencia}" value="PRESENTE" ${Alumno.Estado === 'PRESENTE' ? 'checked' : ''}>
                                <label class="btn btn-outline-success" for="presente-${Alumno.idasistencia}">PRESENTE</label>
                
                                <input type="radio" class="btn-check" name="attendance-options-${Alumno.idasistencia}" id="ausente-${Alumno.idasistencia}" value="AUSENTE" ${Alumno.Estado === 'AUSENTE' ? 'checked' : ''}>
                                <label class="btn btn-outline-danger" for="ausente-${Alumno.idasistencia}">AUSENTE</label>
                
                                <input type="radio" class="btn-check" name="attendance-options-${Alumno.idasistencia}" id="tardanza-${Alumno.idasistencia}" value="TARDANZA" ${Alumno.Estado === 'TARDANZA' ? 'checked' : ''}>
                                <label class="btn btn-outline-warning" for="tardanza-${Alumno.idasistencia}">TARDANZA</label>
                
                                <input type="radio" class="btn-check" name="attendance-options-${Alumno.idasistencia}" id="justificado-${Alumno.idasistencia}" value="JUSTIFICADO" ${Alumno.Estado === 'JUSTIFICADO' ? 'checked' : ''}>
                                <label class="btn btn-outline-info" for="justificado-${Alumno.idasistencia}">JUSTIFICADO</label>
                            </td>

                            <td>
                             <label class="btn btn-danger btn-alumnos" data-usuarios='${Alumno.NombreUsuarios}'>PDF</label>
                            </td>
                        </tr>
                    `;
                    cuerpotabla.innerHTML += fila;
                    numeroFila++;
                    updateAttendanceColor();
                });

                // Luego de cargar las filas, asigna los valores de los select
                Object.keys(estadoSelects).forEach(idasistencia => {
                    const estado = estadoSelects[idasistencia];
                    const radioElement = document.getElementById(`${estado.toLowerCase()}-${idasistencia}`);
                    if (radioElement) {
                        radioElement.checked = true;

                        actualizarEstadoEnDOM(idasistencia, estado);
                        resetAsistenciaAtMidnight();
                    }
                });

                cuerpotabla.addEventListener('change', function (event) {
                    const radio = event.target;
                    if (radio.classList.contains('btn-check')) {
                        const idasistencia = radio.id.split('-')[1];
                        const estadoasistencia = radio.checked ? radio.value : '';
                        actualizarEstadoAsistencia(idasistencia, estadoasistencia);
                        updateAttendanceColor();
                    }
                });
            });

            $("#tablasAsistencia").on("click", ".btn-alumnos", function(){
                nombreusuario = $(this).data("usuarios")
                reporteasistenciausuario(nombreCurso, nombreusuario)
            })

            btnasistencia.addEventListener("click", function(){
                reporteasistencia(nombreCurso);
            })
    }

    function reporteasistenciausuario(nombrecurso, nombreusuario){
        const parametros = new URLSearchParams();
        parametros.append("nombrecurso", nombrecurso);
        parametros.append("nombreusuario", nombreusuario);
        window.open(`../reports/asistencia.report.php?${parametros}`,`_blank`)
    }

    function reporteasistencia(nombreCurso){
        const parametros = new URLSearchParams();
        parametros.append("nombreCurso", nombreCurso);
        window.open(`../reports/estados.report.php?${parametros}`, `_blank`);

    }

    function cargarEstudiantesPractica(nombreCurso) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "AlumnosPractica");
        parametros.append("nombrecurso", nombreCurso);

        fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => response.json())
        .then(data => {
            cuerpotablaPractica.innerHTML = '';
            let numeroFila = 1;
            data.forEach(Alumno => {
                const fila = `
                    <tr>
                        <td>
                            <img src="${getInitialAvatar(Alumno.Apellidos, Alumno.Nombres)}" alt="Avatar" style="border-radius: 50%; width: 40px; height: 40px;">
                        </td>
                        <td>${Alumno.Apellidos}</td>
                        <td>${Alumno.Nombres}</td>
                        <td> 
                            <div class="form-floating col-md-4">
                                <input type="number" class="form-control nota-practica" data-idresultado="${Alumno.idresultado}" data-practica="${Alumno.practicaNumero}" placeholder="Ingresar" min="0" max="20" oninput="limitarADosDigitos(this)" >
                                <label for="floatingInput">Nota</label>
                            </div>
                        </td>
                    </tr>
                `;
                cuerpotablaPractica.innerHTML += fila;
                numeroFila++;
            });

            $(document).ready(function () {

                $(document).on('blur', '.nota-practica', function () {
                    const idresultado = $(this).data('idresultado');
                    const notaPractica = $(this).val();

                    // Verifica que la longitud de la nota sea mayor a cero y menor o igual a dos
                    if (notaPractica.length > 0 && notaPractica.length <= 2) {
                        const practicaNumeroModal = $('#modal-practica').data('practicaNumero');
                        registrarPractica(idresultado, practicaNumeroModal, notaPractica);
                        $(this).data('registrado', true);
                        mostrarMensaje("LA NOTA SE AGREGO CORRECTAMENTE");
                    } else {
                        // Muestra un mensaje de error si la longitud de la nota no es válida
                        mostrarMensaje("Ingrese una nota válida (máximo 2 dígitos)");
                    }
                });


                $('.practica-card').click(function () {
                    const practicaNumero = $(this).data('practica');
                    const modalPractica = $('#modal-practica');
                    modalPractica.data('practicaNumero', practicaNumero);
                    modalPractica.find('.modal-title').text($(`#${this.id} h5`).text());
                    limpiarInputsPractica();
                    listarPractica(1);
                    listarPractica(2);
                    listarPractica(3);
                    listarPractica(4);
                    listarPractica(5);
                    listarPractica(6);
                    listarPractica(7);
                    listarPractica(8);
                    listarPractica(9);
                    listarPractica(10);
                    listarPractica(11);
                    listarPractica(12);
                    listarPractica(13);
                    modalPractica.modal('show');
                });

                $('.btn-guardar-practica').on('click', function () {
                    const idresultado = $(this).data('idresultado');
                    const practicaNumeroModal = $('#modal-practica').data('practicaNumero');
                    const notaPractica = modalPractica.find(`.nota-practica[data-idresultado="${idresultado}"]`).val();
                    registrarPractica(idresultado, practicaNumeroModal, notaPractica);
                });
            });

            function mostrarMensaje(mensaje) {
                $('#mensajeRegistro').text(mensaje);
                setTimeout(function() {
                    $('#mensajeRegistro').text('');
                }, 1000);
            }

            function limpiarInputsPractica() {
                const inputFields = document.querySelectorAll('.nota-practica');
                inputFields.forEach(inputField => {
                    inputField.value = '';
                });
            }
        });
    }

    function registrarPractica(idresultado, numeroPractica, nota) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", `practica${numeroPractica}`);
        parametros.append("idresultado", idresultado);
        parametros.append(`practica${numeroPractica}`, nota);
    
        fetch(`../controllers/practica.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => {
            if (response.status === 200) {
                console.log(`Calificación registrada en bd ${numeroPractica} para ${idresultado}`);
            } else {
                console.error(`Error al registrar la calificación de práctica ${numeroPractica}`);
            }
        });
    }

    
    function listarPractica(practicaNumero) {
        const practicaNumeroModal = $('#modal-practica').data('practicaNumero');
    
        if (practicaNumero === practicaNumeroModal) {
            const parametros = new URLSearchParams();
            parametros.append("operacion", `listarpractica${practicaNumero}`);
    
            fetch(`../controllers/listarpractica.controllers.php`, {
                method: 'POST',
                body: parametros
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
    
                data.forEach(item => {
                    const idresultado = item.idresultado;
                    const notaPractica = item[`practica${practicaNumero}`];
    
                    const inputField = document.querySelector(`.nota-practica[data-idresultado="${idresultado}"]`);
    
                    if (inputField) {
                        console.log('inputField encontrado:', inputField);
                        console.log('Valor a establecer:', notaPractica);
                        inputField.value = notaPractica;
                    } else {
                        console.log('inputField no encontrado');
                    }
                });
            })
            .catch(error => console.error(`Error al obtener las calificaciones de la práctica ${practicaNumero}:`, error));
        }
    }

    function cargarEstudiantesResultado(nombreCurso) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "AlumnosResultado");
        parametros.append("nombrecurso", nombreCurso);

        fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => response.json())
        .then(data => {
            cuerpotabla1.innerHTML = '';
            let numeroFila = 1;
            data.forEach(Alumno => {
                const modalId = `modal-${Alumno.idresultado}`;
                const fila = `
                        <tr>
                            <td>
                                <img src="${getInitialAvatar(Alumno.Apellidos, Alumno.Nombres)}" alt="Avatar" style="border-radius: 50%; width: 40px; height: 40px;">
                            </td>
                            <td>${Alumno.Apellidos}</td>
                            <td>${Alumno.Nombres}</td>
                            <td id="calificacion-${Alumno.idresultado}">${Alumno.Calificacion}</td>
                            <td> 
                                <button type="button" class="btn btn-outline-success btn-modal-calificaciones" data-idresultado="${Alumno.idresultado}" data-modal-id="${modalId}">Calificaciones</button>

                                <div id="${modalId}" class="modal fade" tabindex="-1" aria-hidden="true" style="overflow-y: scroll; display: none;">
                                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title badge bg-label-success" id="exampleModalLabel">Calificaciones</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                                           </div>
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <div class="row g-0 border border-success rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                                            <div class="col p-4 d-flex flex-column position-static">
                                                                <h6 class="mb-0">
                                                                    <img src="${getInitialAvatar(Alumno.Apellidos, Alumno.Nombres)}" alt="Avatar" style="border-radius: 50%; width: 40px; height: 40px;">
                                                                    &nbsp;&nbsp;
                                                                    ${Alumno.Apellidos} ${Alumno.Nombres}
                                                                </h6>
                                                                <div class="mb-1 text-body-secondary">
                                                                    Nota: <span class="badge bg-label-success">${Alumno.Calificacion}</span>
                                                                </div>
                                                                <p class="card-text mb-auto" id="fechaHoraTh"></p>
                                                            </div>
                                                            <button type="button" class="btn btn-outline-primary btn-calcular-calificacion" data-idresultado="${Alumno.idresultado}" data-modal-id="${modalId}">Calcular Calificación</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <!-- cards -->
                                                        <div class="col p-2 d-flex flex-column">                                                                
                                                            <div class="col-lg">
                                                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
                                                                    <div class="col p-2 d-flex flex-column">
                                                                        <form class="row g-4 needs-validation" novalidate>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica1" value="" readonly>
                                                                                <label for="floatingInput">Practica 1<label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica2"  value="" readonly>
                                                                                <label for="floatingInput">Practica 2</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica3"  value="" readonly>
                                                                                <label for="floatingInput">Practica 3</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3 ">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica4"  value="" readonly>
                                                                                <label for="floatingInput">Practica 4</label>
                                                                            </div>                                                                    
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg">
                                                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
                                                                    <div class="col p-2 d-flex flex-column">
                                                                        <form class="row g-4 needs-validation" novalidate>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control " placeholder="nota" id="Practica5" value="" readonly>
                                                                                <label for="floatingInput">Practica 5</label>
                                                                            </div>
                                        
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica6" value="" readonly>
                                                                                <label for="floatingInput">Practica 6</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica7" value="" readonly>
                                                                                <label for="floatingInput">Practica 7</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica8"  value="" readonly>
                                                                                <label for="floatingInput">Practica 8</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg">
                                                                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
                                                                    <div class="col p-2 d-flex flex-column">
                                                                        <form class="row g-4 needs-validation" novalidate>
                                                                            <div class="form-floating col-md-3 ">
                                                                                <input type="number" class="form-control " placeholder="nota" id="Practica9"  value="" readonly>
                                                                                <label for="floatingInput">Practica 9</label>
                                                                            </div>
                                        
                                                                            <div class="form-floating col-md-3 ">
                                                                                <input type="number" class="form-control " placeholder="nota" id="Practica10" value="" readonly>
                                                                                <label for="floatingInput">Practica 10</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica11"   value="" readonly>
                                                                                <label for="floatingInput">Practica 11</label>
                                                                            </div>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="Practica12"  value="" readonly>
                                                                                <label for="floatingInput">Practica 12</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg">
                                                                <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                                                                    <div class="col p-2 d-flex flex-column">
                                                                        <form class="row g-4 needs-validation" novalidate>
                                                                            <span class="badge bg-label-success">EXAMEN FINAL</span>
                                                                            <div class="form-floating col-md-3">
                                                                                <input type="number" class="form-control" placeholder="nota" id="examenfinal"  value=""readonly>
                                                                                <label for="floatingInput">Examen Final</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin cards -->
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                    cuerpotabla1.innerHTML += fila;
                    numeroFila++;
                });

                $(document).on('click', '.btn-modal-calificaciones', function () {
                    const modalId = $(this).data('modal-id');

                    $(`#${modalId}`).modal('show');

                    const idresultado = $(this).data('idresultado');
                    ListarPractica(idresultado, modalId);
                });

                $(document).off('click', '.btn-calcular-calificacion').on('click', '.btn-calcular-calificacion', function () {
                    const idresultado = $(this).data('idresultado');
                    CalcularCalificacion(idresultado);
                    const modalId = $(this).data('modal-id');
                    $(`#${modalId}`).on('hidden.bs.modal', function () {
                        // Esta función se ejecutará cuando el modal se haya cerrado completamente
                        actualizarTablaCalificacionesFinales(nombreCurso);
                    });
                    $(`#${modalId}`).modal('hide');
                });
            })
    }


    function actualizarTablaCalificacionesFinales(nombreCurso) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "AlumnosResultado");
        parametros.append("nombrecurso", nombreCurso);

        fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(Alumno => {
                // Encuentra la celda específica por su id
                const celdaCalificacion = document.getElementById(`calificacion-${Alumno.idresultado}`);

                // Actualiza solo el contenido de la celda
                if (celdaCalificacion) {
                    celdaCalificacion.innerHTML = Alumno.Calificacion;
                }
            });
        });
    }

    
    function ListarPractica(idalumno, modalId) {
        console.log("Enviando solicitud para listar prácticas");
        const parametros = new URLSearchParams();
        parametros.append("operacion", "ListarPractica");
        parametros.append("idalumno", idalumno);

        fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        })
        .then(response => {
            // Verifica si la respuesta tiene contenido antes de intentar parsearla como JSON
            if (response.ok && response.status !== 204) {
                return response.json();
            } else {
                // Si la respuesta está vacía o no es exitosa, retorna un array vacío
                return [];
            }
        })

        .then(data => {
            console.log("Datos recibidos:", data);

            if (data && data.length > 0) {
                const calificaciones = data[0];

                $(`#${modalId} #Practica1`).val(calificaciones.practica1);
                $(`#${modalId} #Practica2`).val(calificaciones.practica2 );
                $(`#${modalId} #Practica3`).val(calificaciones.practica3);
                $(`#${modalId} #Practica4`).val(calificaciones.practica4 );
                $(`#${modalId} #Practica5`).val(calificaciones.practica5 );
                $(`#${modalId} #Practica6`).val(calificaciones.practica6);
                $(`#${modalId} #Practica7`).val(calificaciones.practica7);
                $(`#${modalId} #Practica8`).val(calificaciones.practica8);
                $(`#${modalId} #Practica9`).val(calificaciones.practica9);
                $(`#${modalId} #Practica10`).val(calificaciones.practica10);
                $(`#${modalId} #Practica11`).val(calificaciones.practica11);
                $(`#${modalId} #Practica12`).val(calificaciones.practica12);
                $(`#${modalId} #examenfinal`).val(calificaciones.examenfinal);



                $(`#${modalId}`).modal('show');
            } else {

                console.log("No hay calificaciones para este estudiante.");
            }


        })
        .catch(error => console.error('Error al obtener las calificaciones:', error));
    }

    function CalcularCalificacion(idresultado) {
        const modalId = `modal-${idresultado}`;
        const practicas = Array.from($(`#${modalId} input[id^='Practica']`)).map(input => parseFloat(input.value) || 0);
        const examenFinal = parseFloat($(`#${modalId} #examenfinal`).val()) || 0;
<<<<<<< HEAD
    
        if (practicas.length === 0 || examenFinal === 0) {
            // Mostrar mensaje indicando que no se puede calcular la calificacióniv>
        
            alert("¡Atención! Asegúrate de ingresar todas las notas antes de calcular la calificación.");
=======

        if (practicas.some(nota => nota === 0) || examenFinal === 0) {
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
              });
>>>>>>> a36496ad408e5d43ad797a9293b3eb2ba62d86c2
            return;
        }

        const parametros = new URLSearchParams();
        parametros.append("operacion", "CalcularCalificacion");
        parametros.append("idresultado", idresultado);

        fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        })
    }
    


    function actualizarEstadoAsistencia(idasistencia, estadoasistencia) {
        console.log(`Actualizando estado de ${idasistencia} a ${estadoasistencia}`);
        const parametros = new URLSearchParams();
        parametros.append("operacion", "actualizarEstadoAsistencia");
        parametros.append("idasistencia", idasistencia);
        parametros.append("estadoasistencia", estadoasistencia);

        fetch(`../controllers/asistencia.controllers.php`, {
            method: 'POST',
            body: parametros
        }).then(response => {
            if (response.status === 200) {

                localStorage.setItem(`estadoAsistencia-${idasistencia}`, estadoasistencia);
                actualizarEstadoEnDOM(idasistencia, estadoasistencia);
                updateAttendanceColor();

            }
        });
    }



    function actualizarEstadoEnDOM(idasistencia, estadoasistencia) {
        const estadoCell = cuerpotabla.querySelector(`[data-idasistencia="${idasistencia}"]`);
        estadoCell.textContent = estadoasistencia;

        const radioButtons = document.querySelectorAll(`[name="attendance-options-${idasistencia}"]`);

        radioButtons.forEach(radio => {
            const labelElement = document.querySelector(`label[for="${radio.id}"]`);

            if (radio.value === estadoasistencia) {
                labelElement.textContent = 'X';
            } else {
                labelElement.textContent = radio.value;
            }
        });
    }

    periodoSelector.addEventListener('change', function () {
        const periodoSeleccionado = periodoSelector.value;
        cargarCursos(periodoSeleccionado);
    });

    function updateAttendanceColor() {
        const attendanceElements = document.querySelectorAll('.attendance-status');

        const statusColors = {
            'presente': 'text-success',
            'ausente': 'text-danger',
            'tardanza': 'text-warning',
            'justificado': 'text-info'
        };

        attendanceElements.forEach(element => {
            const status = element.textContent.trim().toLowerCase();

            element.classList.remove(...Object.values(statusColors));

            if (statusColors[status]) {
                element.classList.add(statusColors[status]);
            }
        });
    }


    function resetAsistenciaAtMidnight() {
        // Obtén la fecha y hora actual
        const now = new Date();

        // Calcula la cantidad de milisegundos hasta la medianoche
        const timeUntilMidnight = new Date(
            now.getFullYear(),
            now.getMonth(),
            now.getDate() + 1,
            0, 0, 0
        ) - now;

        // Configura el intervalo para ejecutar la función cada noche a medianoche
        setInterval(() => {
            // Tu lógica de reinicio de asistencia aquí
            cuerpotabla.querySelectorAll('.btn-check').forEach(radio => {
                radio.checked = false;
                const idasistencia = radio.id.split('-')[1];
                actualizarEstadoAsistencia(idasistencia, '');
            });
        },  24 * 60 * 60 * 1000);
    }


    function obtenerFechaHoraActual() {
        const ahora = new Date();
        const opciones = { hour: 'numeric', minute: 'numeric', second: 'numeric', year: 'numeric', month: 'numeric', day: 'numeric' };
        return ahora.toLocaleDateString('es-ES' , opciones);
    }

    setInterval(() => {
        const fechaHoraTh = document.getElementById('fechaHoraTh');
        if (fechaHoraTh) {
            fechaHoraTh.textContent = obtenerFechaHoraActual();
        }
    }, 1000);


    resetAsistenciaAtMidnight();
    cargarNombresModulo();
    cargarCursos(periodoSelector.value);
});
