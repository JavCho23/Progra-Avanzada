
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saludar</title>
</head>
<body>
<?php
    
   if (isset($_GET['n'])) {
    echo 'Hola ' .  $_GET['n'];
   }else {
       echo 'Debe indicar el nombre';
   }
?>
    <h2><a href="get.php">Go Back</a></h2>
</body>
</html>