<h1>Registrar Programa</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="programa" placeholder="Ingrese el nombre de la programa"><br>
    <select name="idFacultad">
        <?php
        include_once "ControladorFacultad.php";
        $controladorFacultad = new ControladorFacultad();
        $resultados = $controladorFacultad->MostrarDatosFacultad();
        foreach ($resultados as $facultad) {
            echo "<option value=".$facultad["id"].">".$facultad["nombre"]."</option>";
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $programa = $_POST["programa"];
    $id_facultad = (int) $_POST["idFacultad"];
    include_once "ControladorPrograma.php";
    $controladorPrograma = new ControladorPrograma();
    $controladorPrograma->GuardarPrograma($programa, $id_facultad);
}
