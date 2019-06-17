<?php $titulo = 'Agregar personal';
include '../header.php'; ?>

<?php

if (!empty($_POST)) {

  $nombre = $_POST['nombre'];
  $apellidoPaterno = $_POST['apellido_paterno'];
  $apellidoMaterno = $_POST['apellido_materno'];
  $dni = $_POST['dni'];
  $celular = $_POST['celular'];
  $email = $_POST['email'];

  $query = "INSERT INTO personal (nombre, apellido_paterno, apellido_materno, dni, celular, email, vigencia) 
  VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$dni', '$celular', '$email', 0)";

  try {
    require '../conectar.php';
    $sql = $conexion->prepare($query);
    $res = $sql->execute();
    if ($res > 0) header('location:index.php');
  } catch (PDOException $e) { }
}

?>

<form action="agregar.php" method="POST">
  <label for="dni">DNI</label>
  <input type="text" name="dni">

  <label for="nombre">Nombre</label>
  <input type="text" name="nombre">

  <label for="apellido_paterno">Apellido paterno</label>
  <input type="text" name="apellido_paterno">

  <label for="apellido_materno">Apellido materno</label>
  <input type="text" name="apellido_materno">

  <label for="celular">Celular</label>
  <input type="text" name="celular">

  <label for="email">E-mail</label>
  <input type="email" name="email">

  <input type="submit" value="Agregar">
</form>