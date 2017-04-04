<?php
    //var_dump($_REQUEST); // AGARRA TODO
    //var_dump($_POST);
     // AGARRA SOLAMENTE LO PASADO POR POST
    if(in_array('Escribir', $_POST))
    {
        $nombre = $_POST['nombre'];
        $archivo = fopen("datos.txt", "w");
        fwrite($archivo, $nombre);
        fclose($archivo);    
    }
    else
    {
        
    }
    
    
?>