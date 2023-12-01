<?php
require_once 'conexion.php';

class TotalCard extends Conexion {
    private $conexion;

    public function __CONSTRUCT(){
        $this->conexion = parent::getConexion();
    }

    public function totalestudiante(){
        try{
            $query = $this->conexion->prepare("CALL spu_estudiantes_cantidad()");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function totalcursos(){
        try{
            $query = $this->conexion->prepare("CALL spu_cursos_cantidad()");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }
}
?>