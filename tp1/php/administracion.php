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
                    //$archivo = fopen("../empleados.txt","a");  
                    $empleado->setPathFoto($fotoNueva);
                    move_uploaded_file($_FILES['foto']['tmp_name'], "../fotos/".$fotoNueva);
                    if(empleado::guardarEmpleados($empleado)){
                        $retorno['empleado'] = $empleado;
                    }
                    else{
                        $retorno['exito'] =false;
                        $retorno['mensaje'] = 'error guardando el empleado';
                    }

                }
                else
                {
                    $retorno['exito'] = false;
                    $retorno['mensaje'] = 'error cargando la foto';
                }
            }
            if($retorno['exito'])
                $retorno['link'] = "mostrar.html";
            else
                $retorno['link'] ="index.html";           
            echo json_encode($retorno);
            break;
        case 'buscar':
            echo empleado::buscarEmpleado($_POST['dni']);
            break;
        case 'modificar':
            var_dump("LASLDASD");
            /*
            $empleados = empleado::traerEmpleados();
            $resultado = false;
            foreach ($empleados as $empleado ) {
                if($empleado->getDni() == $_POST['dni']){
                    $empleado->setNombre($_POST['nombre']);
                    $empleado->setbreak;Apellido($_POST['apellido']);
                    $empleado->setLegajo($_POST['legajo']);
                    $empleado->setSueldo($_POST['sueldo']);
                    $resultado = true;
                }
            }
            if($resultado) {
                echo empleado::guardarArrayEmpleados($empleados);
                var_dump($empleados);
            }
            else{
                echo false;
            }
            */

            break;
        case 'borrar':
            $empleadoBorrado = empleado::borrarEmpleado($_POST['dni']);
            $retorno = false;
            if($empleadoBorrado['exito']) {
                $retorno = empleado::guardarArrayEmpleados($empleadoBorrado['empleados']);
                
            }
            echo $retorno;
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