<?php
    include_once("fabrica/empleado.php");
    $empleadosHandler = fopen("empleados.txt", "r");
    if ($empleadosHandler) 
    {
        while(!feof($empleadosHandler))
        {
            $empleadoLinea = fgets($empleadosHandler);
            $empleado = explode("-", $empleadoLinea, 7);
            if(count($empleado) == 7)
            {
                $empleadoArray = new empleado($empleado[0], $empleado[1], $empleado[2], $empleado[3], $empleado[4],str_replace("\n"," ",$empleado[5]));
                $empleadoArray->setPathFoto(str_replace("\n", " ", $empleado[6]));
                echo $empleadoArray->toString();
                echo "<br>";
                echo "<img src=\"".$empleadoArray->getPathFoto()."\">";
                echo "<br>";
            }
        }
    }
?>