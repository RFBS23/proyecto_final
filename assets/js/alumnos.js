$(document).ready(function (){
  let datosNuevos = true;
  let idpersona = 0;

  function mostrarEstudiante(){
    $.ajax({
        url: '../controllers/alumno.controllers.php',
        type: 'GET',
        data: {'operacion':'listarEstudiante'},
        success: function (result){
            $("#b-nivelacceso").html(result);
        }
    });
  }

  mostrarEstudiante();
});