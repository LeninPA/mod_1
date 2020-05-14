<?php
  $numeros=
  [
    [1,3,5,7,9],
    [2,4,6,8,10]
  ];
  for ($i=0; $i < 2; $i++)
  {
    for ($j=0; $j < count($numeros[$i]); $j++)
    {
      echo $numeros[$i][$j].", ";
    }
    echo "<br>";
  }
  //asociativos
  $transportes =
  [
    "terrestres" => ["auto","moto" ,"bici"]
    "marinos" => ["barco","lancha","bote","velero"]
  ];
  foreach ($transportes as $clave => $value) {
    echo "$clave: ";
    foreach ($transportes[$clave] as $value) {
      echo "$value, ";
    }
    echo "<br>";
  }
 ?>
