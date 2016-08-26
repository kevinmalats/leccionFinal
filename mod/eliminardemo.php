<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location: ../../login/");
  exit();
}
require 'colectordemo.php';

    $coll = new DemoCollector();

if(isset($_GET["id"])){

    $obj = $coll->deleteDemo($_GET["id"]);
  
    header("Location: index.php");
    exit();
}else{
  echo "Valor no encontrado.";
}
