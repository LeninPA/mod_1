<?php
  /*Este programa analiza si un número n entero es primo */
  $n=54;
  $fin=false;
  $primo=false;
  $j=2;

  //Inicio de HTML
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>¿Es $n primo?</title>
        <style>
          body
          {
            background-color: #352c36;
            color: #f1e6e1;
            font-family: sans-serif;
            font-size: 1.5em;
            text-align: center;
          }
        </style>
      </head>
      <body>
  ";
  //Verificación de número. Caso 1. No es natural
  if ($n<1) {
    echo "Este programa requiere que ingrese un numero natural mayor que cero.";
  }
  else
  {
    //Caso 2. Es 1
    if($n==1)
    {
      echo "<h1>1 no es primo por convecion.</h1>";
    }
    //Caso 3. Es 2
    if ($n==2) {
      echo "<h1>2 es el único primo par.</h1>";
    }
    else
    { //¿Es primo?
      do
      { //Caso 4. No es primo
        if(($n%$j==0)&&($n!=$j))
        {
          $fin=true;
        }
        //Caso 5. Es primo
        if (($n==$j)&&(!($fin))) {
          $primo=true;
          $fin=true;
        }
        $j++;
      }while(!$fin);
      //Impresión cuando no es primo
      if (!($primo)) {
        $p="no";
      }
      //Impresión cuando es primo
      else {
        $p="";
      }
      echo "<h1> $n es primo.<br><br> </h1>";
    }
    //Impresión de la lista del 1 a n
    for ($i=1; $i <= $n; $i++) {
      //Señala los múltiplos de 3
      if($i%3==0)
      {
        echo "Múltiplo de 3";
      }
      else {
        echo "$i";
      }
      echo "<br>";
    }
  }
  //Fin del HTML
  echo
  "
      </body>
    </html>
  ";
 ?>
