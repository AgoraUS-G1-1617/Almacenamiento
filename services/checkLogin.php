<?php 

$isLogged =false;
if(isset($_COOKIE['token'])){
		
	$res= checkLogin();
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
		$string = file_get_contents_curl($url);
		$data = json_decode(substr($string, 3),true);
		$valido = $data["valid"];
 		
 		if($valido == true){
 			return array(true);
 		}elseif($valido==false){
 			return array(false);
 		}
			
 		
 	}catch(Exception $e){
 		return array(false);
 	}
 }

function file_get_contents_curl($url) {
    	
    $ch = curl_init();

    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}


?>