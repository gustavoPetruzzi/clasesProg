<?php
    require("funciones.php");
    include_once("calculadora.php");
    $resultado = calculadora::sumar(4,4);
    echo $resultado;
    //require("noExiste.php"); da error porque no existe
    //require("funciones.php"); da error porque ya fue declarado
    
?>