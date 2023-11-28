

    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURACIÓN</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>FACTURACIÓN</h1>
    <nav class="navegación">
        <a class="navegación_enlace" href="cliente.php">Cliente</a>
        <a class="navegación_enlace" href="ingresar.php">Ingresar</a>
        <a class="navegación_enlace" href="producto.php">Producto</a>
    </nav>
    <p>Ingrese la facturación</p>
    <p>ID Factura</p>
    <p><input type="text" name="Id factura"  value="Id factura" size="20" maxlength="20"></p>
    <p>ID Cliente</p>
    <p><input type="text" name="Id cliente" value="Id cliente" size="20" maxlength="20"></p>
    <p>ID Producto</p>
    <p><input type="text" name="Id producto" value="Id producto" size="20" maxlength="20"></p>
    <p>Precio por unidad</p>
    <p><input type="number" name="Producto por unidad" value="Precio por unidad" size="20" maxlength="20"></p>
    <p>Cantidad de unidades</p>
    <p><input type="number" name="Cantidad de unidades" value="Unidades" size="20" maxlength="20"></p>
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