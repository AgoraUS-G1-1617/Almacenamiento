<?php

include 'config.php';

try{

	header("Content-Type:application/json");
	
	$data 		 = json_decode(file_get_contents('php://input'),true);
	$id			 = intval($data["id"]);
	$age  		 = intval($data["age"]);
	$genre 		 = $data["genre"];
	$comunity	 = $data["autonomous_comunity"];
	$votation_id = intval($data["id_poll"]);
	$answers	 = $data["answers"];
	
	$conn = new mysqli($servername,$username, $pass, $dbname);
	
	if ($votation_id === 0 || $conn->connect_error) {
		echo($conn->connect_error);
		throw new Exception;
	} 
	
	$idvoto = "SELECT code_vote FROM Votes";
	$idvotos = $conn ->query($idvoto);
	$votes = array();
	if ($idvotos->num_rows > 0) {
	    while($row = $idvotos->fetch_assoc()) {
			if (count($row)!=0){
	        $votes[] = $row["code_vote"];
	    	}
		}
	}
	
	if (in_array($id, $votes)) {
    echo 'Id del voto ya existe';
	}else{		
	
	
	$sql = "INSERT INTO Votes(age,code_vote, id_poll,genre,comunity) VALUES ('$age','$id', '$votation_id','$genre','$comunity')";
	$result = $conn->query($sql);
	foreach($answers as $valor){
		$question = $valor['question'];
		$answer = $valor['answers_question'];	
			
		$ans = "INSERT INTO Answers(question,code_vote, answer_question,id_poll) VALUES ('$question','$id','$answer','$votation_id')";
		$result = $conn->query($ans);
		
	}	
	
	
	echo json_encode(array("msg"=>"1"));
	$conn->close();
	}
	
}catch(Exception $e){
	echo json_encode(array("msg"=>0));
}
die();

?>
