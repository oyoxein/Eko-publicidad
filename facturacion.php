<?php
include('header.html');
require 'conexionDB.php';
try{
    $db = new Database();
    $con = $db->conectar();
    $sql = $con->prepare("SELECT idFactura, idCliente, idProducto, precioUnidad, cantidad, total FROM factura");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_SESSION['idUsuario'])){
        $idUsuario = $_SESSION['idUsuario'];
        $query = $con->prepare("SELECT idRol FROM usuario WHERE idUsuario = :idUsuario");
        $query->bindParam(':idUsuario', $idUsuario);
        $rolUsuario = $query->fetchColumn();

    }
}catch(PDOException $err){
    echo "Error: " . $err->getMessage();
}
?>

    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURACIÓN</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    
    <form action = "facturacion.php" method= "post">
        <h1>Ingreso de Facturas</h1>
        <h3>ID Factura</h3>
        <input type="text" name="idFactura" placeholder="ID factura" size="20" maxlength="20"><br>
        <h3>ID Cliente:</h3>
        <input type="text" name="idCliente" placeholder="ID cliente" size="20" maxlength="20"><br>
        <h3>ID Producto:</h3>
        <input type="text" name="idProducto" placeholder="ID producto" size="20" maxlength="20"><br>
        <h3>Precio por Producto:</h3>
        <input type="number" name="precioUnidad" placeholder="Precio por unidad" size="20" maxlength="20"><br>
        <h3>Cantidad de Productos</h3>
        <input type="number" name="cantidad" placeholder="Unidades" size="20" maxlength="20"><br><br><br>
        <h3>Total</h3>
        <input type="number" name="total" placeholder="Total" size="20" maxlength="20"><br><br><br>
        <input type="reset" value="Borrar Datos">
        <input type="submit" value="Ingresar">

    </form>

    

</body>
</html>