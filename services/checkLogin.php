<?php 

$isLogged =false;
$cToken= checkToken($_COOKIE['token']);
$cLogin = checkLogin();
if(isset($_COOKIE['token'])){
	$isLogged =checkLogin();
}

function checkLogin(){
	$res = false;
	
	if(isset($_COOKIE['token'])){
	$res = checkToken($_COOKIE['token']);
	}
	if($res == true){
		$_SESSION['inicioSesion'] = true;
	
	}else{
	
		$_SESSION['inicioSesion'] = false;
}
	return $res;
}

function checkToken($token){
 	try{
 	
		
 		$url = 'https://authb.agoraus1.egc.duckdns.org/api/index.php?method=checkToken&token='.$token;
		$string = file_get_contents($url);
		$data = json_decode(substr($string, 3),true);
		$valido = $data["valid"];
 		
 		if($valido == true){
 			return true;
 		}elseif($valido==false){
 			return false;
 		}
			
 		
 	}catch(Exception $e){
 		return "exception";
 	}
 }


?>