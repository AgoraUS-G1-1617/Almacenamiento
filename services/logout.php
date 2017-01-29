<?php

session_start();

	unset($_SESSION["administradorCorrecto"]);
	unset($_SESSION["inicioSesionCorrecto"]);
	setcookie("token", NULL, time()-3600);
    setcookie("user", NULL, time()-3600);

	Header("Location: ../index.php");


?>