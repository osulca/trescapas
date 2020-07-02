<?php
include_once "ConexionDB.php";
class Facultad
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function guardar(): int{
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO facultad(nombre) 
                    VALUES('$this->nombre')";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();

            $db->cerrarConexion();

            return $respuesta->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function traerDatos(){
        $resultados = null;
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM facultad";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $resultados;
    }
}