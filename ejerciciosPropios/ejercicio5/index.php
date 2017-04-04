<?php
$decena = array(20=>"Veinte",30=>"Treinta",40=>"Cuarenta",50=>"Cincuenta",60=>"Sesenta");
$unidad = array("uno","dos","Tres","Cuatro","Cinco","Seis","Siete","Ocho","Nueve");
$numero =  21;
$can = count($unidad);
for($i=0 ;$i <= $can ; $i++)
{
    $num = $numero - $i;
    if($num == 20 || $num == 30 || $num == 40 || $num == 50 || $num == 60 && $i != 0)
        echo $numero." ".$decena[$num]." y ".$unidad[$i-1];
    elseif($num == 20 || $num == 30 || $num == 40 || $num == 50 || $num == 60 && $i == 0)
        echo $numero." ".$decena[$num];
}
?>