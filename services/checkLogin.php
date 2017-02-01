<?php 

$isLogged =false;
$ar = checkToken($token);
$string = $ar[1];
$data = $ar[2];
$valido = $ar[3];
$cToken= checkToken($_COOKIE['token']);
$cLogin = checkLogin();
if(isset($_COOKIE['token'])){
	$isLogged =checkLogin();
}

function checkLogin(){
	$res = false;
	
	if(isset($_COOKIE['token'])){
	$arr = checkToken($_COOKIE['token']);
	$res = $arr[0];
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
 			return array(true,$string,$data,$valido);
 		}elseif($valido==false){
 			return array(false,$string,$data,$valido);
 		}
			
 		
 	}catch(Exception $e){
 		return array(false,$string,$data,$valido);
 	}
 }


?>