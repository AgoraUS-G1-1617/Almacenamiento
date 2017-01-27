<?php 
session_start();

//Esto le da un tiempo de vida a la variable token de la cookie nulo. Por lo que basicamente elimina la variable.
session_destroy();
header("Location:../index.php");
quit();
?>