<?php
    /**
     * 
     */
    abstract class figuraGeometrica 
    {
        protected  $_color;
        protected  $_perimetro;
        protected  $_superficie;

        function __construct()
        {
            $this->setColor("Rojo");
        }
        
        protected abstract function calcularDatos();

        public abstract  function dibujar();

        public  function getColor()
        {
            return $this->_color;
        }
        
        public  function setColor( $color)
        {
            $this->_color = $color;
        }
        
        public function toString() // virtual?
        {
            
            return $this->getColor();
        }

        

        
    }
    
?>