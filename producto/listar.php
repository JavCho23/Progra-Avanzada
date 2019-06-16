<?php

include '../header.php';
?>

<a class="back" href="../index.php" title="Ir hacia atras">Volver</a>
<div class="content">
    <a href="agregar.php" class="agregar">Agregar Nueva</a>
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
            $sql= 'Select P.* ,C.codigo as codigoCategoria, C.nombre as categoriaNombre from producto P INNER JOIN categoria C ON C.codigo=P.codigoCategoria';
            try {
                require '../conectar.php';
                $data = $conexion->query($sql);
                foreach ($data as $tupla) { 
                    ?>
                    <li>
                        <span><?=$tupla['codigo']?></span>
                        <span><?=$tupla['nombre']?></span>
                        <span><?=$tupla['precio']?></span>
                        <span><?=$tupla['tipo']=='B' ? 'Bien': 'Servicio' ?></span>
                        <span><?=$tupla['vigencia'] ? 'Activo': 'Inactivo' ?></span>
                        <span><?=$tupla['categoriaNombre']?></span>
                        <span><a href="editar.php?codigo=<?=$tupla['codigoCategoria']?>">Editar</a></span>
                        <span><button>Eliminar</button></span>
                    </li>
                <?php
                }
            } catch (PDOException $e) {
                
            }
        ?>
    </ul>

</div>