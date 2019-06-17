<?php

if (!empty($_GET)) {
  $id = $_GET['id'];
  try {
    include('../conectar.php');
    $query = "DELETE FROM usuario WHERE id=$id";
    $sql = $conexion->prepare($query);
    $sql->execute();
    header('location:index.php');
  } catch (PDOException $e) { }
}

?>