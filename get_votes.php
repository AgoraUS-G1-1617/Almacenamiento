<?php

include 'config.php';

try{

	header("Content-Type:application/json");
	
	$votation = intval($_GET["votation_id"]);
	
	$conn = new mysqli("exdb","test", "test", "egcdb");
	
	if ($votation === 0 || $conn->connect_error) {
		echo($conn->connect_error);
	    throw new Exception;
	} 
	
	$sql = "SELECT question,answer_question from Answers where id_poll=$votation";
	$result = $conn->query($sql);
	
	$votes = array();
	
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
			if (count($row)!=0){
	        $votes[] = $row["question"];
			$votes[] = $row["answer_question"];
	    
			}
		}
	}
	
	echo json_encode(array("votes"=>$votes, "msg" => 1));
	$conn->close();
}catch(Exception $e){
	echo json_encode(array("msg"=>0));
}
die();

?>