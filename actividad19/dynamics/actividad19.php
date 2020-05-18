<?php
  //Actividad 19. La chicharronera
  /*Este programa recibe los valores de una ecuación cuadrática de la forma
  ax^2+bx+c=0, donde a>0, de un formulario. Despues, calculas los valores de x que
  satisfacen la forma antes descrita. Al último los imprime. Si no se mandan
  valores válidos de a, b ó c; y/o se dejan vacíos, imprimirá un mensaje de
  error y se mostrará un enlace para regresar al formulario.*/
  //Equipo Alfa Buena Maravilla Onda Dinamita Escuadrón Lobo
  echo "
      <!DOCTYPE html>
      <html lang=\"es\" dir=\"ltr\">
        <head>
          <meta charset=\"utf-8\">
          <title>Instituto Nueva Ciudad de México, Nuevo México, Marte</title>
          <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad19.css\">
        </head>
        <body>
    ";
  $a = (isset($_GET['a']) && $_GET['a'] != "") ? $_GET['a'] : "no hay número" ;
  $b = (isset($_GET['b']) && $_GET['b'] != "" )? $_GET['b'] : "no hay número" ;
  $c = (isset($_GET['c']) && $_GET['c'] != "")? $_GET['c'] : "no hay número" ;

  $validacion1=is_numeric($a)&&$a!=0;
  $validacion2=is_numeric($b);
  $validacion3=is_numeric($c);

  if ($validacion1&&$validacion2&&$validacion3) {
    $imag=false;
    $menosb = $b * (-1);
    $discriminante = pow($b,2)-4*$a*$c;
    if ($discriminante<0) {
      $discriminante*=-1;
      $imag=true;
    }
    $raiz = sqrt($discriminante);
    $dosa = 2*$a;

    if ($imag==false) {
      $x1=($menosb+$raiz)/$dosa;
      $x2=($menosb-$raiz)/$dosa;
      echo "X<sub>1</sub>"." =".$x1."<br>";
      echo "X<sub>2</sub>"." =".$x2;
    }else
    {
      $x1A=$menosb/$dosa;
      $x1B=$raiz/$dosa;
      if ($x1A==0) {
        echo "X<sub>1</sub> = ".$x1B."i"."<br>";
        echo "X<sub>2</sub> =-".$x1B."i";
      }
      else {
        echo "X<sub>1</sub> =".$x1A."+".$x1B."i"."<br>";
        echo "X<sub>2</sub> =".$x1A."-".$x1B."i";
      }
    }
    echo "<br><a href='../templates/actividad19.html'>VOLVER AL FORMULARIO</a>";
  }
  else {
    echo "Regresa al formulario e inserta un número válido para cada variable.<br>
    Recuerda:
    <ul>
      <li>No dejes espacios en blanco; si no tiene valor, tienes que poner cero.</li>
      <li>Ingresa números, no letras, ni símbolos especiales.</li>
      <li>
        El programa sólo soluciona ecuaciones cuadráticas, por lo que 'a' no
        puede ser cero.
      </li>
    </ul>
    <a href='../templates/actividad19.html'>VOLVER AL FORMULARIO</a>";
  }
  echo
  "
        </body>
      </html>
    ";
 ?>
