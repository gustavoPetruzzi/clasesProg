<?php
    include_once('enigma.php');
    var_dump($_POST);
    enigma::encriptar($_POST['mensaje'], $_POST['lugar']);
?>