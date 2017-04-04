<?php
    $numerosImpares = array();
    $i=1;
    while(count($numerosImpares) < 10)
    {
        if ($i % 2 != 0) 
        {
            array_push($numerosImpares, $i);    
        }
        $i++;
    }
    $i=0;
    while( $i <count($numerosImpares) )
    {
        echo $numerosImpares[$i]."<br>";
        $i++;
    }
    echo "<br>";
    
    foreach ($numerosImpares as $numero) 
    {
        echo $numero."<br>";
    }
    
?>