<?php
    $empleadosHandler = fopen("empleados.txt", "r");
    if ($empleadosHandler) 
    {
        while(!feof($empleadosHandler))
        {
            $empleadoLinea = fgets($archivo);
            $empleado = explode("-", $empleadoLinea);
            if(count($empleado) == 6)
            {
                $empleadoArray = new empleado($empleado[0], $empleado[1], $empleado[2], $empleado[3], $empleado[4],str_replace("\n"," ",$empleado[5]));
                echo $empleadoArray->toString();
            }
        }
    }
?>