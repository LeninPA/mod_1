
<?php
  /*Este programa toma un año "year" y te dice si es bisiesto o no
  Hecho por Lenin Pavón Alvarez*/
  $year=1900;
  $print=" no es ";
  //Inicio de HTML
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>¿Es $year bisiesto?</title>
        <style>
          body
          {
            background-color: #0f283c;
            font-family: sans-serif;
          }
          h1, h3
          {
            text-align: center;
            color: #f7f7f6;
          }
        </style>
      </head>
      <body>
  ";
  //Evaluación del año
  if (($year%4==0&&$year%100!=0)||$year%400==0) {
    $print=" es ";
  }
  echo "<h1>¿Es $year año bisiesto?</h1>";
  echo "<br><br>";
  echo "<h3>".$year.$print."un año bisiesto </h3>";
  //Fin del HTML
  echo
  "
      </body>
    </html>
  ";
?>
