<?php
    include_once("fabrica.php");
    
    $miEmpleado = new empleado("Juan","Perez", "36594810", "M","123", "$10010");
    $otroEmpleado = new empleado("roberto", "azul", "21111991", "F", "121", "$10000");
    //$miFabrica = new fabrica("Generica SA");
    $myJson = json_encode($miEmpleado);
    
    //$miFabrica->agregarEmpleado($miEmpleado);
    //$miFabrica->agregarEmpleado($otroEmpleado);
    //$miFabrica->guardarFabrica();
    /*
    echo $miFabrica->toString();
    echo "<BR>";
    $miFabrica = new fabrica("Generica SA");
    echo $miFabrica->toString();
    echo $miFabrica->toString();
    echo "<br>";
    $otraFabrica = new fabrica("hola");
    echo $otraFabrica->guardarFabrica();
    echo "<BR>";
    */
    echo $myJson;
    
    
?>