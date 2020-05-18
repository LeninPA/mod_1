<?php
  /*Este código nos ayudará a guardar en un arreglo
  el nombre con extensión de nuestras imágenes
  alamacenadas en una carpeta sabiendo sólo su ubicación*/
  //Ruta relativa de nuestra carpeta con imágenes
  $path = "../statics/img/paints";
  /*La función opendir recibe como parámetro la ruta de nuestra
  carpeta de imágenes y se guarda en una variable*/
  $carpeta_img = opendir($path);
  //Crearemos un arreglo para guardar los nombres de nuestras imágenes
  $imagenes = array();
  //Creamos una variable con un booleano para controlar un ciclo while
  $hayArchivos = true;
  //Ciclo While donde verificaremos si tenemos archivos en la carpeta
  while($hayArchivos) //Al ser la variable un booleano no requiere una comparación
  {
    //readdir regresa un string si encontró una carpeta y false si no es así
    $archivo = readdir($carpeta_img);
    //Se tomará un archivo diferente cada vez que se llame a la función
    if( $archivo !== false ) //De no ser false procederemos a validar los archivos
    {
      //En el siguiente condicional validamos si se trata de un archivo y no una carpeta o algo distinto
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
  //Finalmente imprimiremos los nombres de nuestras imágenes (si se tienen) en una lista
  if(empty($imagenes) != "array()")
  {
      echo "Aquí están tus imágenes:
            <ul type='square'>";
      for($n = 0; $n < count($imagenes); $n++) //Como sólo es una instrucción no necesito llaves
        echo "<li>".$imagenes[$n]."</li>";
      echo "</ul><br>";
      print_r($imagenes);
  }
  else //De no ser así imprimimos el posible error
    echo "Carpeta sin imágenes.";
  //Cerramos la carpeta abierta por seguridad
  closedir($carpeta_img);
?>
