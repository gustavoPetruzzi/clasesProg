<?php
    /*
    $numeros = array(); // creo un array
    array_push($numeros, 1); // Agrego un elemento
    array_push($numeros, 2);
    var_dump($numeros); // muestro los tipos y los el valor de los elementos del array
    */
    $numerosAleatorios = array();
    $total = 0;
    for ($i=0; $i < 5; $i++) 
    {
        array_push($numerosAleatorios, rand(1,10));
        $total += $numerosAleatorios[$i];
    }
    if (($total /5) > 6) 
    {
        echo "El promedio es mayor a 6";
    }
    elseif (($total /5) < 6) 
    {
        echo "Es menor a 6";
    }
    else
    {
        echo "Es igual";
    }
?>