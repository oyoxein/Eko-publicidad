<?php
include('header.html');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTE</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <form class= "formulario" action = "cliente.php" method="post">
        <h1>Ingresar Cliente</h1>
        <h3>Nombre del Cliente</h3>
        <input type="text" name="nombre" placeholder="Nombre" size="20" maxlength="20"><br>
        <h3>Correo</h3>
        <input type="text" name="correo" placeholder="Correo" size="20" maxlength="20"><br>
        <h3>Teléfono</h3>
        <input type="text" name="telefono" placeholder="Teléfono" size="20" maxlength="20"><br>
        <h3>Contraseña</h3>
        <input type="password" name="password" placeholder ="Contraseña"><br><br><br>
        <input type="submit"  name="ingresar_cliente" value="Ingresar">
    </form>


</body>
</html>
