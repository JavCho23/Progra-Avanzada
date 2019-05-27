<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POST</title>
</head>
<body>
    <h1>Post</h1>
    <form action="procesar.php" method="post">
        <label for="">Nombre</label> <input type="text" name="txtNombre" id="" placeholder='Nombre' >
        <div>
            <label for="">Seleccione Sexo</label>
            <select name="cboSexo" id="">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div><input type="submit" value="Procesar"></div>
    </form>
    <div><a href="index.php"> Index </a></div>
</body>
</html>