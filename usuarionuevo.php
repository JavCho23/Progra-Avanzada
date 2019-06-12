<?php
 $nombres = '';
 $clave = '';
 $usuaio = '';
 $codigo = '';
 $msje = '';
 $sql = '';

 if(!empty($_POST)){

        $usuaio = $_POST['txtNombres'];
        $clave = $_POST['txtclave'];
        $codigo = $_POST['cbocodigo'];
        $sql = 'INSERT INTO usuario(nombre_usuario,clave,
        codigoPersonal,vigencia)' . 
        'VALUES(\''. $usuaio . '\', \''. $clave . '\',\'' . 
        $codigo. '\', \'' . 1 . '\' )';

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
    <?php
        if( $msje != ''){
            echo '<div>' . $msje . '</div>';
        }
    ?>
    <h1>Nuevo Personal</h1>
    <form action="usuarionuevo.php"method="post">
    <div>Nombre Usuario <input type="text"name= "txtNombres" value="<?=$usuaio?>"></div>
    <div>Clave<input type="password"name= "txtclave" value="<?=$clave?>"></div>
    <div>Empleado <select name="cbocodigo" id="">
    <?php
			 $sql = 'SELECT P.Codigo, P.Nombres
					 FROM personal P ORDER BY P.apellidoPaterno, P.apellidoMaterno';  
					 try{
					   require 'conectar.php';
					   $datos = $conexion->query($sql);
					   $i=1;
					   foreach($datos as $fila){
                          
                       ?>
                       
                         <option value="<?= $fila['Codigo']?>"><?= $fila['Nombres'] ?></option>
                       
                        <?php
						   $i++;

                       }  
					 }catch(PDOException $e){
						$msje = 'No se puede realizar la operacion';
                        $msje = $msje . $e->getMessage();

					 }
			
			
			?>
    </select> </div>
    <div><input type="submit"name="btnRegistrar"value="Registrar"></div>
    </form>
</body>
</html>