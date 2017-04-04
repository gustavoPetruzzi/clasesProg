<?php
    /**
     * 
     */
    class auto
    {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha; //Datetime;
        
        function __construct($marca, $color, $precio=0, $fecha=" ")
        {
            $this->_color = $color;
            $this->_marca = $marca;
            $this->_precio =$precio;
            $this->_fecha = $fecha;
        }
        

        function agregarImpuestos($impuesto)
        {
            $this->_precio += $impuesto;
        }

        public static function mostrarAuto($auto)
        {
            $retorno = "Marca: ".$auto->getMarca()."<BR>";
            $retorno.="Color: ".$auto->getColor()."<BR>";
            $retorno.="Precio: ".$auto->getPrecio()."<BR>";
            $retorno.="Fecha: ".$auto->getFecha()."<BR>";
            return $retorno;
        }


        //GETTERS

        public function getMarca()
        {
            return $this->_marca;
        }
        public function getColor()
        {
            return $this->_color;
        }
        public function getPrecio()
        {
            return $this->_precio;
        }
        
        function getFecha()
        {
            return $fecha = $this->_fecha;
            //return $fecha->format("d-m-Y");
        }
        
        public function equals($auto2)
        {
            if ($this->_marca == $auto2->_marca) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public static function add($auto1, $auto2)
        {
            if ($auto1->equals($auto2) && $auto1->_color == $auto2->_color) 
            {
                return $auto1->_precio + $auto2->_precio;
            }
            else
            {
                return 0;
            }
        }
    }
    
?>