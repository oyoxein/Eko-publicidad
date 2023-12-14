<?php
include('header.html');
require_once 'conexionDB.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $idCotizacion = $_POST["idCotizacion"];
    $idProducto = $_POST["idProducto"];
    $fechaVencimiento = $_POST["fechaVencimiento"];

   
    $db = new Database();

   
    $conexion = $db->conectar();

    try {
        
        $query = "UPDATE cotizacion SET idProducto=?, fechaVencimiento=? WHERE idCotizacion=?";

        $stmt = $conexion->prepare($query);

        $stmt->bindParam(1, $idProducto);
        $stmt->bindParam(2, $fechaVencimiento);
        $stmt->bindParam(3, $idCotizacion);

        $stmt->execute();

        echo "Cotización modificada correctamente.";
    } catch (PDOException $ex) {
        echo "Error al modificar la cotización: " . $ex->getMessage();
    } finally {
        
        $conexion = null;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    MODIFICAR
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Modificar Cotizaciones</h1>
        <h3>ID cotización</h3>
        <input type="text" name="idCotizacion" placeholder="Id cotizacion" size="20" maxlength="20"><br>
        <h3>ID Producto</h3>
        <input type="text" name="idProducto" placeholder="Id producto" size="20" maxlength="20"><br>
        <h3>Fecha de vencimiento</h3>
        <input type="date" name="fechaVencimiento" placeholder="fecha de vencimiento"><br><br><br>
        
        <input type="reset" value="Borrar datos"><br>
           
        
        <input type="submit" name="eliminar" value="Eliminar"><br>
        
    </form>

</body>
</html>

