<?php
    include_once("persona.php");
    
    /**
     * 
     */
    class empleado extends persona implements JsonSerializable
    {
        protected $_legajo;
        protected $_sueldo;
        protected $_pathFoto;

        function __construct($nombre, $apellido, $dni, $sexo, $legajo, $sueldo, $pathFoto="no foto")
        {
            parent::__construct($nombre, $apellido, $dni,$sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;
            $this->_pathFoto = $pathFoto;   
        }
        /*                GETTERS           */
        function getLegajo()
        {
            return $this->_legajo;
        }
        function getSueldo()
        {
            return $this->_sueldo;
        }
        function getPathFoto()
        {
            return $this->_pathFoto;
        }

        function setPathFoto($path)
        {
            $this->_pathFoto = $path;
        }

        function hablar($idioma)
        {
            return "El empleado habla ".$idioma;
        }

        function toString()
        {
            return parent::toString().$this->_legajo." - ".$this->_sueldo." - ".$this->_pathFoto;
            
        }
        // IMPLEMENTACION DE JSON
        
        public function jsonSerialize() {
            return [
                'nombre' => $this->getNombre(),
                'apellido' => $this->getApellido(),
                'dni' => $this->getDni(),
                'sexo' => $this->getSexo(),
                'legajo' => $this->getLegajo(),
                'sueldo' => $this->getSueldo(),
                'foto' => $this->getPathFoto(),
            ];
        }

        public static function traerEmpleados() {
            $ListaEmpleados = array();
            //leo todos los empleados del archivo
            $archivo=fopen("../empleados.txt", "r");
            
            while(!feof($archivo))
            {
                $archivoHandler = fgets($archivo);
                $empleados = explode(" - ", $archivoHandler);
                if($empleados[0] != ""){
                    $ListaEmpleados[] = new empleado($empleados[0], $empleados[1],$empleados[2], $empleados[3],$empleados[4], $empleados[5], $empleados[6]);
                }
                
            }
            fclose($archivo);
            
            return $ListaEmpleados;
        }

        public static function guardarEmpleados($empleado) {
            $resultado = FALSE;
            $archivo = fopen("../empleados.txt", "a");
            $cantidad = fwrite($archivo, $empleado->ToString()."\n");
            
            if($cantidad > 0)
            {
                $resultado = TRUE;			
            }           
            fclose($archivo);
            return $resultado;
        }
    }
    


?>