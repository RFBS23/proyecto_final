function crearFilaModal(numeroFila, Alumno) {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <tr>
                <td>${numeroFila}</td>
                <td>${Alumno.Apellidos}</td>
                <td>${Alumno.Nombres}</td>
                <td>${Alumno.Calificacion}</td>
                <td> 
                    <button type="button" id="btnModal1-${Alumno.idresultado}-${numeroFila}" class="btn btn-primary">calificaciones</button>
                    <div id="modal-${Alumno.idresultado}-${numeroFila}" class="modal fade" role="dialog" style="overflow-y: scroll;">
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
                                        <input type="number" class="form-control" placeholder="nota" id="Practica1-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 1<label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica2-${Alumno.idresultado}" min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 2</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica3-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 3</label>
                                    </div>
                                    <div class="form-floating col-md-3 ">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica4-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 4</label>
                                    </div>

                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control " placeholder="nota" id="Practica5-${Alumno.idresultado}" min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 5</label>
                                    </div>

                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica6-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 6</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica7-${Alumno.idresultado}" min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 7</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica8-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 8</label>
                                    </div>
                                    <div class="form-floating col-md-3 ">
                                        <input type="number" class="form-control " placeholder="nota" id="Practica9-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 9</label>
                                    </div>

                                    <div class="form-floating col-md-3 ">
                                        <input type="number" class="form-control " placeholder="nota" id="Practica10-${Alumno.idresultado}" min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 10</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica11-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)"  value="">
                                        <label for="floatingInput">Practica 11</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="number" class="form-control" placeholder="nota" id="Practica12-${Alumno.idresultado}"  min="0" max="20" oninput="limitarADosDigitos(this)" value="">
                                        <label for="floatingInput">Practica 12</label>
                                    </div>

                                    <label for="zipCode" class="form-label">EXAMEN</label>
                                    <div class="form-floating col-md-3 ">
                                        <input type="number" class="form-control" placeholder="nota" id="examenfinal-${Alumno.idresultado}" min="0" max="20" oninput="limitarADosDigitos(this)"  value="">
                                        <label for="floatingInput">Examen Final</label>
                                    </div>
                                </form>
                            </div>

                                <div class="modal-footer">
                                    <button type="button" id="registrarCalificaciones" class="btn btn-secondary" data-bs-dismiss="modal">Registrar</button>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </td>
            </tr>
        `;
        
    
        cuerpotabla1.appendChild(fila);

        const modalId = `modal-${Alumno.idresultado}-${numeroFila}`;
        const registrarButton = document.querySelector(`#btnModal1-${Alumno.idresultado}-${numeroFila}`);
        const modal = new bootstrap.Modal(document.querySelector(`#${modalId}`));

        return { registrarButton, modal };
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
            
            const modals = {};
    
            data.forEach(Alumno => {
                const { registrarButton, modal } = crearFilaModal(numeroFila, Alumno);
                modals[Alumno.idresultado] = modal;
    
                registrarButton.addEventListener('click', function () {
                    modal.show();
                });

                const registrarCalificacionesButton = document.querySelectorAll('.btn-registrar-calificaciones');
                registrarCalificacionesButton.forEach(button => {
                    button.addEventListener('click', async function () {
                        const idAlumno = obtenerIdAlumnoDesdeBoton(button);
                        const examenFinal = document.querySelector(`#examenfinal-${idAlumno}`).value;
            
                        // Verificar si se han ingresado calificaciones antes de registrar
                        if (examenFinal === '' || examenFinal < 0 || examenFinal > 20) {
                            return;
                        }
            
                        const practicaCalificaciones = [];
                        for (let i = 1; i <= 12; i++) {
                            const practica = document.querySelector(`#Practica${i}-${idAlumno}`).value;
                            if (practica === '' || practica < 0 || practica > 20) {
                                alert("Por favor ingrese calificaciones válidas para todas las prácticas.");
                                return;
                            }
                            practicaCalificaciones.push(practica);
                        }
            
                        try {
                            console.log("Antes de llamar a registrarCalificaciones");
                            await registrarCalificacion(idAlumno, examenFinal, practicaCalificaciones);
                            // Si el registro es exitoso, oculta el modal
                            obtenerModalDesdeBoton(button).hide();
                        } catch (error) {
                            console.error("Error al registrar calificaciones:", error);
                            alert("Ocurrió un error al registrar las calificaciones. Intente nuevamente.");
                        }
                    });
                });

                function obtenerIdAlumnoDesdeBoton(boton) {
                    const idresultado = boton.id.split('-')[2];
                    return idresultado.split('-')[0];
                }
            
                function obtenerModalDesdeBoton(boton) {
                    const idAlumno = obtenerIdAlumnoDesdeBoton(boton);
                    const numeroFila = obtenerNumeroFilaDesdeBoton(boton); // Corregir aquí
                    const modalId = `modal-${idAlumno}-${numeroFila}`;
                    return new bootstrap.Modal(document.querySelector(`#${modalId}`));
                }
                
                


                numeroFila++;
            });
    
           
        });
    }




    function registrarCalificacion(idresultado, examenfinal) {
        console.log("Enviando solicitud para registrar calificaciones");
        const parametros = new URLSearchParams();
        parametros.append("operacion", "RegistrarCalificacion");
        parametros.append("idresultado", idresultado);
        parametros.append("examenfinal", examenfinal);

        for (let i = 1; i <= 12; i++) {
            const practica = document.querySelector(`#Practica${i}-${idresultado}`).value;
            parametros.append(`practica${i}`, practica);
        }

        // Devuelve una promesa que se resuelve cuando se completa la solicitud
        return fetch(`../controllers/calificacion.controllers.php`, {
            method: 'POST',
            body: parametros
        });
    }
    