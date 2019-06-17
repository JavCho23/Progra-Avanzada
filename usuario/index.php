<?php $titulo = 'Gestion de usuario';
include '../header.php'; ?>

<a href="agregar.php">Agregar usuario</a>

<ul>
  <li>
    <span>ID</span>
    <span>Nombre completo</span>
    <span>Usuario</span>
    <span>Tipo</span>
    <span>Opciones</span>
  </li>
  <?php
  $sql = "SELECT U.id, U.usuario, P.nombre, P.apellido_paterno, P.apellido_materno, U.tipo FROM usuario U INNER JOIN personal P ON U.id_personal=P.id ";
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
        <span><?= $fila['usuario'] ?></span>
        <span><?php 
          if ($fila['tipo']=='A') {
           echo "Administrador";
          }elseif ($fila['tipo']=='J') {
          echo "Jefe";
          } else {
            echo "Vendedor";
          }
        ?>
        </span>
        <span><a href="editar.php?id=<?= $fila['id'] ?>">Editar</a>
        <a href="eliminar.php?id=<?= $fila['id'] ?>">Eliminar</a></span>
      </li>

      <?php $i++;
    }
  } catch (PDOException $e) { }
  ?>
</ul>
