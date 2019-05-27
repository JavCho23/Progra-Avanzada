<?php
    
    if (isset($_POST['txtNombre'])) {
        echo 'Hola ';
        if ($_POST['cboSexo']== 'F') {
            echo 'Sra: ' . $_POST['txtNombre'];
        } else {
            echo 'Sr: ' . $_POST['txtNombre'];
        }
        
    } else {
        echo 'Datos incompletos ';
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
    
</body>
</html>