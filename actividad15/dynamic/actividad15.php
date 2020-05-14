<?php
  //Actividad 15. Morse
  /*Este programa toma el mensaje que le ha sido enviado, verifica que el
  mensaje que le enviaron coincida con el tipo de texto escogido (en caso
  de no coincidir marcará error), traduce el mensaje y al final lo imprime.*/
  //Validación de texto a morse
  function valid_txt($str)
  {
    $valido=true;
    $morse=strstr($str, "*");
    if ($morse=="") {
      $morse=strstr($str, "-");
    }
    //Verifica que no haya asteriscos (*), ni guiones (-)
    if ($morse!="") {
      $valido=false;
    }
    return $valido;
  }
  //Validación de morse a texto
  function valid_morse($str)
  {
    $valido=true;
    $trad=str_split($str, 1);
    for ($i=0; $i < strlen($str); $i++) {
      $char=ord($trad[$i]);
      //Verifica que sólo haya asteriscos(*), guiones(-), espacios( ) y/o diagonales()
      if ($char!=32&&$char!=42&&$char!=45&&$char!=46&&$char!=47) {
        $valido=false;
      }
    }
    return $valido;
  }
  $tipo=$_GET['tipo'];
  $mensaje=$_GET['mensaje'];
  $morse=
  [
    //Diccionario ASCII-Morse
    33=>"--**--", //Signo de admiración !
    38=>"*.",     //Ampersand           &
    35=>"*.",     //Numeral             #
    36=>"*.",     //Pesos               $
    37=>"*.",     //Porcentaje          %
    44=>"-*-*--", //Coma                ,
    46=>"*-*-*-", //Punto               .
    48=>"-----",  //Números 48-0
    "*----",
    "**---",      //50-2
    "***--",
    "****-",
    "*****",
    "-****",
    "--***",      //55-7
    "---**",
    "----*",
    65=>"*-",     //Letras Mayúsculas   65-A
    "-***",
    "-*-*",
    "-**",
    "*",
    "**-*",       // 70-F
    "--*",
    "****",
    "**",
    "*---",
    "-*-",        // 75-K
    "*-**",
    "--",
    "-*",
    "---",
    "*--*",       // 80-P
    "--*-",
    "*-*",
    "***",
    "-",
    "**-",        // 85-U
    "***-",
    "*--",
    "-**-",
    "-*--",
    "--**",       // 90-Z
    130=>"*",     //130-é
    144=>"*",     //144-É
    160=>"*-",    //160-á
    "**",         //161-í
    "---",        //162-ó
    "**-",        //163-ú
    "-*",         //164-ñ
    "-*",         //165-Ñ
    181=>"*-",    //181-Á
    214=>"**",    //214-Í
    224=>"---",   //224-Ó
    233=>"**_"    //233-Ú
  ];
  //Inicio de HTML
  echo "
  <!DOCTYPE html>
  <html lang=\"es\" dir=\"ltr\">
    <head>
      <meta charset=\"utf-8\">
      <title>Espías.com</title>
      <link rel=\"stylesheet\" href=\"../design/actividad15.css\">
    </head>
    <body>
  ";
  //Validación
  if ($tipo=="texto") {
    $verdad=valid_txt($mensaje);
  }
  else {
    $verdad=valid_morse($mensaje);
  }
  //Inicio de programa
  if ($verdad) {
    echo "<h1>Traducción</h1>";
    echo "<h2>";
    //Traducción de Texto a Morse
    if ($tipo=="texto") {
      //Descompone la oración en caracteres
      $trad=str_split($mensaje,1);
      for ($i=0; $i < strlen($mensaje); $i++) {
        //Traducción del caracter a ASCII
        $char=ord($trad[$i]);
        //Traducción de ASCII a Morse
        if ($char==32) {
          echo "/";
        }
        elseif ($char>=33 && $char<=46) {
          echo "/".$morse[$char]."/";
        }
        elseif ($char>=97) {
          $char-=32;
          echo $morse[$char]." ";
        }
        else {
          echo $morse[$char]." ";
        }
      }
    }
    else {
      //Traducción de Morse a Texto
      //Descompone la oración en palabras
      $palabras;
      $txt=explode("/", $mensaje);
      //Descompone la palabra en letras
      $translation;
      foreach ($txt as $key => $value) {
        $translation[]=explode(" ", $txt[$key]);
      }
      //Traducción de las letras a ASCII
      for ($i=0; $i < count($translation); $i++) {
        for ($j=0; $j < count($translation[$i]); $j++) {
          foreach ($morse as $key => $value) {
            if ($value==$translation[$i][$j]) {
              $translation[$i][$j]=chr($key);
            }
          }
        }
        $palabras[$i]=implode($translation[$i]);
      }
      //Impresión
      foreach ($palabras as $key => $value) {
        echo $value." ";
      }
    }
    echo "</h2>";
  }
  //Mensaje de error
  else {
      echo "
      <h1>ERROR</h1>
      <h2>Introduzca el texto de forma correcta. Asegúrese de que corresponda
      con la opción seleccionada.</h2>";
  }
  //Fin de HTML
  echo "
  </body>
</html>
  ";
 ?>
