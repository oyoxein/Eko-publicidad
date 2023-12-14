<?php
    include('header.html');
    require 'conexionDB.php';
    require 'DAL/conexion.php';

    try{
        $db = new Database();
        $con = $db->conectar();

        

    }catch(PDOException $err){
        echo "Error: " . $err->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Producto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
    
</head>
<body>

    <form id ="agregarProducto" action = "ingresarProducto.php" method="post" enctype="multipart/form-data">
        <h1>Ingresar un Producto</h1>
        <h3>Nombre:</h3>
        <input type="text" name="nombre" placeholder="Nombre de Producto" size="20" maxlength="20"><br>
        <h3>Descripción:</h3>
        <input type="text" name="descripcion" placeholder="Descripción del Producto" size="20" maxlength="20"><br>
        <h3>Precio:</h3>
        <input type="text" name="precio" placeholder="Precio por Unidad" size="20" maxlength="20"><br>
        <h3>Imagen</h3>
        <!-- <input type = "file" id = "imagen" name="imagen" value="imagen" accept="image/*"><br> -->
        <input type = "text" name="imagen" placeholder = "Imagen del Producto"><br><br><br>

        <input type="reset" value="Borrar Datos"><br><br>
       
        <input class="btnAgregar" type="submit" value="Agregar">

    </form>

</body>
</html>
 

 <script>
    document.getElementById('agregarProducto').addEventListener('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ingresarProducto.php', true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status ==200){
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);

    });
   
    
</script>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"])&& !empty($_POST["precio"])&& !empty($_POST["imagen"])){

            $nombre = trim($_POST["nombre"]);
            $detalle = trim($_POST["descripcion"]);
            $precio = trim($_POST["precio"]);
            $imagen = trim($_POST["imagen"]);

            $query = $con ->prepare("INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)");
            $query ->bindParam(':nombre', $nombre);
            $query ->bindParam(':descripcion', $detalle);
            $query ->bindParam(':precio', $precio);
            $query ->bindParam(':imagen', $imagen);

            $query->execute();
           
           
        }
    }



    //intento de subir imagen en formato archivo con AJAX
      if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"]==0){
                $imgDir = "C:\xampp\htdocs\Ambiente Web Servidor\ekoPublicidad\Eko-publicidad\img";
                $imgFile = $imgDir . basename(($_FILES["imagen"]["name"]));
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

                if($uploadOk){
                    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $imgFile)){
                        echo " La imagen " .htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subida.";
                        $rutaImg = $imgFile;

                        $query = $con ->prepare("INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)");
                        $query ->bindParam(':nombre', $nombre);
                        $query ->bindParam(':descripcion', $detalle);
                        $query ->bindParam(':precio', $precio);
                        $query ->bindParam(':imagen', $rutaImg);

                        if($query->execute()){
                            echo "Datos insertados correctamente!";
                        }else{
                            echo "Error al insertar los datos!";
                        }

                     }else{
                         echo "hubo un error al subir la imagen!";
                     }
                 }
             }else{
                 echo "no se ha selecionado ninguna imagen.";
             }

?>
