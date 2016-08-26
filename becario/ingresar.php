<?php
require_once('colectorbecario.php');
require_once 'becario.php';

echo "entro";

session_start();
if(isset($_SESSION['login'])){
  echo "Hola ".$_SESSION['login'];
  echo"<a href=../login/logout.php> Salir</a>";

}
require 'colectordemo.php';
if(isset($_POST["nombre"])){
  $colector = new ColectorBecario();


  $becario = new Becario();
  $becario->setNombre($_POST["nombre"]);

  
      if($colector->addDemo($demo)){
  
          header("Location: becarioadmin.php");
          exit();
        }else{
            echo "Error al ingresar becario.";
        }
    }
}else{
?>
  <html>

  <head>
  </head>

  <body>
    <form  action="ingresar.php" method="post">
      <div>
        <label for="name">Ingresar nuevo becario </label>
        <input type="text" name="nombre" value="Karjakin"><br>
      </div>
    
      <div class="button">
        <button type="submit">Ingresar</button>
      </div>
    </form>
  </body>

  </html>
<?php
     }
?>
