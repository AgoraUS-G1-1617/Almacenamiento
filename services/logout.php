<?php 

//Esto le da un tiempo de vida a la variable token de la cookie nulo. Por lo que basicamente elimina la variable.
setcookie('token','',1, '/');
unset($_SESSION['inicioSesion']);
header("Location:../index.php");

?>