<?php
include_once "Programa.php";
class ControladorPrograma{
    public function GuardarPrograma($nombre, $id_facultad): void{
        $programa = new Programa();
        $programa->setNombre($nombre);
        $programa->setIdFacultad($id_facultad);
        $resultado = $programa->guardar();
        if ($resultado != 0) {
            echo "Datos guardados";
        } else {
            echo "No se pudo guardar";
        }
    }
}