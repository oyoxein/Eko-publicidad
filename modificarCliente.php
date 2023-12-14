<?php
  include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    MODIFICAR ClIENTE
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css" title="Color">
</head>
<body>
    <form class = formulario action ="modificarCliente.php" method="post">
        <h1>Modificar Cliente</h1>
        <h3>ID del Cliente que desea Modificar:</h3>
        <input type = "text" name ="idCliente" placeholder="ID del Cliente"><br><br><br>
        <h2>Nuevo Nombre del Cliente:</h2>
        <input type="text" name="nombre" placeholder="Nuevo Nombre del Cliente" size="20" maxlength="20"><br>
        <h2>Nuevo Correo:</h2>
        <input type="text" name="correo" placeholder="Nuevo Correo" size="20" maxlength="20"><br>
        <h2>Nuevo Telefono:</h2>
        <input type="text" name="telefono" placeholder="Teléfono" size="20" maxlength="20"><br>
        <h2>Nueva Contraseña:</h2>
        <input type="password" name="password" placeholder ="Contraseña"><br><br><br>
        <input type="submit"  name="ingresar_cliente" value="Modificar">
      </form>

</body>
</html>

    
