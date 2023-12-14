<?php
  include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Eliminar Producto
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <form action = "eliminarProducto.php" method="post">
        <h1>Eliminar Productos</h1>
        <h3>ID Producto:</h3>
        <input type="text" name="Id producto"  placeholder="Id producto" size="20" maxlength="20"><br>
        <input type="submit" value="Eliminar">

    </form>
    
</body>
</html>


    
