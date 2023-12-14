<?php
include('header.html');
require_once 'conexionDB.php';  // Asegúrate de incluir el archivo que contiene la clase Database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["eliminar"])) {
        // Recuperar los datos del formulario
        $idCotizacion = $_POST["idCotizacion"];
        $nombreProducto = $_POST["nombreProducto"];  // Ajusta el nombre del campo si es diferente

        // Crear una instancia de la clase Database
        $db = new Database();

        // Intentar la conexión a la base de datos
        $conexion = $db->conectar();

        try {
            // Preparar la consulta SQL para eliminar la cotización
            $query = "DELETE FROM cotizacion WHERE idCotizacion=? AND nombreProducto=?";

            // Preparar la sentencia
            $stmt = $conexion->prepare($query);

            // Vincular los parámetros
            $stmt->bindParam(1, $idCotizacion);
            $stmt->bindParam(2, $nombreProducto);

            // Ejecutar la sentencia
            $stmt->execute();

            echo "Cotización eliminada correctamente.";
        } catch (PDOException $ex) {
            echo "Error al eliminar la cotización: " . $ex->getMessage();
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
    <title>Eliminar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Eliminar Cotizaciones</h1>
        <h3>ID cotización</h3>
        <input type="text" name="idCotizacion" placeholder="Id cotización" size="20" maxlength="20"><br>
        <h3>Producto</h3>
        <input type="text" name="nombreProducto" placeholder="ingrese el producto" size="20" maxlength="20"><br><br><br>
        
        <input type="submit" name="eliminar" value="Eliminar">
        <input type="reset" value="Regresar">
        
    </form>

</body>
</html>