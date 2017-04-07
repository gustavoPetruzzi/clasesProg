<?php
    //var_dump($_REQUEST); // AGARRA TODO
    //var_dump($_POST);
     // AGARRA SOLAMENTE LO PASADO POR POST
    if(in_array('Escribir', $_POST))
    {
        if(file_exists($_POST['archivo']))
        {
            if(!copy($_POST['archivo'], "backup/guardate-".date("d-m-Y").".txt"))
                echo "error al hacer backup";
        }
        $nombre = $_POST['nombre'];
        $archivo = fopen($_POST['archivo'], "w");
        fwrite($archivo, $nombre);
        echo "GUARDADO";
        fclose($archivo);    
    }
    else
    {
        if(file_exists($_POST['archivo']))
        {
            $archivoLeido = fopen($_POST['archivo'], "r");
            $pagina = fopen("cargar.html", "r");
            $cargar = fread($pagina, 1000); // CAMBIAR POR FILESIZE
            
            $nombre = fread($archivoLeido, 1000);
            echo $cargar.$nombre."<h2> </body> </html>";
        }
        
    }
    
    
?>