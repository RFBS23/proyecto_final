<?php

require_once '../models/asistencia.php';

 
if (isset($_POST['operacion'])){

  $asistencia = new Asistencia();

  if ($_POST['operacion'] == 'listarAlumnosPorCurso') {
    $datoObtenido = $asistencia ->AlumnosPorCurso($_POST['nombrecurso']) ; 

      if ($datoObtenido){
        echo json_encode($datoObtenido);
    }
  }

  if ($_POST['operacion'] == 'actualizarEstadoAsistencia') {
    $datoObtenido = $asistencia ->ActualizarEstadoAsistencia(
      
          $_POST['idasistencia'],
          $_POST['estadoasistencia']
        
        );
    if ($datoObtenido){
      echo json_encode($datoObtenido);
  }

  
  }
  
  

}