<?php
    include("header.html");
    require 'conexionDB.php';
    session_start();
    $db = new Database();
    try{
        
        $con = $db ->conectar();
    }catch(PDOException $err1){
        echo "Error: " . $err1 ->getMessage();
    }
    

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
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <form action="index.php" method="post">
        <p>Username:</p>
        <p><input type="text" name ="username" placeholder="Nombre de Usuario"><br></p>
        <p>Correo:</p>
        <p><input type="text" name ="correo" placeholder="Correo"><br></p>
        <p>Contraseña:</p>
        <p><input type="password" name ="password" placeholder="Contraseña"><br></p>
        <p><input type="submit" name="login" value="login"></p>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] =="POST"){

            $_SESSION["username"]=$_POST["username"];
            $_SESSION["correo"]=$_POST["correo"];
            $_SESSION["password"]=$_POST["password"];

            $usuario=$_SESSION["username"];
            $correo=$_SESSION["correo"];
            $password=$_SESSION["password"];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            try{
                $query = $con->prepare("SELECT * FROM usuario WHERE nombre = :username AND correo = :correo");
                $query -> bindParam(':username', $usuario);
                $query -> bindParam(':correo', $correo);
                $query ->execute();

                if($row = $query->fetch(PDO::FETCH_ASSOC)){
                    if(password_verify($password, $row['contrasena'])){
                        $_SESSION["idUsuario"] = $row["idUsuario"];
                        $_SESSION["username"] =$row["nombre"];
                        $_SESSION["correo"] = $row["correo"];

                    
                        header("Location: producto.php");
                    }else{
                        echo "Contraseña incorrecta!";
                    }
                }else{
                    echo "Usuario no encontrado!";
                }
            }catch(PDOException $err1){
                echo "Error: " . $err1 ->getMessage();
            }finally{
                $con=null;
            }

            // echo $_SESSION["idUsuario"] . "<br>";
            // echo $_SESSION["username"] . "<br>";
            // echo $_SESSION["correo"] . "<br>";
            // echo $_SESSION["password"] . "<br>";

            
    }
?>