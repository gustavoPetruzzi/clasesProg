<?php
    $archivo = fopen("misArchivos/palabras.txt", "r");
    $stringPalabras = explode(" ", fread($archivo, filesize("misArchivos/palabras.txt")));
    $palabras = array('uno' => 0, 'dos' => 0, 'tres' => 0, 'cuatro' => 0, 'mas' => 0);
    foreach ($stringPalabras as $palabra) {
        # code...
    
        switch (strlen($palabra)) {
            case 1:
                $palabras['uno']++;
                break;
            case 2:
                $palabras['dos']+= 1;
                break;
            case 3:
                $palabras['tres']+= 1;
                break;
            case 4:
                $palabras['cuatro']+= 1;
                break;
            default:
                $palabras['mas']+= 1;
                break;
        }
    }
    echo "una palabra: ". $palabras['uno'];
    echo "<br>";
    echo "dos palabra: ". $palabras['dos'];
    echo "<br>";
    echo "tres palabra: ". $palabras['tres'];
    echo "<br>";
    echo "cuatro palabra: ". $palabras['cuatro'];
    echo "<br>";
    echo "mas palabra: ". $palabras['mas'];
    echo "<br>";
?>