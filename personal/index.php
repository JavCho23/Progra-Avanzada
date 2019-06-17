<?php $titulo = 'Gestion de personal';
include '../header.php'; ?>

<a href="agregar.php">Agregar nuevo</a>

<ul>
  <li>
    <span>ID</span>
    <span>Nombre completo</span>
    <span>DNI</span>
    <span>Opciones</span>
  </li>
  <?php
  $sql = "SELECT * FROM personal";
  try {
    require '../conectar.php';
    $datos = $conexion->query($sql);
    $i = 1;
    foreach ($datos as $fila) { ?>

      <li>
        <span><?= $fila['id'] ?></span>
        <span>
          <?= $apellidoPaterno = $fila['apellido_paterno'] ?>
          <?= $fila['apellido_materno'] ?>,
          <?= $fila['nombre'] ?>
        </span>
        <span><?= $fila['dni'] ?></span>
        <span><a href="editar.php?id=<?= $fila['id'] ?>">Editar</a></span>
        <span><a href="eliminar.php?id=<?= $fila['id'] ?>">Eliminar</a></span>
      </li>

      <?php $i++;
    }
  } catch (PDOException $e) { }
  ?>
</ul>