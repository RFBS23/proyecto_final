<?php
require_once 'conexion.php';

class Modulos extends Conexion {

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    public function listarModulos($nombremodulo){
        try{
            $consulta = $this->acceso->prepare("CALL spu_listar_modulos(?)");
            $consulta->execute(array($nombremodulo));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
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
}



