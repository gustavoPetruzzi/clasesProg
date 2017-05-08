<?php
include_once('usuario.php');

$accion = isset($_POST["accion"]) ? $_POST["accion"] : NULL;

switch ($accion) {
    case 'cargar':
        $usuario = new usuario($_POST['nombre'], $_POST['correo'], $_POST['edad'], $_POST['clave']);
        if(usuario::guardarTxt($usuario)){
            echo "USUARIO GUARDADO";
        }
        else{
            echo "ERROR";
        }
        break;
    case 'verificar':
        $resultado = usuario::traerEmpleados();
        $mensaje = "";
        $data = false;
        if($resultado['exito']) {
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            
            foreach ($resultado['usuarios'] as $usuario ) {
                
                if($usuario->correo == $correo && $usuario->getClave() == $clave) {
                    $data = true;
                    break;
                }
            }
            echo json_encode($data);

        }
        break;
    case 'borrar':
        
        $resultado = usuario::traerEmpleados();
        $correo = $_POST['correo'];
        if($resultado['exito']){
            foreach ($resultado['usuarios'] as $key => $usuario ) {    
                if($usuario->correo == $correo) {
                    if(copy('usuario.txt', 'backup.txt')){
                        unset($resultado['usuarios'][$key]);
                        $existe = true;

                        break;    
                    }
                }
            }
        }
        if($existe){
            usuario::guardarArray($resultado['usuarios']);
            echo "<h1> Usuario Borrado </h1>";
        }
        else
            echo "<h1> ERROR </h1>";
        break;
    default:
        # code...
        break;
}

?>