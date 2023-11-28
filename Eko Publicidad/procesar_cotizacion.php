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

    // Consulta para insertar la cotización en la base de datos
    $query = "INSERT INTO cotizacion (idCotizacion, idProducto, estado, fechaVencimiento) VALUES ('$idCotizacion', '$idProducto', 1, '$fechaVencimiento')";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Cotización ingresada correctamente.";
    } else {
        echo "Error al ingresar la cotización: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
