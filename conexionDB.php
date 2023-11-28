<?php

    $dbServer = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbNombre = "ekopublicidad";

    $conexion = "";

     
    $conexion = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbNombre);

    if($conexion){
        echo "conectado correctamente";
    }else{
        echo "no se conecto";
    }

?>
