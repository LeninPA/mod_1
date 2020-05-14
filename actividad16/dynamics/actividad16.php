<?php
  //Actividad 16. Floating Point
  /*El siguiente programa imprime un caracter en una tabla y hace que
  se mueva una unidad hacia arriba, abajo, derecha e izquierda. Si se
  encuentra con una pared, regresa por la pared opuesta, como Pacman.
  Existe un botón para regresarla a su posición inicial.*/
  //Función para regresar del otro lado de la pared
  function pacman($i,$j)
  {
    if ($j<0) {
      $j=$_COOKIE["ladoV"]-1;
    }
    if ($i<0) {
      $i=$_COOKIE["ladoH"]-1;
    }
    if ($j>$_COOKIE["ladoV"]-1) {
      $j=0;
    }
    if ($i>$_COOKIE["ladoH"]-1) {
      $i=0;
    }
    $coordenadas=[$i,$j];
    return$coordenadas;
  }
  //lados
  $ladoH=13;
  $ladoV=13;
  //Inicio HTML
  echo "
    <!DOCTYPE html>
    <html lang=\"es\" dir=\"ltr\">
      <head>
        <meta charset=\"utf-8\">
        <title>Corzón Valiente</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad16.css\">
      </head>
      <body>
  ";
  //Verifica la existencia de las cookies
  if (! isset($_COOKIE["ladoH"])) {
    //Definición de los lados
    define("ladoH", $ladoH);
    define("ladoV", $ladoV);
    //Impresión de medidas
    echo "Tabla de".constant("ladoH")."x".constant("ladoV");
    //Creación de cookies
    setcookie("ladoH", constant("ladoH"));
    setcookie("ladoV", constant("ladoV"));
    //Define la posición
    setcookie("pos", "0&0");
    //Inicia el programa
    echo "<form action=\"actividad16.php\" method=\"GET\">
    <input type=\"submit\" name=\"Inicio\" value=\"Inicio\">
    </form>
    ";
  }
  elseif (! isset($_COOKIE["ladoV"])) {
    //Definición de los lados
    define("ladoH", $ladoH);
    define("ladoV", $ladoV);
    //Impresión de medidas
    echo "Tabla de".constant("ladoH")."x".constant("ladoV");
    //Creación de cookies
    setcookie("ladoH", constant("ladoH"));
    setcookie("ladoV", constant("ladoV"));
    //Define la posición
    setcookie("pos", "0&0");
    //Inicia el programa
    echo "<form action=\"actividad16.php\" method=\"GET\">
    <input type=\"submit\" name=\"Inicio\" value=\"Inicio\">
    </form>
    ";
  }
  else {
    //Importa la posición
    $pos=explode("&",$_COOKIE["pos"]);
    //Importa la dirección del movimiento
    $mov=$_GET["mov"];
    //Definición de los movimientos
    if ($mov!="")
    {
      if ($mov=="Reinicio")
      {
        $pos=[0,0];
      }
      if ($mov=="Derecha")
      {
        $pos[0]++;
        $pos=pacman($pos[0],$pos[1]);
      }
      if ($mov=="Izquierda")
      {
        $pos[0]--;
        $pos=pacman($pos[0],$pos[1]);
      }
      if ($mov=="Arriba")
      {
        $pos[1]--;
        $pos=pacman($pos[0],$pos[1]);
      }
      if ($mov=="Abajo")
      {
        $pos[1]++;
        $pos=pacman($pos[0],$pos[1]);
      }
    }
    //Impresión del tablero
    echo "
    <h1>Corazón Valiente</h1>
    <table align='center'>";
    for ($i=0; $i < $_COOKIE["ladoV"]; $i++) {
      echo "<tr>";
      for ($j=0; $j < $_COOKIE["ladoH"]; $j++) {
        echo "<td>";
        if ($pos[0]==$j&&$pos[1]==$i) {
          echo "&hearts;";
        }
        echo"</td>";
      }
      echo "</tr>";
    }
    //Actualización de posición
    setcookie("pos",$pos[0]."&".$pos[1]);
    //Controles
    echo "</table class='controles'>";
    echo "
    <form action=\"actividad16.php\" method=\"GET\">
      <table align='center'>
        <tr>
          <td class='controles'></td>
          <td class='controles'><input type=\"submit\" name=\"mov\" value=\"Arriba\"></td>
          <td class='controles'></td>
        </tr>
        <tr>
          <td class='controles'><input type=\"submit\" name=\"mov\" value=\"Izquierda\"></td>
          <td class='controles'><input type=\"submit\" name=\"mov\" value=\"Reinicio\"></td>
          <td class='controles'><input type=\"submit\" name=\"mov\" value=\"Derecha\"></td>
        </tr>
        <tr>
          <td class='controles'></td>
          <td class='controles'><input type=\"submit\" name=\"mov\" value=\"Abajo\"></td>
          <td class='controles'></td>
        </tr>
      </table>
    </form>
    ";
  }
  //Fin de HTML
  echo
  "
      </body>
    </html>
  ";

 ?>
