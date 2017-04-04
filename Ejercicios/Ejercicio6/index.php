<?php
    //Creo array con enteros
    $array = array(1,2,3,9,5); //Constructor de Array
    $acumulador=0;
    var_dump($array);
    echo "<BR>";
    $array[1]= 10; // modifico valor de posicion 1
    for($i=0;$i<=5;$i++)
        array_push($array,rand(0,99)); //Hago push al array de un numero random
    var_dump($array);//Muestro El Array
    echo "<BR>";
    for($i=0;$i<11;$i++)
        $acumulador+=$array[$i];
    if($acumulador/$i > 6)
        echo "El Promedio es Mayor a 6";
    elseif($acumulador/$i < 6)
        echo "El Promedio es Menor a 6";
    else
        echo "El Promedio es igual a 6";
        
?>