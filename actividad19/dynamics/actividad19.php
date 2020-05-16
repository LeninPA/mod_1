<?php
 //Equipo Alfa Buena Maravilla Onda Dinamita Escuadrón Lobo
$a = (isset($_POST['a']) && $_POST['a'] != "") ? $_POST['a'] : "no hay número" ;
$b = (isset($_POST['b']) && $_POST['b'] != "" )? $_POST['b'] : "no hay número" ;
$c = (isset($_POST['c']) && $_POST['c'] != "")? $_POST['c'] : "no hay número" ;

$validacion1=is_numeric($a);
$validacion2=is_numeric($b);
$validacion3=is_numeric($c);

if ($validacion1&&$validacion2&&$validacion3) {
  $neg = -1;

  $imag=false;
  $menosb = $b * $neg;
  $oper1 = pow($b,2); //exponentes
  $oper2 = 4*$a*$c;//4ac
  $resta = $oper1-$oper2;
  if ($resta<0) {
    $resta*=-1;
    $imag=true;
  }
  $raiz = sqrt($resta);


   //raiz
  $dosa = 2*$a;


  //divicion

    $result101 = $menosb/ $dosa + $raiz/ $dosa;
    $result202 = $menosb/ $dosa - $raiz/ $dosa;
    $result103 = $menosb/ $dosa;
    $result104 = $raiz/ $dosa;
    $result203 = $menosb/ $dosa;
    $result204 = $raiz/ $dosa;

  if ($imag==false) {
    echo "X<sub>1</sub>"." =".$result101."<br>";
    echo "X<sub>2</sub>"." =".$result202;
  }else{
    echo "X<sub>1</sub>"." =".$result103."+".$result104."i"."<br>";
    echo "X<sub>2</sub>"." =".$result203."-".$result204."i";
  }
}
else {
  echo "Regresa al forVmulario e inserta un número para cada variable";
  echo "<a href='Chicharronera.html'>VOLVER AL FORMULARIO</a>";
}
 ?>
