<?php
  //actividad11
  $arreglo=[12, 58, 32, 67, 50, 41, 78, 99, 21, 50];
  $cincuenta=0;
  $i=0;
  $j=0;
  echo "Lista de números menores a 50: ";
  foreach ($arreglo as $key => $value) {
    if ($value<50) {
      $arrayuno[$i]=$value;
      $i++;
    }
  }
  foreach ($arrayuno as $key => $value) {
    if ($key>0) {
      echo ", ";
    }
    echo $value;
  }
  echo "<br>
  Lista de números mayores a 50: ";
  foreach ($arreglo as $key => $value) {
    if ($value>50) {
      $arraydos[$j]=$value;
      $j++;
    }
    elseif ($value==50) {
      $cincuenta++;
    }
  }
  foreach ($arraydos as $key => $value) {
    if ($key>0) {
      echo ", ";
    }
    echo $value;
  }
  echo "<br>
  El número 50 aparece $cincuenta veces.";

 ?>
