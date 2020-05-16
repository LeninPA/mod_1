<?php
    //Actividad17
    /*Este programa es un formulario que permite el ingreso de alumnos,
    familiares o profesores al sistema del Instituto Nueva Ciudad de
    México, Nuevo México, Marte. Se selecciona un nombre de usuario,
    la categoría del usuario, una fuente, un color de fondo, uno de letra
    y se muestra una pantalla específica a cada uno. En esa misma se
    puede cerrar sesión.*/
    //Función para cierre de sesión
    function cerrar()
    {
      session_unset();
      session_destroy();
      header("Location:actividad17.php");
    }
    //Cada que se accede al sitio se inicia sesión
    session_name("Lenin Pavon");
    session_id("19112003");
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
                <fieldset style=\"text-align: center;\">
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
              <table>
                <tr>
                  <td style=\"text-align:justify;\">
                    <p>
                      Tras el gran confinamiento, los pueblos originarios de la Tierra se
                      unieron en la Confederación Federalista Terrana. Con el apoyo conjunto de
                      la Gran Korea (los antiguos territorios de Korea, Japón y Taiwan),
                      la Gran Colombia (los antiguas colonias españolas), Europa, Australia y la
                      Unión de Estados Africanos, se vencieron las fuerzas imperialistas de
                      los Estados Unidos, y Rusia en la
                      colonización y terraformación de marte. Fue en este glorioso planeta que inició el proyecto
                      para una nueva humanidad. Una humanidad libre e inclusiva en la que
                      no existe la esclavitud, no existe la explotación y todas las naciones
                      conviven en paz. Tú, querido marciano, tienes derecho educación de calidad
                      y gratuita en todos los niveles. Te agradecemos que hayas escogido el
                      <strong>Instituto Nueva Ciudad de México, Nuevo México, Marte</strong> para
                      continuar tu educación. Espero que disfrutes tu estadía, consulta con tu
                      tutor para establecer tu horario y grupo para el ciclo escolar 3104-3105.
                    </p>
                  </td>
                  <td>
                    <img src=\"../design/img/marte.png\" alt=\"Antiguo Mapa de Marte\" width='100%'>
                  </td>
                </tr>
              </table>
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
        Recuerda que si requieres unos días de descanso, solicítalos a tu tutor.<br>
        <a href=\"../templates/alumnosA.html\">Avisos</a><br>
        <a href=\"../templates/alumnosB.html\">Calificaciones</a>
        ";
      }
      //Pantalla de Profesor
      elseif ($_SESSION['tipo']=="Profesor")
      {
        echo "Profesor ".$_SESSION['usuario']."<br>
          Sus alumnos han trabajado muy duro en entregarle esta práctica.<br>
          Póngales 10, por favor.<br>
          <a href=\"../templates/profesorA.html\">Avisos</a><br>
          <a href=\"../templates/profesorB.html\">Calificaciones</a>
        ";
      }
      //Pantalla de Familiar
      elseif ($_SESSION['tipo']=="Familiar")
      {
        echo "Bienvenido Familiar: ".$_SESSION['usuario']."<br>
        Su hije es perfecto tal y como es. No porque sea mejor que otros.
        Su hije sólo es. Y la dirección espera que le de el amor que todos
        merecemos.<br>
        <a href=\"../templates/familiarA.html\">Avisos</a><br>
        <a href=\"../templates/familiarB.html\">Eventos</a>
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
