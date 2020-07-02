<?php
include_once "ConexionDB.php";
class Programa
{
    private $nombre;
    private $id_facultad;

    public function getNombre():string
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getIdFacultad():int
    {
        return $this->id_facultad;
    }

    public function setIdFacultad($id_facultad): void
    {
        $this->id_facultad = $id_facultad;
    }

    public function verProgramas() {
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM pa";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->fetchAll();

            $db->cerrarConexion();
            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function guardar(): int{
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO pa(nombre,id_facultad) 
                    VALUES('$this->nombre', 1)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();

            $db->cerrarConexion();

            return $respuesta->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}