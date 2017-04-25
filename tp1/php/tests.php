<?php
    include_once("../fabrica/empleado.php");
    include_once("basedatos.php");
    include_once("validaciones.php");
    /*
    $miEmpleado = new empleado("gustavo", "petruzzi", "36594810", "m", "123","10000");
    $miEmpleado->setPathFoto("36594810-petruzzi.jpg");
    $respuesta =mostrarEmpleados();
    */
    $datos = array( 'nombre' => "gustavo", 'apellido' => "petruzzi", 'dni' => '36.594.810', 'sexo'=> 'M', 'legajo'=> '123', 'sueldo' => '10000');
    $retorno = validaciones::validar($datos);
    if($retorno['exito'])
    {
        echo "VALIDADO";
        echo $retorno['mensaje'];
    }
    else
    {
        echo "bardo <br> ";
        echo $retorno['mensaje']; 
    }
        
    
?>