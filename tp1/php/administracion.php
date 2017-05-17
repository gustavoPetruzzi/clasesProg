<?php
    include_once("../fabrica/empleado.php");
    include_once("validaciones.php");
    $retorno['exito'] = true;
    $accion =$_POST['accion'];
    switch ($accion) {
        case "agregar":
            $retorno = validaciones::validar($_POST);
            
            if($retorno['exito']){
                $tipoFoto = exif_imagetype($_FILES['foto']['tmp_name']);
                $tiposValidos = array(IMAGETYPE_JPEG, IMAGETYPE_BMP, IMAGETYPE_PNG, IMAGETYPE_GIF);
                $fotoNueva = $_POST['dni']."-".$_POST['apellido'].".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $pathUsados = scandir("../fotos");
                    
                if(in_array($tipoFoto, $tiposValidos) && $_FILES['foto']['size'] < 1024000 && !in_array($fotoNueva, $pathUsados))
                {
                        
                    $empleado = new empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['legajo'], $_POST['sueldo']);
                    $archivo = fopen("../empleados.txt","a");  
                    $empleado->setPathFoto($fotoNueva);
                    move_uploaded_file($_FILES['foto']['tmp_name'], "../fotos/".$fotoNueva);
                    $retorno['empleado'] = $empleado;

                }
                else
                {
                    $retorno['exito'] = false;
                    $retorno['mensaje'] = 'error cargando la foto';
                }
            }
            echo json_encode($retorno);
            break;
        case 'form':
            include("../elementos/form.php");
            break;
        default:
            # code...
            break;
    }
    /*
    if($retorno['exito'])
        $retorno['link'] = "<a href=\"../mostrar.html\"> Mostrar empleados </a>";
    else
        $retorno['link'] ="<a href=\"../index.html\">Volver a cargar </a>"."<p>";
        $retorno['mensaje']."</p>";
    */
    
    
    
    
?>