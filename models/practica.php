<?php

require_once 'conexion.php';

class Practica extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }


    public function practica1($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica1(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica1'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function practica2($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica2(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica2'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function practica3($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica3(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica3'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica4($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica4(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica4'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica5($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica5(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica5'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica6($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica6(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica6'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica7($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica7(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica7'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica8($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica8(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica8'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica9($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica9(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica9'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica10($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica10(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica10'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica11($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica11(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica11'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function practica12($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL RegistrarPractica12(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['practica12'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
     
    public function examenFinal($datos= []){
        try{
            $consulta = $this->acceso->prepare("CALL Registrarexamen(?,?)");
            $consulta->execute(
                array(
                    $datos['idresultado'],
                    $datos['examenfinal'],
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
}