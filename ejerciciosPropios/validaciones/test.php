<?php
    include_once("validaciones.php");
    //$nombre = validarNombre("juan");
    $numero = validarDni("36.a594.810");
    if($nombre = validarNombre("juan"))
    {
        echo "es un nombre";
        echo "<br>";
        echo $nombre;
    }
    else
    {
        echo "no es un nombre";
        echo "<br>";
        echo $nombre;
        
    }
    echo "<br>";
    if($numero)
    {
        echo $numero;
    }
    else
    {
        echo "No es un numero";
    }


    
?>