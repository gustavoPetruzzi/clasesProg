<?php
/**
 * 
 */
class validaciones 
{
    
    public  static function validar($datos)
    {
        $retorno['exito'] = true;
        $retorno['mensaje'] = "todo OK";
        $nombre = validaciones::validarNombre($datos['nombre']);
        if(!$nombre = validaciones::validarNombre($datos['nombre'])){
            $retorno['exito'] = false;
            $retorno['mensaje'] = "bardo nombre";
        }
        if($retorno['exito']){
            if(!$apellido =validaciones::validarNombre($datos['apellido'])){
                $retorno['exito'] = false;
                $retorno['mensaje'] = "bardo apellido";
            }
        }
        if($retorno['exito']){
            if(!$dni = validaciones::validarDni($datos['dni'])) {
                $retorno['exito'] = false;
                $retorno['mensaje'] = "bardo dni";
            }
        }
        if($retorno['exito']){
            if(!$sexo = validaciones::validarNombre($datos['sexo'])){
                $retorno['exito'] = false;
                $retorno['mensaje'] = "bardo sexo";
            }
        }
        if($retorno['exito']){
            if(!$legajo = validaciones::validarDni($datos['legajo'])){
                $retorno['exito'] = false;
                $retorno['mensaje'] = "bardo legajo";
            }
        }
        if($retorno['exito']) {
            if(!$legajo = validaciones::validarDni($datos['sueldo'])) {
                $retorno['exito'] = false;
                $retorno['mensaje'] = " bardo sueldo";
            }
        }
        return $retorno;
    }

    public static function validarImagen($imagen){
       // $foto = isset()
    }
    public static function validarNombre($nombre) {
        if(strlen($nombre) != 0 && ctype_alpha($nombre)){
            return strtolower($nombre);
        }
        else{
            return false;
        }
    }
    public static function validarDni($numero) {
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
}

    
?>