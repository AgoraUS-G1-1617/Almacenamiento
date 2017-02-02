<?php
   
   include 'config.php';

try{

	header("Content-Type:application/json");
	
	$votation = intval($_GET["vote_id"]);
	
	$conn = new mysqli($servername,$username, $pass, $dbname);
	
	if ($votation === 0 || $conn->connect_error) {
		echo($conn->connect_error);
	    throw new Exception;
	} 
	
	$sql = "SELECT question,answer_question from Answers where code_vote=$votation";
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