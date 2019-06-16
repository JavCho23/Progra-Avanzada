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
                    <li>
                        <span><?=$tupla['codigo']?></span>
                        <span><?=$tupla['nombre']?></span>
                        <span><?=$tupla['descripcion']?></span>
                        <span><?=$tupla['vigencia'] ? 'Activo': 'Inactivo' ?></span>
                        <span><a href="">Editar</a></span>
                        <span><button>Eliminar</button></span>
                    </li>
                <?php
                }
            } catch (PDOException $e) {
                
            }
        ?>
    </ul>

</div>