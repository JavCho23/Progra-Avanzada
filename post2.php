<?php
    $msg = '';
    if (isset($_POST['txtNombre']) && isset($_POST['cboEstado']) ) {
        $nombre = $_POST['txtNombre'];
        $estado = $_POST['cboEstado'];
        if (strlen($_POST['txtNombre']) > 1  && ($estado == 'C' || $estado == 'S' || $estado == 'V' || $estado == 'D')) {
           $msg = 'Datos cargados Correctamente';
          header('location:index.php');
       } 
    } 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post 2</title>
</head>
<body>
<h1>Post 2</h1>
<?php
    if ($msg != '') {
        echo  '<div>' . $msg . '</div>';
    }
   
?>
<form action="post2.php" method="post">
        <label for="">Nombre</label> <input type="text" name="txtNombre" id="" placeholder='Nombre' value='<?= $nombre?>' >
        <div>
            <label for="">Seleccione Estado</label>
            <select name="cboEstado" id="">
                <option value="S"  <?= ($estado == 'S'?'selected': '') ?>  >Soltero</option>
                <option value="C" <?= ($estado == 'C'?'selected': '') ?>>Casado</option>
                <option value="V" <?= ($estado == 'V'?'selected': '') ?>>Viudo</option>
                <option value="D" <?= ($estado == 'D'?'selected': '') ?>>Divorciado</option>
            </select>
        </div>
        <div><input type="submit" name='btnRegistrar' value="Procesar"></div>
    </form>
    <div><a href="index.php"> Index </a></div>
</body>
</html>