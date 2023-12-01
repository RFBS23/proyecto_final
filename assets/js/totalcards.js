$(document).ready(function() {
    const CardEstudiante = document.querySelector("#Testudiante");
    const cuerpoEstudiante = CardEstudiante.querySelector("div");
    const CardCursos = document.querySelector("#Tcursos");
    const cuerpoCursos = CardCursos.querySelector("div");

    function Totalestudiante(){
        const data = new URLSearchParams();
        data.append("operacion", "totalestudiante");
        fetch("../controllers/totalcards.controllers.php", {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(datos => {
                cuerpoEstudiante.innerHTML = ``
                datos.forEach(element =>{
                    let row = `
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/estudiantes.png" alt="Credit Card" class="rounded"/>
                            </div>
                        </div>
                        <span>Total de Estudiantes</span>
                        <h5 class="card-title text-nowrap mb-1 py-1">${element.totalEstudiantes}</h5>
                    </div>
                    `;
                    cuerpoEstudiante.innerHTML += row;
                });
            });
    }

    function Totalcursos(){
        const data = new URLSearchParams();
        data.append("operacion", "totalcurso");
        fetch("../controllers/totalcards.controllers.php", {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(datos => {
                cuerpoCursos.innerHTML = ``
                datos.forEach(element =>{
                    let row = `
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/estudiantes.png" alt="Credit Card" class="rounded"/>
                            </div>
                        </div>
                        <span>Total de Cursos</span>
                        <h5 class="card-title text-nowrap mb-1 py-1">${element.totalcursos}</h5>
                    </div>
                    `;
                    cuerpoCursos.innerHTML += row;
                });
            });
    }

    Totalestudiante();
    Totalcursos();
});