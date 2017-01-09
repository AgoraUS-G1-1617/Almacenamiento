<?php

include 'config.php';

try{

	header("Content-Type:application/json");
	
	$votation = intval($_GET["votation_id"]);
	
	$conn = new mysqli($servername, 'root', 'ROOT', $dbname);
	
	if ($votation === 0 || $conn->connect_error) {
	    throw new Exception;
	} 
	
	$sql = "SELECT vote FROM Votes WHERE votation_id = '$votation'";
	$result = $conn->query($sql);
	
	$votes = array();
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $votes[] = $row["vote"];
	    }
	}
	
	echo json_encode(array("votes"=>$votes, "msg" => 1));
	$conn->close();
}catch(Exception $e){
	echo json_encode(array("msg"=>0));
}
die();

?>
