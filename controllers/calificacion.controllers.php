<?php

require_once '../models/calificacion.php';
$calificacion = new Calificacion();

if(isset($_POST['operacion'])){


    if ($_POST['operacion'] == 'AlumnosResultado') {
        $datoObtenido = $calificacion->AlumnosResultado($_POST['nombrecurso']) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }

    
    if ($_POST['operacion'] == 'AlumnosPractica') {
        $datoObtenido = $calificacion->AlumnosPractica($_POST['nombrecurso']) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }

    if ($_POST['operacion'] == 'ListarPractica') {
        $datoObtenido = $calificacion->ListarPractica($_POST['idalumno']) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }


    if($_POST['operacion'] == 'CalcularCalificacion'){
        $calcular = [
            "idresultado"       => $_POST["idresultado"],
        ];

        $calificacion->CalcularCalificacion($calcular);
    }


}