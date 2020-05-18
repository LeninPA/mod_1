<?php
  //Inicio de HTML
  echo "
  <!DOCTYPE html>
  <html lang=\"es\" dir=\"ltr\">
    <head>
      <meta charset=\"utf-8\">
      <title>Sin Sentido. Galería de arte</title>
      <link rel=\"stylesheet\" type=\"text/css\" href=\"../statics/actividad18.css\">
    </head>
    <body>
  ";
  //Verificación de imágenes
  //Path de la carpeta
  $path="../statics/img/paints/";
  $path_usr="../statics/img/usr/";
  /*Es importante aclarar que este programa sólo distingue si está ausente un elemento si se
  expresa su ausencia, es decir, si se escriben de las siguintes formas:
  $Nombre_del_Artista$Año.extension     //Está ausente el nombre de la obra
  Nombre_de_la_obra$$Año.extension      //Está ausente el nombre del autor
  Nombre_de_la_obra$Nombre_del_Artista$ //Está ausente el año
  */
  $carpeta_img = opendir($path);
  $carpeta_usr = opendir($path_usr);
  $imagenes=array();
  //Variable para controlar la lectura de archivos de la galería de imágenes
  $hayArchivos = true;
  while($hayArchivos)
  {
    //Verifica que no sea una carpeta
    $archivo = readdir($carpeta_img);
    if ($archivo=== false) {
      $archivo = readdir($carpeta_usr);
    }
    //Se leeran todos los elementos de la carpeta
    if( $archivo !== false )
    {
      //Verifica que el elemento en cuestión sea un archivo y no algo más
      if( $archivo != "." && $archivo != ".." && !is_dir($archivo) )
      {
        //Guardaremos la extensión del archivo para verificar que sea una imagen
        $ext = pathinfo($archivo, PATHINFO_EXTENSION);
        //Si el archivo es una imagen guardaremos su nombre en nuestro arreglo
        if($ext == 'png' | $ext == 'jpg' | $ext == 'jpeg')
          array_push($imagenes, $archivo);
      }
    }
    else
      $hayArchivos = false; //De ser $archivo = false terminamos el ciclo while
  }
  //Verifica que la carpeta sí contenga al menos una imagen
  if(empty($imagenes) != "array()")
  {
    //Procesamiento del nombre de las imagenes
    $extensiones;
    foreach ($imagenes as $key => $value) {
      $extensiones[]=strstr($value,'.');
      $imagenes[$key]=strstr($value,'.', true);
    }
    foreach ($imagenes as $key => $value) {
      $obras[]=explode("$",$value);
    }
    foreach ($obras as $key => $value) {
      foreach ($obras[$key] as $llave => $valor) {
        if ($valor!=""&&$valor!="&&"&&$valor!="&") {
          $palabra=str_split($valor,1);
          foreach ($palabra as $keyA => $valueA) {
            if ($valueA=="_") {
              $palabra[$keyA]=" ";
            }
            elseif ($valueA=="&") {
              $palabra[$keyA]="";
            }
          }
          $obras[$key][$llave]=implode($palabra);
        }
        else {
          if ($llave==0) {
            $obras[$key][$llave]="Sin nombre";
          }
          elseif ($llave==1) {
            $obras[$key][$llave]="Sin autor";
          }
          elseif ($llave==2) {
            $obras[$key][$llave]="Sin año";
          }
        }
      }
    }
    //Impresión de imagenes
    echo "
      <h1>Galería <br>\"Sin sentido\"</h1>
      <table align='center'>
        <tr>
          <th>Nombre del autor</th>
          <th>Autor</th>
          <th>Año</th>
          <th>Obra</th>
        </tr>
      ";
      foreach ($obras as $key => $value) {
        echo "
        <tr>";
        foreach ($obras[$key] as $llave => $valor) {
          echo "
          <td>$valor</td>";
        }
        if (file_exists($path.$imagenes[$key].$extensiones[$key])) {
          echo "
          <td>
            <img src=\"".$path.$imagenes[$key].$extensiones[$key]."\" width=\"200px\">
          </td>
        </tr>";
        }
        else {
          echo "
          <td>
            <img src=\"".$path_usr.$imagenes[$key].$extensiones[$key]."\" width=\"200px\">
          </td>
        </tr>";
        }
      }
    echo "
      </table>
      <br>";
  }
  else //De no ser así imprimimos el posible error
    echo "Carpeta sin imágenes.";
  //Cerramos la carpetas abiertas por seguridad
  closedir($carpeta_img);
  closedir($carpeta_usr);
  //Fin de HTML
  echo "
      <h2>¿Quieres ver tu obra de arte en la galería?</h2>
      <h3><a href=\"../templates/actividad18.html\">Haz click aquí</a></h3>
    </body>
  </html>
  ";
 ?>
