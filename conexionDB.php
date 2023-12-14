<?php

    class Database{

        private $hostname = "localhost";
        private $dbUser = "root";
        private $dbPassword = "";
        private $dbNombre = "EkoPublicidad";
        private $charset = "utf8";


        function conectar(){

            try{
                $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->dbNombre
                . ";charset=" . $this->charset;
                //conf para preparaciones para que las consultas no sean emuladas y sean mas seguras
                
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES=>false

                ];
                
                $pdo = new PDO($conexion, $this ->dbUser, $this->dbPassword, $options);
                return $pdo;
            }catch(PDOException $err){
                echo "Error en conexion: " . $err->getMessage();
                exit;

            }
        }
        
    }
    
    
    // try {
    //     $conexion = new PDO("mysql:host=$dbServer;dbname=$dbNombre", $dbUser, $dbPassword);
    //     echo "La conexión con $dbServer ha sido exitosa";
    // } catch (PDOException $pe) {
    //     die("No se ha podido conectar: " . $pe->getMessage());
    // }
   
    
?>