<?php
    include_once("rectangulo.php");
    include_once("triangulo.php");

    $miRectangulo = new rectangulo(3,5);
    $miTriangulo = new triangulo(3,5);
    $miRectangulo->dibujar();
    echo "Datos rectangulo:<br>";
    echo $miRectangulo->toString();
    echo "<br>Datos triangulo:";
    echo $miTriangulo->toString();
    echo $miTriangulo->dibujar();

?>