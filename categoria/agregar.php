<?php
include '../header.php';

if (isset($_POST['name'],$_POST['desc'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO categoria(nombre,descripcion, vigencia)
     values('$name','$desc',1)";
    try {
        require '../conectar.php';
        $aux = $conexion->exec($sql);
        if ($aux > 0) {
            header('location:listar.php');
        }
    } catch (PDOexception $e) {
       
    }
}
?>
<a class="back" href="listar.php" title="Ir hacia atras">Volver</a>
<form action="agregar.php" method="post">
<label for="name">Nombre</label>
<input type="text" name="name" id="name">

<label for="desc">Descripcion</label>
<input type="text" name="desc">

<button type="submit">Registrar</button>
</form>