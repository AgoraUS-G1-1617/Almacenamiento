<?php 

session_start();

$isLogued = false;
if(isset($_SESSION["inicioSesionCorrecto"])){	
	if($_SESSION["inicioSesionCorrecto"]==true){
	
		$isLogued = true;
	}
}
?>