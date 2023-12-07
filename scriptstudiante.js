document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencias a elementos HTML
    const periodoSelectorE = document.getElementById('periodoselectorE');
    const cursosContainerE = document.getElementById('cursosContainerE');
    const tablasAsistenciaE = document.querySelector('#tablasAsistenciaE');
    const cuerpotabla = tablasAsistenciaE.querySelector('tbody');
    const tablaResultadoE = document.querySelector('#tablaResultadoE');
    const cuerpotabla1 = tablaResultadoE.querySelector('tbody'); 
    let nombreUsuario = document.getElementById('user').innerText;



    //let nombreUsuario = ""; 

    function cargarCursos(periodoSeleccionadoE) {
        const parametros = new URLSearchParams();
        console.log("Nombre de Usuario:", nombreUsuario);

        parametros.append("operacion", "listarModulosE");       
        parametros.append("nombreusuario", encodeURIComponent(nombreUsuario));

        parametros.append("nombreusuario", nombreUsuario.trim());
        parametros.append("nombremodulo", periodoSeleccionadoE);

        fetch(`../controllers/modulosE.controllers.php`, {
            
            method: 'POST',
            body: parametros
        })
            .then(response => response.json())
            .then(data => {
                // Limpiar el contenedor de cursos
                cursosContainerE.innerHTML = '';
                
                // Mostrar los cursos en tarjetas
                data.forEach(cursos => {
                    const card = document.createElement('div');
                    card.classList.add('card', 'h-100');
                    card.innerHTML = `
                        <div class="">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="../assets/img/administrador.png" class="img-thumbnail" alt="...">
                                    <!--<img class="card-img card-img-left" src="../assets/img/administrador.png" alt="imagen"/>-->
                                    <div class="card-body" id="cursosContainerE">
                                        <h5 class="card-title">${cursos.Cursos}</h5>
                                        <p class="card-text">
                                            Profesor: ${cursos.Docente}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    `;
                    card.addEventListener('click', function () {
                        // Abre el modal
                        $('#modal-buscadorE').modal('show');
                    
                        // Adjunta un evento para ejecutar la función cuando el modal se muestra
                        $('#modal-buscadorE').on('shown.bs.modal', function onModalShown() {
                            const nombreCurso = cursos.Cursos;
                            cargarEstudiantesPorCurso(nombreCurso);
                            cargarEstudiantesResultado(nombreCurso);


                            // Remueve el controlador de eventos después de que el modal se ha mostrado
                            $(this).off('shown.bs.modal', onModalShown);
                        });
                    });
                    cursosContainerE.appendChild(card);
                });
     
                
            })
    }

    function cargarNombresModulo() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarnombremodulo");

        fetch(`../controllers/modulosE.controllers.php`, {
            method: 'POST',
            body: parametros
        })
            .then(response => response.json())
            .then(datos => {
                periodoSelectorE.innerHTML = ""; // Limpia el contenido actual

                datos.forEach(element => {
                    const optionTag = document.createElement("option");
                    optionTag.text = element.nombremodulo;
                    periodoSelectorE.appendChild(optionTag);
                });

                if (datos.length > 0) {
                    periodoSelectorE.value = datos[datos.length - 1].nombremodulo;
                    cargarCursos(periodoSelectorE.value); // Carga automáticamente los cursos para el último periodo
                }


                periodoSelectorE.addEventListener('change', function() {
                    const periodoSeleccionadoE = periodoSelectorE.value;
                    cargarCursos(periodoSeleccionadoE);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function cargarEstudiantesPorCurso(nombreCurso) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "Alumnos");
        parametros.append("nombreusuario", encodeURIComponent(nombreUsuario));
        parametros.append("nombreusuario", nombreUsuario.trim());

        parametros.append("nombrecurso", nombreCurso);

        fetch(`../controllers/modulosE.controllers.php`, {
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
                            <td>${Alumno.Fecha}</td>
                            <td>${Alumno.EstadoAsistencia}</td>
                        </tr>
                    `;
                    cuerpotabla.innerHTML += fila;
                    numeroFila++;
                
                });
           


            }) 
    }
    
    function cargarEstudiantesResultado(nombreCurso) {
        const parametros = new URLSearchParams();

        parametros.append("nombreusuario", encodeURIComponent(nombreUsuario));
        parametros.append("nombreusuario", nombreUsuario.trim());

        parametros.append("operacion", "Calificacion");
        parametros.append("nombrecurso", nombreCurso);
    
       fetch(`../controllers/modulosE.controllers.php`, {
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
                            <td>${numeroFila}</td>
                            <td id="calificacion-${Alumno.idresultado}">${Alumno.Calificacion}</td>

                            <td> 
                            <button type="button" class="btn btn-primary btn-modal-calificaciones" data-idresultado="${Alumno.idresultado}" data-modal-id="${modalId}">Calificaciones</button>
                            <div id="${modalId}" class="modal fade" role="dialog" style="overflow-y: scroll;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Calificaciones</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form class="row g-4 needs-validation" novalidate>
                                        <label for="zipCode" class="form-label">Sesiones</label>
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica1" value=""  readonly>
                                            <label for="floatingInput">Practica 1<label>
                                        </div>
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica2"  value=""  readonly>
                                            <label for="floatingInput">Practica 2</label>
                                        </div>
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica3"  value=""  readonly>
                                            <label for="floatingInput">Practica 3</label>
                                        </div>
                                        <div class="form-floating col-md-3 ">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica4"  value=""  readonly>
                                            <label for="floatingInput">Practica 4</label>
                                        </div>
    
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control " placeholder="nota" id="Practica5" value=""  readonly>
                                            <label for="floatingInput">Practica 5</label>
                                        </div>
    
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica6" value=""  readonly>
                                            <label for="floatingInput">Practica 6</label>
                                        </div>
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica7" value=""  readonly>
                                            <label for="floatingInput">Practica 7</label>
                                        </div>
                                        <div class="form-floating col-md-3">
                                            <input type="number" class="form-control" placeholder="nota" id="Practica8"  value=""  readonly>
                                            <label for="floatingInput">Practica 8</label>
                                        </div>
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
    
                                        <label for="zipCode" class="form-label">EXAMEN</label>
                                        <div class="form-floating col-md-3 ">
                                            <input type="number" class="form-control" placeholder="nota" id="examenfinal"  value="" readonly>
                                            <label for="floatingInput">Examen Final</label>
                                        </div>
                                    </form>
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

    

        })

    }

    
    function ListarPractica(idalumno, modalId) {
        console.log("Enviando solicitud para listar prácticas");
        const parametros = new URLSearchParams();
        parametros.append("operacion", "ListarPracticaA");
        parametros.append("idalumno", idalumno);
    
        fetch(`../controllers/modulosE.controllers.php`, {
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

    
    cargarNombresModulo();
});
