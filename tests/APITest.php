<?php

class APITest extends PHPUnit_Framework_TestCase{
	
	// Get votes
	public function testGetVotes(){
		$id_vote = 1;
		$url = 'https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=' . $id_vote;
		$string = file_get_contents($url);
		$data = json_decode($string,true);
		$msg = $data["msg"];
		$this->assertEquals($msg,'1');
	}
	
	// Get votations
	public function testGetVotations(){
		$url = 'https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votations.php';
		$string = file_get_contents($url);
		$data = json_decode($string,true);
		$msg= $data["msg"];
		$this->assertEquals($msg,'1');
	}
	
	// Vote No funciona este test al desplegarse debido a que jenkins no esta configurado para que funcione con curl.
/*	public function testVote(){	

		$url = 'https://beta.almacenamiento.agoraus1.egc.duckdns.org/vote.php';
		$data = '{"age":25,"id":"11","autonomous_comunity":"Aragón","genre":"femenino","id_poll":3,
  				"answers":[{"question":"Pregunta 1","answers_question":"SI"},
             {"question":"Pregunta 2","answers_question":"NO"}]}';
		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );
		$this->assertEquals($response,'{"msg":"1"}');
		
	}	*/
}

?>
