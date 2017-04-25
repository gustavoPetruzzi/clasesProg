<?php
    include_once("fabrica.php");
    
    $miEmpleado = new empleado("Juan","Perez", "36594810", "M","123", "10010");
    $otroEmpleado = new empleado("roberto", "azul", "21111991", "F", "121", "10000");
    
    $miEmpleado->setPathFoto("36594810-perez.jpg");
    $otroEmpleado->setPathFoto("211111991-azul.jpg");
    empleado::guardarEmpleados($miEmpleado);
    empleado::guardarEmpleados($otroEmpleado);

    $empleados = empleado::traerEmpleados();
    foreach ($empleados as $empleado) {
        echo $empleado->toString();
        echo "<br>";
    }
    
    
?>