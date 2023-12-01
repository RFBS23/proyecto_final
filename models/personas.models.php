<?php
require_once 'conexion.php';
class Persona extends Conexion{
  private $acceso;
  
  public function __CONSTRUCT(){
    $this->acceso = parent::getConexion();
  }

  public function listarPersonas(){
    try {
      $consulta = $this->acceso->prepare("CALL spu_personas_listar()");
      $consulta->execute();
      $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
      return $datosObtenidos;
    } catch (Exception $e){
      die($e->getMessage());
    }
  }

  public function listarGenero(){
      try {
          $consulta = $this->acceso->prepare("CALL spu_genero_listar()");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e){
          die($e->getMessage());
      }
  }
  public function listarTipoDoc(){
      try {
          $consulta = $this->acceso->prepare("CALL spu_tipodoc_listar()");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e){
          die($e->getMessage());
      }
  }
  public function registrarPersonas($datos = []){
    try{
      $consulta = $this->acceso->prepare("CALL spu_personas_registrar(?, ?, ?, ?, ?, ?, ?, ?)");
      $consulta->execute(
        array(
          $datos['nombres'],
          $datos['apellidos'],
          $datos['genero'],
          $datos['celular'],
          $datos['direccion'],
          $datos['fechanacimiento'],
          $datos['tipodocumento'],
          $datos['numerodocumento']
        )
      );
    } catch(Exception $e) {
      die($e->getMessage());
    }
  }

  public function actualizarPersonas($datos = []){
      try{
          $consulta = $this->acceso->prepare("CALL spu_personas_actualizar(?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $consulta->execute(
              array(
                  $datos['idpersona'],
                  $datos['nombres'],
                  $datos['apellidos'],
                  $datos['genero'],
                  $datos['celular'],
                  $datos['direccion'],
                  $datos['fechanacimiento'],
                  $datos['tipodocumento'],
                  $datos['numerodocumento']
              )
          );
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }

  public function buscarPersonas($numerodocumento = ''){
      try {
          $consulta = $this->acceso->prepare("CALL spu_personas_buscar(?)");
          $consulta->execute(array($numerodocumento));
          return $consulta->fetch(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }

  public function eliminarPersonas($idpersona = 0){
      try {
          $consulta = $this->acceso->prepare("CALL spu_personas_eliminar(?)");
          $consulta->execute(array($idpersona));
      } catch (Exception $e){
          die($e->getMessage());
      }
  }

  public function obtenerDatosPersonas($idpersona = 0){
      try {
          $consulta = $this->acceso->prepare("CALL spu_personas_obtenerDatos(?)");
          $consulta->execute(array($idpersona));
          return $consulta->fetch(PDO::FETCH_ASSOC);
      } catch (Exception $e){
          die($e->getMessage());
      }
  }

}
?>