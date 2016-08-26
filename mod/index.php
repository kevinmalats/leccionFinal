<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location: ../../login/");
  exit();
}
require 'colectordemo.php';

    $colector= new DemoCollector();
?>
<!Doctype html>
 <html>
     <head>
     </head>
     <body>
       <?php
       echo "Hola ".$_SESSION['login'];
       echo"<a href=../../login/logout.php> Salir</a>";
        ?>
        <table class="datos">
          <?php

            foreach ($colector->readAllDemo() as $datos) {
                ?>

                     <tr>
                      <td> <?php echo $datos->getId(); ?> </td>
                       <td> <?php echo $datos->getNombre(); ?> </td>
                       <td> <?php if($datos->getImage()) {
                          ?>
                         <img src="<?php echo $datos->getImage(); ?>" width="100px" alt="<? echo $datos->getNombre();?>" />
                         <?php }?>
                      </td>
                       <td><a href="editardemo.php?id=<?php echo $datos->getId();?>"> Editar</a>  </td>
                       <td><a href="eliminardemo.php?id=<?php echo $datos->getId();?>"> Eliminar</a>  </td>
                     </tr>
                   <?php
            }
            ?>

          <tr>
            <td colspan=4><a href="creardemo.php">Crear Demo</a></td>
          </tr>

</table>

</body>


</html>
