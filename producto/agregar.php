<?php
include '../header.php';

if (isset($_POST['name'],$_POST['precio'],$_POST['precioMinimo'])) {
        $name = $_POST['name'];
        $precio = $_POST['precio'];
        $precioMinimo = $_POST['precioMinimo'];
        $tipo = $_POST['tipo'];
        $negociable = (isset($_POST['negociable'])) ? true : false ;
        $categoria = $_POST['categoria'];
        $sql = "INSERT INTO producto(nombre,precio,precioMinimo,tipo,negociable,vigencia,codigoCategoria)
        values('$name','$precio','$precioMinimo','$tipo','$negociable',1,'$categoria')";
        try {
            require '../conectar.php';
            $aux = $conexion->exec($sql);
            if ($aux > 0) {
                 header('location:listar.php');
            }
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
        <input type="number" name="precioMinimo">
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

<button type="submit">Registrar</button>
</form>