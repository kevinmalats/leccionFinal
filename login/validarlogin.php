<?php
session_start();
$nombre=$_POST['user'];

$clave=$_POST['pass'];

if($nombre=="admin" && $clave=="12345"){
echo "listo";

	$_SESSION['login'] = $nombre;

}
header("Location: ../admin.php");
  exit();
?>
