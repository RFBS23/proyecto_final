<?php

require_once 'conexion.php';

class Calificacion extends Conexion {

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }


    public function AlumnosResultado($nombreCurso){
        try {
            $consulta = $this->acceso->prepare("CALL spu_alumnos_del_curso_resultados(?)");
            $consulta->execute(array($nombreCurso));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    
    }

    public function  AlumnosPractica($nombreCurso){
        try {
            $consulta = $this->acceso->prepare("CALL spu_alumnos_del_curso_practica(?)");
            $consulta->execute(array($nombreCurso));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    
    }

    public function ListarPractica($idalumno) {
        try {
            $consulta = $this->acceso->prepare("CALL ListarPracticasExamen(?)");
            $consulta->execute(array($idalumno));
    
            // Verifica si hay datos antes de devolverlos
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if (empty($resultados)) {
                // No hay datos, devuelve un mensaje informativo o un estado 204 No Content
                http_response_code(204);
            } else {
                // Hay datos, devuelve los resultados como JSON
                echo json_encode($resultados);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function CalcularCalificacion($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL ActualizarCalificacionFinal(?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }




}