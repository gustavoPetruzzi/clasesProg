<?php
    include_once("empleado.php");
    //var_dump($_POST);
    //Tengo que validar lo que pasan?
    if(strlen($_POST["nombre"]) != 0 && strlen($_POST["apellido"]) != 0 && strlen($_POST["dni"]) != 0 && strlen($_POST["legajo"]) != 0 && strlen($_POST["sueldo"]) )
    {
        echo "empleado cargado";
    }
?>