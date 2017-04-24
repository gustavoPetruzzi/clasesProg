<?php
    include_once("../fabrica/empleado.php");
    include_once("basedatos.php");

    $miEmpleado = new empleado("gustavo", "petruzzi", "36594810", "m", "123","10000");
    $miEmpleado->setPathFoto("36594810-petruzzi.jpg");
    $respuesta =mostrarEmpleados();
    
?>