<?php
    include_once("../fabrica/empleado.php");
    include_once("basedatos.php");
    include_once("validaciones.php");
    $retorno['exito'] = true;
    $retorno['mensaje'] = 'todo Ok';
    $tiposValidos = array(IMAGETYPE_JPEG, IMAGETYPE_BMP, IMAGETYPE_PNG, IMAGETYPE_GIF);
    if(!in_array(exif_imagetype($_FILES['foto']['tmp_name']),$tiposValidos)){
        $retorno['exito'] = false;
        $retorno['mensaje'] = 'Tipo de imagen invalido';
    }
    if(!$retorno['exito']){
        if($_FILES['foto']['size']> 1024000){
            $retorno['exito'] = false;
            $retorno['mensaje'] = 'imagen demasiado grande!';
        }
    }
    echo json_encode($retorno);



    /*
    $miEmpleado = new empleado("gustavo", "petruzzi", "36594810", "m", "123","10000");
    $miEmpleado->setPathFoto("36594810-petruzzi.jpg");
    $respuesta =mostrarEmpleados();
    */
    /*
    $datos = array( 'nombre' => "gustavo", 'apellido' => "petruzzi", 'dni' => '36.594.810', 'sexo'=> 'M', 'legajo'=> '123', 'sueldo' => '10000');
    $retorno = validaciones::validar($datos);
    if($retorno['exito'])
    {
        echo "VALIDADO";
        echo $retorno['mensaje'];
    }
    else
    {
        echo "bardo <br> ";
        echo $retorno['mensaje']; 
    }
    */
    
?>
