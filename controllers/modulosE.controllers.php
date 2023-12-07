<?php
require_once '../models/modulosE.php';

if(isset($_POST['operacion'])){
    $modulos = new ModulosE();

    if ($_POST['operacion'] == 'listarModulosE'){
        $datoObtenido = $modulos->listarModulosE(
            $_POST['nombreusuario'],
            $_POST['nombremodulo']
        
        );
        if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }

    if ($_POST['operacion'] == 'listarnombremodulo'){
        $datosObtenidos = $modulos ->listarnombremodulo();
        if ($datosObtenidos){
            echo json_encode($datosObtenidos);

        }

    }

    if ($_POST['operacion'] == 'Alumnos') {
        $datoObtenido = $modulos ->Alumnos(
            $_POST['nombrecurso'],
            $_POST['nombreusuario']
            ) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }

    if ($_POST['operacion'] == 'Calificacion') {
        $datoObtenido = $modulos ->Calificacion(
            $_POST['nombrecurso'],
            $_POST['nombreusuario']
            ) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }
    

    if ($_POST['operacion'] == 'ListarPracticaA') {
        $datoObtenido = $modulos->ListarPracticaA($_POST['idalumno']) ; 
    
          if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }



}
?>