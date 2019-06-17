<?php

include '../header.php';
?>
<div class="enlaces">
    <a class="back" href="../index.php" title="Ir hacia atras">Volver</a>
    <a class='back' href="agregar.php" class="agregar">Agregar Nueva</a>
</div>

<div class="content">
    
    <ul class="list">
        <li class="list__item">
        <span>Codigo</span>
        <span>Nombre</span>
        <span>Descripcion</span>
        <span>Vigencia</span>
        <span>Operaciones</span>
        </li>
        <?php
            $sql= 'Select * from categoria';
            try {
                require '../conectar.php';
                $data = $conexion->query($sql);
                foreach ($data as $tupla) { ?>
                    <li class='list__item'>
                        <span><?=$tupla['codigo']?></span>
                        <span><?=$tupla['nombre']?></span>
                        <span><?=$tupla['descripcion']?></span>
                        <span><?=$tupla['vigencia'] ? 'Activo': 'Inactivo' ?></span>
                        <span><a class='back' href="">Editar</a> <a class='back'>Eliminar</a></span>
                        
                    </li>
                <?php
                }
            } catch (PDOException $e) {
                
            }
        ?>
    </ul>

</div>