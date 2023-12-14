<?php
    session_start();
    include("header.html");
    require 'conexionDB.php';
    try{
        $db = new Database();
        $con = $db->conectar();
        $sql = $con->prepare("SELECT idProducto, nombre, descripcion, precio, imagen FROM producto");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_SESSION['idUsuario'])){
            $idUsuario = $_SESSION['idUsuario'];
            $query = $con->prepare("SELECT idRol FROM usuario WHERE idUsuario = :idUsuario");
            $query ->bindParam(':idUsuario', $idUsuario);
            $query->execute();
            $rolUsuario = $query->fetchColumn();
        }
    }catch(PDOException $err){
        echo "Error: " . $err->getMessage();
    }
    
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">


</head>
<body>
    
    <main class="visualizar_productos">
        <div class="container">
            <div class="row row-cols-2 g-3">

                <?php foreach($resultado as $row){?>
                    <div class="col">
                        <div class="card">
                            <?php
                                $id = $row["idProducto"];
                                $imagen = $row["imagen"];
                    
                            ?>
                            <img src="<?php echo $imagen?>" class="imagen_producto">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row["nombre"]?></h4>
                                <h4 class = "card-text">$ <?php echo $row["precio"]?></h4>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="btnCotizar" type ="submit" name = "Cotizar" value="Cotizar">
                                    <?php
                                        if(isset($rolUsuario) && $rolUsuario==1){
                                            echo '<form method = "post">';
                                            echo '<input type="hidden"  type = "submit" name= "idProductoEliminar" value="'.$id.'">';
                                            echo '<input class="btnEliminar" type = "submit" name= "Eliminar" value="Eliminar">';
                                            echo '</form>';
                                        
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>
        </div>
    </main>

</body>
</html>
    
<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(isset($_POST["Eliminar"]) && isset($_POST["idProductoEliminar"])){
            $idProductoEliminar = $_POST["idProductoEliminar"];
            $queryEliminar = $con->prepare("DELETE  FROM producto WHERE idProducto = :idProducto");
            $queryEliminar ->bindParam(':idProducto', $idProductoEliminar);
            $queryEliminar ->execute();
        }
    }
?>