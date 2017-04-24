<?php

    if( !empty($_POST['pass']) && strcmp($_POST['pass'], $_POST['repass'] ) == 0)
    {
        if(file_exists("bienvenida.html"))
        {
            $archivo = fopen("bienvenida.html", "r");
            $bienvenida = fread($archivo, filesize("bienvenida.html"));
            echo $bienvenida;
            fclose($archivo);
        }
        else
            echo "error";
    }
    else
        if(file_exists("index.html"))
        {
            $archivo = fopen("index.html", "r");
            $bienvenida = fread($archivo, filesize("index.html"));
            echo $bienvenida;
            fclose($archivo);
        }    
?>