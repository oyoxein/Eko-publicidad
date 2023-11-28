<?php

function Conectar(){

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "ekopublicidad";
    
    $conexion = new mysqli($server, $user, $password, $db);

    if($conexion->connect_errno){
        die("Conexión Fallida" . $conexion->connect_errno);
    }
    else{
        echo "Conectado";
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    Conectar();

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los valores del formulario
    $idCotizacion = $_POST["idCotizacion"];
    $idProducto = $_POST["idProducto"];
    $fechaVencimiento = $_POST["fechaVencimiento"];

    // Consulta para actualizar la cotización en la base de datos
    $query = "UPDATE cotizacion SET idProducto='$idProducto', fechaVencimiento='$fechaVencimiento' WHERE idCotizacion='$idCotizacion'";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Cotización modificada correctamente.";
    } else {
        echo "Error al modificar la cotización: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
