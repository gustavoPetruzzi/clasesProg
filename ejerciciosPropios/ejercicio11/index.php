<?php
    
    function potencias()
    {
        for ($i=1; $i < 5; $i++) 
        { 
            echo pow($i, 2);
            echo "<BR>";    
        }
    }
    potencias();
?>