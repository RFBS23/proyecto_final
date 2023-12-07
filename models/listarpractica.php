<?php

require_once 'conexion.php';

class ListarP extends Conexion {

  private $acceso;

  public function __CONSTRUCT(){

    $this->acceso = parent::getConexion();

  }

  public function listarpractica1(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica1()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e){
        die($e->getMessage());

    }  

  }

  public function listarpractica2(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica2()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e){
        die($e->getMessage());

    }  

  }

  public function listarpractica3(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica3()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica4(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica4()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica5(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica5()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
    
  }

  public function listarpractica6(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica6()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica7(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica7()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica8(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica8()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica9(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica9()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica10(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica10()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica11(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica11()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
  }

  public function listarpractica12(){
    try{
        $consulta = $this->acceso->prepare("CALL listarpractica12()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
}

public function listarpractica13(){
    try{
        $consulta = $this->acceso->prepare("CALL examenfinal()");
        $consulta->execute(array());
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e){
        die($e->getMessage());
    }  
}

}