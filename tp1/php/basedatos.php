<?php
    include_once("../fabrica/empleado.php");
    function agregarEmpleado($empleado){
        $conexion = mysqli_connect("localhost", "root", "", "miBase");
        if (!$conexion) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            
        }
        $valores = $empleado->getNombre().", ".$empleado->getApellido().", ".$empleado->getDni().", ".$empleado->getSexo().", ".$empleado->getLegajo().", ".$empleado->getSueldo().", ".$empleado->getPathFoto().")";
        if(!$sentencia = $conexion->prepare("INSERT INTO `empleados`(`nombre`, `apellido`, `dni`, `sexo`, `legajo`, `sueldo`, `foto`) VALUES (?,?,?,?,?,?,?)")) {
            echo "Falló la preparación: (" . $conexion->errno . ") " . $conexion->error;
        }
        $sentencia->bind_param("ssisiis", $empleado->getNombre(), $empleado->getApellido(), $empleado->getDni(),$empleado->getSexo(),$empleado->getLegajo(), $empleado->getSueldo(), $empleado->getPathFoto());
        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        
        
        mysqli_close($conexion);
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