<?php
    include_once("auto.php");
    $auto1 = new auto("Renault", "verde");
    $auto2 = new auto("Renault", "rojo");
    $auto3 = new auto("Peugeot","rojo",123000);
    $auto4 = new auto("Peugeot","rojo",100000);
    $auto5 = new auto("Fiat","azul", 95000, "21/11/12");
    
    //AGREGO IMPUESTOS

    $auto3->agregarImpuestos(1500);
    $auto4->agregarImpuestos(1500);
    $auto5->agregarImpuestos(1500);    
    echo $auto3->getPrecio() + $auto4->getPrecio();
    echo "<BR>";
    if($auto1->equals($auto2))
    {
        echo "El auto 1 y 2 son iguales";
    }
    else
    {
        echo "No son iguales";
    }
    echo "<BR>";
    if($auto1->equals($auto5))
    {
        echo "El auto 1 y 5 son iguales";
    }
    else
    {
        echo "No son iguales el auto 1 y 5<BR>";
    }
    echo "<BR>";
    
    echo auto::mostrarAuto($auto1);
    echo "<BR>";
    echo auto::mostrarAuto($auto3);
    echo "<BR>";
    echo auto::mostrarAuto($auto5);
    
?>