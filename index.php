<?php
    include("header.html");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="index.php" method="post">
        <p>Username:</p>
        <p><input type="text" name ="username"><br></p>
        <p>Correo:</p>
        <p><input type="text" name ="correo"><br></p>
        <p>Contraseña:</p>
        <p><input type="password" name ="password"><br></p>
        <p><input type="submit" name="login" value="login"></p>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] =="POST"){

        if(!empty($_POST["username"])&& !empty($_POST["correo"])&&!empty($_POST["password"])){
            $_SESSION["username"]=$_POST["username"];
            $_SESSION["correo"]=$_POST["correo"];
            $_SESSION["password"]=$_POST["password"];

            $usuario=$_SESSION["username"];
            $correo=$_SESSION["correo"];
            $password=$_SESSION["password"];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            header("Location: producto.php");

            // echo $_SESSION["username"] . "<br>";
            // echo $_SESSION["correo"] . "<br>";
            // echo $_SESSION["password"] . "<br>";
            
        }else{
            echo "Falta el nombre/ correo o contraseña <br>";
        }
    }
?>