<?php
include('header.html');
require_once 'conexionDB.php';  // Asegúrate de incluir el archivo que contiene la clase Database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["consultar"])) {
        // Recuperar los datos del formulario
        $idCotizacion = $_POST["idCotizacion"];
        $idProducto = $_POST["idProducto"];
        $fechaVencimiento = $_POST["fechaVencimiento"];

        // Crear una instancia de la clase Database
        $db = new Database();

        // Intentar la conexión a la base de datos
        $conexion = $db->conectar();

        try {
            // Construir la consulta SQL para consultar cotizaciones
            $query = "SELECT * FROM cotizacion WHERE idCotizacion=? OR idProducto=? OR fechaVencimiento=?";

            // Preparar la sentencia
            $stmt = $conexion->prepare($query);

            // Vincular los parámetros
            $stmt->bindParam(1, $idCotizacion);
            $stmt->bindParam(2, $idProducto);
            $stmt->bindParam(3, $fechaVencimiento);

            // Ejecutar la sentencia
            $stmt->execute();

            // Mostrar resultados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "ID Cotización: " . $row['idCotizacion'] . "<br>";
                echo "ID Producto: " . $row['idProducto'] . "<br>";
                echo "Fecha de vencimiento: " . $row['fechaVencimiento'] . "<br>";
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
        <h1>Consultar Cotizaciones</h1>
        <h3>ID cotización</h3>
        <input type="text" name="idCotizacion" placeholder="ID Cotización" size="20" maxlength="20"><br>
        <h3>ID Producto</h3>
        <input type="text" name="idProducto" placeholder="ID Producto" size="20" maxlength="20"><br>
        <h3>Fecha de vencimiento</h3>
        <input type="date" name="fechaVencimiento"><br><br><br>
        
        <input type="submit" name="consultar" value="Consultar">
        <input type="reset" value="Borrar Datos">
        
    </form>
</body>
</html>
