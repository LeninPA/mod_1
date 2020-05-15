<?php
    //Función para cierre de sesión
    function cerrar()
    {
      session_unset();
      session_destroy();
      header("Location:actividad17.php");
    }
    //Cada que se accede al sitio se inicia sesión
    session_start();
    //Inicio de HTML
    echo "
        <!DOCTYPE html>
        <html lang=\"es\" dir=\"ltr\">
          <head>
            <meta charset=\"utf-8\">
            <title>Instituto Nueva Ciudad de México, Nuevo México, Marte</title>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"../design/actividad17.css\">
          </head>
      ";
    //Verifica si se ha cerrado la sesión
    $cerrar=$_POST['cerrar'];
    if ($cerrar=='Cerrar sesión')
    {
      cerrar();
    }
    //Pantalla de inicio
    if (!isset($_SESSION['usuario']) && !isset($_POST['usuario']))
    { //Encabezado
      echo" <body>
              <h1>Instituto Nueva Ciudad de México, Nuevo México, Marte</h1>";
      //Formulario
      echo"
              <form method='POST' action='./actividad17.php'>
                <fieldset>
                  <legend>Ingreso al sistema</legend>
                  Usuario: <input type='text' name='usuario' required><br><br>
                  Soy:<br>
                  <input type='radio' name='tipo' value='Alumno' required>Alumno<br>
                  <input type='radio' name='tipo' value='Profesor' required>Profesor<br>
                  <input type='radio' name='tipo' value='Familiar' required>Familiar<br><br>
                  Selecciona una fuente<br>
                  <select name='fuente'>
                    <option value='Arial'>Arial</option>
                    <option value='Times New Roman'>Times New Roman</option>
                    <option value='Comic Sans MS'>Comic Sans MS</option>
                    <option value='Impact'>Impact</option>
                  </select><br><br>
                  Selecciona un color de fondo:<br>
                  <input type='color' list='colorF' name='colorF' value='#a5d6ec'>
                  <datalist id='colorF'>
                    <option value='#a5d6ec'>
                    <option value='#1c2938'>
                    <option value='#22162a'>
                    <option value='#d05b41'>
                    <option value='#726d9f'>
                  </datalist><br><br>
                  Selecciona un color de letra:<br>
                  <input type='color' list='colorL' name='colorL' value='#34657c'>
                  <datalist id='colorL'>
                    <option value='#34657c'>
                    <option value='#bac9da'>
                    <option value='#d3b9e4'>
                    <option value='#e6a495'>
                    <option value='#191061'>
                  </datalist><br><br>
                  <input type='submit' value='Inicio de sesión'>
                </fieldset>
              </form>
      ";
    }
    //Creación de COOKIES
    elseif (!isset($_SESSION['usuario']))
    {
      $_SESSION['usuario']=$_POST['usuario'];
      $_SESSION['tipo']=$_POST['tipo'];
      $_SESSION['fuente']=$_POST['fuente'];
      $_SESSION['colorFondo']=$_POST['colorF'];
      $_SESSION['colorLetra']=$_POST['colorL'];
      header("Location:actividad17.php");
    }
    //Impresión de pantallas
    else
    {
      $colorF=$_SESSION['colorFondo'];
      $colorL=$_SESSION['colorLetra'];
      $fuente=$_SESSION['fuente'];
      //Personalización de la página
      echo "<body style=\"
              background-color:$colorF;
              font-family: '$fuente';
              color: $colorL;
              text-align:center;
              font-size:2em;\">";
      //Pantalla de Alumno
      if ($_SESSION['tipo']=="Alumno")
      {
        echo "¿Cómo estás alumno ".$_SESSION['usuario']."?<br>
        Recuerda que si requieres unos días de descanso, solicítalos a tu tutor.
        ";
      }
      //Pantalla de Profesor
      elseif ($_SESSION['tipo']=="Profesor")
      {
        echo "Profesor ".$_SESSION['usuario']."<br>
          Sus alumnos han trabajado muy duro en entregarle esta práctica.<br>
          Póngales 10, por favor.
        ";
      }
      //Pantalla de Familiar
      elseif ($_SESSION['tipo']=="Familiar")
      {
        echo "Bienvenido Familiar: ".$_SESSION['usuario']."<br>
        Su hije es perfecto tal y como es. No porque sea mejor que otros.
        Su hije sólo es. Y la dirección espera que le de el amor que todos
        merecemos.
        ";
      }
      //Botón de cierre de sesión
      echo "
      <form method='POST' action='./actividad17.php'>
        <input type='submit' name='cerrar' value='Cerrar sesión'>
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
