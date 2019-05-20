<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <h1>Tabla de Multiplicar</h1>
    <?php
    echo '<table>';
    echo '<tr>';
    echo '<td>*</td>';
    for ($i=1; $i < 13; $i++) { 
        echo '<td>'. $i . '</td>';
    }
    echo '</tr>';
    for ($j=1; $j < 13; $j++) { 
        echo '<tr><td>' .$j. '</td>' ;
        for ($z=1; $z < 13; $z++) { 
            echo '<td>' .$j*$z. '</td>' ;
        }
        echo '</tr>'; 
    }
  
    echo '<table>';
    ?>
    <style>
    
    </style>
</body>
</html>