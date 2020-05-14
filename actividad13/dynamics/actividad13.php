<?php
  //Actividad 13. Fibonacci
  /*Este programa toma un número n, verifica si es parte de la serie de
  fibonacci e imprime todos los valores de la serie que sean menores o iguales
  que n. */
  //Número n
  $n=144;
  //Términos Iniciales
  $n1=0;
  $n2=1;
  //¿Pertenece a la serie?
  $fib=" no es ";
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>Fibonacci</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad13.css\">
      </head>
      <body>
  ";
  //Serie de Fibonacci
  while (($n1 <= $n)&&($n1 <= $n)) {
    $serie[]=$n1;
    if ($n2 <= $n) {
      $serie[]=$n2;
    }
    if (($n1==$n)||($n2==$n)) {
      $fib=" es ";
    }
    $n1+=$n2;
    $n2+=$n1;
  }
  //Impresión de resultado
  echo "<h1>".$n.$fib."parte de la serie de fibbonacci</h1> <br><br>";
  echo "<h2>Los números de la serie que son iguales o menores que $n son:</h2>";
  echo "<h2>";
  foreach ($serie as $key => $value) {
    echo $value.", ";
  }
  echo
  "     </h2>
      </body>
    </html>
  ";
?>
