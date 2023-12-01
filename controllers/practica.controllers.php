<?php

require_once '../models/practica.php';
$practica= new Practica();

if(isset($_POST['operacion'])){



    if($_POST['operacion'] == 'practica1'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica1"         => $_POST["practica1"],
        ];

        $practica->practica1($registro);
    }
    
    if($_POST['operacion'] == 'practica2'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica2"         => $_POST["practica2"],
        ];

        $practica->practica2($registro);
    }
    
    if($_POST['operacion'] == 'practica3'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica3"         => $_POST["practica3"],
        ];

        $practica->practica3($registro);
    }
    
    if($_POST['operacion'] == 'practica4'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica4"         => $_POST["practica4"],
        ];

        $practica->practica4($registro);
    }
    
    if($_POST['operacion'] == 'practica5'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica5"         => $_POST["practica5"],
        ];

        $practica->practica5($registro);
    }
    
    if($_POST['operacion'] == 'practica6'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica6"         => $_POST["practica6"],
        ];

        $practica->practica6($registro);
    }
    
    
    if($_POST['operacion'] == 'practica7'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica7"         => $_POST["practica7"],
        ];

        $practica->practica7($registro);
    }
    
    if($_POST['operacion'] == 'practica8'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica8"         => $_POST["practica8"],
        ];

        $practica->practica8($registro);
    }
    
    if($_POST['operacion'] == 'practica9'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica9"         => $_POST["practica9"],
        ];

        $practica->practica9($registro);
    }
    
    if($_POST['operacion'] == 'practica10'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica10"         => $_POST["practica10"],
        ];

        $practica->practica10($registro);
    }
    
    if($_POST['operacion'] == 'practica11'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica11"         => $_POST["practica11"],
        ];

        $practica->practica11($registro);
    }
    
    if($_POST['operacion'] == 'practica12'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "practica12"         => $_POST["practica12"],
        ];

        $practica->practica12($registro);
    }

    if($_POST['operacion'] == 'practica13'){
        $registro = [
            "idresultado"       => $_POST["idresultado"],
            "examenfinal"         => $_POST["practica13"],
        ];

        $practica->examenFinal($registro);
    }

}