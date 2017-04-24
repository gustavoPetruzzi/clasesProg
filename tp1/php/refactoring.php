<?php
    include_once("../fabrica/empleado.php");
    include_once("validaciones.php");
    $retorno['exito'] = true;
    $nombre = validarNombre($_POST['nombre']);
    if(!$nombre = validarNombre($_POST['nombre'])){
        $retorno['exito'] = false;
    }
    if($retorno['exito']){
        if(!$apellido =validarNombre($_POST['apellido'])){
            $retorno['exito'] = false;
        }
    }
    if($retorno['exito']){
        if(!$dni = validarDni($_POST['dni'])) {
            $retorno['exito'] = false;
        }
    }
    if($retorno['exito']){
        if(!$sexo = validarNombre($_POST['sexo'])){
            $retorno['exito'] = false;
        }
    }
    if($retorno['exito']){
        if(!$legajo = validarDni($_POST['legajo'])){
            $retorno['exito'] = false;
        }
    }
    if($retorno['exito']) {
        if(!$legajo = validarDni($_POST['sueldo'])) {
            $retorno['exito'] = false;
        }
    }
    if($retorno['exito']) {
        $tipoFoto = exif_imagetype($_FILES['foto']['tmp_name']);
        $tiposValidos = array(IMAGETYPE_JPEG, IMAGETYPE_BMP, IMAGETYPE_PNG, IMAGETYPE_GIF);
        $fotoNueva = $_POST['dni']."-".$_POST['apellido'].".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $pathUsados = scandir("../fotos");
            
        if(in_array($tipoFoto, $tiposValidos) && $_FILES['foto']['size'] < 1024000 && !in_array($fotoNueva, $pathUsados))
        {
                
            $empleado = new empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['legajo'], $_POST['sueldo']);
            $archivo = fopen("../empleados.txt","a");  
            $empleado->setPathFoto($fotoNueva);
        }
    }
        
    if($retorno['exito'])
        $retorno['link'] = "<a href=\"../mostrar.html\"> Mostrar empleados </a>";
    else
        $retorno['link'] ="<a href=\"../index.html\">Volver a cargar </a>"."<p>";
        $retorno['mensaje']."</p>";
    
    echo json_encode($retorno);
    
    
?>