<?php
  include('header.html');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Eliminar cliente
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <form action = "eliminarCliente.php" method="post">
      <h1>Eliminar Cliente</h1>

      <h3>ID del Cliente a Eliminar:</h3>
      <input type = "text" name ="idCliente" placeholder="ID del Cliente"><br><br>

      <input type="submit"  name="eliminar_cliente" value="Eliminar Cliente">
    </form>


</body>
</html>

    
