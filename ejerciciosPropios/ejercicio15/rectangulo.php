<?php
    include_once("figurageometrica.php");

    /**
     * 
     */
    class rectangulo extends figuraGeometrica
    {
        private $_ladoUno; // altura
        private $_ladoDos; //ancho

        function __construct($ladoUno, $ladoDos)
        {
            parent::__construct();
            $this->_ladoUno = $ladoUno;
            $this->_ladoDos = $ladoDos;
            $this->calcularDatos();
        }
        public  function dibujar()
        {
            for ($i=0; $i < $this->_ladoUno ; $i++) 
            { 
                for ($j=0; $j < $this->_ladoDos ; $j++) 
                { 
                    echo "*";
                }
                echo "<BR>";
            }
        }

        public function calcularDatos()
        {
            $this->_perimetro = ($this->_ladoUno * 2) + ($this->_ladoDos * 2);
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
        }

        public function toString()
        {
           return parent::toString()."<BR> Perimetro: ".$this->_perimetro."<BR> Superficie:".$this->_superficie;
        }
    }
    

?>