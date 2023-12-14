<?php
  require 'conexionDB.php';
  $db = new Database();

  try{
    $con = $db->conectar();
    
  }catch(PDOException $err){
    echo "Error: " . $err->getMessage();
  }
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header">
    <img src="img/Publicidad imagen.jpg" alt="publicidad">
  </header>

<form action = "registro.php" method = "post">
    <p>Nombre</p>
    <p><input type="text" name="nombre" size="20" maxlength="20"></p>
    <p>Correo</p>
    <p><input type="email" name="correo" size="30" maxlength="30"></p>
    <p>Contraseña</p>
    <p><input type="password" name="password" size="20" maxlength="20"></p>
    <p>
        <label><input type="submit" value="Registrar"></label>
    </p>
</form>
</html>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $usuario = $_POST["nombre"];
      $correo = $_POST["correo"];
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);//tipo de encriptacion de contrasena
      $rol = 2;

      try{
        $query = $con ->prepare("INSERT INTO usuario (idRol, nombre, correo, contrasena) VALUES (:idRol, :nombre, :correo, :contrasena)");
        $query ->bindParam(':idRol', $rol);
        $query ->bindParam(':nombre', $usuario);
        $query ->bindParam(':correo', $correo);
        $query ->bindParam(':contrasena', $password);
        $query->execute();

        echo "Registro exitoso";
      }catch(PDOException $err){
        echo "Error: " . $err ->getMessage();
      }

      echo $usuario;
      echo $correo;
      echo $password;


    }
    
?>
