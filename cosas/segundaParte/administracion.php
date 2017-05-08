<?php
    include_once('container.php');
    $accion=$_POST['accion'];

    switch ($accion) {
        case 'cargar':
            // FALTA VALIDAR
            $numero = $_POST['numero'];
            $descripcion = $_POST['descripcion'];
            $pais = $_POST['pais'];
            $foto = $numero."-".$pais.".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/".$foto);
            $nuevo = new container($numero, $descripcion, $pais, $foto);
            if(container::guardar($nuevo))
                echo "Usuario Guardado";
            else
                echo "error al guardar";
            break;
        case 'borrar':
            $numero = $_POST['numero'];
            if(container::borrarDB($numero)) {
                echo "usuario borrado";
            }
            else
                echo "error borrando";
            break;
        case 'traer':
             $containers = container::traerTodos();
             echo json_encode($containers);
             break;
        case 'buscar':
            $containers = container::buscar($_POST['pais']);
            echo json_encode($containers);
            break;
        default:
            # code...
            break;
    }
?>