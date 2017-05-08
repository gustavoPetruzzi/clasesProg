<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/listado.js">
        var error = "<?php $mensaje='error verificando'; include('error.php');?>"; 
    </script>
</head>
<body>
    <div class="container">
        <table class="table">
        <?php
                include_once('usuario.php');
                $resultado = usuario::traerEmpleados();
                if($resultado['exito']) {
                    $mensaje = " <thead>
                                <th> Nombre </th>
                                <th> correo </th>
                                <th> edad </th>
                                <th> borrar </th>
                                </thead>";
                    $mensaje .= "<tbody>";
                    foreach ($resultado['usuarios'] as $usuario ) {
                        $mensaje.="<tr>";
                        $mensaje.="<td>".$usuario->nombre."</td>";
                        $mensaje.="<td>".$usuario->correo."</td>";
                        $mensaje.="<td>".$usuario->edad."</td>";
                        $mensaje.="<td>
                                <button class='btn btn-primary borrar' onclick='borrar(\"$usuario->correo\")'> borrar </button> </td>";
                    }
                echo $mensaje .= "</tbody>";
            }
        ?>
        </table>
    </div>
    <div class="container" id="respuesta">
    </div>
</body>
</html>