<?php
    $acumulador = 0;
    $cantidadNumeros = 1;
    
    while($acumulador <1000)
    {
        if($acumulador +$cantidadNumeros > 1000 )
        {
            break;
        }
        echo $cantidadNumeros." <BR>";
        $acumulador += $cantidadNumeros;
        $cantidadNumeros++;
    }
    echo "Se sumaron ".$cantidadNumeros." numeros.";
    echo date("1");
?>
