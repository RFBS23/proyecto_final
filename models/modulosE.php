<?php
require_once 'conexion.php';

class ModulosE extends Conexion {

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function listarModulosE( $nombreusuario, $nombremodulo){
        try{
            $consulta = $this->acceso->prepare("CALL spu_modulo_alumno(?,?)");
            $consulta->execute(array($nombreusuario, $nombremodulo));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function listarnombreModulo(){
        try{
            $consulta = $this->acceso->prepare("SELECT nombremodulo FROM modulos ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            die($e->getMessage());

        }

    }

    public function Alumnos($nombrecurso, $nombreusuario){
        try {
            $consulta = $this->acceso->prepare("CALL spu_alumnos(?,?)");
            $consulta->execute(array($nombrecurso, $nombreusuario));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Calificacion($nombrecurso, $nombreusuario){
        try {
            $consulta = $this->acceso->prepare("CALL spu_alumnos_resultados(?,?)");
            $consulta->execute(array($nombrecurso, $nombreusuario));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarPracticaA($idalumno) {
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

}

?>