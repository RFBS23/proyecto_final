<?php
/*
    class Conexion{
        private $servidor = "localhost";
        private $puerto = "3306";
        private $baseDatos = "id21639146_sistemaolympus";
        private $usuario = "id21639146_holamundo";
        private $clave = "Holamundo_12";

        public function getConexion(){
            try{
                $pdo = new PDO(
                    "mysql:host={$this->servidor};
                    port={$this->puerto};
                    dbname={$this->baseDatos};
                    charset=UTF8",
                    $this->usuario,
                    $this->clave
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
 * */
    class Conexion{
        private $servidor = "localhost";
        private $puerto = "3307";
        private $baseDatos = "sistemaolympus";
        private $usuario = "root";
        private $clave = "fabrizio";

        public function getConexion(){
            try{
                $pdo = new PDO(
                    "mysql:host={$this->servidor};
                    port={$this->puerto};
                    dbname={$this->baseDatos};
                    charset=UTF8",
                    $this->usuario,
                    $this->clave
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

?>
