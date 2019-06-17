<?php $titulo = 'Agregar personal';
include '../header.php'; ?>

<?php

if (!empty($_POST)) {

  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];
  $personal = $_POST['personal'];
  $tipo = $_POST['tipo'];

  $query = "INSERT INTO usuario (usuario, clave, id_personal, vigencia,tipo) 
  VALUES ('$usuario', '$clave', '$personal', 0,'$tipo')";

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
  <label for="tipo">Tipo</label>
  <select name="tipo" id="">
    <option value="A">Andministrador</option>
    <option value="J">Jefe</option>
    <option value="V">Vendedor</option>
  </select>
  <label for="personal">Personal</label>
  <select name="personal">
    <?php
    try {
      require '../conectar.php';
      $datos = $conexion->query("SELECT * FROM personal left join usuario on usuario.id_personal = personal.id WHERE personal.id NOT IN(SELECT usuario.id_personal from usuario)");
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