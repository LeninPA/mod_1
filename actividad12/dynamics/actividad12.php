<?php
  //actividad12
  /*Este programa toma una lista de países con su PIB, la imprime
  en una tabla y devuelve el país con el mayor PIB de la lista.*/
  //Lista de Países
  $PIB=[
    "Jamaica"   =>  13091,
    "Irlanda"   =>  347215,
    "Kiribati"  =>  159,
    "Líbano"    =>  47959,
    "Canadá"    =>  1550895,
    "Bután"   =>  2186
  ];
  $pais;
  $producto=0;
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>PIB</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad12.css\">
      </head>
      <body>
  ";
  echo "<table align=\"center\">";
    echo "<tr>";
      echo "<th>País</th>";
      echo "<th>PIB<br>(en millones de euros)</th>";
    echo "<tr>";
  //Impresión de lista
  foreach ($PIB as $key => $value) {
    echo "<tr>";
      echo "<td>";
        echo $key;
      echo "</td>";
      echo "<td class=\"center\">";
        echo $value;
      echo "</td>";
    echo "</tr>";
    if ($value>$producto) {
      $pais=$key;
      $producto=$value;
    }
  }
  echo "</table>";
  //País con mayor PIB
  echo "<br>
        <p>$pais tiene el PIB más alto de la lista produciendo
        $producto millones de euros al año</p>
  ";
  echo
  "
      </body>
    </html>
  ";
 ?>
