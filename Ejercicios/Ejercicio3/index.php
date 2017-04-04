<?php
  $a=-3;
  $b=-99;
  $c=33;
  if($a < $b && $a > $c || $a > $b && $a < $c) // c < a < b o b < a < c
    echo $a;
  elseif ($b > $c && $b < $a || $b < $c && $b > $a) // c < b < a o a < b < c
    echo $b;
  elseif ($b < $c && $c < $a || $b > $c && $b > $c) // b < c < a  o a < c < b
    echo $c;
  else
    echo "No hay valor medio";
?>
