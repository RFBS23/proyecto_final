<?php
require_once '../models/totalcards.php';
if (isset($_POST['operacion'])){
    $total = new TotalCard();
    if ($_POST['operacion'] == 'totalestudiante'){
        $datoObtenido = $total->totalestudiante();
        if ($datoObtenido) {
            echo json_encode($datoObtenido);
        }
    }

    if ($_POST['operacion'] == 'totalcurso'){
        $datoObtenido = $total->totalcursos();
        if ($datoObtenido){
            echo json_encode($datoObtenido);
        }
    }
}

?>