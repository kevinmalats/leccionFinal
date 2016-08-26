<?php
session_start();
if(isset($_SESSION['login'])){
  echo "Hola ".$_SESSION['login'];
  echo"<a href=../login/logout.php> Salir</a>";
?>
<br>
<h1>Administracion</h1>
<a href="ingresar.php">ingresar</a>
<a href="eliminar.php">eliminar</a>
<a href="editar.php">editar</a>
<a href="mostrar.php">mostrar</a>

  <?php
}else{
  header("Location: login/");
  exit();
}

