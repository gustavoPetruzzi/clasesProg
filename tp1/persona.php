<?php
    /**
     * 
     */
    abstract class persona  
    {
        private $_apellido;
        private $_dni;
        private $_nombre;
        private $_sexo;
        
        function __construct($nombre, $apellido, $dni, $sexo)
        {
            $this->_nombre = $nombre;
            $this->_apellido = $apellido;
            $this->_dni = $dni;
            $this->_sexo = $sexo;
        }

        function getApellido()
        {
            return $this->_apellido;
        }
        function getNombre()
        {
            return $this->_nombre;
        }
        function getDni()
        {
            return $this->_dni;
        }
        function getSexo()
        {
            return $this->_sexo;
        }

        function toString()
        {
            return "Nombre:".$this->_nombre."-Apellido:".$this->_apellido."-Dni:".$this->_dni."-Sexo:".$this->_sexo;
        }
        function toStringGuardar()
        {
            return $this->_nombre."-".$this->_apellido."-".$this->_dni."-".$this->_sexo;
        }
        abstract function hablar($idioma);



    }
    

?>