<?php

require_once '../models/listarpractica.php';

 
if (isset($_POST['operacion'])){

  $listarp = new ListarP();

  if ($_POST['operacion'] == 'listarpractica1') {
    $datoObtenido = $listarp ->listarpractica1();
    if ($datoObtenido){
      echo json_encode($datoObtenido);
     }

  }

  if ($_POST['operacion'] == 'listarpractica2') {
    $datoObtenido = $listarp ->listarpractica2();
    if ($datoObtenido){
      echo json_encode($datoObtenido);
    }

  }
    // Listarpractica3
  if ($_POST['operacion'] == 'listarpractica3') {
    $datoObtenido = $listarp->listarpractica3();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica4
  if ($_POST['operacion'] == 'listarpractica4') {
    $datoObtenido = $listarp->listarpractica4();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica5
  if ($_POST['operacion'] == 'listarpractica5') {
    $datoObtenido = $listarp->listarpractica5();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica6
  if ($_POST['operacion'] == 'listarpractica6') {
    $datoObtenido = $listarp->listarpractica6();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica7
  if ($_POST['operacion'] == 'listarpractica7') {
    $datoObtenido = $listarp->listarpractica7();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica8
  if ($_POST['operacion'] == 'listarpractica8') {
    $datoObtenido = $listarp->listarpractica8();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica9
  if ($_POST['operacion'] == 'listarpractica9') {
    $datoObtenido = $listarp->listarpractica9();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica10
  if ($_POST['operacion'] == 'listarpractica10') {
    $datoObtenido = $listarp->listarpractica10();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica11
  if ($_POST['operacion'] == 'listarpractica11') {
    $datoObtenido = $listarp->listarpractica11();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Listarpractica12
  if ($_POST['operacion'] == 'listarpractica12') {
    $datoObtenido = $listarp->listarpractica12();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }

  // Operación para examenfinal
  if ($_POST['operacion'] == 'listarpractica13') {
    $datoObtenido = $listarp->listarpractica13();
    if ($datoObtenido) {
        echo json_encode($datoObtenido);
    }
  }


}
  

