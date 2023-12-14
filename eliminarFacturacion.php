<?php
  include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Eliminar facturación
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <form action = "eliminarFacturacion.php" method="post">
        <h1>Eliminar Facturas</h1>
        <h3>ID Factura:</h3>
        <input type="text" name="idFactura"  placeholder="ID factura" size="20" maxlength="20"><br><br><br>
        
        <input type="submit" value="Eliminar">

    </form>

    
</body>
</html>

