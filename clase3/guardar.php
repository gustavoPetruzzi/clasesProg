<?php
    //var_dump($_REQUEST); // AGARRA TODO
    //var_dump($_POST);
     // AGARRA SOLAMENTE LO PASADO POR POST
    if(in_array('Escribir', $_POST))
    {
        $nombre = $_POST['nombre'];
        $archivo = fopen($_POST['archivo'], "w");
        fwrite($archivo, $nombre);
        echo "GUARDADO";
        fclose($archivo);    
    }
    else
    {
        
    }
    
    
?>