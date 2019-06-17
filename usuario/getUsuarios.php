<?php
$sql = "SELECT U.id, U.usuario, P.nombre, P.apellido_paterno, P.apellido_materno FROM usuario U INNER JOIN personal P ON U.id_personal=P.id ";
try {
  require '../conectar.php';
  $datos = $conexion->query($sql);
  $array = [];
  foreach ($datos as $user) {
    array_push($array, $user);
  }
  echo json_encode($array);
} catch (PDOException $e) {
  echo json_encode($e);
}
