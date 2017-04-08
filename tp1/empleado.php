<?php
    include_once("persona.php");

    /**
     * 
     */
    class empleado extends persona
    {
        protected $_legajo;
        protected $_sueldo;
        protected $_pathFoto;

        function __construct($nombre, $apellido, $dni, $sexo, $legajo, $sueldo)
        {
            parent::__construct($nombre, $apellido, $dni,$sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;   
        }
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
            return parent::toString().$this->_legajo."-".$this->_sueldo;
            
        }
        
    }
    


?>