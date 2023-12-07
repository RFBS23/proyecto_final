<?php
require_once 'conexion.php';

$datos = spu_resultado_alumnos(); // Debes reemplazar esto con tu lógica para obtener los datos

// Convierte el array asociativo a formato JSON
$datos_json = json_encode($datos, JSON_UNESCAPED_UNICODE);
// Enviar datos a la vista
include '../views/dashboard.php';
?>