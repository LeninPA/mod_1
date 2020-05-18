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
  $carpeta="../statics/img/usr";
  $nombre = (isset($_POST['nombre']) && $_POST['nombre'] != "") ? $_POST['nombre'] : false ;
  $autor = (isset($_POST['autor']) && $_POST['autor'] != "") ? $_POST['autor'] : false ;
  $year = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : false ;
  if (isset($_FILES['obra'])||$_FILES['obra']['error']>0) {
    $ext=strstr($_FILES['obra']['name'],'.');
    if($ext == '.png' | $ext == '.jpg' | $ext == '.jpeg')
    {
      if ($nombre!==false || $autor!==false || $year!==false)
      {
        if ($nombre===false)
          $nombre="";
        if ($autor===false)
          $autor="";
        if ($year===false)
          $year="";
        $name=str_replace(" ","_",$nombre);
        $author=str_replace(" ","_",$autor);
        $tmp_name=$_FILES['obra']['tmp_name'];
        $_FILES['obra']['name']=$name."$".$author."$&".$year."&".$ext;
        $nombre_subida=basename($_FILES['obra']['name']);
        $subida=move_uploaded_file($_FILES['obra']['tmp_name'],"$carpeta/$nombre_subida");
        if ($subida)
          header("Location:./actividad18.php");
        else {
          echo "
            <h1>Error D</h1>
            <h3>Sucedió un error al momento de mover tu archivo, por favor,
            vuelve a mandarlo.</h3>
            <a href=\"../templates/actividad18.html\">Regresa al formulario</a>";
        }
      }
      else
      {
        echo "
          <h1>Error C</h1>
          <h3>Llena al menos un campo de los Datos de la Obra</h3>
          <a href=\"../templates/actividad18.html\">Regresa al formulario</a>"
        ;
      }
    }
    else
    {
      echo "
        <h1>Error B</h1>
        <h3>Sólo recibimos imágenes con la extensión .jpg, .jpeg, o .png<br>
        Asegúrate de que el archivo no tenga puntos en su nombre.</h3>
        <a href=\"../templates/actividad18.html\">Regresa al formulario</a>"
      ;
    }
  }
  else
  {
    echo "
      <h1>Error A</h1>
      <h3>Se produjo un error en la recepción de tu archivo.</h3><br>
      <a href=\"../templates/actividad18.html\">Regresa al formulario</a>";
  }
  //Fin de HTML
  echo "
    </body>
  </html>
  ";
 ?>
