<?php
    $array = array();
    for($i=0;$i<=10;$i++)
    {
        if($i%2 != 0)
            array_push($array,$i);
    }
    $i=0;
    while($i <count($array))
    {
        echo $array[$i]."<BR>";
        $i++;
    }
    foreach($array as $i)
        echo $i."<BR>";
?>