<?php
    $lapicera1 = array('color'=> 'rojo', 'marca'=> 'bic', 'trazo'=> 'grueso', 'precio'=>13);
    $lapicera2 = array('color'=> 'azul', 'marca'=> 'sharpie', 'trazo'=> 'medio grueso', 'precio'=>23);
    $lapicera3 = array('color'=> 'verde', 'marca'=> 'faber castell', 'trazo'=> 'fino', 'precio'=>33);

    $lapiceras = array($lapicera1, $lapicera2, $lapicera3);

    foreach ($lapiceras as $lapicera) 
    {
        echo "Color: ".$lapicera['color']."<BR>"."Marca: ".$lapicera['marca']."<BR>"."Trazo: ".$lapicera['trazo']."<BR>"."Precio: ".$lapicera['precio'];
        echo"<BR><BR><BR><BR>";
    }
?>