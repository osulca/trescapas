<?php
include_once "Facultad.php";
class ControladorFacultad{
    public function GuardarFacultad($nombre): void{
        $facultad = new Facultad($nombre);
        $resultado = $facultad->guardar();
        if ($resultado != 0) {
            echo "Datos guardados";
        } else {
            echo "No se pudo guardar";
        }
    }

    public function MostrarDatosFacultad(){
        $facultad = new Facultad("");
        return $facultad->traerDatos();
    }
}