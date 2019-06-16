<?php
    if (isset($_GET['codigo'])) {
        $codigo=$_GET['codigo'];
        $sql="SELECT * FROM producto WHERE producto.codigo='$codigo'";
        try {
            require '../conectar.php';
            $producto = $conexion->query($sql);
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $precioMinimo = $producto['precioMinimo'];
            $negociable = $producto['negociable'];
            $tipo = $producto['tipo'];
        } catch (PDOexception $e) {
            echo $e->getMessage();
        }
    }

?>

<a class="back" href="listar.php" title="Ir hacia atras">Volver</a>
<form action="agregar.php" method="post">
<div class="option">
    <div class="option__item">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name">
    </div>
    <div class="option__item">
        <label for="desc">Precio</label>
        <input type="number" name="precio" step="0.01">
    </div>
    <div class="option__item">
        <label for="desc">Tipo</label>
        <select name="tipo" id="">
            <option value="B">Bien</option>
            <option value="S">Servicio</option>
        </select>
    </div>
    <div class="option__item">
        <label for="desc">Negociable</label>
        <input type="checkbox" name="negociable">
    </div>
    <div class="option__item">
        <label for="desc">Precio Mínimo</label>
        <input type="number" name="precioMinimo" step="0.01">
    </div>
    <div class="option__item">
        <label for="desc">Categoria</label>
        <select name="categoria" id="">
            <option value="-1">Seleccionar</option>
            <?php
            $sql= "Select * from categoria ";
            try {
                require '../conectar.php';
                $datos = $conexion->query($sql);
                foreach ($datos as $tupla) {
                    ?>
                    <option value="<?=$tupla['codigo']?>">
                    <?=$tupla['nombre']?></option>
                    <?php
                }
            } catch (PDOexeption $e) {
                echo $e->getMessage();
            }
            ?>
        </select>
    </div>

</div>