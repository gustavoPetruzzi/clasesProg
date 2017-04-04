<?php
    include_once("garage.php");
    $auto1= new auto("Peugeot", "verde");
    $autoIgual1= new auto("Peugeot", "rojo");
    $auto2 = new auto("Renault", "azul");
    $autoIgual2 = new auto("Renault", "blanco");
    
    $miGarage = garage::__constructPrecio("garage sa", 30);
    // AGREGO AUTOS
    $miGarage->add($auto1);
    
    $miGarage->add($autoIgual1);
    echo "<BR>";
    $miGarage->add($auto2);
    $miGarage->add($autoIgual2);
    echo "<BR>";
    echo "<BR>";
    $miGarage->mostrarGarage();
    echo "<BR>";
    echo "<BR>";
    //REMUEVO AUTOS

    $miGarage->remove($auto1);
    $miGarage->mostrarGarage();

    $miGarage->remove($auto2);
    $miGarage->mostrarGarage();
?>