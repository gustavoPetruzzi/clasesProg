<?php
    /**
     * 
     */
    class enigma
    {
        
        function __construct()
        {
            # code...
        }

        static function encriptar($mensaje, $path)
        {
            $mensajeCifrado='';
            foreach (str_split($mensaje) as $letra ) {
                $mensajeCifrado .= ord($letra) + 200;
            }
            $nuevo = fopen($path, "w");
            fwrite($nuevo, $mensajeCifrado);
            fclose($nuevo);
        }

        static function desencriptar($path)
        {
            if(file_exists($path))
            {
                $mensajeDescifrado='';
                $archivo = fopen($path, "r");
                while(!feof($archivo))
                {
                    $linea = fgets($archivo);
                    $string = str_split($linea);
                    foreach ($string as $letra ) {
                        
                        $mensajeDescifrado.=chr(ord($letra)-200);
                    }
                }
            }
            fclose($archivo);
            return $mensajeDescifrado;
        }
    }
    
?>