<?php
    $destino = $_FILES['archivo']['name'];
    echo $_FILES['archivo']['type'];
    move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);
?>