$(document).ready(function (){
  let datosNuevos = true;
  let idpersona = 0;

  function mostrarNiveles(){
    $.ajax({
        url: '../controllers/usuarios.controllers.php',
        type: 'GET',
        data: {'operacion':'listarNiveles'},
        success: function (result){
            $("#b-niveles").html(result);
        }
    });
  }

  function buscarPersonas(){
      let numerodocumento = $("#b-documento").val();
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
                      $("#b-nombres").val(result.nombres);
                      $("#b-apellidos").val(result.apellidos);
                      $("#b-genero").val(result.genero);
                      $("#b-tipoDoc").val(result.tipodocumento);
                      $("#b-numemergencia").val(result.fechanacimiento);
                  }
              }
          });
      }
  }

  $("#b-documento").keypress(function (event){
    if (event.keyCode == 13){
      buscarPersonas();
    }
  });

  mostrarNiveles();
});