<?php 

$isLogged =false;
$string = null;
$data = null;
$valido = null;
$url = null;
if(isset($_COOKIE['token'])){
	$cToken= checkToken($_COOKIE['token']);
	$string = $cToken[1];
	$data = $cToken[2];
	$valido = $cToken[3];
	$url = $cToken[4];
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
		$string = file_get_contents_curl($url);
		$data = json_decode(substr($string, 3),true);
		$valido = $data["valid"];
 		
 		if($valido == true){
 			return array(true,$string,$data,$valido,$url);
 		}elseif($valido==false){
 			return array(false,$string,$data,$valido,$url);
 		}
			
 		
 	}catch(Exception $e){
 		return array(false,$string,$data,$valido,$url);
 	}
 }

function file_get_contents_curl($url) {
    	
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);      

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}


?>