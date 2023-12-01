<?php

require_once '../models/modulos.php';

if(isset($_POST['operacion'])){
    $modulos = new Modulos();

    if ($_POST['operacion'] == 'listarModulos'){
        $datoObtenido = $modulos->listarModulos($_POST['nombremodulo']);
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

}