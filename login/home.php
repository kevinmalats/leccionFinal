<?php
session_start();
if(isset($_SESSION['login'])){
  echo "Hola ".$_SESSION['login'];
  echo"<a href=logout.php> Salir</a>";
}



else{?>
<form action="datos.php" method="post">
 <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="user" />
    </div>
    <div>
        <label for="Password">Password:</label>
        <input type="password" id="password" name="pass" />
    </div>
	<div class="button">
        <button type="submit">Enviar</button>
    </div>

</form>
<?php
}
?>

