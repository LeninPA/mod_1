<?php
/*Este programa genera tableros de ajedrez.
  Se puede modificar la cantidad de filas y columnas en las siguientes
  Hecho por Lenin Pavón Alvarez*/
  $filas=7;
  $columnas=7;
  //Inicio del HTML y estilos
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>Ajedrez</title>
        <style>
        body
        {
          background-color: #f1e6e1;
          color: #0f1e26;
          text-align: center;
          font-family: sans-serif;
        }
        table
        {
          border:5px solid #0f1e26;
          border-collapse: collapse;
        }
        td
        {
          width:50px;
          height:50px;
        }
        .oscuro
        {
          background-color:#4e2717;
        }
        .claro
        {
          background-color:#b38d68;
        }
        </style>
      </head>
      <body>
        <h1>Tablero de Ajedrez</h1>
        <h2>$filas x $columnas</h2>
        <table align=\"center\">
  ";
  //Inicio de Tablas
  for ($i=1; $i <= $filas; $i++) {
    echo "<tr>";
    for ($j=1; $j <= $columnas ; $j++) {
      //Filas pares
      if ($i%2==0) {
        //Celdas pares
        if ($j%2==0) {
          echo "<td class=\"oscuro\"></td>";
        }
        //Celdas impares
        else {
          echo "<td class=\"claro\"></td>";
        }
      }
      //Filas impares
      else {
        //Celdas pares
        if ($j%2==0) {
          echo "<td class=\"claro\"></td>";
        }
        //Celdas impares
        else {
          echo "<td class=\"oscuro\"></td>";
        }
      }
    }
    echo "</tr>";
  }
  //Fin del HTML
  echo
  "
        </table>
      </body>
    </html>
  ";
?>
