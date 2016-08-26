<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location: ../../prueba/login/");
  exit();
}
require 'colectordemo.php';

    $coll = new DemoCollector();

if(isset($_GET["id"])){

    $obj = $coll->getNombre($_GET["id"]);

    ?>
    <form enctype="multipart/form-data" action="editardemo.php" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $obj->getId(); ?>"/>
        <div>
            <label for="name">Usuario de Demo</label>
            <input type="text" name="nombre" value="<?php echo $obj->getNombre();?>"><br>
      </div>
      <div>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        Imagen de perfil: <input name="userfile" type="file" />
    </div>
        <div class="button">
            <button type="submit">Actualizar</button>
        </div>
    </form>

   <?php
}else if(isset($_POST["id"]) && isset($_POST["nombre"])){

    $obj = new Demo();
    $obj->setId($_POST["id"]);
    $obj->setNombre($_POST["nombre"]);
    $uploaddir = '../../fotos/';
    $pagedir = '../../fotos/'. basename($_FILES['userfile']['name']);
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != ""){
      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  
        $obj->setPimage($pagedir);
  
            if($coll->updateDemo($obj)){
              //var_dump($obj);
              header("Location: index.php");
              exit();
            }else{
                echo "Hubo un error al intentar actualizar el Demo.";
            }
      } else {
          echo "Error al subir la imagen\n";
      }
    }else{
      if($coll->updateDemo($obj)){
          //var_dump($obj);

          header("Location: index.php");
          exit();
        }else{
            echo "Hubo un error al intentar actualizar el Demo.";
        }
    }
}else{
    header("Location: index.php");
    exit();
}
