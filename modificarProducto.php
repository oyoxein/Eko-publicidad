<?php
  include('header.html');
  require 'conexionDB.php';

  try{
    $db = new Database();
    $con = $db ->conectar();

  }catch(PDOException $err){
    echo "Error: " . $err->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Modificar
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <form action = "modificarProducto.php" method= "post">
        <h1>Modificar Productos</h1>
        <h3>ID Producto por Modificar:</h3>
        <input type="text" name="idProducto"  placeholder="Id producto" size="20" maxlength="20"><br>
        <h3>Nuevo Nombre de Producto:</h3>
        <input type="text" name="nombre" placeholder="nombre de producto" size="20" maxlength="20"><br>
        <h3>Nueva Descripción del Producto:</h3>
        <input type="text" name="descripcion" placeholder="descripción" size="20" maxlength="20"><br>
        <h3>Nuevo Precio:</h3>
        <input type="text" name="precio" placeholder="precio por unidad" size="20" maxlength="20"><br>
        <h3>Nueva Imagen:</h3>
        <input type = "text" name="imagen" placeholder = "Imagen del Producto"><br><br><br>
        
        <input type="reset" value="Borrar Datos">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>

<?php

  if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(!empty($_POST["idProducto"]) && !empty($_POST["nombre"])&& !empty($_POST["descripcion"])&& !empty($_POST["precio"])&& !empty($_POST["imagen"])){

      $idProducto = $_POST["idProducto"];
      $nombre = $_POST["nombre"];
      $descripcion = $_POST["descripcion"];
      $precio = $_POST["precio"];
      $imagen = $_POST["imagen"];

      $query = $con ->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion , precio = :precio, imagen = :imagen WHERE idProducto = :idProducto");

      $query->bindParam(':idProducto', $idProducto);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':descripcion', $descripcion);
      $query->bindParam(':precio', $precio);
      $query->bindParam(':imagen', $imagen);

      $query ->execute();

    }else{
      echo "No se llenaron todos los campos de texto!";
    }
  }

?>
    
