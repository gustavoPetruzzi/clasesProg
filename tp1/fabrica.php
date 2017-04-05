<?php
    include_once("empleado.php");
    /**
     *  
     */
    class fabrica 
    {
        private $_razonSocial;
        private $_empleados;
        function __construct($razonSocial)
        {
            $this->_razonSocial = $razonSocial; 
            $this->_empleados = $this->traerEmpleado();
            
        }
        function agregarEmpleado($empleado)
        {
            //TENGO QUE VALIDAR SI ES UN OBJETO DE TIPO EMPLEADO?
            array_push($this->_empleados, $empleado);
            $this->eliminarEmpleadosRepetidos();
        }
        function calcularSueldos()
        {
            $totalSueldos = 0;
            foreach ($this->_empleados as $empleado ) 
            {
                $totalSueldos+= $empleado->getSueldo();
            }
            return $totalSueldos;
        }
        function eliminarEmpleado($empleado)
        {
            //TENGO QUE VALIDAR SI ES UN OBJETO DE TIPO EMPLEADO?
            unset($this->_empleados[array_search($empleado,$this->_empleados)]);
        }

        private function eliminarEmpleadosRepetidos()
        {
            $this->_empleados = array_unique($this->_empleados, SORT_REGULAR);
        }
        function toString()
        {
            $retorno = "Razon Social: ".$this->_razonSocial."<BR>";
            foreach($this->_empleados as $empleado)
            {
                $retorno.=$empleado->toString();

            }
            return $retorno;
        }
        function guardarFabrica()
        {
            
            $archivo = fopen("fabrica.txt", "w");
            foreach ($this->_empleados as $empleado) 
            {
                $dato = $empleado->toString()."\n";
                fwrite($archivo,$dato);
            }
            fclose($archivo);
        }
        function traerEmpleado() // SE LLAMA EN EL CONSTRUCTOR
        {
            $empleados = array();
            if(file_exists("fabrica.txt"))
            {
                $archivo = fopen("fabrica.txt", "r");
                
                while(!feof($archivo))
                {
                    $empleadoLinea = fgets($archivo);
                    $empleado = explode("-", $empleadoLinea);
                    if(count($empleado) == 6)
                    {
                        $empleadoArray = new empleado($empleado[0], $empleado[1], $empleado[2], $empleado[3], $empleado[4],str_replace("\n"," ",$empleado[5]));
                        array_push($empleados, $empleadoArray);
                        
                    }
                }
                fclose($archivo);
            }
            return $empleados;

        }
        
        
    }
    
?>