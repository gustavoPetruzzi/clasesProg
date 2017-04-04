<?php

    $a= 8;
    $b= 10;
    $c= 9;
  
    if(($a > $b && $a < $c) || ($a > $c && $a < $b))
    {
        echo $a;
    }
    elseif(($b > $a && $b < $c) || ($b > $c && $b < $a))
    {
        echo $b;
    }
    elseif(($c > $a && $c < $b) || ($c > $b && $c < $a))
    {
        echo $c;
    }
    else
    {
        echo "No hay valor del medio";
    }
?>

