<?php
    $path = "misArchivos/palabras.txt";
    if(file_exists($path))
    {
        $archivo = fopen($path, "r");
        $strings = explode(" ", fread($archivo, filesize($path)));
        $cantidadPalabras = array("una" => 0, "dos" => 0, "tres" => 0, "+cuatro" => 0);
        foreach ($strings as $palabra) 
        {
            switch (strlen($palabra)) 
            {
                case 1:
                    $cantidadPalabras["una"]++;
                    break;
                case 2:
                    $cantidadPalabras["dos"]++;
                    break;
                case 3:
                    $cantidadPalabras["tres"]++;
                    break;
                default:
                    $cantidadPalabras["+cuatro"]++;
                    break;
            }
        }
        $header = fread(fopen("htmls/header.html","r"),filesize("htmls/header.html"));
        $header.="<tr><td>".$cantidadPalabras["una"]."</td>";
        $header.="<td>".$cantidadPalabras["dos"]."</td>";
        $header.="<td>".$cantidadPalabras["tres"]."</td>";
        $header.="<td>".$cantidadPalabras["+cuatro"]."</td>";
        $header.="</td></table></body></html>";
        echo $header;

    }
    else
    {
        $paginaError = fopen("htmls/error.html", "r");
        echo fread($paginaError, filesize("htmls/error.html"));
    }
?>