<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Producto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>PRODUCTO</h1>
    <nav class="navegación">
        <a class="navegación_enlace" href="cliente.php">Cliente</a>
        <a class="navegación_enlace" href="facturacion.php">Facturación</a>
        <a class="navegación_enlace" href="ingresar.php">Ingresar</a>
    </nav>
    
    <p>Ingrese un producto</p>
    <p>ID producto</p>
    <p><input type="text" name="Id producto"  value="Id producto" size="20" maxlength="20"></p>
    <p>Nombre de producto</p>
    <p><input type="text" name="ingrese el producto" value="nombre de producto" size="20" maxlength="20"></p>
    <p>Descripción del producto</p>
    <p><input type="text" name="ingrese la descripción del producto" value="descripción" size="20" maxlength="20"></p>
    <p>Precio por unidad</p>
    <p><input type="number" name="ingrese el precio por unidad" value="precio por unidad" size="20" maxlength="20"></p>
    <p>
        <input type="submit" value="Ingresar">
    </p>
    <p>
        <input type="reset" value="Regresar">
    </p>
    <p>
        <input type="reset" value="Modificar">
    </p>
    <p>
        <input type="submit" value="Eliminar">
    </p>    

</body>
</html>

    
