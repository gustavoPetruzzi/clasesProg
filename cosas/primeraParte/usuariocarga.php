<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="administracion.php" method="POST">
        <label for="idnombre">nombre</label>
        <br>
        <input type="text" id="idnombre" name="nombre">
        <br>

        <label for="idCorreo">Correo</label>
        <br>
        <input type="email" id="idCorreo" name="correo">
        <br>

        <label for="idEdad">Edad</label>
        <br>
        <input type="number" id="idEdad" name="edad">
        <br>

        <label for="idClave">Clave</label>
        <br>
        <input type="password" id="idClave" name="clave">
        <button name="accion" value="cargar"> enviar </button>
    </form>        
</body>
</html>