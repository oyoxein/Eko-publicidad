<?php
include('header.html');
require_once 'conexionDB.php';  // Asegúrate de incluir el archivo que contiene la clase Database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["consultar"])) {
        // Recuperar los datos del formulario
        $idFactura = $_POST["idFactura"];
        $idCliente = $_POST["idCliente"];
        $idProducto = $_POST["idProducto"];
        $precioUnidad = $_POST["precioUnidad"];
        $cantidad = $_POST["cantidad"];
        $total = $_POST["total"];

        // Crear una instancia de la clase Database
        $db = new Database();

        // Intentar la conexión a la base de datos
        $conexion = $db->conectar();

        try {
            // Construir la consulta SQL para consultar la factura
            $query = "SELECT * FROM factura WHERE idFactura=? OR idCliente=? OR idProducto=? OR precioUnidad=? OR cantidad=? OR total=?";

            // Preparar la sentencia
            $stmt = $conexion->prepare($query);

            // Vincular los parámetros
            $stmt->bindParam(1, $idFactura);
            $stmt->bindParam(2, $idCliente);
            $stmt->bindParam(3, $idProducto);
            $stmt->bindParam(4, $precioUnidad);
            $stmt->bindParam(5, $cantidad);
            $stmt->bindParam(6, $total);

            // Ejecutar la sentencia
            $stmt->execute();

            // Mostrar resultados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "ID Factura: " . $row['idFactura'] . "<br>";
                echo "ID Cliente: " . $row['idCliente'] . "<br>";
                echo "ID Producto: " . $row['idProducto'] . "<br>";
                echo "Precio de Unidad: " . $row['precioUnidad'] . "<br>";
                echo "Cantidad: " . $row['cantidad'] . "<br>";
                echo "Total" . $row['total'] . "<br>";

                echo "------------------------<br>";
            }
        } catch (PDOException $ex) {
            echo "Error al consultar cotizaciones: " . $ex->getMessage();
        } finally {
            // Cerrar la conexión
            $conexion = null;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consultar Cotización</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Consultar Factura</h1>
        <h3>ID Factura</h3>
        <input type="text" name="idFactura" placeholder="ID Factura" size="20" maxlength="20"><br>
        <h3>ID Cliente</h3>
        <input type="text" name="idCliente" placeholder="ID Cliente" size="20" maxlength="20"><br>
        <h3>ID Producto</h3>
        <input type="text" name="idProducto" placeholder="ID Placeholder" size="20" maxlength="20"><br>
        <h3>Precio Unidad</h3>
        <input type="number" name="precioUnidad" placeholder="Precio Unidad" size="20" maxlength="20"><br>
        <h3>Cantidad</h3>
        <input type="number" name="cantidad" placeholder="Cantidad" size="20" maxlength="20"><br>
        <h3>Total</h3>
        <input type="number" name="total" placeholder="Total" size="20" maxlength="20"><br>
        <input type="submit" name="consultar" value="Consultar">
        <input type="reset" value="Borrar Datos">
        
    </form>
</body>
</html>
