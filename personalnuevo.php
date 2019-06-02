<?php
    $nombres = '';
    $apellidoPaterno ='';
    $apellidoMaterno = '';
    $DNI = '';
    $celular ='';
    $correo = '';
    $mensaje='';
    $sql='';

if(isset($_POST['txtNombres']) == true &&
    isset($_POST['txtApellidoPat']) == true &&
    isset($_POST['txtApellidoMat']) == true &&
    isset($_POST['txtDni']) == true &&
    isset($_POST['txtCelular']) == true &&
    isset($_POST['txtCorreo']) == true){

    $nombres = $_POST['txtNombres'];
    $apellidoPaterno = $_POST['txtApellidoPat'];
    $apellidoMaterno = $_POST['txtApellidoMat'];
    $DNI = $_POST['txtDni'];
    $celular = $_POST['txtCelular'];
    $correo = $_POST['txtCorreo'];

    $sql = 'INSERT INTO personal(nombres, apellidosPaternos, apellidosMaternos, DNI, Celular, Correo, Vigencia)' . 
        'VALUES(\'' . $nombres . '\' , \'' . $apellidoPaterno . '\', \'' . $apellidoMaterno . '\' , \'' . $DNI . '\' , \'' . $celular . '\',
    \'' . $correo . '\',1)';

    try{
        include('conectar.php');
        $cantidad = $conexion -> exec($sql);
        if($cantidad > 0){
            $mensaje = 'Personal registrado exitosamente';
            // header('location:personal.php');
        }else{
            $mensaje ='NO SE REGISTRO';
        }
    }catch( Exception $e){  
        $mensaje = 'No se pudo realizar la operacion';
        $mensaje = $mensaje . $e->getMessage();
    }

}
    

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>NUEVO</h1>
    <?php
    if($mensaje != ''{
        echo '<div>' . $mensaje . '</div>';
    }
    ?>
    <form action="personalnuevo.php" method="post"> 
        <div> <label>Nombres: </label>  
            <input type="text" name="txtNombres" value="<?=$nombres?>">
        </div>
        <div> <label>Apellido Paterno: </label>
            <input type="text" name="txtApellidoPat" value="<?=$apellidoPaterno?>">
        </div>
        <div> <label>Apellido Materno: </label> 
            <input type="text" name="txtApellidoMat" value="<?=$apellidoPaterno?>">
        </div>
        <div> <label>DNI: </label> 
            <input type="number" name="txDni" value="<?=$DNI?>">
        </div>
        <div> <label>Celular: </label> 
            <input type="number" name="txtCelular" value="<?=$celular?>">
        </div>
        <div> <label>Correo: </label> 
            <input type="text" name="txtCorreo" value="<?=$correo?>">
        </div><br>

        <div><input type="submit" name="btnRegistrar" value="REGISTRAR"></div><br>
        <div><a href="personal.php">REGRESAR</a></div>
    </form>
</body>
</html>