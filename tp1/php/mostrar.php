<?php
    include_once("../fabrica/empleado.php");
    $nombreArchivo = "../empleados.txt";
    $empleadosHandler = fopen($nombreArchivo, "r");
    $empleadoArray =  array();
    if ($empleadosHandler) 
    {
        while(!feof($empleadosHandler))
        {
            $empleadoLinea = fgets($empleadosHandler);
            $empleadoDatos = explode(" - ", $empleadoLinea, 7);
            
            if(count($empleadoDatos) == 7)
            {
                
                str_replace("\r", "", $empleadoDatos[5]);
                
                $empleado = new empleado($empleadoDatos[0], $empleadoDatos[1], $empleadoDatos[2], $empleadoDatos[3], $empleadoDatos[4],str_replace("\r\n", "", $empleadoDatos[5]));
                
                $empleado->setPathFoto(str_replace("\n", " ", $empleadoDatos[6]));
                array_push($empleadoArray,$empleado);
                
            }
        }
        //echo fread($empleadosHandler, filesize($nombreArchivo));
    }
    echo json_encode(array_values($empleadoArray));
?>