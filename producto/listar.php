<?php

include '../header.php';
$sql= 'Select P.* ,C.codigo as codigoCategoria, C.nombre as categoriaNombre from producto P INNER JOIN categoria C ON C.codigo=P.codigoCategoria';
if (isset($_POST['buscar'])) {
    $buscar = str_split($_POST['buscar']);
    $consulta= "%";
    foreach ($buscar as $letra) {
        $consulta = $consulta . $letra ."%";
    }
    $sql= $sql. " WHERE P.nombre LIKE  '$consulta' ";
}
?>

<div class="enlaces">
    <a class="back" href="../index.php" title="Ir hacia atras">Volver</a>
    <a  class="back" href="agregar.php" class="agregar">Agregar Nueva</a>
</div>
<div class="content">
    
    <form action="listar.php" method="post">
        <label for="buscar">Ingrese Nombre</label>
        <input type="text" name="buscar">
        <button type="submit">Buscar</button>
    </form>
    <ul class="list">
        <li class="list__item">
        <span>Codigo</span>
        <span>Nombre</span>
        <span>Precio</span>
        <span>Tipo</span>
        <span>Vigencia</span>
        <span>categoria</span>
        <span>Operaciones</span>
        </li>
        <?php
            
            try {
                require '../conectar.php';
                $data = $conexion->query($sql);
                foreach ($data as $tupla) { 
                    ?>
                    <li class='list__item <?= $tupla['vigencia'] ?  " " : "inactivo" ;?>'>
                        <span><?=$tupla['codigo']?></span>
                        <span><?=$tupla['nombre']?></span>
                        <span><?=$tupla['precio']?></span>
                        <span><?=$tupla['tipo']=='B' ? 'Bien': 'Servicio' ?></span>
                        <span><?=$tupla['vigencia'] ? 'Activo': 'Inactivo' ?></span>
                        <span><?=$tupla['categoriaNombre']?></span>
                        <span><a class="back" href="editar.php?codigo=<?=$tupla['codigo']?>">Editar</a>
                        <a class="back" href="eliminar.php?codigo=<?=$tupla['codigo']?>" >Eliminar</a>
                        </span>
                        
                    </li>
                <?php
                }
            } catch (PDOException $e) {
                
            }
        ?>
    </ul>

</div>