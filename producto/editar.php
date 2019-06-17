<?php
    
  if (isset($_GET['codigo'])) {
        $codigo=$_GET['codigo'];
        $sql="SELECT * FROM producto WHERE producto.codigo='$codigo'";
        try {
            require '../conectar.php';
            $data = $conexion->query($sql);
            if ($data) {
                $producto = $data->fetchAll();
                $nombre = $producto[0]['nombre'];
                $precio = $producto[0]['precio'];
                $precioMinimo = $producto[0]['precioMinimo'];
                $negociable =  $producto[0]['negociable'] ? 1 : 0 ;
                $tipo = $producto[0]['tipo'];
                $vigencia =  $producto[0]['vigencia'] ? 1 : 0 ;
                $codigoCategoria = $producto[0]['codigoCategoria'];
                include('../header.php');
        ?>
                <a class="back" href="listar.php" title="Ir hacia atras">Volver</a>
                
                <form action="editar.php" method="post">
                <input type="hidden" name="codigo" value=<?= $codigo?> >
                <div class="option">
                    <div class="option__item">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="<?= $nombre?>">
                    </div>
                    <div class="option__item">
                        <label for="desc">Precio</label>
                        <input type="number" name="precio" step="0.01" value="<?= $precio?>">
                    </div>
                    <div class="option__item">
                        <label for="desc">Tipo</label>
                        <select name="tipo" id="">
                            <option value="B"  selected="<?= ('B'== $tipo) ? "true" : "false" ;?>" >Bien</option>
                            <option value="S" selected="<?= ('S'== $tipo) ? "true" : "false" ;?>">Servicio</option>
                        </select>
                    </div>
                    <div class="option__item">
                        <label for="desc">Negociable</label>
                        <input type="checkbox" name="negociable" <?= ($negociable == 1) ? "checked" : " " ;?>>
                    </div>
                    <div class="option__item">
                        <label for="desc">Vigencia</label>
                        <input type="checkbox" name="vigencia" <?= ($vigencia==1) ? "checked" : " " ;?>>
                    </div>
                    <div class="option__item">
                        <label for="desc">Precio Mínimo</label>
                        <input type="number" name="precioMinimo" step="0.01" value="<?= $precioMinimo?>">
                    </div>
                    <div class="option__item">
                        <label for="desc">Categoria</label>
                        <select name="categoria" id="" disabled >
                            <option value="-1">Seleccionar</option>
                            <?php
                            $sql= "Select * from categoria ";
                            try {
                                require '../conectar.php';
                                $datos = $conexion->query($sql);
                                foreach ($datos as $tupla) {
                                    ?>
                                    <option value="<?=$tupla['codigo']?>"
                                    selected="
                                    <?= ($tupla['codigo'] == $codigoCategoria) ? "true" : "false" ;?>"
                                    >
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
                <button type="submit">Actualizar</button>
                </form>
        <?php
            }
           
        } catch (PDOexception $e) {
            echo $e->getMessage();
        }
    }
    else {
        if (isset($_POST['name'],$_POST['precio'],$_POST['precioMinimo'])) {
            $codigo = $_POST['codigo'];
            $name = $_POST['name'];
            $precio = $_POST['precio'];
            $precioMinimo = $_POST['precioMinimo'];
            $tipo = $_POST['tipo'];
            $negociable = (isset($_POST['negociable'])) ? 1 : 0 ;
            $vigencia = (isset($_POST['vigencia'])) ? true : false ;
            $sql = "UPDATE  producto
                    set nombre = '$name', 
                    precio = '$precio', 
                    negociable = '$negociable', 
                    precioMinimo = '$precioMinimo',
                    vigencia = '$vigencia'  
                    where codigo='$codigo'
                    ";
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
    }

?>

