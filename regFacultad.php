<h1>Registrar Facultad</h1>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="facultad" placeholder="Ingrese el nombre de la facultad"><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    $facultad = $_POST["facultad"];
    include_once "ControladorFacultad.php";
    $controladorFacultad = new ControladorFacultad();
    $controladorFacultad->GuardarFacultad($facultad);
}