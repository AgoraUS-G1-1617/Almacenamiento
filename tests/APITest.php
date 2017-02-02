<?php

class APITest extends PHPUnit_Framework_TestCase{
	
	// Get votes
	public function testGetVotes(){
		$id_vote = 1;
		$url = 'http://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=' . $id_vote;
		$string = file_get_contents($url);
		$data = json_decode($string,true);
		$msg = $data["msg"];
		$this->assertEquals($msg,'1');
	}
	
	// Get votations
	public function testGetVotations(){
		$url = 'http://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votations.php';
		$string = file_get_contents($url);
		$data = json_decode($string,true);
		$msg= $data["msg"];
		$this->assertEquals($msg,'1');
	}
	
	// Vote
	public function testVote(){	
		$ch = curl_init();
		$url = 'http://beta.almacenamiento.agoraus1.egc.duckdns.org/vote.php';
		$json = '{"age":1000,"id":"100","autonomous_comunity":"Prueba","genre":"prueba","id_poll":3,
  					"answers":[{"question":"Pregunta 1","answers_question":"SI"},
             		{"question":"Pregunta 2","answers_question":"NO"}]}';
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$response = curl_exec($ch);
		$this->assertEquals($response,'{"msg":"1"}');
		
	}	
}

?>
