<?php
    $head = fopen("encabezado.html", "r");
    $pagina = fread($head, filesize("encabezado.html"));

    $filas = $_POST['filas'];
    $columnas = $_POST['columnas'];
    
    for ($i=0; $i < $_POST['filas']; $i++) { 
        $pagina.="<tr>";
        for ($j=0; $j < $columnas; $j++) { 
            $pagina.="<td> ".$j."asdasdasdzxc"."</td>";
        }
        $pagina.="</tr>";
    }
    
    $pagina.="</table></body></html>";
    $archivo = fopen("paginafinal.html","w");
    fwrite($archivo, $pagina);
    fclose($archivo);
    fclose($head);
    echo $pagina;
?>