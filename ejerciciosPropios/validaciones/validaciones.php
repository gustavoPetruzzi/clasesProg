<?php
    function validarNombre($nombre) {
        if(strlen($nombre) != 0 && ctype_alpha($nombre)){
            return strtolower($nombre);
        }
        else{
            return false;
        }
    }
    function validarDni($numero) {
        if(strlen($numero) != 0)
        {
            $numero = str_replace(".","",$numero);
            if(ctype_digit($numero))
            {
                return $numero;
            }
            else
                return false;
        }
    }
?>