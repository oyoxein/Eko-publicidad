<?php

function Conectar(){

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "ekopublicidad";
    
    $conexion = new mysql($server,$user,$password,$db);

    if($conexion->connect_errno){
        die("Conexión Fallida" . $conexion->connect_errno);
    }
    else{
        echo "Conectado";
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INGRESAR</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <img class="header_logo" src="img/Publicidad imagen.jpg" alt="logotipo">
    </header>
    <h1>INGRESAR</h1> 
    <nav class="navegación">
        <a class="navegación_enlace" href="cliente.php">Cliente</a>
        <a class="navegación_enlace" href="facturación.php">Facturación</a>
        <a class="navegación_enlace" href="producto.php">Producto</a>
    </nav>
    <form action="procesar_cotizacion.php" method="POST">
    <!-- Aquí van tus elementos de entrada -->
    <p>ID cotización</p>
    <p><input type="text" name="idCotizacion" value="" size="20" maxlength="20"></p>
    <!-- Otros campos... -->

    <p>Producto</p>
    <select name="idProducto">
        <!-- Opciones de productos desde la base de datos -->
        <?php
        // Conexión a la base de datos (debes incluir este código)
        Conectar();

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta para obtener los productos
        $query = "SELECT idProducto, nombre FROM producto";
        $result = $conexion->query($query);

        // Mostrar opciones
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['idProducto'] . "'>" . $row['nombre'] . "</option>";
        }

        // Cerrar conexión
        $conexion->close();
        ?>
    </select>

    <!-- Otros campos... -->

    <p>Fecha de vencimiento</p>
    <p><input type="date" name="fechaVencimiento" value="" size="20" maxlength="20"></p>

    <p>
        <input type="submit" value="Ingresar">
    </p>
</form>
    <p>Ingrese una cotización</p>
    <p>ID cotización</p>
    <p><input type="text" name="Id cotización"  value="Id cotización" size="20" maxlength="20"></p>
    <p>Producto</p>
    <p><input type="text" name="ingrese el producto" value="ingrese el producto" size="20" maxlength="20"></p>
    <p>Estado de la cotización</p>
    <p><input type="text" name="ingrese la cotización" value="ingrese la cotización" size="20" maxlength="20"></p>
    <p>Fecha de vencimiento</p>
    <p><input type="date" name="ingrese la fecha" value="ingrese la fecha" size="20" maxlength="20"></p>
    <p>
        <input type="submit" value="Ingresar">
    </p>
    <p>
        <input type="reset" value="Regresar">
    </p>
    <p>
        <input type="reset" value="Actualizar">
    </p>
    <p>
        <input type="submit" value="Eliminar">
    </p>    

</body>
</html>

    