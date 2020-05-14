<?php
  //actividad11. Mayor o menor que 50
  /*Este programa analiza una lista de números y los clasifica dependiendo
  si son menores, iguales o mayores que cincuenta.*/
  $arreglo=[12, 58, 32, 67, 50, 41, 78, 99, 21, 50];
  $cincuenta=0;
  $i=0;
  $j=0;

  //Inicio de HTML
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>50</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad11.css\">
      </head>
      <body>
  ";
  echo "<h1>Lista de números menores a 50:<h1> ";
  //Lista de números menores a 50
  foreach ($arreglo as $key => $value) {
    if ($value<50) {
      $arrayuno[$i]=$value;
      $i++;
    }
  }
  echo "<h2>";
  //Impresión
  foreach ($arrayuno as $key => $value) {
    if ($key>0) {
      echo ", ";
    }
    echo $value;
  }
  echo "</h2>";
  echo "<br>
  <h1>Lista de números mayores a 50: </h1>";
  //Lista de números mayores a 50
  foreach ($arreglo as $key => $value) {
    if ($value>50) {
      $arraydos[$j]=$value;
      $j++;
    }
    elseif ($value==50) {
      $cincuenta++;
    }
  }
  echo "<h2>";
  //Impresión
  foreach ($arraydos as $key => $value) {
    if ($key>0) {
      echo ", ";
    }
    echo $value;
  }
  //Cantidad de veces que aparece el 50
  echo "</h2>";
  echo "<br>
  <h1>El número 50 aparece $cincuenta veces.</h1>";
  echo
  "
      </body>
    </html>
  ";
 ?>
