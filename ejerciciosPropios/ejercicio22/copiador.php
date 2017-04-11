<?php
    
    if(file_exists($_POST['nombre']))
        copy($_POST['nombre'], "misArchivos/".date("Y_m_d_h_i_s").".txt");
    
?>