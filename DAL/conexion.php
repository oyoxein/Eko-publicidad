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