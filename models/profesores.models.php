<?php
require_once 'conexion.php';
class Profesor extends  Conexion {
    private  $conexion;

    public function __CONSTRUCT(){
        $this->conexion = parent::getConexion();
    }

    public function listarProfesores(){
        try{
            $consulta = $this->conexion->prepare("CALL spu_docentes_listar()");
            $consulta->execute();
            $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC); // Arreglo asociativo
            return $datosObtenidos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>