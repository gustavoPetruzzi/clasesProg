<?php
    function esPar($numero)
    {
        if($numero % 2 == 0)
        {
            return true;
        }
        
    }

    function esImpar($numero)
    {
        return (!(esPar($numero)));
    }

    if(esPar(2))
    {
        echo "Es par";
    }
    echo "<BR>";
    if(esImpar(1))
    {
        echo "Es impar";
    }
    
?>