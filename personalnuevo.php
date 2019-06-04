<?php
 $nombres = '';
 $apellidoPaterno = '';
 $apellidoMaterno = '';
 $DNI = '';
 $celular = '';
 $correo = '';
 $vigencia = '';
 $msje = '';
 $sql = '';

 if(isset($_POST['txtNombres'], $_POST['txtApellidoPaterno'], $_POST['txtApellidoMaterno'], $_POST['txtDNI'],$_POST['txtCelular'],$_POST['txtCorreo'] ){

    $nombres = $_POST['txtNombres'];
    $apellidoPaterno = $_POST['txtApellidoPaterno'];
    $apellidoMaterno = $_POST['txtApellidoMaterno'];
    $DNI = $_POST['txtDNI'];
    $celular = $_POST['txtCelular'];
    $correo = $_POST['txtCorreo'];

    $sql = 'INSERT INTO Personal(Nombres,ApellidoPaterno,
    ApellidoMaterno,DNI,Celular,Correo,Vigencia)' . 
    'VALUES(\''. $nombres . '\', \''. $apellidoPaterno . '\',\'' . 
    $apellidoMaterno . '\', \'' . $DNI . '\',\'' . $celular. '\',\''
    . $correo . '\',\'' . $vigencia . '\' )';

    try{
        include('conectar.php');
        $cantidad = $conexion->exec($sql);
        if($cantidad > 0){
            //$msje = 'Personal registrado exitosamente';
            header('location:personal.php');
        }else{
            $msje = 'No se puede registrar el personal';
        }
    }catch(Exception $e){
        $msje = 'No se puede realizar la operacion';
        $msje = $msje . $e->getMessage();
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
    <h1>Nuevo Personal</h1>
    <form action="personalnuevo.php"method="post">
    <div>Nombres <input type="text"name= "txtNombres" value="<?=$nombres?>"></div>
    <div>Apellido Paterno <input type="text"name= "txtApellidoPaterno" value="<?=$apellidoPaterno?>"></div>
    <div>Apellido Materno <input type="text"name= "txtApellidoMaterno" value="<?=$apellidoMaterno?>"></div>
    <div>DNI<input type="text"name= "txtDNI" value="<?=$DNI?>"></div>
    <div>Celular<input type="text"name= "txtCelular" value="<?=$celular?>"></div>
    <div>Correo<input type="text"name= "txtCorreo" value="<?=$correo?>"></div>
    <div>Vigencia<input type="text"name= "vigencia" value="<?=$vigencia?>"></div>
    <div><input type="submit"name="btnRegistrar"value="Registrar"></div>
    </form>
</body>
</html>