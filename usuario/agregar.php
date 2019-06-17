<?php $titulo = 'Agregar personal';
include '../header.php'; ?>

<?php

if (!empty($_POST)) {

  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];
  $personal = $_POST['personal'];

  $query = "INSERT INTO usuario (usuario, clave, id_personal, vigencia) 
  VALUES ('$usuario', '$clave', '$personal', 0)";

  try {
    require '../conectar.php';
    $sql = $conexion->prepare($query);
    $res = $sql->execute();
    if ($res > 0) header('location:index.php');
  } catch (PDOException $e) { }
}

?>

<form action="agregar.php" method="POST">

  <label for="usuario">Usuario</label>
  <input type="text" name="usuario">

  <label for="clave">Clave</label>
  <input type="text" name="clave">

  <label for="personal">Personal</label>
  <select name="personal">
    <?php
    try {
      require '../conectar.php';
      $datos = $conexion->query("SELECT * FROM personal");
      $i = 1;
      foreach ($datos as $fila) { ?>

        <option value="<?= $fila['id'] ?>">
          <?= $fila['nombre'] ?>
        </option>

        <?php $i++;
      }
    } catch (PDOException $e) { }
    ?>
  </select>

  <input type="submit" value="Agregar">
</form>