<?php
    function guardarError($error) {
        $archivo = fopen("log.txt", "a");
        fwrite($archivo, $error);
        fwrite($archivo, "\n");
        fclose($archivo);
    }

    try {
        $archivo = @fopen($_POST['nombre'],"r");
        if(!$archivo)
        {
            throw new Exception("Error, archivo no encontrado");
        }
        else
        {
            $archivoNuevo = fopen("misArchivos/reverse-".date("Y_m_d_h_i_s").".txt", "w");
            while(!feof($archivo))
            {
                fwrite($archivoNuevo, strrev(fgets($archivo)));
            }
            fclose($archivo);
            fclose($archivoNuevo);
        }
    } catch(Exception $e){
        guardarError($e->getMessage());
    } 
    
?>