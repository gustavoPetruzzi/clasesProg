<?php
    include_once("empleado.php");

    //var_dump($_POST);
    //Tengo que validar lo que pasan?
    
    if(strlen($_POST['nombre']) != 0 && strlen($_POST['apellido']) != 0 && strlen($_POST['dni']) != 0 && strlen($_POST['sexo']) != 0 && strlen($_POST['legajo']) != 0 && strlen($_POST['sueldo']) )
    {
        $empleado = new empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['legajo'], $_POST['sueldo']);
        $archivo = fopen("empleados.txt","a");
        fwrite($archivo, $empleado->toString());
        fwrite($archivo, "\r\n");
    }
    
?>