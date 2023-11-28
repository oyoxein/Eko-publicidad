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

    // Obtener el ID de la cotización a eliminar
    $idCotizacion = $_POST["idCotizacion"];

    // Consulta para eliminar la cotización de la base de datos
    $query = "DELETE FROM cotizacion WHERE idCotizacion = '$idCotizacion'";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Cotización eliminada correctamente.";
    } else {
        echo "Error al eliminar la cotización: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
