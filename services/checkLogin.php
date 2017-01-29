<?php 

session_start();


$isLogued = false;
if(isset($_SESSION["inicioSesionCorrecto"])){	
	if($_SESSION["inicioSesionCorrecto"]==true){
	
		$isLogued = true;
		$token = $_COOKIE["token"];
	}
}


function checkToken($token){
 	try{
 		// Construyendo las URLs para corroborar token
 		$url = 'https://authb.agoraus1.egc.duckdns.org/api/index.php?method=checkToken&token='.$token;
		
 		// Cogiendo los datos
 		$string = file_get_contents($url);
 		// Decodificando
 		$data = json_decode($string,true);
 		// Cogiendo el atributo concreto que necesitamos
 		$valido = $data['valid'];
 		
 		if($valido == 1){
 			return true;
 		}else{
 			return false;
 		}
 		
 	}catch(Exception $e){
 		return false;
 	}
 }

?>