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

    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
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