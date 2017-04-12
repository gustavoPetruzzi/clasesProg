<?php
    $archivo = fopen("index.html", "r");
    $pagina="";
    while(!feof($archivo))
    {
        $pagina.=str_replace("<body>","<body style='background-color:".$_POST['opcion']."'>", fgets($archivo));
    }
    echo $pagina;
?>