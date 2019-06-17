<?php
    
  if (isset($_GET['codigo'])) {
        $codigo=$_GET['codigo'];
        $sql="DELETE from producto WHERE producto.codigo='$codigo'";
        try {
            require '../conectar.php';
            $cantidad= $conexion->exec($sql);
            if ($cantidad>0) {
                header('location:listar.php');
            }
        
        }catch (PDOexception $e) {
            echo $e->getMessage();
        }
    }
        ?>