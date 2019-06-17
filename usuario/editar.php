<?php $titulo = 'Editar usuario';
include '../header.php'; ?>

<?php

if (!empty($_POST)) {

  $id = $_GET['id'];
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];
  $personal = $_POST['personal'];
  $tipo = $_POST['tipo'];
  $query = "UPDATE usuario SET usuario='$usuario', clave='$clave', id_personal='$personal', tipo= '$tipo' WHERE id=$id";

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

  $sql = "SELECT * FROM usuario WHERE id=$id";

  try {
    require '../conectar.php';
    $datos = $conexion->query($sql);
    foreach ($datos as $user) { ?>

      <form action="editar.php?id=<?= $user['id'] ?>" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" value="<?= $user['usuario'] ?>">

        <label for="clave">Clave</label>
        <input type="text" name="clave" value="<?= $user['clave'] ?>">
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
            $datos = $conexion->query("SELECT * FROM personal");
            $i = 1;
            foreach ($datos as $pers) { ?>

              <option value="<?= $pers['id'] ?>"
              
              <?php 
              if ($pers['id'] == $user['id_personal']){
                ?>
                  selected
                <?php
              }
              ?>

              
              >
                <?= $pers['nombre'] ?>
              </option>

              <?php $i++;
            }
          } catch (PDOException $e) { }
          ?>
        </select>

        <input type="submit" value="Aceptar">
      </form>

    <?php
  }
} catch (PDOException $e) { }
}

?>