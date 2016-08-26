<?php
session_start();
if(isset($_SESSION['login'])){
  echo "Hola ".$_SESSION['login'];
  echo"<a href=login/logout.php> Salir</a>";
?>
<br>
<h1>Administracion</h1>
<a href="becario/becarioadmin.php">Becario</a>
<a href="programa/programaadmin.php">Programa</a>
<a href="reporte.php">Reporte</a>

  <?php
}else{
  header("Location: login/");
  exit();
}

