<?php

require_once 'conexion.php';

class Asistencia extends Conexion {

  private $acceso;

  public function __CONSTRUCT(){

    $this->acceso = parent::getConexion();

  }
  
  public function AlumnosPorCurso($nombreCurso){
    try {
        $consulta = $this->acceso->prepare("CALL spu_alumnos_del_curso(?)");
        $consulta->execute(array($nombreCurso));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die($e->getMessage());
    }

  }

  public function ActualizarEstadoAsistencia($idasistencia, $estadoasistencia) {
    try {
        $consulta = $this->acceso->prepare("CALL spu_asistencia_actualizar(?, ?)");
        $consulta->execute(array($idasistencia, $estadoasistencia));
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  } 

  
}