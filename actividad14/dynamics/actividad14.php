<?php
  //Actividad 14. Destruye el fuerte
  /*A partir de la dificultad enviada de la pantalla de inicio, se
  crea un tablero en la pantalla de carga (que contiene
  las instrucciones del mismo). Posteriormente se presenta el juego
  y el ingreso de coordenadas. Si se destruyen todos los edificios
  o se acaban las vidas se pasa a la pantalla final, donde se imprime
  si se ganó (si la primera condición se cumple), o si se perdió (en
  caso de que se cumpla condición se cumpla). Además, en esta pantalla
  hay un botón que te regresa a la pantalla de inicio*/

  //Tablero del jugador
  $arreglo=$_GET["arreglo"];
  //Tablero inicial
  $inicial=$_GET["inicial"];
  $vidas=$_GET["vidas"];
  //Encabezado de HTML
  echo "
  <!DOCTYPE html>
  <html lang='es' dir='ltr'>
    <head>
      <meta charset='utf-8'>
      <title>Destruye el fuerte</title>
      <link rel='stylesheet' href='../design/actividad14.css'>
    </head>
    <body>
      <h1>Destruye el fuerte</h1>
  ";
  //Condición para mostrar la pantalla de carga
  if (!isset($arreglo)) {
    $dificultad=$_GET["dif"];
    $lados;
    $fuerte;
    $edificios_con_vida;
    $vidas=5;
    //Pantalla de carga
    echo "
        <h2>Dificultad: $dificultad</h2>
        <h4>
        Ingresa las coordenadas (x,y) en las que creas que hay edificios.
        Si aciertas, le harás daño. Pero si disparas a la tierra o a un
        edificio destruido perderás una vida. Tienes 5 vidas.
        <table align='center'>
          <tr>
            <th>Color</th>
            <th>Significado</th>
          </tr>
          <tr>
            <td style='background-color: #b69a8c;'></td>
            <td>Tierra/Edificio sin daño</td>
          </tr>
          <tr>
            <td style='background-color: #7a6456;'></td>
            <td>Suelo dañado</td>
          </tr>
          <tr>
            <td style='background-color: #c78a3b;'></td>
            <td>Edificio dañado</td>
          </tr>
          <tr>
            <td style='background-color: #431a24;'></td>
            <td>Edificio destruido</td>
          </tr>
        </table>
        </h4>
    ";
    //Validación de dificultad
    if ($dificultad!="")
    {
      if ($dificultad=="facil")
      {
        $lados=4;
        $edificios_con_vida=10;
        $limite=3;
      }
      elseif ($dificultad=="medio")
      {
        $lados=6;
        $edificios_con_vida=20;
        $limite=5;
      }
      else
      {
        $lados=8;
        $edificios_con_vida=40;
        $limite=7;
      }
      //Creación de tablero de juego
      for ($i=0; $i < $lados; $i++)
      {
        for ($j=0; $j < $lados; $j++)
        {
          if($edificios_con_vida > 0)
          {
            $fuerte[$i][$j]=rand(0,$limite);
            if($fuerte[$i][$j]!=0)
            {
              $edificios_con_vida--;
            }
          }
          else {
            $fuerte[$i][$j]=0;
          }
        }
      }
    }
    //Exportación del tablero de juego a un arreglo
    for ($i=0; $i < $lados; $i++)
    {
      $array[$i]=implode("/",$fuerte[$i]);
    }
    $arreglo=implode("&",$array);
    //Establecimiento del tablero original
    $inicial=$arreglo;
    //Envío de variables
    echo "
    <form action=\"actividad14.php\" method=\"GET\" class=\"center\">
      <input type=\"hidden\" name=\"arreglo\" value=$arreglo>
      <input type=\"hidden\" name=\"inicial\" value=$inicial>
      <input type=\"hidden\" name=\"lados\" value=$lados>
      <input type=\"hidden\" name=\"vidas\" value=$vidas>
      <input type=\"submit\" name=\"Inicio\" value=\"Inicio\">
    </form>
    ";
  }
  else {
    //Coordenadas
    /*La razón por la que las coordenadas tienen valores invertidos es
    que en los arreglos se lee primero la coordenada "y" y luego la "x"*/
    $x=$_GET["y"];
    $y=$_GET["x"];
    //Condición para mostrar los mensajes
    $verdadx=isset($_GET["y"]);
    //Condición necessaria para ganar
    $win=true;
    //Importación de variables
    $vidas=$_GET["vidas"];
    $lados=$_GET["lados"];
    //Mensajes
    $mensaje1=false;  //Has dañado a un edificio
    $mensaje2=false;  //Has destruido un edificio
    $mensaje3=false;  //Has disparado a una casilla vacía, has perdido una vida
    //Importación del tablero de juegos
    $array=explode("&",$arreglo);
    for ($i=0; $i < $lados; $i++)
    {
      $fuerte[$i]=explode("/",$array[$i]);
    }
    //Importación del tablero inicial
    $inicial_1=explode("&",$inicial);
    for ($i=0; $i < $lados; $i++)
    {
      $inicial_2[$i]=explode("/",$inicial_1[$i]);
    }
    //Evaluación del proyectil.
    /*Evalúa en el tablero si cayó sobre un edificio o si se le
    debe de quitar */
    if ($fuerte[$y][$x]>0&&$fuerte[$y][$x]<9)
    {
      $fuerte[$y][$x]--;
      if ($fuerte[$y][$x]===0)
      {
        $fuerte[$y][$x]=9;
        $mensaje2=true;
      }
      else {
        $mensaje1=true;
      }
    }
    elseif (($fuerte[$y][$x]==0||$fuerte[$y][$x]==9)&&$verdadx)
    {
      $vidas--;
      $fuerte[$y][$x]=9;
      $mensaje3=true;
    }
    //Evaluación de las condiciones para ganar
    for ($i=0; $i < $lados; $i++)
    {
      for ($j=0; $j < $lados; $j++)
      {
        if ($fuerte[$i][$j]>0&&$fuerte[$i][$j]<9)
        {
          $win=false;
        }
      }
    }
    //Tablero de juego
    if ($vidas>0&&!$win)
    {
      //Indicador de las vidas
      echo "<h2>";
      if ($mensaje1)
      {
        echo "Has dañado a un edificio";
      }
      elseif ($mensaje2)
      {
        echo "Has destruido un edificio";
      }
      elseif ($mensaje3)
      {
        echo "Has disparado a una casilla vacía<br> Has perdido una vida";
      }
      echo "<br>Vidas:</h2><h3>";
      for ($i=1; $i <= $vidas; $i++)
      {
        echo "&hearts;";
      }
      //Tablero de juego
      echo "</h3>
      <table align=\"center\">";
        echo "<tr>";
        echo "<td>";
          //Impresión de eje x
          for ($k=0; $k < $lados; $k++)
          {
            echo "<td>$k</td>";
          }
        echo "</tr>";
        //Creación del tablero
        for ($i=0; $i < $lados; $i++)
        {
          //Impresión del eje y
          echo "<tr> <td>$i</td>";
            for ($j=0; $j < $lados; $j++)
            {
              //Creación y clasificación de celdas
              echo "<td style=\"width:50px; height:50px; background-color:";
              //Suelo/Edificio sin dañar
              if ($fuerte[$j][$i]==$inicial_2[$j][$i])
              {
                echo "#b69a8c;\">";
              }
              else
              {
                //Edificio destruido
                if ($fuerte[$j][$i]==9)
                {
                  if ($inicial_2[$j][$i]==0)
                  {
                    echo "#7a6456;\">";
                  }
                  else
                  {
                    echo "#431a24;\">";
                  }
                }
                //Edificio dañado
                elseif ($inicial_2[$j][$i]>0 && $fuerte[$j][$i]!=0)
                {
                  echo "#c78a3b;\">";
                }
              }
              echo "</td>";
            }
          echo "</tr>";
        }
      echo "</table>";
      //Exportación del tablero de juego
      for ($i=0; $i < $lados; $i++)
      {
        $array[$i]=implode("/",$fuerte[$i]);
      }
      $arreglo=implode("&",$array);
      //Envío y registro de coordenadas y variables
      echo "<br>
      <form action=\"actividad14.php\" method=\"GET\" class=\"center\">
        Coordenada X:<input type=\"number\" name=\"x\" value=\"\" min=\"0\" max=\"$lados\">
        Coordenada Y:<input type=\"number\" name=\"y\" value=\"\" min=\"0\" max=\"$lados\">
        <input type=\"hidden\" name=\"arreglo\" value=$arreglo>
        <input type=\"hidden\" name=\"lados\" value=$lados>
        <input type=\"hidden\" name=\"inicial\" value=$inicial>
        <input type=\"hidden\" name=\"vidas\" value=$vidas>
        <br><br>
        <input type=\"submit\" name=\"Dispara\" value=\"Dispara\">
      </form></h3>
      ";
    }
    //Pantalla final
    else
    {
      //Pantalla de victoria
      if ($vidas>0)
      {
        echo "<h1>Felicidades<br>¡GANASTE!</h1>";
      }
      //Pantalla de derrota
      else
      {
        echo "<h1>Se te acabaron las vidas <br>Intenta de nuevo<h1>";
      }
      //Reinicio de juego
      unset($arreglo);
      //Botón de reinicio
      echo "<h1><button onclick=\"location.href='../templates/actividad14.html'\">Juego nuevo</button></h1>";
    }
  }
  //Fin del HTML
  echo "
    </body>
  </html>
  ";
 ?>
