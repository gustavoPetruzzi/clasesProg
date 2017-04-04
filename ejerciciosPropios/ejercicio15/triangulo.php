<?php
    include_once("figurageometrica.php");
    /**
     * 
     */
    class triangulo extends figuraGeometrica
    {
        private $_altura;
        private $_base;
        function __construct($altura, $base)
        {
            parent::__construct();
            $this->_altura = $altura;
            $this->_base = $base;
            $this->calcularDatos();
        }

        public  function dibujar()
        {
            echo"<br>";
            $asteriscos = 1;
            
            for ($i=0; $i < $this->_altura; $i++) 
            {
                
                $asteriscosBase = $this->_altura * 2  - $asteriscos;
                echo '&nbsp;'.str_repeat('&nbsp;', $asteriscosBase/2).str_repeat('º',$asteriscos);
                echo "<br>";
                $asteriscos+= 2;
            }
        }

        public function calcularDatos()
        {
            $this->_perimetro = sqrt(pow($this->_altura,2) + ($this->_base / 2)**2) * 2 + $this->_base;
            $this->_superficie = $this->_altura* $this->_base/2;
        }

        public function toString()
        {
           return parent::toString()."<BR> Perimetro: ".$this->_perimetro."<BR> Superficie: ".$this->_superficie;
        }
    }
    
?>	