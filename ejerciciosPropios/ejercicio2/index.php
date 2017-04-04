<?php
$mes = (int) date("n");
$dia = (int) date("j");
if ($mes >= 3 && $mes <= 6 && $dia > 21) {
    echo "Es otoño";
} elseif ($mes >= 6 && $mes <= 9 && $dia > 21) {
    echo "Es invierno";
} elseif($mes > 9 && $mes <= 12 && $dia > 21) {
    echo "Es primavera";

} else {
    echo "Es verano";
}

?>
