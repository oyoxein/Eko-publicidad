<?php
  include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Modificar Factura
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <form action="modificarFacturacion.php" method="post">
      <h1>Modificar Facturas</h1>
      <h3>ID Factura que desea Modificar:</h3>
      <input type="text" name="Id factura"  placeholder="Id factura" size="20" maxlength="20"><br>
      <h3>Nuevo ID de Cliente:</h3>
      <input type="text" name="Id cliente" placeholder="Id cliente" size="20" maxlength="20"><br>
      <h3>Nuevo ID de Producto:</h3>
      <input type="text" name="Id producto" placeholder="Id producto" size="20" maxlength="20"><br>
      <h3>Nueva Cantidad de Unidades:</h3>
      <input type="text" name="cantidad de unidades" placeholder="cantidad de unidades" size="20" maxlength="20"><br>
      <h3>Nuevo Total:</h3>
      <input type="text" name="precio por unidad" placeholder="precio por unidad" size="20" maxlength="20"><br><br><br>

      <input type="reset" value="Borrar Datos">
      <input type="submit" value="Modificar">
      

    </form>

    
</body>
</html>

    
