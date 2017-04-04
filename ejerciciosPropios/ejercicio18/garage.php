<?php
    include_once("../ejercicio17/auto.php");
    /**
     * 
     */
    class garage
    {
        private $_razonSocial;
        private $_precioPorHora;
        private $_autos;
        function __construct($razonSocial, $precioPorHora)
        {
            $this->_razonSocial = $razonSocial;
            $this->_precioPorHora = $precioPorHora;
            $this->_autos = array();s
        }

        
        function mostrarGarage()
        {
            $mostrar = "Razon social: ".$this->_razonSocial."<BR>";
            foreach($this->_autos as $auto)
            {
                $mostrar.=auto::mostrarAuto($auto)."<BR>";
            }
            echo $mostrar;
        }
        function equals($auto)
        {
            foreach($this->_autos as $autoGarage)
            {
                if($autoGarage->equals($auto))
                {
                    return true;
                }
            }
            return false;
        }
        function add($auto)
        {
            if(!($this->equals($auto)))
            {
                array_push($this->_autos, $auto);
            }
            else
            {
                echo "Ese auto ya se ha agregado";
            }
        }
        function remove($auto)
        {
            if($this->equals($auto))
            {
                unset($this->_autos[array_search($auto,$this->_autos)]);
            }
        
        }
    }
    
?>