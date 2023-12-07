<?php

require_once 'conexion.php';
class Alumno extends Conexion{
  private $acceo;
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function listarEstudiantes(){
    try {
        $consulta = $this->acceso->prepare("CALL spu_listarnivel_estudiante()");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }
  }

};

?>
