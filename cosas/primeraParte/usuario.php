<?php
    /**
     * 
     */
    class usuario 
    {
        public $nombre;
        public $correo;
        public $edad;
        private $clave;
        function __construct($nombre, $correo, $edad, $clave)
        {
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->edad = $edad;
            $this->clave = $clave;
        }
        public function toString(){
            return $this->nombre." - ".$this->correo." - ".$this->edad." - ".$this->clave;
        }
        public function getClave() {
            return $this->clave;
        }
        /* AGREGAR GETTERS Y SETTERS */
        public static function  guardarTxt($usuario){
            $archivo = 'usuario.txt';
            $resultado = false;
            $handler = fopen($archivo, "a");
            $cantidad = fwrite($handler, $usuario->toString()."\n");
            if($cantidad > 0) {
                $resultado = true;
            }
            fclose($handler);
            return $resultado;
        }
        public static function guardarArray($array) {
            $archivo = 'usuario.txt';
            $resultado = false;
            $handler = fopen($archivo, 'w');
            foreach ($array as $usuario ) {
                $resultado = false;
                $cantidad = fwrite($handler, $usuario->toString()."\n");
                if($cantidad > 0) {
                    $resultado = true;
                }   
            }
            fclose($handler);
            return $resultado;
        }
        public static function traerEmpleados()
        {
            $archivo = 'usuario.txt';
            $resultado['exito'] = false;
            $resultado['usuarios'] = array();
            $handler = fopen($archivo, 'r');
            while(!feof($handler)){
                $linea = fgets($handler);
                $usuario = explode(" - ",$linea);
                $usuario[0] = trim($usuario[0]);
                
                if($usuario[0]!= ""){
                    $usuario[3] = trim($usuario[3]);
                    $resultado['usuarios'][] = new usuario($usuario[0], $usuario[1], $usuario[2], $usuario[3]); 
                }
                $resultado['exito'] =true;
            }
            fclose($handler);
            return $resultado;
        }
    }
    
?>