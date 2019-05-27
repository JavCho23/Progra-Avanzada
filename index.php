<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola php</h1>
    <nav>
        <ul>
        <li><a href="ejercicio.php">Ejemplo Basico</a></li>
        <li><a href="get.php">Get </a></li>
        <li><a href="post.php">Post </a></li>
        <li><a href="post2.php">Post 2</a></li>
        </ul>
    </nav>
    <?php
        $vez = 10;
        echo 'Este es mi ejemplo ', $vez , ' en php';
        echo '<div>Este es mi ejemplo ', $vez , ' en php </div>';
    ?>
</body>
</html>