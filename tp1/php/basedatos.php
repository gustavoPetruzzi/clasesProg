<?php
    include_once("../fabrica/empleado.php");
    /**
     * 
     */
    class baseDedatos 
    {
        

        public static function agregarEmpleado($empleado){
            $retorno['exito'] = true;
            $conexion = mysqli_connect("localhost", "root", "", "miBase");
            if (!$conexion) {
                "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                $retorno['exito'] = false;
                $retorno['mensaje'] = "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                
            }
            $valores = $empleado->getNombre().", ".$empleado->getApellido().", ".$empleado->getDni().", ".$empleado->getSexo().", ".$empleado->getLegajo().", ".$empleado->getSueldo().", ".$empleado->getPathFoto().")";
            if($retorno['exito'] && !$sentencia = $conexion->prepare("INSERT INTO `empleados`(`nombre`, `apellido`, `dni`, `sexo`, `legajo`, `sueldo`, `foto`) VALUES (?,?,?,?,?,?,?)")) {
                $retorno['exito'] = false;
                $retorno['mensaje'] .= " Falló la preparación: (" . $conexion->errno . ") " . $conexion->error;
            }
            if($retorno['exito'] && !$sentencia->bind_param("ssisiis", $empleado->getNombre(), $empleado->getApellido(), $empleado->getDni(),$empleado->getSexo(),$empleado->getLegajo(), $empleado->getSueldo(), $empleado->getPathFoto())){
                $retorno['exito'] = false;
                $retorno['mensaje'] .= " error en la preparacion";
            }
            if ($retorno['exito'] && !$sentencia->execute()) {
                echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            
            mysqli_close($conexion);
            return $retorno;
        }
    }
    
    function agregarEmpleado($empleado){
        $retorno['exito'] = true;
        $conexion = mysqli_connect("localhost", "root", "", "miBase");
        if (!$conexion) {
            "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            $retorno['exito'] = false;
            $retorno['mensaje'] = "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            
        }
        $valores = $empleado->getNombre().", ".$empleado->getApellido().", ".$empleado->getDni().", ".$empleado->getSexo().", ".$empleado->getLegajo().", ".$empleado->getSueldo().", ".$empleado->getPathFoto().")";
        if(!$retorno['exito'] && !$sentencia = $conexion->prepare("INSERT INTO `empleados`(`nombre`, `apellido`, `dni`, `sexo`, `legajo`, `sueldo`, `foto`) VALUES (?,?,?,?,?,?,?)")) {
            $retorno['exito'] = false;
            $retorno['mensaje'] = "Falló la preparación: (" . $conexion->errno . ") " . $conexion->error;
        }
        $sentencia->bind_param("ssisiis", $empleado->getNombre(), $empleado->getApellido(), $empleado->getDni(),$empleado->getSexo(),$empleado->getLegajo(), $empleado->getSueldo(), $empleado->getPathFoto());
        if ( !$retorno['exito'] && !$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        
        mysqli_close($conexion);
        return $retorno;
    }
    function mostrarEmpleados() {
        $conexion = mysqli_connect("localhost", "root", "", "miBase");
        $consulta = mysqli_query($conexion, "SELECT * FROM `empleados`");
        //$filas = mysqli_fetch_object($consulta);
        while($row = $consulta->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
        }
        
        mysqli_close($conexion);
    }
?>