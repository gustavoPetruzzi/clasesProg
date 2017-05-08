<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>carga</title>
</head>
<body>
    <form action="administracion.php" method="POST" enctype="multipart/form-data">
        <label for="idNumero"> numero: </label>
        <br>
        <input type="text" name="numero">
        <br>
        <label for="idDescripcion"> descripcion: </label>
        <br>
        <input type="text" id="idDescripcion" name="descripcion">
        <br>
        <label for="idPais"> pais: </label>
        <br>
        <input type="text" id="idPais" name="pais">
        <br>
        <label for="idFoto"> foto: </label>
        <br>
        <input type="file" id="idFoto" name="foto">
        <br>
        <button name="accion" value="cargar"> cargar </button>

    </form>
</body>
</html>