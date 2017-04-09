<?php
    include_once("fabrica/empleado.php");
    
    if(strlen($_POST['nombre']) != 0 && strlen($_POST['apellido']) != 0 && strlen($_POST['dni']) != 0 && isset($_POST['sexo']) != 0 && strlen($_POST['legajo']) != 0 && strlen($_POST['sueldo']) && $_FILES['foto']['name'] )
    {

        $tipoFoto = exif_imagetype($_FILES['foto']['tmp_name']);
        $tiposValidos = array(IMAGETYPE_JPEG, IMAGETYPE_BMP, IMAGETYPE_PNG, IMAGETYPE_GIF);
        $fotoNueva = "fotos/".$_POST['dni']."-".$_POST['apellido'].".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $pathUsados = scandir("fotos");
        
        if(in_array($tipoFoto, $tiposValidos) && $_FILES['foto']['size'] < 1024000 && !in_array($fotoNueva, $pathUsados))
        {

            $empleado = new empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['legajo'], $_POST['sueldo']);
            $archivo = fopen("empleados.txt","a");
            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoNueva);
            $empleado->setPathFoto($fotoNueva);
            
            if(fwrite($archivo, $empleado->toString()."\r\n") === FALSE)
            {
                echo "<a href='html/index.html'>Pagina Principal</a>";
            }
            else
            {
                echo "<a href='mostrar.php'>Mostrar Empleados</a>";
            }
        }
        
    }
    
        
    
?>