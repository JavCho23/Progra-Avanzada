<?php $titulo = 'Editar personal';
include '../header.php'; ?>

<?php

if (!empty($_POST)) {

  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellidoPaterno = $_POST['apellido_paterno'];
  $apellidoMaterno = $_POST['apellido_materno'];
  $dni = $_POST['dni'];
  $celular = $_POST['celular'];
  $email = $_POST['email'];

  $query = "UPDATE personal SET nombre='$nombre', apellido_paterno='$apellidoPaterno', apellido_materno='$apellidoMaterno', dni='$dni', celular='$celular', email='$email' WHERE id=$id";

  try {
    require '../conectar.php';
    $sql = $conexion->prepare($query);
    $res = $sql->execute();
    if ($res > 0) header('location:index.php');
  } catch (PDOException $e) {
    echo $e;
  }
}

if (!empty($_GET)) {

  $id = $_GET['id'];

  $sql = "SELECT * FROM personal WHERE id=$id";

  try {
    require '../conectar.php';
    $datos = $conexion->query($sql);
    foreach ($datos as $fila) { ?>

      <form action="editar.php?id=<?= $fila['id'] ?>" method="POST">
        <label for="dni">DNI</label>
        <input type="text" name="dni" value="<?= $fila['dni'] ?>">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $fila['nombre'] ?>">

        <label for="apellido_paterno">Apellido paterno</label>
        <input type="text" name="apellido_paterno" value="<?= $fila['apellido_paterno'] ?>">

        <label for="apellido_materno">Apellido materno</label>
        <input type="text" name="apellido_materno" value="<?= $fila['apellido_materno'] ?>">

        <label for="celular">Celular</label>
        <input type="text" name="celular" value="<?= $fila['celular'] ?>">

        <label for="email">E-mail</label>
        <input type="email" name="email" value="<?= $fila['email'] ?>">

        <input type="submit" value="Aceptar">
      </form>

    <?php
  }
} catch (PDOException $e) { }
}

?>