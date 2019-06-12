<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Gestion de Personal</title>
</head>
<body>
    <h1>Gestion de Usuarios</h1>
    <div><a href="usuarionuevo.php">Nuevo</a></div>
 
    <ul class="list">
        <li class="list__item"> 
                <span>Nº</span> 
                <span>Nombres</span> 
                <span>Usuario</span> 
                <span>Opciones</span>
        </li>
    <?php
			 $sql = 'SELECT P.Codigo, P.Nombres, P.ApellidoPaterno,
					 P.ApellidoMaterno, U.nombre_usuario
					 FROM personal P Join usuario U on P.codigo = u.codigoPersonal
                     ORDER BY P.apellidoPaterno, P.apellidoMaterno';  
					 try{
					   require 'conectar.php';
					   $datos = $conexion->query($sql);
					   $i=1;
					   foreach($datos as $fila){
                          
                       ?>
                       
                           <li class="list__item"> <span><?=$fila['Codigo'] ?></span> <span><?=$fila['Nombres'] ?></span> <span> <?= $fila['nombre_usuario'] ?></span> <span> <a href="personaleditar.php">Editar</a></span> </li>
                       
                        <?php
						   $i++;

                       }  
					 }catch(PDOException $e){
						 echo'<tr><td colspan="3">'. $e->getMessage().'</td></tr>';

					 }
			
			
			?>
            </ul>
    <div>
        <ul>
       
        </ul>
    </div>
</body>
</html>